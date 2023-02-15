<?php

    /**
     * Copyright (c) 2020 | Onnus Developer Foundation 503c
     * Copyright (c) 2020 | Onnus Developer Core LLC
     *
     * long description for the file
     *
     * @summary short description for the file
     * @author Jasen Crockett <jasenc@onnus.org>
     *
     * Created      : 2020-08-19 01:23:45 :
     * Modified     : 2022-04-30 05:06:40 :
     */


    onnus::$class->api = new onnus_api();


    class onnus_api {

        public static $data = [
            '_get' => [], '_post' => [],
            'directory' => null, 'route' => null,
            'tag' => null, 'html' => [], 'script' => [], 'style' => []
        ];


        public function __construct() {

            if (onnus_class::load(self::$data, $this)) {

                // echo '<b>onnus_api</b><br>';

                onnus_class::save(self::$data, $this);

            }

            self::$data['_post'] = $_POST ?: null;
            self::$data['_get'] = $_GET ?: null;

            onnus_html::format(false);

            onnus_index::fetch('api');

        }

        public function __destruct() {

            // echo '🔄 onnus_index | __destruct <br><pre>', print_r(self::$data), '</pre>','<br>';

        }


        public static function debug():void {}


        public static function initialize(
            array               $url
        ):void {

            $str_api_dir = '';
            $str_api_path = '';

            $arr_url = $url; // refactor | only use $url

            if (isset($arr_url[1]) && isset(index::$data['api'][$arr_url[1]])) {
                $str_api_dir = index::$data['api'][$arr_url[1]];
            } else if (isset($arr_url[1]) && isset(index::$data['_api_'][$arr_url[1]])) {
                $str_api_dir = index::$data['_api_'][$arr_url[1]];
            }
            
            if (!$str_api_dir || !isset($arr_url[2])) {return;}

            // echo 'str_api_dir =', $str_api_dir, '=<br>', "\r"; // DEBUG
            // echo 'count($arr_url) =', count($arr_url), '=<br>', "\r"; // DEBUG

            self::$data['directory'] = $str_api_dir;

            $str_api_route = trim($str_api_dir, '/');

            for ($int = 2; $int <= count($arr_url); $int++) {

                if (!isset($arr_url[$int])) {continue;}

                $str_api_route .= '/' . $arr_url[$int];

                if (onnus_file::exist($str_api_route . '.php')) {
                    self::$data['route'] = $str_api_route;
                }

                if (onnus_file::exist($str_api_route . '.css')) {
                    self::$data['style']['/' . $str_api_route . '.css'] = null;
                }

                if (onnus_file::exist($str_api_route . '.js')) {
                    self::$data['script']['/' . $str_api_route . '.js'] = null;
                }

                if (onnus_file::exist($str_api_route . '.json')) {
                    
                    // echo 'str_api_route =', $str_api_route . '.json', '=<br>', "\r";
                    
                    $arr_api_json = onnus_json::get($str_api_route . '.json');
                    
                    if (is_array($arr_api_json)) {

                        if (
                            isset($arr_api_json['parent']) && 
                            $arr_api_json['parent'] === true &&
                            onnus_file::exist($str_api_route . '.php')
                        ) {
                            break;
                        }

                    } else {

                        $arr_api_json['parent'] = false;
                        $arr_api_json['permissions'] = '';

                        onnus_json::set($str_api_route . '.json', $arr_api_json);

                    }

                }

            }

            if (!self::$data['route']) {return;}


            ob_start();

            self::include();

            $str_ob_contents = ob_get_contents();

            ob_end_clean();


            if (isset($_POST['_api_tag']) && !isset(self::$data['tag'])) {
                self::$data['tag'] = $_POST['_api_tag'];
            } else if (isset($_GET['_api_tag']) && !isset(self::$data['tag'])) {
                self::$data['tag'] = $_GET['_api_tag'];
            } else if (!isset(self::$data['tag'])) {
                self::$data['tag'] = 'html[]body[]body-content[]';
            }

            self::$data['html'][self::$data['tag']] = $str_ob_contents;


            header("Access-Control-Allow-Origin: *");
            header("Content-Type: application/json; charset=UTF-8");

            echo json_encode(self::$data, JSON_PRETTY_PRINT);

        }

        public static function include():void {

            include_once(self::$data['route'] . '.php');

        }





        public static function set(
            string      $type = null,
            string      $tag = null,
            string      $data = null
        ):void {

        }

        public static function get(
            string      $mode,
            string      $api = null
        ):string {

        }














// REMOVE OLD CODE AFTER REFACTOR

        public static function initialize___old():void {

            if (!isset($_SERVER['REDIRECT_URL'])) {return;} // remove


            $str_api_url = str_replace('/api', '', $_SERVER['REDIRECT_URL']); // remove

            $arr_api_url = explode("/", trim($str_api_url, '/'));


            if (!isset($arr_api_url[0])) {return;}


            if ($arr_api_url[0] == 'onnus') {
                self::$data['directory'] = onnus_index::get('directory', '_api');
            } else if ($arr_api_url[0] == 'app' && isset($arr_api_url[1]) & isset($arr_api_url[2])) {

                $str_api_app_url = 'onnus/0000a/__apps/' . $arr_api_url[1] . '/_api/' . $arr_api_url[2];

                if (file_exists($str_api_app_url . '.php')) {

                    // self::$data['api'] = $str_api_url . '.php';
                    self::$data['directory'] = 'onnus/0000a/__apps/' . $arr_api_url[1] . '/';
                    $str_api_url = '_api/' . $arr_api_url[2];

                }

            } else {
                self::$data['directory'] = onnus_index::get('directory', 'api');
            }

            self::$data['route'] = trim(str_replace('onnus', '', $str_api_url), '/');
            self::$data['api'] = self::$data['directory'] . self::$data['route'];

            if (file_exists(self::$data['api'] . '.php')) {

                ob_start();

                self::include();

                if (isset($_POST['_api_tag']) && !isset(self::$data['tag'])) {
                    self::$data['tag'] = $_POST['_api_tag'];
                } else if (isset($_GET['_api_tag']) && !isset(self::$data['tag'])) {
                    self::$data['tag'] = $_GET['_api_tag'];
                } else if (!isset(self::$data['tag'])) {
                    self::$data['tag'] = 'html[]body[]main[]';
                }

                if (isset($_POST['_api_get'])) {

                    $str_api_get = $_POST['_api_get'];

                    self::get($str_api_get);
                }

                self::set('script', self::$data['api']);
                self::set('style', self::$data['api']);

                self::$data['html'][self::$data['tag']] = ob_get_contents();

                ob_end_clean();

            }

            header("Access-Control-Allow-Origin: *");
            header("Content-Type: application/json; charset=UTF-8");

            echo json_encode(self::$data,JSON_PRETTY_PRINT);

        }

        public static function include_old():void {

            include_once(self::$data['api'] . '.php');

        }


        public static function set_old(
            string      $type = null,
            string      $tag = null,
            string      $data = null
        ):void {

            if ($type == 'html') {

                if ($tag == null) {
                    $tag = 'html[]body[]main[]';
                }

                if (!isset(self::$data['html'][$tag])) {
                    self::$data['html'][$tag] = '';
                }

                self::$data['html'][$tag] .= $data;

            } else if ($type == 'script') {

                $str_extension = '.js';

            } else if ($type == 'style') {

                $str_extension = '.css';

            } else if (!$data) {

                self::$data[$type] = $tag;

            } else if ($data) {

                self::$data[$type][$tag] = $data;

            }

            if (isset($str_extension)) {

                $str_path = trim($tag, '/');

                if (!str_contains($str_path, $str_extension)) {
                    $str_path = $str_path . $str_extension;
                }

                if (file_exists($str_path)) {

                    $str_path = '/' . $str_path;

                    self::$data[$type][$str_path] = $tag;

                }

            }

        }

        public static function get_old(
            string      $mode,
            string      $api = null
        ):string {

            $str_return = '';


            if ($mode == '_ascendants') {

            } else if ($mode == '_ascendent') {

            } else if ($mode == '_parents') {

            } else if ($mode == '_parent') {

                $str_parent = dirname(self::$data['api']);

                self::set('script', $str_parent);
                self::set('style', $str_parent);

            } else if ($mode == '_siblings') {

            } else if ($mode == '_sibling') {

            } else if ($mode == '_descendants') {

            } else if ($mode == '_descendant') {

            } else if (isset(self::$data[$mode][$api])) {

                $str_return = self::$data[$mode][$api];

            } else if (isset(self::$data[$mode])) {

                $str_return = self::$data[$mode];

            }

            return $str_return;

        }






// remove old code

        public static function initialize_old():void {

            if (isset($_SERVER['REDIRECT_URL'])) { // refactored

                $str_redirect_url = $_SERVER['REDIRECT_URL']; // refactored

                $str_redirect_url = str_replace('/api', '', $str_redirect_url); // refactored
                $str_redirect_url = trim($str_redirect_url, '/'); // refactored

                $arr_api = explode("/", $str_redirect_url); // refactored

                if (isset($arr_api)) { // refactored

                    if ($arr_api[0] == 'onnus') { // refactored

                        $str_route = str_replace('onnus', '', $str_redirect_url); // refactored
                        $str_route = trim($str_route, '/'); // refactored
                        $str_route_path = $str_route; // refactored

                        // $str_route_dir = index::$arr['directory']['_api']; // UPDATE

                        // $str_include_path_php = $str_route_dir . $str_route_path . '.php';
                        // $str_include_path_js = $str_route_dir . $str_route_path . '.js';
                        // $str_include_path_css = $str_route_dir . $str_route_path . '.css';

                        $str_route_dir = index::$arr['directory']['framework']; // UPDATE // refactored

                        $str_include_path = $str_route_dir . '_api/' . $str_route_path; // refactored
                        $str_include_path_php = $str_include_path . '.php'; // refactored

                        // $str_include_path_js = $str_route_dir . '_api/' . $str_route_path . '.js';
                        // $str_include_path_css = $str_route_dir . '_api/' . $str_route_path . '.css';

                        if (file_exists($str_include_path_php)) {

                            self::$data['include_path'] = $str_include_path_php;

                            ob_start();

                            self::include();

                            $str_ob_contents = ob_get_contents();

                            ob_end_clean();
                            
                            if ($str_ob_contents) {
    
                                self::import($str_include_path);

                                // if (file_exists($str_include_path_js)) {
                                //     self::write('script', '/' . $str_include_path_js);
                                // }

                                // if (file_exists($str_include_path_css)) {
                                //     self::write('style',  '/' . $str_include_path_css);
                                // }
                                
                                if (isset(self::$data['element_path'])) {
    
                                    $str_api_path = self::$data['element_path'];

                                    unset(self::$data['element_path']);

                                } else {
                                    $str_api_path = 'html[]body[]main[]';
                                }

                                if (!isset(self::$data['html'][$str_api_path])) {
                                    self::$data['html'][$str_api_path] = '';
                                }

                                self::$data['html'][$str_api_path] .= $str_ob_contents;

                            }

                        }

                        header("Access-Control-Allow-Origin: *");
                        header("Content-Type: application/json; charset=UTF-8");

                        echo json_encode(self::$data,JSON_PRETTY_PRINT);

                    } else if ($arr_api[0] == 'data') {

                        

                    }

                }

            }

        }

        public static function element(
            string      $element
        ):void {

            self::$data['element_path'] = $element;

        }

        public static function exist():void {}

        public static function read():void {}

        public static function write_old(
            string      $type,
            string      $data = null,
            string      $element = null
        ):void {

            if ($type == 'html') {

                if (!$element && isset(self::$data['element_path'])) {
                    $element = self::$data['element_path'];
                } else {
                    $element = 'html[]body[]main[]';
                }

                if (!isset(self::$data['html'][$element])) {
                    self::$data['html'][$element] = '';
                }

                self::$data['html'][$element] .= $data;

            } else if ($type == 'script') {

                self::$data['script'][] = $data;

            } else if ($type == 'style') {

                self::$data['style'][] = $data;

            }

        }

        public static function remove():void {}


        public static function import(
            string      $path
        ):void {

            $str_path_js = $path . '.js';
            $str_path_css = $path . '.css';

            if (file_exists($str_path_js)) {
                self::write('script', '/' . $str_path_js);
            }

            if (file_exists($str_path_css)) {
                self::write('style',  '/' . $str_path_css);
            }

        }

        public static function output():void {}




    }