<?php

    $str_application = self::$data['_post']['application'] ?? false;
    $str_plugin = self::$data['_post']['plugin'] ?? false;

    $str_module_title = 'Module Title';

    $arr_module_option = [];


    onnus_html::element('browser-list', 'class{onnus-flex-column-1 onnus-min-width-100 onnus-overflow-y-auto}');

    if (!$str_application) {
        // $str_application = 'Menu Overview';
        $str_module_title = 'Options Dashboard';

        // echo $str_application;
    } else {

        if (isset(index::$data['_data_'][$str_application])) {

            $str_app_data_dir = index::$data['_data_'][$str_application];
            $str_app_data_module_path = $str_app_data_dir . 'module.json';

            // echo 'str_app_data_dir =', $str_app_data_dir, "\n <br>";
            // echo 'str_app_data_module_path =', $str_app_data_module_path, "\n <br>";

            if (onnus_file::exist($str_app_data_module_path)) {

                $arr_data_module = onnus_json::get($str_app_data_module_path);

                $str_module_title = $arr_data_module['label'] ?? $str_application;

                // echo '<hr>🟪 $arr_data_module <br><pre>', print_r($arr_data_module), '</pre>','<br>';

            }

        } else {

            $str_module_title = $str_application;

        } 

        $str_con_app_dir = onnus_index::get('directory', 'con_applications');
        $str_fra_app_dir = onnus_index::get('directory', 'fra_applications');

        // echo '<hr>🟪 onnus_index - index::$data | __destruct <br><pre>', print_r(index::$data), '</pre>','<br>';

        if (isset(index::$data['_menus_'][$str_application])) {

            $str_app_dir = index::$data['_menus_'][$str_application];
            $str_app_path = $str_app_dir . 'options.json';

            if (onnus_file::exist($str_app_path)) {

                $arr_menu_options = onnus_json::get($str_app_path);

                if (isset($arr_menu_options['type']) && $arr_menu_options['type'] == 'container') {

                    // echo 'str_app_dir =', $str_app_dir, "\n <br>"; 
                    // echo 'str_app_path =', $str_app_path, "\n <br>"; 

                    $arr_option_data = [];
                    
                    foreach ($arr_menu_options['content'] as &$arr_menu_data) {

                        $arr_option_data['label'] = $arr_menu_data['label'] ?? false;
                        $arr_option_data['content'] = $arr_menu_data['content'] ?? [];

                        // echo 'str_label =', $str_label, "\n <br>"; 

                        $arr_module_option[] = $arr_option_data;

                        // echo '<br><br>';
                        // print_r($arr_menu_data['label']);
                        // print_r($arr_content);
                        // echo '<br><br>';

                    }

                    // echo '<hr>🟫 arr_menu_options | __destruct <br><pre>', print_r($arr_menu_options), '</pre>','<br>';

                }

            }

        }

    }

    // onnus_html::element('browser-list', 'class{onnus-flex-column-1 onnus-min-width-100 onnus-overflow-y-auto}');

        // echo '<hr>🟫 arr_menu_options | __destruct <br><pre>', print_r(index::$data), '</pre>','<br>';

        onnus_html::element('list-header', "class{onnus-flex-row onnus-flex-core onnus-padding-top-10px onnus-select-none onnus-font-size-x-large onnus-font-weight-bolder onnus-cursor-pointer}onclick{onnus_interface_application_open('{$str_application}', 'interface');}", $str_module_title);

        onnus_html::element('list-grid', 'class{onnus-flex-row-1 onnus-flex-top-center onnus-flex-wrap}');

            foreach ($arr_module_option as &$arr_option_menu) {

                $str_option_label = $arr_option_menu['label'] ?? false;
                $arr_option_menus = $arr_option_menu['content'] ?? false;
                $arr_option_api = $arr_option_menu['api'] ?? strtolower($str_option_label);
                $str_option_view = strtolower($str_option_label); // temp method for interface view

                if (!$str_option_label || !$arr_option_menus) {continue;}

                onnus_html::element('grid-option', 'class{onnus-flex-column onnus-max-min-width-125px onnus-padding-5px}');

                    onnus_html::element('option-header', "class{onnus-flex-row onnus-font-weight-bolder onnus-cursor-pointer onnus-select-none onnus-padding-top-bottom-3px}onclick{onnus_interface_application_load('{$str_application}', 'interface', '{$arr_option_api}');}", $str_option_label);

                    onnus_html::element('option-menu', 'class{onnus-flex-column-1}');

                    foreach ($arr_option_menus as &$arr_button_menu) {

                        $str_button_icon = $arr_button_menu['icon'] ?? '*';
                        $str_button_label = $arr_button_menu['label'] ?? '';
                        $str_button_api = $arr_button_menu['api'] ?? '';

                        if (!$str_button_icon || !$str_button_label) {continue;}

                        $str_onclick = "onclick{onnus_interface_application_load('{$str_application}', 'interface', '{$str_button_api}')";

                        onnus_html::element('menu-button', 'class{onnus-padding-top-3px onnus-cursor-pointer onnus-select-none}' . $str_onclick);
                            onnus_html::element('button-icon', '', $str_button_icon);
                            onnus_html::element('button-label', '', $str_button_label);
                        onnus_html::element('menu-button');

                    }

                    onnus_html::element('option-menu');

                onnus_html::element('grid-option');

            }

        onnus_html::element('list-grid');

    onnus_html::element('browser-list');

?>