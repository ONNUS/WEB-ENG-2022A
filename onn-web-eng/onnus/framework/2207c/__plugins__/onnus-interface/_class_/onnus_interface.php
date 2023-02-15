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


    onnus::$class->interface = new onnus_interface();
    // onnus::$plugin->interface = new onnus_interface();


    class onnus_interface {

        public static $data = [];


        public function __construct() {
            
            // if (onnus_plugin::load(self::$data, $this)) {

                // onnus_plugin::save(self::$data, $this);

            // }

        }

        public function __destruct() {}


        public static function debug():void {}


        public static function generate():void {

            // CHECK USER PERMISSIONS


        }


        public static function get():void {}

        public static function set($directory):void {}



        public static function exist():void {}

        public static function read():void {}

        public static function write():void {}

        public static function remove():void {}

    }