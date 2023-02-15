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


    class onnus_class {

        public static $data = [];


        public function __construct() {}

        public function __destruct() {

			if (!isset(self::$data['save'])) {return;}


			foreach(self::$data['save'] as $str_class_name => $arr_class_data) {

				file_put_contents(
					index::$root . index::$data['directory']['con_res_onn_class'] . $str_class_name . '.json',
					json_encode($arr_class_data, JSON_PRETTY_PRINT)
				);

            }

        }


        public static function debug():void {}


        public static function load(
			array 		        &$data,
			object		        $class,
			string		        $extension = '.json',
        ):bool {

            $str_path_class_json = index::$data['directory']['con_res_onn_class'] . get_class($class) . '.json';

            if (!onnus_file::exist($str_path_class_json)) {return true;}

            $data = onnus_json::get($str_path_class_json);

            if (!is_array($data)) {return true;}

            return false;

        }

        public static function save(
			array 		&$data,
			object		$class,
			string		$extension = '.json',
        ):void {

            $str_class_name = get_class($class);

            self::$data['save'][$str_class_name] = $data;

        }

    }