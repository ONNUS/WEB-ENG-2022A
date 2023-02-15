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


    onnus::$class->file = new onnus_file();


    class onnus_file {

        public static $data = [];


        public function __construct() {
            
            if (onnus_class::load(self::$data, $this)) {

                // echo '<b>onnus_directory</b><br>';

                onnus_class::save(self::$data, $this);

            }

        }

        public function __destruct() {}


        public static function debug():void {}


        public static function get(
            string              $file,
        ):string {

            if (!self::exist($file)) {return '';}

            // $file = trim($file, '/');

            return file_get_contents(index::$root . $file);

        }

        public static function set(
            string              $file,
            string              $data,
        ):void {

            // create directory path
            // $file = trim($file, '/');

            file_put_contents(index::$root . $file, $data);

        }



        public static function exist(
            string              $file,
        ):bool {

            // $file = trim($file, '/');

            return is_file(index::$root . $file);

        }

        public static function read(
            string              $file,
        ):array {

            // if (!self::exist($file)) {return [];}

            return self::get($file);

        }

        public static function write():void {}

        public static function remove():void {}

    }