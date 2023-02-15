<?php 

    $bol_load = true;

    $str_post_sort = '';

    $arr_list_grid = [];

    $arr_app = [];
    $arr_app_sort = [];

    if (isset(self::$data['_post']['sort'])) {
        $str_post_sort = self::$data['_post']['sort'];
    } else {
        $str_post_sort = 'label';
    }

    if ($str_post_sort === 'recent') {

        echo '<h2>RECENT FILTER</h2><h2>FUNCTION OFFLINE</h2>';

        $bol_load = false;

    } else if ($str_post_sort === 'updates') {

        echo '<h2>UPDATE FILTER</h2><h2>FUNCTION OFFLINE</h2>';

        $bol_load = false;

    }


    if ($bol_load) {

        $str_con_app_dir = onnus_index::get('directory', 'con_applications');
        $str_fra_app_dir = onnus_index::get('directory', 'fra_applications');

        foreach ([$str_fra_app_dir, $str_con_app_dir] as &$str_module_dir) {

            if (!$str_module_dir) {continue;}

            foreach (onnus_directory::read($str_module_dir) as &$str_app_dir) {

                if ($str_app_dir === '.' || $str_app_dir === '..') {continue;}

                $str_path_module_json = $str_module_dir . $str_app_dir . '/_data_/module.json';

                if (!onnus_file::exist($str_path_module_json)) {continue;}

                $arr_module = onnus_json::get($str_path_module_json);

                if (!isset($arr_module['status']) || $arr_module['status'] === false) {continue;}

                $str_module_name = $arr_module['name'] ?? null;

                $arr_app[$str_module_name]['name'] = $str_module_name;

                if (!$arr_app[$str_module_name]['name']) {continue;}

                $arr_app[$str_module_name]['app'] = $str_app_dir ?? false;
                $arr_app[$str_module_name]['icon'] = $arr_module['icon'] ?? '₪';
                $arr_app[$str_module_name]['label'] = $arr_module['label'] ?? $str_module_name;
                $arr_app[$str_module_name]['date'] = $arr_module['date'] ?? '0000-00-00';
                $arr_app[$str_module_name]['attributes'] = $arr_module['attributes'] ?? 'data-onnus{color-fill[i#5]}';


                if ($str_post_sort === 'recent') {
                    continue;
                } else if ($str_post_sort === 'label') {

                    $str_app_label = $arr_app[$str_module_name]['label'];

                    $arr_app_sort[$str_app_label] = $arr_app[$str_module_name];

                } else if ($str_post_sort === 'date') {

                    $str_app_date = $arr_app[$str_module_name]['date'];

                    $arr_app_sort[$str_module_name] = $arr_app[$str_module_name];

                } else if ($str_post_sort === 'updates') {
                    continue;
                }

            }

        }

        if ($str_post_sort === 'label') {

            sort($arr_list_grid);
            sort($arr_app_sort);

        } else if ($str_post_sort === 'date') {

            usort($arr_app_sort, function ($str_date_1, $str_date_2) {

                $str_date_1 = $str_date_1['date'];
                $str_date_2 = $str_date_2['date'];

                if (strtotime($str_date_1) < strtotime($str_date_2)) {
                    return 1;
                } else if (strtotime($str_date_1) > strtotime($str_date_2)) {
                    return -1;
                } else {
                    return 0;
                }

            });

        }


        onnus_html::element('browser-list', 'class{onnus-min-width-100 onnus-overflow-y-auto}');

            onnus_html::element('list-header', 'class{onnus-flex-row onnus-flex-core onnus-padding-10px onnus-select-none onnus-font-size-x-large onnus-font-weight-bold}', 'Applications');

            onnus_html::element('list-grid', 'class{onnus-flex-row onnus-flex-core onnus-flex-wrap}');

                foreach ($arr_app_sort as $str_app_sort => $arr_app_data) {

                    $str_name = $arr_app_data['name'] ?? 'Name';
                    $str_label = $arr_app_data['label'] ?? 'Label';
                    $str_arr_icon = $arr_app_data['icon'] ?? '#';
                    $str_app = $arr_app_data['app'] ?? '#';

                    if (is_array($str_arr_icon)) {

                        $str_file = $str_arr_icon['file'] ?? 'tray-apps/icon-app.svg';
                        $str_module = $str_arr_icon['module'] ?? 'onnus-interface';
                        $str_attributes = $str_arr_icon['attributes'] ?? '';

                        onnus_html::element('grid-app', 'class{onnus-max-width-125px onnus-flex-column-1 onnus-flex-core onnus-margin-10px}');

                            onnus_html::element('app-icon', 'class{onnus-flex-row-1 onnus-flex-left-middle onnus-font-size-80px}');

                                $str_data_onnus = "data-onn-app-mod{{$str_name}}data-onn-app-api{}";

                                onnus_html::image($str_file, $str_module, 'class{onnus-max-min-height-125px onnus-max-min-width-125px}data-onnus{color-fill[i#5]}' . $str_data_onnus, 'onnus_interface_application');

                            onnus_html::element('app-icon');

                            $str_label_onclick = "onclick{onnus_interface_nav_menu_option_open('{$str_app}');}";

                            onnus_html::element('app-label', 'class{onnus-flex-row onnus-flex-core onnus-flex-nowrap onnus-cursor-pointer onnus-min-height-45px onnus-padding-5px onnus-text-align-center}' . $str_label_onclick, $str_label);

                        onnus_html::element('grid-app');

                    }

                }

            onnus_html::element('list-grid');

        onnus_html::element('browser-list');

    }

?>