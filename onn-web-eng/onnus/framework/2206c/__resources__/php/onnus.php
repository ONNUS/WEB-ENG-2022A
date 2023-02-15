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


    $onnus = new onnus();


	class onnus {

		public static $class;
		public static $plugin;
		public static $application;


		public function __construct() {

            self::autoloader();

			self::$class = new onnus_class();
			self::$plugin = new stdClass();
			self::$application = new stdClass();

            self::$class->index = new onnus_index();


            if (isset($_SERVER['REDIRECT_URL'])) {

                $str_url = strtolower($_SERVER['REDIRECT_URL']);

                if (index::$base !== '/') {
                    $str_url = str_replace(index::$base, '', $str_url);
                }

            } else {

                $str_url = '';

            }

            $arr_url = explode("/", trim($str_url, '/'));

            if (isset($arr_url[0]) && $arr_url[0] === 'api') {
                onnus_api::initialize($arr_url);
            } else {
                onnus_page::initialize($str_url);
            }

		}

        public function __destruct() {}


        public static function debug():void {}


        public static function autoloader():void {

            spl_autoload_register(

                function(string $str_file_class) {

                    $bol_include_once = false;
                    $str_include_once = '';


                    if (isset(index::$data['_class_'])) {
                        $arr_spl_autoload = array_merge(index::$data['class'], index::$data['_class_']);
                    } else {
                        $arr_spl_autoload = index::$data['class'];
                    }

                    if (isset($arr_spl_autoload)) {

                        foreach ($arr_spl_autoload as $str_dir_class => $str_dir_value) {

                            $str_include_once = $str_dir_class . $str_file_class . '.php';

                            if (!file_exists(index::$root . $str_include_once)) {$str_include_once = ''; continue;}

                            $bol_include_once = true;

                            break;

                        }

                    } else {
                        echo '<h3>Class Folder Not Accessible</h3>';
                    }

                    if ($bol_include_once === true && $str_include_once !== '') {
                        include_once index::$root . $str_include_once;
                    } else {
                        echo '<h3>Autoload Failed | <b>', index::$root . $str_include_once, "</b></h3>\n";
                    }

                }

            );

        }

        public static function compile():void {}

    }