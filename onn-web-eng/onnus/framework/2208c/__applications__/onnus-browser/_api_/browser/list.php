<?php

    $str_folder_name = $_POST['_folder_name'] ?? '';
    $str_folder_type = $_POST['_folder_type'] ?? 'onnus-list-grid';

    $str_dir_path = '';
    $str_icon_text = '';
    $str_dir_label = '';

    $arr_folder = [];

    foreach (scandir($str_folder_name) as $str_dir_file) {

        if ($str_dir_file == '.' || $str_dir_file == '..') {continue;}

        $str_dir_file_path = $str_folder_name . '/' . $str_dir_file;

        $arr_dir_data = [];
        $arr_dir_data['label'] = $str_dir_file;
        $arr_dir_data['path'] = $str_dir_file_path;

        if (is_dir($str_dir_file_path)) {

            $arr_folder['dir'][] = $arr_dir_data;

        } else if (is_file($str_dir_file_path)) {

            $arr_folder['file'][] =  $arr_dir_data;

        }

    }

    $arr_dir_data = [];
    $arr_dir_data['label'] = $str_dir_file;
    $arr_dir_data['path'] = "CREATE FOLDER";

    onnus_html::element('browser-list', 'class{onnus-flex-column-1 onnus-overflow-y-auto}');

        if (!empty($arr_folder['dir'])) {

            onnus_html::element('list-header', 'class{onnus-flex-row onnus-flex-middle}');
                onnus_html::element('header-title', 'class{onnus-padding-top-15px onnus-padding-left-right-15px onnus-font-size-25px}', 'Folders');
            onnus_html::element('list-header');

            onnus_html::element('list-container', 'class{onnus-flex-row onnus-flex-top onnus-flex-wrap onnus-padding-10px onnus-tablet-flex-space-between}');

            foreach ($arr_folder['dir'] as $arr_dir) {

                $str_dir_icon = $arr_dir['icon'] ?? '';
                $str_dir_label = $arr_dir['label'] ?? 'ERROR!';
                $str_dir_path = $arr_dir['path'] ?? '.';
                $str_icon_text = '';

                $int_dir_count = 0;
                $int_file_count = 0;


                if (!is_readable($str_dir_path)) {continue;}
                // echo '$str_dir_path=', $str_dir_path;
            
                foreach (scandir($str_dir_path) as $str_dir_file) {

                    if ($str_dir_file == '.' || $str_dir_file == '..') {continue;}
                    
                    $str_path = trim($str_dir_path . '/' . $str_dir_file);

                    if (is_dir($str_path)) {
                        $int_dir_count += 1;
                    } else if (is_file($str_path)) {
                        $int_file_count = $int_file_count + 1;
                    }

                }

                if ($int_dir_count == 1) {
                    $str_icon_text .= $int_dir_count . ' Folder <br>';
                } else if ($int_dir_count > 1) {
                    $str_icon_text .= $int_dir_count . ' Folders <br>';
                }

                if ($int_file_count == 1) {
                    $str_icon_text .= $int_file_count . ' File <br>';
                } else if ($int_file_count > 1) {
                    $str_icon_text = $str_icon_text . $int_file_count . ' Files <br>';
                }

                if ($str_icon_text == '') {
                    $str_icon_text = $str_dir_icon;
                }


                onnus_html::element('list-box', "class{onnus-flex-column onnus-margin-5px onnus-max-height-200px onnus-max-width-200px}data-onnus{color-font-hover[i#6]}onclick{onnus_browser_list('{$str_dir_path}')}alt{Folder | {$str_dir_path}}");
                    onnus_html::element('box-folder', 'class{onnus-min-width-115px onnus-min-height-115px onnus-flex-core onnus-text-align-center onnus-font-size-small onnus-border-solid-2px onnus-cursor-pointer}data-onnus{color[i#4] color-border[i#10] color-font[i#4] color-hover[i#6]}', $str_icon_text);
                    onnus_html::element('box-label', 'class{onnus-margin-top-10px onnus-flex-core onnus-text-align-center onnus-cursor-pointer onnus-font-size-small}', $str_dir_label);
                onnus_html::element('list-box');

            }

            onnus_html::element('list-container');  
        
        }

        if (!empty($arr_folder['file'])) {

            onnus_html::element('list-header', 'class{onnus-flex-row onnus-flex-middle}');
                onnus_html::element('header-title', 'class{onnus-padding-top-15px onnus-padding-left-right-15px onnus-font-size-25px}', 'Files');
            onnus_html::element('list-header');

            onnus_html::element('list-container', 'class{onnus-flex-row onnus-flex-top onnus-flex-wrap onnus-padding-10px onnus-tablet-flex-space-between}');

            foreach ($arr_folder['file'] as $arr_file) {

                $str_file_icon = $arr_file['icon'] ?? 'File';
                $str_file_label = $arr_file['label'] ?? 'ERROR!';
                $str_file_path = $arr_file['path'] ?? '.';

                onnus_html::element('list-box', "class{onnus-flex-column onnus-margin-5px onnus-max-height-200px onnus-max-width-200px}data-onnus{color-font-hover[i#6]}alt{File | {$str_file_icon}}");
                    onnus_html::element('box-folder', 'class{onnus-min-width-115px onnus-min-height-115px onnus-flex-core onnus-text-align-center onnus-font-size-small onnus-border-solid-2px onnus-cursor-pointer}data-onnus{color[i#4] color-border[i#10] color-font[i#4] color-hover[i#6]}', $str_file_icon);
                    onnus_html::element('box-label', 'class{onnus-margin-top-10px onnus-max-width-120px onnus-flex-core onnus-text-align-center onnus-font-size-small onnus-cursor-pointer}', $str_file_label);
                onnus_html::element('list-box');

            }

            onnus_html::element('list-container');  
        
        }

    onnus_html::element('browser-list');

    onnus_html::element('content-filter', 'class{--onnus-tablet-position-relative onnus-border-left-solid-1px onnus-min-width-35px onnus-tablet-min-width-35px}data-onnus{color[i#6]}');
        // onnus_menu::generate($arr_option_sort);
    onnus_html::element('content-filter');

?>