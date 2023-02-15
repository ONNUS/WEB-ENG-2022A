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


    onnus::$class->user = new onnus_user();


    class onnus_user {

        public static $data = [];


        public function __construct() {}

        public function __destruct() {}


        public static function debug():void {}


        public static function permission() {

            return true;

        }

    }