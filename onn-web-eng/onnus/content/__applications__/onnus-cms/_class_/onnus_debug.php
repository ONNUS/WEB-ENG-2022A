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


    onnus::$class->debug = new onnus_debug();


    class onnus_debug {

        public static $data = [];


        public function __construct() {
            
            if (onnus_class::load(self::$data, $this)) {

                echo '<b>onnus_debug</b><br>';

                onnus_class::save(self::$data, $this);

            }

        }

        public function __destruct() {}


        public static function debug():void {

            echo '<h1>WORKING</h1>';

        }


        public static function get():array {}

        public static function set():void {}


        public static function exist():void {}

        public static function read():void {}

        public static function write():void {}

        public static function remove():void {}

    }