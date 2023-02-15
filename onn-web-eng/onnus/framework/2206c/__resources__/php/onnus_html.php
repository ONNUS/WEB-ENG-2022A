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


    onnus::$class->html = new onnus_html();


    class onnus_html {

        public static $data = [];


        public function __construct() {

            if (onnus_class::load(self::$data, $this)) {

                self::$data['format'] = true;

                onnus_class::save(self::$data, $this);

            }

            // self::$data['format'] = false;

			// if (self::$data['format']) {
			// 	ob_start();
			// }

            self::$data['status'] = false;
            self::$data['key'] = null;
            self::$data['cache'] = null;

            self::format(true);

        }

        public function __destruct() {

			if (!self::$data['format']) {return;}

            
            $bol_tab = true;
            $bol_started = false;

            $int_tab = 0;
            
            $str_return = "\n";
            $str_tab = "\t";

            $str_ob_content = ob_get_contents();

            ob_end_clean();

            foreach(explode($str_return,$str_ob_content) as $str_html) {

                $str_tabs = '';
                $str_html = trim($str_html,$str_tab);
                $str_html = trim($str_html,"\r");
                $str_html = trim($str_html,"\n");

                if (!$str_html) {continue;}

                if (($bol_tab) and (substr_count($str_html,'</')) and (substr_count($str_html,'<')) <= 1) {
                    $int_tab -= 1;
                }

                for ($int = 0; $int < $int_tab; $int++) {
                    $str_tabs .= $str_tab;
                }

                if (substr_count($str_html,'</pre>')) {$bol_tab = true;}

                if ($bol_started) {print($str_return);}

                if ($bol_tab) {
                    print ($str_tabs . $str_html);
                } else {
                    print ($str_html);
                }

                if (substr_count($str_html,'<pre>')) {$bol_tab = false;}

                if (($bol_tab) && (substr_count($str_html,'<'))) {

                    if ((!substr_count($str_html,'</')) && (!substr_count($str_html,'/>'))) {

                        if (
                            !substr_count($str_html,'<!') &&
                            !substr_count($str_html,'<meta') &&
                            !substr_count($str_html,'<link') &&
                            !substr_count($str_html,'<input') &&
                            !substr_count($str_html,'<br') &&
                            !substr_count($str_html,'<hr')
                        ) {
                            $int_tab += 1;
                        }

                    }

                }

                $bol_started = true;

            }

        }


        public static function debug():void {

            $tag = 'TAG';
            $menu = 'MENU';
            $onclick = 'ONCLICK';


            // onnus_html::buffer(true);
            onnus_html::cache('key', 'debug_cache');

            // onnus_html::cache('set', '<b>TEST DEBUG A</b>', 'debug_cache');

            // onnus_html::cache('start','debug_cache');


            onnus_html::element('debug-menu', 'data-onnus{}class{onnus-menu-toggle}');
                onnus_html::element('menu-bar', "data-onnus{color-hover[i#5]}alt{ALT}onclick{onnus.menu.collapse('{$tag}', '{$menu}')}");

                    // onnus_html::element('bar-icon', "onclick{onnus.menu.toggle('{$menu}', '{$tag}')}", 'Ω');
                    // onnus_html::element('bar-label', "onclick{{$onclick}}", 'icon');

                    onnus_html::element('bar-icon', '');
                    onnus_html::element('bar-label', '', '');

                onnus_html::element('menu-bar');
                onnus_html::element('menu-content', "data-onnus{color-background[i#4]color-font[i#4]}class{onnus-menu-collapse}", '');
            onnus_html::element('menu-debug');
            
            // onnus_html::cache('end', 'debug_cache');
            // onnus_html::cache('flush', 'debug_cache');

            $str_html = onnus_html::cache('get','debug_cache');
            // $str_html = onnus_html::content(true);

            echo $str_html;
            
        }

        public static function format(
            bool                $state = true,
        ):void {

            if ($state) {
                ob_start();
            } else if (!$state) {
                ob_end_clean();
            }

            self::$data['format'] = $state;

        }

        public static function cache(
            string              $mode = 'status',
            null|string         $data = null,
            null|string         $key = null,
        ):bool|string {

            if ($data === null) {

                if ($mode === 'status') {
                    return self::$data['status'];
                }

            } else if ($data !== null) {

                if ($mode === 'key') {

                    self::$data['status'] = true;
                    self::$data['key'] = $data;

                } else if ($mode === 'set') {

                    if ($key !== null) {
                        $str_key = $key;
                    } else if (self::$data['status'] === true && self::$data['key'] !== null) {
                        $str_key = self::$data['key'];
                    } else {
                        return self::$data['status'];
                    }

                    if (!isset(self::$data['cache'][$str_key])) {
                        self::$data['cache'][$str_key] = '';
                    }

                    self::$data['cache'][$str_key] .= $data . "\n\r";

                    return self::$data['status'];

                } else if ($mode === 'get' && isset(self::$data['cache'][$data])) {

                    $str_return = self::$data['cache'][$data];

                    unset(self::$data['cache'][$data]);

                    self::$data['status'] = false;
                    self::$data['key'] = null;

                    return $str_return;

                } else if ($mode === 'clear' && isset(self::$data['cache'][$data])) {

                    self::$data['status'] = false;
                    self::$data['cache'][$data] = null;

                } else if ($mode === 'print' && isset(self::$data['cache'][$data])) {

                    print(self::$data['cache'][$data]);

                    unset(self::$data['cache'][$data]);

                } else if ($mode === 'print_r' && isset(self::$data['cache'][$data])) {
                    print_r(self::$data['cache'][$data]);
                }

            }

            return '';

        }


        public static function element(
            string              $tag = '',
            null|string         $attribute = null,
            null|string         $content = null,
        ):string {

            $str_return = self::tag($tag, self::attribute($attribute), $content);

            if (!self::cache('set', $str_return)) {
                print($str_return);
            }

            return $str_return;

        }

        public static function tag(
            string              $name = '',
            null|string         $attribute = null,
            null|string         $content = null,
        ):string {

            if ($attribute === null && $content === null) {
                $str_return = '</';
            } else {
                $str_return = '<';
            }

            if (str_contains($name, '!')) {
                $str_return .= $name;
            } else {
                $str_return .= strtolower($name);
            }

            if ($attribute !== null) {
                $str_return .= $attribute;
            }

            $str_return .= '>';

            if (gettype($content) === 'string') {
                $str_return .= $content. '</' . strtolower($name) . '>';
            }

            $str_return .= "\n";

            return $str_return;

        }

        public static function attribute(
            null|string|array   $str_arr_data = '',
        ):null|string {

            if ($str_arr_data === null) {return null;}


            if (gettype($str_arr_data) === 'string') {
                $arr_attributes = explode('}', $str_arr_data);
            } else if (gettype($str_arr_data) === 'array') {
                $arr_attributes = $str_arr_data;
            } else {
                return null;
            }

            $str_return = '';

            foreach ($arr_attributes as $str_attribute) {

                if (!$str_attribute) {continue;}

                $arr_name_value = explode('{', $str_attribute);

                if (!isset($arr_name_value[0]) || $arr_name_value[0] === '') {continue;}

                $str_return .= ' ' . $arr_name_value[0];

                if (!isset($arr_name_value[1]) || $arr_name_value[1] === '') {continue;}

                $str_return .= '="' . $arr_name_value[1] . '"';

            }

            return $str_return;

        }


        public static function image(
            string              $file = '',
            string              $module = '',
            string              $attribute = '',
            string              $func = '',
        ):string {

            $str_img_src = false;
            $str_return = '';

            if (isset(index::$data['_images_'][$module])) {

                $str_image_path = index::$base . index::$data['_images_'][$module] . $file;

                if (onnus_file::exist($str_image_path)) {
                    $str_img_src = $str_image_path;
                }

            } else {

                foreach (index::$data['_images_'] as $str_image_directory) {

                    $str_image_path = index::$base . $str_image_directory . $file;

                    if (onnus_file::exist($str_image_path)) {

                        $str_img_src = $str_image_path;

                        break;

                    }

                }

            }

            if ($str_img_src) {

                $str_file_ext = pathinfo($str_img_src, PATHINFO_EXTENSION);
                $str_file_name = basename($str_img_src, '.' . $str_file_ext) . PHP_EOL;
                $str_file_name = trim($str_file_name);

                if (!str_contains($attribute, 'alt{')) {
                    $attribute .= "alt{}";
                }

                if (strtolower($str_file_ext) === 'svg') {

                    self::element('object', "type{image/svg+xml}data{{$str_img_src}}onload{onnus.svg(this, {$func});}" . $attribute, '');

                } else {

                    if ($func) {
                        $attribute .= "onclick{{$func}();}";
                    }

                    self::element('img', "src{{$str_img_src}}" . $attribute . '/');

                }

            }

            if (!self::cache('set', $str_return)) {
                print($str_return);
            }

            return $str_return;

        }

    }