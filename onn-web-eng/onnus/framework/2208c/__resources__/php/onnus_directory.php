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


    onnus::$class->directory = new onnus_directory();


    class onnus_directory {

        public static $data = [];


        public function __construct() {
            
            if (onnus_class::load(self::$data, $this)) {

                // echo '<b>onnus_directory</b><br>';

                onnus_class::save(self::$data, $this);

            }

        }

        public function __destruct() {}


        public static function debug():void {}


        public static function moderate(
            string              $directory,
            array|string        $folders,
        ):void {

            foreach ($folders as &$str_folder) {
                self::set($directory . '/' . $str_folder);
            }

        }


        public static function get(
            string              $directory,
        ):array {

            if (!self::exist($directory)) {return [];}


            return scandir(index::$root . $directory);

        }

        public static function set(
            string              $directory,
        ):void {

            if (self::exist($directory)) {return;}


            mkdir(index::$root . $directory);

        }



        public static function exist(
            string              $directory,
        ):bool {

            return is_dir(index::$root . $directory);

        }

        public static function read(
            string              $directory,
        ):array {

            // if (!self::exist($directory)) {return [];}

            return self::get($directory);

        }

        public static function write():void {}

        public static function remove():void {}

    }