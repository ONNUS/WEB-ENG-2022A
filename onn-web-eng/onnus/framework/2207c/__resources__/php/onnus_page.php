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


    onnus::$class->page = new onnus_page();


    class onnus_page {

        public static $data = [];


        public function __construct() {
            
            if (onnus_class::load(self::$data, $this)) {

                self::$data['default'] = 'home';
                self::$data['charset'] = 'utf-8';
                self::$data['viewport'] = 'width=device-width, initial-scale=1.0'; 
                self::$data['title'] = 'Onnus WEB Engine'; 
                self::$data['description'] = 'Onnus WEB Engine | Page descruption here.'; 

                self::$data['header'] = []; 
                self::$data['footer'] = []; 

                onnus_class::save(self::$data, $this);

            }

            onnus_index::fetch('page');

        }

        public function __destruct() {}


        public static function debug():void {}


        public static function initialize(
            string               $url,
        ):void {

            self::url($url);

            self::content();

            self::html();

        }

        public static function url(
            string              $url,
            bool                $forward = false,
        ):void {

            $bol_foreach_break = false;
            $bol_url_parent = false;

            $str_url_query = '';
            $str_url_page = '';


            if ($url === '') {
                $url = self::$data['default'] . '/';
            }

            foreach (explode("/", trim($url, '/')) as &$str_url) {

                $str_url_query .= $str_url . '/';
                $str_url_query_file = trim($str_url_query, '/');

                if (!$bol_url_parent) {
                    self::$data['path'] = '';
                }

                foreach (array_reverse(index::$data['_pages_']) as $str_page_dir => $str_page_value) {

                    $str_page_path = $str_page_dir . $str_url_query_file;
                    $str_404_path = $str_page_dir . '404';

                    if (onnus_file::exist($str_page_path . '.php')) {
                        self::$data['path'] = $str_page_path . '.php';
                    } else if (onnus_file::exist($str_page_path . '.html')) {
                        self::$data['path'] = $str_page_path . '.html';
                    }

                    if (onnus_file::exist($str_page_path . '.json')) {

                        $arr_page_json = onnus_json::get($str_page_path . '.json');

                        if (is_array($arr_page_json)) {

                            if (
                                isset($arr_page_json['parent']) && 
                                $arr_page_json['parent'] === true &&
                                onnus_file::exist($str_page_path . '.php')
                            ) {

                                $bol_foreach_break = true;
                                $bol_url_parent = true;

                                // self::$data['path'] = $str_page_path . '.php'; // REMOVE IF NOT NEEDED

                            } else if (
                                isset($arr_page_json['redirect']['_']) && 
                                isset($arr_page_json['redirect']['url']) && 
                                $arr_page_json['redirect']['_'] === true && 
                                $arr_page_json['redirect']['url'] !== ''
                            ) {

                                // self::$data['header'] = 'location:' . 'http://' . $_SERVER['HTTP_HOST'] . '/' . $arr_page_json['redirect']['url'];
                                $str_page_header = 'location:' . 'http://' . $_SERVER['HTTP_HOST'] . '/' . $arr_page_json['redirect']['url'];

                                return;

                            } else if (
                                isset($arr_page_json['forward']['_']) && 
                                isset($arr_page_json['forward']['url']) && 
                                $arr_page_json['forward']['_'] === true && 
                                $arr_page_json['forward']['url'] !== ''
                            ) {

                                self::$data['forward'] = true;
                                self::$data['url'] = $arr_page_json['forward']['url'];

                            }

                            if (
                                isset($arr_page_json['refresh']['_']) && 
                                isset($arr_page_json['refresh']['seconds']) && 
                                $arr_page_json['refresh']['_'] === true
                            ) {

                                // self::$data['header'] = 'refresh:' . $arr_page_json['refresh']['seconds'];
                                $str_page_header = 'refresh:' . $arr_page_json['refresh']['seconds'];

                            }
                            
                        } else {
                            
                            $arr_page_json['title'] = '';
                            $arr_page_json['description'] = '';

                            $arr_page_json['parent'] = false;

                            $arr_page_json['redirect']['_'] = false;
                            $arr_page_json['redirect']['url'] = '';

                            $arr_page_json['refresh']['_'] = false;
                            $arr_page_json['refresh']['seconds'] = 60;

                            $arr_page_json['forward']['_'] = false;
                            $arr_page_json['forward']['path'] = '';

                            onnus_json::set($str_page_path . '.json', $arr_page_json);

                        }

                    }


                    if (onnus_file::exist($str_404_path . '.php')) {
                        self::$data['404'] = $str_404_path . '.php';
                    } else if (onnus_file::exist($str_404_path . '.html')) {
                        self::$data['404'] = $str_404_path . '.html';
                    }

                }

            }

            if ($forward === false) {

                if (
                    isset(self::$data['forward']) &&
                    isset(self::$data['url']) && 
                    self::$data['forward'] && 
                    self::$data['url']
                ) {
                    self::url(self::$data['url'], true);
                } else if (
                    isset($str_page_header) &&
                    $str_page_header
                ) {
                    header($str_page_header);
                } else if (!self::$data['path']) {
                    self::$data['path'] = self::$data['404'];
                }

            }

        }


        public static function get(
            string              $mode,
        ):void {

            if (!isset(self::$data[$mode])) {return;}


            if ($mode === 'title') {

                onnus_html::element('title', '', self::$data[$mode]);

            } else if ($mode === 'meta') {

                foreach (self::$data[$mode] as &$str_meta_attribute) {
                    onnus_html::element('meta', $str_meta_attribute);
                }

            } else if ($mode === 'script') {

                foreach (self::$data[$mode] as &$str_script_src) {
                    onnus_html::element('script', "type{application/javascript}src{{$str_script_src}}", '');
                }

            } else if ($mode === 'style') {
                
                foreach (self::$data[$mode] as &$str_script_src) {
                    onnus_html::element('link', "rel{stylesheet}href{{$str_script_src}}/");
                }

            } else if ($mode === 'header' || $mode === 'footer') {

                if (!isset(index::$data["_{$mode}_"])) {return;}

                foreach (index::$data["_{$mode}_"] as $str_directory => $str) {

                    if (!onnus_directory::exist($str_directory)) {continue;}

                    $arr_directory = onnus_directory::get($str_directory); 

                    if (count($arr_directory) <= 2) {continue;}

                    foreach ($arr_directory as &$str_file) {

                        if ($str_file === '.' || $str_file === '..') {continue;}

                        $str_path = $str_directory . $str_file;
                        $str_extension = pathinfo($str_file, PATHINFO_EXTENSION);
                        $str_name = basename($str_path);

                        if ($str_extension === 'php') {
                            self::$data['header'][] = index::$base . $str_path;
                        } else if ($str_extension === 'js') {
                            self::$data['script'][$str_name] = index::$base . $str_path; 
                        } else if ($str_extension === 'css') {
                            self::$data['style'][$str_name] = index::$base . $str_path; 
                        }

                    }

                }

            }

        }

        public static function set(
            string              $mode,
            string              $option,
            bool                $type = false,
        ):void {

            if ($type === true) {
                self::$data[$mode][] = $option;
            } else {
                self::$data[$mode] = $option; 
            }

        }


        public static function html():void {

            onnus_html::element('!DOCTYPE', 'html{}');
            onnus_html::element('html', 'lang{en-US}');

                self::head();
                self::body();

            onnus_html::element('html');

        }

        public static function head():void {

            onnus_html::element('head', '');

                self::get('meta');
                self::get('title');
                self::get('description');
                self::get('script');
                self::get('style');

            onnus_html::element('head');

        }

        public static function body():void {

            onnus_html::element('body', 'class{onnus}');

                if (isset(self::$data['content']['layout']) && self::$data['content']['layout']) {

                    print(self::$data['content']['layout']);

                } else if (isset(self::$data['content']['body']) && self::$data['content']['body']) {

                    print(self::$data['content']['header'] . "\n");
                    print(self::$data['content']['body'] . "\n");
                    print(self::$data['content']['footer']);

                }

            onnus_html::element('body');

        }

        public static function content(
            string              $type = '',
        ):void {

            self::$data['content']['header'] = self::$data['content']['header'] ?? '';
            self::$data['content']['body'] = self::$data['content']['body'] ?? '';
            self::$data['content']['footer'] = self::$data['content']['footer'] ?? '';
            self::$data['content']['layout'] = self::$data['content']['layout'] ?? '';

            if (isset(self::$data['content'][$type])) {

                print(self::$data['content'][$type]);

            } else {

                ob_start();

                    self::$data['script']['onnus.js'] = index::$base . onnus_index::get('directory', 'fra_res_js') . 'onnus.js'; 

                    self::get('header');

                    foreach (self::$data['header'] as &$str_header_path) {
                        include_once(index::$root . $str_header_path);
                    }

                    onnus_html::element('body-content', 'class{onnus-content}');

                    self::$data['content']['header'] = ob_get_contents();

                ob_end_clean();
                ob_start();

                    include(self::$data['path']); 
                    echo "\n";

                    self::$data['content']['body'] = ob_get_contents();

                ob_end_clean();
                ob_start();

                    echo "\n";
                    onnus_html::element('body-content');

                    self::get('footer');

                    foreach (self::$data['footer'] as &$str_header_path) {
                        include_once(index::$root . $str_header_path);
                    }

                    self::$data['content']['footer'] = ob_get_contents();

                ob_end_clean();

                if (isset(self::$data['layout']) && self::$data['layout']) {

                    ob_start();

                        if (isset(self::$data['content']['header'])) {
                            print(self::$data['content']['header']);
                        }

                        include(self::$data['layout']);

                        if (isset(self::$data['content']['footer'])) {
                            print(self::$data['content']['footer']);
                        }

                        self::$data['content']['layout'] = ob_get_contents();

                    ob_end_clean();

                }


                self::$data['meta']['charset'] = 'charset{' . self::$data['charset'] . '}'; 
                self::$data['meta']['viewport'] = 'name{viewport}content{' . self::$data['viewport'] . '}'; 
                self::$data['meta']['description'] = 'name{description}content{' . self::$data['description'] . '}'; 

                if (isset(self::$data['content']['layout']) && self::$data['content']['layout']) {
                    $str_dom_doc_html = self::$data['content']['layout'];
                } else if (isset(self::$data['content']['body']) && self::$data['content']['body']) {
                    $str_dom_doc_html = self::$data['content']['header'] . "\n" . self::$data['content']['body'] . "\n" . self::$data['content']['footer'];
                } else {
                    return;
                }


                if (!$str_dom_doc_html) {return;}


                $obj_dom_doc = new DOMDocument();

                libxml_use_internal_errors(true);

                $obj_dom_doc->loadHTML($str_dom_doc_html);

                libxml_clear_errors();

                $obj_xpath = new DOMXpath($obj_dom_doc);

                foreach ($obj_xpath->query("//*") as $obj_class) {

                    if (!$obj_class->getAttribute('class')) {continue;}

                    $arr_class = explode(' ', $obj_class->getAttribute('class'));

                    foreach ($arr_class as &$str_class) {

                        if (!$str_class) {continue;}

                        $str_class_query = '';

                        $arr_class_parts = explode('-', $str_class);

                        foreach ($arr_class_parts as &$arr_class_part) {

                            if ($str_class_query) {$str_class_query .= '-';}

                            $str_class_query .= $arr_class_part;

                            $str_class_path = onnus_index::get('directory', 'fra_res_css') . $str_class_query . '.css';

                            if (!onnus_file::exist(onnus_index::get('directory', 'fra_res_css') . $str_class_query . '.css')) {continue;}

                            self::$data['style'][$str_class_query . '.css'] = index::$base . onnus_index::get('directory', 'fra_res_css') . $str_class_query . '.css'; 

                        }

                    }

                }

            }



        }

        public static function authenticate():array {
            return [];
        }


        public static function layout(
            string              $file
        ):void {

            foreach (index::$data['_layouts_'] as $str_layout_directory => $null) {

                $str_layout_path = $str_layout_directory . $file . '.php';

                if (onnus_file::exist($str_layout_path)) {
                    self::$data['layout'] = $str_layout_path;
                }

            }

        }

        public static function title(
            string              $title,
        ):void {

            self::$data['title'] = $title;

        }

        public static function charset(
            string              $charset,
        ):void {

            self::$data['charset'] = $charset;
            
        }
        
        public static function description(
            string              $description,
        ):void {
                
            self::$data['description'] = $description;

        }

    }