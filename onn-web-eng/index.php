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


    index::initialize();


    class index {
        
        public static $save = false;

        public static $base = '';
        public static $root = '';
        public static $uri = '';

        public static $data = [
			'onnus' => ['current' => null, 'last' => null, 'latest' => null],
            'php' => null,'css' => null, 'js' => null, 'json' => null,
            'folder' => null, 'directory' => null, 'path' => null, 
            'class' => null, 
        ];


        public static function initialize(
            string              $path = 'onnus/content/__resources__/onnus/_class_/onnus_index.json'
        ):void {

            self::$base = str_replace('index.php', '', $_SERVER['PHP_SELF']);
            self::$root = $_SERVER['DOCUMENT_ROOT'] . self::$base;


            if (is_file(self::$root . $path)) {
                self::$data = json_decode(file_get_contents(self::$root . $path),true);
            }

            if (
                !isset(self::$data['folder']['root']) 
                || trim(self::$data['folder']['root'], '/') !== trim(str_replace('index.php', '', $_SERVER['PHP_SELF']), '/')
            ) {

                self::moderate(self::$data, 'directory', 'onnus', 'folder[onnus]');

                self::$data['folder']['root'] = trim(str_replace('index.php', '', $_SERVER['PHP_SELF']), '/') . '/';

                self::$save = true;

            }

            if (!isset(self::$data['onnus']['current'])) {

                $str_onnus_folder = self::onnus();

                self::moderate(self::$data, 'onnus', 'current', $str_onnus_folder);
                self::moderate(self::$data, 'onnus', 'last', $str_onnus_folder);
                self::moderate(self::$data, 'onnus', 'latest', $str_onnus_folder);

                self::moderate(self::$data, 'folder', '_onnus_', 'onnus[latest]');

            }

            if (!isset(self::$data['path']['onnus_index_json'])) {

                self::moderate(self::$data, 'php', 'onnus', 'onnus.php');
                self::moderate(self::$data, 'json', 'onnus_index', 'onnus_index.json');

                self::moderate(self::$data, 'directory', 'content', 'directory[onnus]folder[content]');
                self::moderate(self::$data, 'directory', 'con_resources', 'directory[content]folder[resources]', '__');
                self::moderate(self::$data, 'directory', 'con_res_onnus', 'directory[con_resources]folder[onnus]');
                self::moderate(self::$data, 'directory', 'con_res_onn_class', 'directory[con_res_onnus]folder[class]', '_');

                self::moderate(self::$data, 'path', 'onnus_index_json', 'directory[con_res_onn_class]json[onnus_index]');

            }

            if (!isset(self::$data['path']['onnus_php'])) {

                self::moderate(self::$data, 'directory', 'framework', 'directory[onnus]folder[framework]folder[_onnus_]');
                self::moderate(self::$data, 'directory', 'fra_resources', 'directory[framework]folder[resources]', '__');
                self::moderate(self::$data, 'directory', 'fra_res_php', 'directory[fra_resources]folder[php]');

                self::moderate(self::$data, 'path', 'onnus_php', 'directory[fra_res_php]php[onnus]');

                self::$data['class'][self::$data['directory']['fra_res_php']] = null;

            }

            if (isset(self::$data['path']['onnus_php'])) {
                include_once('./' . self::$data['path']['onnus_php']);
            } else {
                echo '<h3>index.php | Failure</h3>';
            }

        }

        public static function moderate(
            array               &$data,
            string              $index,
            string              $name,
            string              $default,
            string              $wrap = '',
        ):void {

            if (!isset($data[$index][$name])) {

                $str_query = '';

                if (str_contains($default, '[') && str_contains($default, ']')) {

                    $arr_output = explode("]", $default);

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

                if (!$str_query) {$str_query = $default;}

                if ($index === 'folder' || $index === 'directory') {
                    $str_query = trim($str_query,'/') . '/';
                }

                $data[$index][$name] = $str_query;

                self::$save = true;

            }

            if ($index === 'directory' && !is_dir(self::$root . $data[$index][$name])) {

                mkdir(self::$root . $data[$index][$name]);

                self::$save = true;

            } elseif (($index === 'path') && (!is_file(self::$root . $data[$index][$name]))) {
                self::$save = true;
            }

        }


        public static function onnus(
            string              $directory = 'onnus/framework/',
            string              $path = '__resources__/php/onnus.php',
        ):string {

            $arr_framework = [];


            foreach (scandir(self::$root . $directory) as $str_directory) {

                if ($str_directory === '.' || $str_directory === '..') {continue;}

                if (!is_dir(self::$root . $directory . $str_directory)) {continue;}

                $str_onnus_path = $directory . $str_directory . '/' . $path;

                if (!is_file(self::$root . $str_onnus_path)) {continue;}

                $arr_framework[] = $str_directory;

            }

            return end($arr_framework);

        }

    }