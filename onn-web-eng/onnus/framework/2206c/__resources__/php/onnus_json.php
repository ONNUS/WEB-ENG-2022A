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


    onnus::$class->json = new onnus_json();


    class onnus_json {

        public static $data = [];


        public function __construct() {
            
            if (onnus_class::load(self::$data, $this)) {

                // echo '<b>onnus_json</b><br>';

                onnus_class::save(self::$data, $this);

            }

        }

        public function __destruct() {}


        public static function debug():void {}

        
        public static function encode(
            array               $data,
            string              $options = JSON_PRETTY_PRINT,
        ):string {

            if (!is_array($data)) {return '';}


            return json_encode($data, $options);

        }

        public static function decode(
            string              $data,
            bool                $associative = true,
        ):null|array {

            return json_decode($data, $associative);

        }


        public static function get(
            string              $path,
        ):null|array {

            if (!onnus_file::exist($path)) {return [];}


            return self::decode(onnus_file::get($path));

        }

        public static function set(
            string              $path,
            array               $data,
            string              $options = JSON_PRETTY_PRINT,
        ):void {

            $str_encode = self::encode($data, $options);
            // echo '$str_encode =', $str_encode , "<br>\n";

            onnus_file::set($path, self::encode($data, $options));

        }


        public static function exist():void {}

        public static function read():void {}

        public static function write():void {}

        public static function remove():void {}

    }