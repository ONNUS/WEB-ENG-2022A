<?php

    onnus::$class->menu = new onnus_menu();


    class onnus_menu {

        public static $data = [];


        public function __construct() {}

        public function __destruct() {

            if (isset(self::$data['save'])) {

                foreach (self::$data['save'] as $str_path => $str_data) {

                    file_put_contents(
                        index::$root . $str_path,
                        json_encode($str_data, JSON_PRETTY_PRINT)
                    );

                }

            }

        }


        public static function debug() {

            // onnus_menu::schema($arr_content_venders, 'spacer', []);
            // onnus_menu::schema($arr_content_venders, 'button', ['icon' => '₪', 'label' => 'Onnus', 'alt' => 'ALT', 'onclick' => '#']);
            // onnus_menu::schema($arr_content_venders, 'spacer', []);

            // onnus_menu::schema($arr_menu_filters, 'container', ['tag' => 'filters-menu', 'tag' => 'filters-menu', 'attributes' => 'data-onnus{color[i#6]}class{onnus-menu onnus-menu-closed}', 'select' => 'filters-menu[]menu-venders[]']);

            // onnus_menu::schema($arr_menu_filters, 'filler', []);
            // onnus_menu::schema($arr_menu_filters, 'toggle', ['icon' => $arr_image_search, 'label' => 'Search', 'alt' => 'ALT', 'menu' => 'apps-filters[]filters-menu[]', 'tag' => 'filters-menu[]menu-search[]', 'onclick' => '#', 'content' => [], ]);
            // onnus_menu::schema($arr_menu_filters, 'toggle', ['icon' => $arr_image_venders, 'label' => 'Venders', 'alt' => 'ALT', 'menu' => 'apps-filters[]filters-menu[]', 'tag' => 'filters-menu[]menu-search[]', 'onclick' => '#', 'content' => $arr_content_venders, ]);
            // onnus_menu::schema($arr_menu_filters, 'filler', []);


            // $arr_schema_menu_container = ['type' => 'container', 'tag' => '', 'attributes' => '', 'default' => '', 'content' => '', ];
            // $arr_schema_menu_toggle = ['type' => 'toggle', 'icon' => '', 'label' => '', 'alt' => '', 'menu' => '', 'tag' => '', 'onclick' => '', 'content' => [], ];
            // $arr_schema_menu_button = ['type' => 'button', 'icon' => '', 'label' => '', 'alt' => '', 'onclick' => '', ];
            // $arr_schema_menu_filler = ['type' => 'filler', ];
            // $arr_schema_menu_spacer = ['type' => 'spacer', ];
            // $arr_schema_menu_image = ['type' => 'image', 'file' => '', 'module' => '', 'alt' => '', 'attributes' => '', ];

        }


        public static function path(
            string              $file,
            string              $module,
        ):string {

            $str_return_path = false;
            $str_menu_path = '';

            if (isset(index::$data['_menus_'][$module])) {

                $str_menu_path = index::$base . index::$data['_menus_'][$module] . $file . '.json';

                $str_return_path = $str_menu_path;

            } else if (isset(index::$data['_menus_'])) {

                foreach (index::$data['_menus_'] as $str_menu_directory) {

                    $str_menu_path = index::$base . $str_menu_directory . $file;

                    if (onnus_file::exist($str_menu_path)) {

                        $str_return_path = $str_menu_path;

                        break;

                    }

                }

            }

            // $str_return_path = trim($str_return_path, '/');

            return $str_return_path;

        }

        public static function load(
            null|array          &$data,
            string              $file,
            string              $module,
            bool                $generate = false,
        ):bool {

            if (!is_array($data)) {$data = [];}

            $str_load_path = self::path($file, $module);

            if (!onnus_file::exist($str_load_path)) {return false;}

            $data = onnus_json::get($str_load_path);

            if (is_array($data) && $generate) {
                onnus_menu::generate($data);
            } else if ($generate) {
                return false;
            }

            return true;

        }

        public static function save(
            null|array          &$data,
            string              $file,
            string              $module,
        ):void {

            if (!is_array($data)) {$data = [];}

            $str_save_path = self::path($file, $module);

            if (!$str_save_path) {return;}

            self::$data['save'][$str_save_path] = $data;

        }


        public static function schema(
            null|array          &$data,
            string              $mode,
            array               $parameters,
        ):void {

            if (!is_array($data)) {$data = [];}
            if (!is_array($parameters)) {return;}


            if ($mode === 'container') {

                $arr_schema = ['type' => 'container', 'tag' => '', 'attributes' => '', 'select' => '', 'content' => [], ];

                $data = array_merge($arr_schema, $parameters);

                return;

            } else if ($mode === 'filler') {
                $arr_schema = ['type' => 'filler', ];
            } else if ($mode === 'toggle') {
                $arr_schema = ['type' => 'toggle', 'icon' => '', 'label' => '', 'alt' => '', 'menu' => '', 'tag' => '', 'api' => '', 'onclick' => '', 'content' => [], ];
            } else if ($mode === 'button') {
                $arr_schema = ['type' => 'button', 'icon' => '', 'label' => '', 'alt' => '', 'api' => '', 'onclick' => '', ];
            } else if ($mode === 'browser') {
                $arr_schema = ['type' => 'browser', 'icon' => '', 'label' => '', 'alt' => '', 'api' => '', 'onclick' => '', ];
            } else if ($mode === 'folder') {
                $arr_schema = ['type' => 'folder', 'icon' => '', 'label' => '', 'alt' => '', 'api' => '', 'menu_id' => 0, 'onclick' => '', ];
            } else if ($mode === 'spacer') {
                $arr_schema = ['type' => 'spacer', ];
            }

            $data[] = array_merge($arr_schema, $parameters);

        }

        public static function generate(
            array               $data,
        ):void {

            if (!is_array($data) || !isset($data['content'])) {return;}

            $str_onload_menu = null;
            $str_onload_default = null;

            $data['tag'] = $data['tag'] ?? 'menu-container';
            $data['attributes'] = $data['attributes'] ?? "data-onnus{}class{}";

            onnus_html::element($data['tag'], $data['attributes']);

                foreach ($data['content'] as &$arr_menu) {

                    if (!isset($arr_menu['type'])) {continue;}

                    if ($arr_menu['type'] == 'filler') {
                        self::filler();
                    } else if ($arr_menu['type'] == 'toggle') {

                        $str_arr_icon = $arr_menu['icon'] ?? '₪';
                        $str_label = $arr_menu['label'] ?? '*';
                        $str_alt = $arr_menu['alt'] ?? '*';
                        $str_menu = $arr_menu['menu'] ?? '*';
                        $str_tag = $arr_menu['tag'] ?? '*';
                        $str_class = $arr_menu['class'] ?? ''; // add into future build
                        $str_onclick = $arr_menu['onclick'] ?? '*';
                        $arr_content = $arr_menu['content'] ?? [];

                        if (is_array($str_arr_icon)) {

                            $str_file = $str_arr_icon['file'] ?? '';
                            $str_module = $str_arr_icon['module'] ?? '';
                            $str_attributes = $str_arr_icon['attributes'] ?? '';
                            $str_method = $str_arr_icon['method'] ?? '';

                            onnus_html::cache('key', 'onnus_menu_icon');

                            onnus_html::image($str_file, $str_module, $str_attributes, $str_method);
                            
                            $str_arr_icon = onnus_html::cache('get', 'onnus_menu_icon');

                        }

                        // self::toggle($str_arr_icon, $str_label, $str_alt, $str_menu, $str_tag, $str_class, $str_onclick, $arr_content);
                        self::toggle($str_arr_icon, $str_label, $str_alt, $str_menu, $str_tag, $str_onclick, $arr_content);
                        // self::toggle($str_icon, $str_label, $str_alt, $str_menu, $str_tag, $str_onclick, $arr_content);

                        if (isset($arr_menu['menu']) && $str_onload_menu == null) {
                            $str_onload_menu = $arr_menu['menu'];
                        }

                    } else if ($arr_menu['type'] == 'browser') {

                        // string      $icon,
                        // string      $label,
                        // string      $alt,
                        // string      $menu,
                        // string      $tag,
                        // string      $onclick,
                        // array       $content = []

                        $str_arr_icon = $arr_menu['icon'] ?? '₪';
                        $str_label = $arr_menu['label'] ?? '*';
                        $str_alt = $arr_menu['alt'] ?? '*';
                        $str_menu = $arr_menu['menu'] ?? '*';
                        $str_tag = $arr_menu['tag'] ?? '*';
                        $str_class = $arr_menu['class'] ?? ''; // add into future build
                        $str_onclick = $arr_menu['onclick'] ?? '*';
                        $arr_content = $arr_menu['content'] ?? [];

                        self::browser($str_arr_icon, $str_label, $str_alt, $str_menu, $str_tag, $str_onclick, $arr_content);

                    }

                }

                if ($str_onload_menu !== null) {

                    $str_onload_select = $data['select'] ?? '';

                    if ($str_onload_select) {
                        onnus_html::element('style', "onload{onnus.menu.onload('toggle', '{$str_onload_menu}', '{$str_onload_select}')}", '');
                    }

                }

            onnus_html::element($data['tag']);

        }


        public static function toggle(
            string              $icon,
            string              $label,
            string              $alt,
            string              $menu,
            string              $tag,
            string              $onclick,
            array               $content = [],
        ):void {
            // string              $class,

            $str_menu_tag = 'menu-' . strtolower($label);

            onnus_html::element($str_menu_tag, 'class{onnus-menu-toggle}');

                onnus_html::element('menu-bar', "data-onnus{}alt{{$alt}}");
                    onnus_html::element('bar-icon', "onclick{onnus.menu.collapse('{$tag}', '{$menu}');{$onclick}}", $icon);
                    onnus_html::element('bar-label', "onclick{onnus.menu.collapse('{$tag}', '{$menu}');{$onclick}}", $label);
                onnus_html::element('menu-bar');

                if (!empty($content)) {

                    onnus_html::element('menu-content', "data-onnus{color-background[i#4]color-font[i#4]}class{onnus-menu-collapse}");

                        foreach ($content as $arr_content) {

                            $str_type = $arr_content['type'] ?? 'button';

                            if ($str_type == 'button') {

                                $str_icon = $arr_content['icon'] ?? '';
                                $str_label = $arr_content['label'] ?? '';
                                $str_alt = $arr_content['alt'] ?? '';
                                $str_onclick = $arr_content['onclick'] ?? '';

                                self::button($str_icon, $str_label, $str_alt, $str_onclick);

                            } else if ($str_type == 'spacer') {

                                self::spacer();

                            } else if ($str_type == 'filler') {

                                self::filler();

                            }

                        }    

                    onnus_html::element('menu-content');

                }

            onnus_html::element($str_menu_tag);

        }

        public static function button(
            string              $icon = '',
            string              $label = '',
            string              $alt = '',
            string              $onclick = '',
        ):void {

            onnus_html::element('menu-button', "class{onnus-menu-button}");

                onnus_html::element('menu-bar', "data-onnus{color-hover[i#3]}alt{{$alt}}onclick{{$onclick}}");
                    onnus_html::element('bar-icon', '', $icon);
                    onnus_html::element('bar-label', '', $label);
                onnus_html::element('menu-bar');

            onnus_html::element('menu-button');

        }

        public static function spacer():void {

            onnus_html::element('menu-spacer', "class{onnus-menu-spacer}");

                onnus_html::element('menu-bar', '');
                    onnus_html::element('bar-icon', '', '');
                    onnus_html::element('bar-label', '', '');
                onnus_html::element('menu-bar');

            onnus_html::element('menu-spacer');

        }

        public static function filler():void {

            onnus_html::element('menu-filler', "class{onnus-menu-filler}");

                onnus_html::element('menu-bar', '');
                    onnus_html::element('bar-icon', '', '');
                    onnus_html::element('bar-label', '', '');
                onnus_html::element('menu-bar');

            onnus_html::element('menu-filler');

        }


        public static function browser(
            string      $icon,
            string      $label,
            string      $alt,
            string      $menu,
            string      $tag,
            string      $onclick,
            array       $content = []
        ):void {

            self::$data['toggle'][$menu] = self::$data['toggle'][$menu] ?? false;

            $str_menu_bar = '';


            if (!self::$data['toggle'][$menu]) {
                self::$data['toggle'][$menu] = true;
                $str_menu_bar = ' class="onnus-menu-focus"';
            }

            $str_menu_tag = 'menu-' . strtolower($label);

            onnus_html::element($str_menu_tag, 'class{onnus-menu-browser}');

                onnus_html::element('menu-bar', "data-onnus{color-hover[i#5]}alt{{$alt}}onclick{onnus.menu.collapse('{$tag}', '{$menu}')}");
                    onnus_html::element('bar-icon', "onclick{onnus.menu.toggle('{$menu}', '{$tag}')}", $icon);
                    onnus_html::element('bar-label', "onclick{{$onclick}}", $label);
                onnus_html::element('menu-bar');

                if (!empty($content)) {

                    onnus_html::element('menu-content', "data-onnus{color-background[i#4]color-font[i#4]}class{onnus-menu-collapse}");

                        foreach ($content as $arr_content) {

                            $str_type = $arr_content['type'] ?? 'folder';

                            if ($str_type == 'folder') {

                                $str_icon = $arr_content['icon'] ?? '';
                                $str_label = $arr_content['label'] ?? '';
                                $str_alt = $arr_content['alt'] ?? '';
                                $str_onclick = $arr_content['onclick'] ?? '';
                                $str_menu_id = $arr_content['menu_id'] ?? 0;

                                self::folder($str_icon, $str_label, $str_alt, $str_onclick, $str_menu_id);

                            } else if ($str_type == 'spacer') {

                                self::spacer();

                            } else if ($str_type == 'filler') {

                                self::filler();

                            }

                        }    

                    onnus_html::element('menu-content');

                }

            onnus_html::element($str_menu_tag);

        }

        public static function folder(
            string              $icon = '',
            string              $label = '',
            string              $alt = '',
            string              $onclick = '',
            string|int          $id = 0,
        ):void {

            onnus_html::element('menu-folder', "id{onn-men-fol-{$id}}class{onnus-menu-folder}");

                onnus_html::element('folder-bar', "data-onnus{color-hover[i#3]}alt{{$alt}}onclick{{$onclick}}");
                    onnus_html::element('bar-icon', '', $icon);
                    onnus_html::element('bar-label', '', $label);
                onnus_html::element('folder-bar');

                onnus_html::element('folder-content', 'color-border[i#12]', '');

            onnus_html::element('menu-folder');

        }

    }