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


    class onnus_index {

        public static $save = false;
        public static $data = ['css' => null, 'js' => null, 'folder' => null, 'directory' => null];


        public function __construct() {

            index::moderate(index::$data, 'directory', 'onn_archives', 'directory[onnus]folder[archives]', '_');
            index::moderate(index::$data, 'directory', 'onn_deleted', 'directory[onnus]folder[deleted]', '_');
            index::moderate(index::$data, 'directory', 'onn_installs', 'directory[onnus]folder[installs]', '_');
            index::moderate(index::$data, 'directory', 'onn_uploads', 'directory[onnus]folder[uploads]', '_');

            index::moderate(index::$data, 'directory', 'fra_res_js', 'directory[fra_resources]folder[js]');
            index::moderate(index::$data, 'directory', 'fra_res_css', 'directory[fra_resources]folder[css]');
            index::moderate(index::$data, 'directory', 'fra_applications', 'directory[framework]folder[applications]', '__');
            index::moderate(index::$data, 'directory', 'fra_plugins', 'directory[framework]folder[plugins]', '__');
            index::moderate(index::$data, 'directory', 'fra_api', 'directory[framework]folder[api]', '_');
            index::moderate(index::$data, 'directory', 'fra_elements', 'directory[framework]folder[elements]');
            index::moderate(index::$data, 'directory', 'fra_images', 'directory[framework]folder[images]');
            index::moderate(index::$data, 'directory', 'fra_layouts', 'directory[framework]folder[layouts]');
            index::moderate(index::$data, 'directory', 'fra_pages', 'directory[framework]folder[pages]');
            index::moderate(index::$data, 'directory', 'fra_menus', 'directory[framework]folder[menus]');

            index::moderate(index::$data, 'directory', 'con_applications', 'directory[content]folder[applications]', '__');
            index::moderate(index::$data, 'directory', 'con_plugins', 'directory[content]folder[plugins]', '__');
            index::moderate(index::$data, 'directory', 'con_api', 'directory[content]folder[api]', '_');
            index::moderate(index::$data, 'directory', 'con_class', 'directory[content]folder[class]', '_');
            index::moderate(index::$data, 'directory', 'con_data', 'directory[content]folder[data]', '_');
            index::moderate(index::$data, 'directory', 'con_footer', 'directory[content]folder[footer]', '_');
            index::moderate(index::$data, 'directory', 'con_header', 'directory[content]folder[header]', '_');
            index::moderate(index::$data, 'directory', 'con_elements', 'directory[content]folder[elements]');
            index::moderate(index::$data, 'directory', 'con_images', 'directory[content]folder[images]');
            index::moderate(index::$data, 'directory', 'con_layouts', 'directory[content]folder[layouts]');
            index::moderate(index::$data, 'directory', 'con_pages', 'directory[content]folder[pages]');
            index::moderate(index::$data, 'directory', 'con_menus', 'directory[content]folder[menus]');

            if (index::$save === true) {
                index::$data['class'][index::$data['directory']['con_class']] = null;
            }

            self::fetch('class');

            if (onnus_user::permission()) {
                self::compile();
            }

        }

        public function __destruct() {
 
            if (self::$save === true) {

                file_put_contents(
                    index::$root . 'index.json',
                    json_encode(self::$data, JSON_PRETTY_PRINT)
                );

                // echo '<hr>🟨 onnus_index - self::$data | __destruct <br><pre>', print_r(self::$data), '</pre>','<br>';

            }

            if (index::$save === true) {

                unset(index::$data['_class_']);
                unset(index::$data['_api_']);
                unset(index::$data['_footer_']);
                unset(index::$data['_header_']);
                unset(index::$data['_elements_']);
                unset(index::$data['_images_']);
                unset(index::$data['_layouts_']);
                unset(index::$data['_pages_']);
                unset(index::$data['_menus_']);
                unset(index::$data['_data_']);

				file_put_contents(
                    index::$root . index::$data['path']['onnus_index_json'],
                    json_encode(index::$data, JSON_PRETTY_PRINT)
                );

                // echo '<hr>🟥 onnus_index - index::$data | __destruct <br><pre>', print_r(index::$data), '</pre>','<br>';

            }

            // echo '<hr>🟪 onnus_index - index::$data | __destruct <br><pre>', print_r(index::$data), '</pre>','<br>';
            // echo '<hr>🟧 onnus_index | $_SERVER <br><pre>', print_r($_SERVER), '</pre>','<br>';

        }


        public static function debug():void {}


        public static function resources(
            array               &$data,
            string              $load
        ):void {

            if (!$load) {return;}


            $str_scandir = 'fra_res_' . $load;

            if (isset($data['directory'][$str_scandir])) {

                foreach (scandir(index::$root . $data['directory'][$str_scandir]) as &$str_file_name) {

                    if (str_contains(index::$root . $str_file_name, $load)) {
                        $data[$load][basename($str_file_name, '.' . $load)] = $str_file_name;
                    }

                }

            }

        }

        public static function compile(
            string              $index = 'index.json',
        ):void {
            
            if (is_file(index::$root . $index)) {

                self::$data = json_decode(file_get_contents(index::$root . $index),true);

                foreach(['js', 'css'] as $str_type) {

                    foreach(self::$data[$str_type] as $str_file_key => $str_file_name) {

                        $str_file_path = self::$data['directory']['fra_res_' . $str_type] . $str_file_name;

                        if (!is_file(index::$root . $str_file_path)) {

                            self::$save = true;

                            unset(self::$data[$str_type][$str_file_key]);

                        }

                    }

                    foreach (scandir(index::$root . self::$data['directory']['fra_res_' . $str_type]) as &$str_file_name) {

                        if (!str_contains($str_file_name, $str_type)) {continue;}
                        
                        $str_file_base = basename($str_file_name, '.' . $str_type);

                        if (isset(self::$data[$str_type][$str_file_base])) {continue;}

                        self::$save = true;

                        self::$data[$str_type][$str_file_base] = $str_file_name;

                    }

                }

                if (trim(self::$data['folder']['root'], '/') !== trim(str_replace('index.php', '', $_SERVER['PHP_SELF']), '/')) {

                    self::$data['folder']['root'] = trim(str_replace('index.php', '', $_SERVER['PHP_SELF']), '/') . '/';

                    self::$save = true;

                }

            } else {

                index::moderate(self::$data, 'folder', 'root', index::$data['folder']['root']);

                index::moderate(self::$data, 'directory', 'framework', index::$data['folder']['root'] . index::$data['directory']['framework']);
                index::moderate(self::$data, 'directory', 'fra_resources', 'directory[framework]folder[resources]', '__');
                index::moderate(self::$data, 'directory', 'fra_res_js', 'directory[fra_resources]folder[js]');
                index::moderate(self::$data, 'directory', 'fra_res_css', 'directory[fra_resources]folder[css]');

                self::resources(self::$data, 'js');
                self::resources(self::$data, 'css');

                self::$save = true;

            }

            if (self::$save === true) {

                index::$data['js'] = self::$data['js'];
                index::$data['css'] = self::$data['css'];

                index::$save = true;

            }

        }

        public static function fetch(
            string              $module,
        ):void {

            $str_con_app_dir = onnus_index::get('directory', 'con_applications');
            $str_fra_app_dir = onnus_index::get('directory', 'fra_applications');
            $str_con_plu_dir = onnus_index::get('directory', 'con_plugins');
            $str_fra_plu_dir = onnus_index::get('directory', 'fra_plugins');


            if ($module === 'api' || $module === 'page') {

                if ($module === 'api') {

                    index::$data['_api_']['onnus'] = index::$data['directory']['fra_api'];
                    index::$data['_api_']['content'] = index::$data['directory']['con_api'];

                }

                index::$data['_data_'] = null;

                index::$data['_pages_'][index::$data['directory']['con_pages']] = null;
                index::$data['_pages_'][index::$data['directory']['fra_pages']] = null;

                index::$data['_layouts_'][index::$data['directory']['con_layouts']] = null;
                index::$data['_layouts_'][index::$data['directory']['fra_layouts']] = null;

                index::$data['_elements_'][index::$data['directory']['con_elements']] = null;
                index::$data['_elements_'][index::$data['directory']['fra_elements']] = null;

                index::$data['_header_'][index::$data['directory']['con_header']] = null;
                index::$data['_footer_'][index::$data['directory']['con_footer']] = null;

                index::$data['_images_']['onnus-content'] = index::$data['directory']['con_images'];
                index::$data['_images_']['onnus-framework'] = index::$data['directory']['fra_images'];

                index::$data['_menus_']['onnus-content'] = index::$data['directory']['con_menus'];
                index::$data['_menus_']['onnus-framework'] = index::$data['directory']['fra_menus'];

            }

            foreach ([$str_fra_app_dir, $str_fra_plu_dir, $str_con_plu_dir, $str_con_app_dir] as &$str_module_dir) {

                if (!$str_module_dir) {continue;}

                foreach (onnus_directory::read($str_module_dir) as &$str_app_dir) {

                    if ($str_app_dir === '.' || $str_app_dir === '..') {continue;}

                    if ($module === 'class') {

                        onnus_directory::moderate(
                            $str_module_dir . $str_app_dir,
                            ['_api_', '_class_', '_data_', '_footer_', '_header_', 'elements', 'images', 'layouts', 'menus', 'pages']
                        );

                    }

                    $str_path_module_json = $str_module_dir . $str_app_dir . '/_data_/module.json';

                    if (onnus_file::exist($str_path_module_json)) {

                        $arr_module = onnus_json::get($str_path_module_json);

                        if (!isset($arr_module['status']) || $arr_module['status'] === false) {continue;}

                        $str_module_folder = $str_module_dir . $str_app_dir;

                        if ($module === 'class') {

                            index::$data['_class_'][$str_module_folder . '/_class_/'] = null;

                        } else if ($module === 'api' || $module === 'page') {

                            if ($module === 'api') {
                                index::$data['_api_'][$str_app_dir] = $str_module_folder . '/_api_/';
                            }
                            
                            index::$data['_header_'][$str_module_dir . $str_app_dir . '/_header_/'] = null;
                            index::$data['_footer_'][$str_module_dir . $str_app_dir . '/_footer_/'] = null;
                            index::$data['_elements_'][$str_module_dir . $str_app_dir . '/elements/'] = null;
                            index::$data['_layouts_'][$str_module_dir . $str_app_dir . '/layouts/'] = null;
                            index::$data['_pages_'][$str_module_dir . $str_app_dir . '/pages/'] = null;
                            
                            index::$data['_data_'][$str_app_dir] = $str_module_dir . $str_app_dir . '/_data_/';
                            index::$data['_menus_'][$str_app_dir] = $str_module_dir . $str_app_dir . '/menus/';
                            index::$data['_images_'][$str_app_dir] = $str_module_dir . $str_app_dir . '/images/';

                        }

                    } else {

                        if ($module === 'class') {

                            $arr_module = [];
                            $arr_module['status'] = false;
                            $arr_module['folder'] = $str_app_dir;
                            $arr_module['name'] = $str_app_dir;

                            echo '<hr>✅ <pre>', print_r($arr_module), '</pre>','<br>';

                            onnus_json::set($str_path_module_json, $arr_module);

                        }

                    }

                }

            }
 
        }


        public static function get(
            string              $type,
            string              $name,
            bool                $index = false,
        ):string {

            if ($index) {

                if (!isset(self::$data[$type][$name])) {return '';}

                return self::$data[$type][$name];

            } else {

                if (!isset(index::$data[$type][$name])) {return '';}

                return index::$data[$type][$name];

            }

        }

        public static function set(
            string              $type,
            string              $name,
            string              $data,
            bool                $index = false,
        ):string {

            if ($index) {
                self::$data[$type][$name] = $data;
            } else {
                index::$data[$type][$name] = $data;
            }

            self::$data[$type][$name] = $data;

            return self::$data[$type][$name];

        }


        public static function exist():void {}

        public static function read(
            string              $index,
        ):string {

            $str_query = '';


            if (str_contains($index, '[') && str_contains($index, ']')) {

                $arr_output = explode("]", $index);

                if (count($arr_output) > 1) {

                    foreach ($arr_output as &$str_output) {

                        if (!$str_output) {continue;}

                        $arr_record = explode("[", $str_output);

                        if (count($arr_record) === 0) {continue;}

                        $str_record_index = trim($arr_record[0]);
                        $str_record_name = trim($arr_record[1]);

                        if (!isset($data[$str_record_index][$str_record_name]) && $str_record_index === 'folder') {
                            $data[$str_record_index][$str_record_name] = $wrap . $str_record_name . $wrap . '/';
                        } else if (!isset($data[$str_record_index][$str_record_name])) {
                            continue;
                        }

                        $str_query .= $data[$str_record_index][$str_record_name];

                    }

                }

            }

            // $str_query = '';


            // if (str_contains($index, '[') && str_contains($index, ']')) {
            //     $arr_record = explode("]", $index);
            //     if (count($arr_record) > 1) {
            //         foreach ($arr_record as &$str_data) {
            //             if (!$str_data) {continue;}
            //             $arr_record = explode("[",$str_data);
            //             if (count($arr_record) > 1) {
            //                 $str_query .= self::get($arr_record[0], $arr_record[1]);
            //             }
            //         }
            //     }
            // }

            return $str_query;

        }

        public static function write(
            string              $index,
            string              $value,
        ):bool {
            return false;
        }

        public static function remove():void {}

    }