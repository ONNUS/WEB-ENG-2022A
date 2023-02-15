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


    onnus::$class->include = new onnus_include();


    class onnus_include {

        public static $data = [];


        public function __construct() {

            if (onnus_class::load(self::$data, $this)) {

                // echo '<b>onnus_include</b><br>';

                onnus_class::save(self::$data, $this);

            }

            self::$data['_post'] = $_POST ?: null;
            self::$data['_get'] = $_GET ?: null;

            onnus_index::fetch('api');

        }

        public function __destruct() {

            // echo '🔄 onnus_index | __destruct <br><pre>', print_r(self::$data), '</pre>','<br>';

        }


        public static function debug():void {

            // onnus_include::element('onnus-interface', 'folder/file');

            // onnus_include::file($module, $file, $folder, $type);
            // onnus_include::file('onnus-interface', 'folder/file', 'elements', 'applications');
            // onnus_include::file('onnus-interface', 'folder/file', 'menus', 'plugins');

            // onnus_include::element('onnus-interface', 'folder/file');
            // onnus_include::image('onnus-interface', 'folder/file');

        }


        private static function include():void {

            if (!isset(self::$data['module']['path'])) {return;}


            include(self::$data['module']['path']);

        }


        public static function file(
            string              $module,
            string              $file,
            string              $folder,
            string              $type = '',
        ):void {
            
            $bol_plugins = false;
            $bol_applications = false;

            $str_con_app_dir = '';
            $str_fra_app_dir = '';
            $str_con_plu_dir = '';
            $str_fra_plu_dir = '';

            if ($type === 'applications') {
                $bol_applications = true;
            } else if ($type === 'plugins') {
                $bol_plugins = true;
            } else  {
                $bol_applications = true;
                $bol_plugins = true;
            }

            if ($bol_applications) {
                $str_con_app_dir = onnus_index::get('directory', 'con_applications');
                $str_fra_app_dir = onnus_index::get('directory', 'fra_applications');
            }

            if ($bol_plugins) {
                $str_con_plu_dir = onnus_index::get('directory', 'con_plugins');
                $str_fra_plu_dir = onnus_index::get('directory', 'fra_plugins');
            }

            foreach ([$str_fra_app_dir, $str_fra_plu_dir, $str_con_plu_dir, $str_con_app_dir] as &$str_module_dir) {

                if (!$str_module_dir) {continue;}

                $str_module_directory = $str_module_dir . $module;

                if (!onnus_directory::exist($str_module_directory)) {continue;}

                $str_module_json = $str_module_directory . '/_data_/module.json';

                if (!onnus_file::exist($str_module_json)) {continue;}

                $arr_module = onnus_json::get($str_module_json);

                if (!isset($arr_module['status']) || $arr_module['status'] === false) {continue;}

                $str_module_folder = $str_module_directory . '/' . onnus_index::get('folder', $folder);

                if (!onnus_directory::exist($str_module_folder)) {continue;}

                $str_module_path = $str_module_folder . '/' . $file . '.php';

                if (!onnus_file::exist($str_module_path)) {continue;}

                // echo '$str_module_json =', $str_module_json, "= <br>\n";
                // echo '$str_module_directory =', $str_module_directory, "= <br>\n";
                // echo '$str_module_folder =', $str_module_folder, "= <br>\n";
                // echo '$str_module_path =', $str_module_path, "= <br>\n";

                self::$data['module']['json'] = $str_module_json;
                self::$data['module']['directory'] = $str_module_directory;
                self::$data['module']['folder'] = $str_module_folder;
                self::$data['module']['path'] = $str_module_path;

            }

            self::include();

        }


        public static function element(
            string              $module,
            string              $file,
        ):void {

            self::file($module, $file, 'elements');

        }

        public static function image(
            string              $module,
            string              $file,
        ):void {

            // self::file($module, $file, 'images');

        }


    }