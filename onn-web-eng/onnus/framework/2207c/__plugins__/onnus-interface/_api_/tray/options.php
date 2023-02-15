<?php 

    $arr_image_search = ['file' => 'tray-apps/icon-app-search.svg', 'module' => 'onnus-interface', 'attributes' => 'class{}data-onnus{color-fill[i#5]}', 'method' => '' ];
    $arr_image_venders = ['file' => 'tray-apps/icon-app-venders.svg', 'module' => 'onnus-interface', 'attributes' => 'class{}data-onnus{color-fill[i#5]}', 'method' => '' ];

    // onnus_menu::schema($arr_content_venders, 'spacer', []);
    onnus_menu::schema($arr_content_venders, 'button', ['icon' => '₪', 'label' => 'Onnus Browser', 'alt' => 'ALT', 'onclick' => '']);
    onnus_menu::schema($arr_content_venders, 'spacer', []);

    onnus_menu::schema($arr_option_module, 'container', ['tag' => 'module-menu', 'attributes' => 'data-onnus{color[i#6]}class{onnus-menu onnus-menu-closed onnus-border-right-solid-1px onnus-tablet-position-absolute}', 'select' => 'module-menu[]menu-applications[]']);

    onnus_menu::schema($arr_option_module['content'], 'filler', []);
    // onnus_menu::schema($arr_option_module['content'], 'toggle', ['icon' => 'S', 'label' => 'Selected', 'alt' => 'ALT', 'menu' => 'option-module[]module-menu[]', 'tag' => 'module-menu[]menu-selected[]', 'onclick' => "", ]);
    onnus_menu::schema($arr_option_module['content'], 'toggle', ['icon' => 'A', 'label' => 'Applications', 'alt' => 'ALT', 'menu' => 'option-module[]module-menu[]', 'tag' => 'module-menu[]menu-applications[]', 'onclick' => "", 'content' => $arr_content_venders, ]);
    // onnus_menu::schema($arr_option_module['content'], 'toggle', ['icon' => 'P', 'label' => 'Plugins', 'alt' => 'ALT', 'menu' => 'option-module[]module-menu[]', 'tag' => 'module-menu[]menu-plugins[]', 'onclick' => "", 'content' => $arr_content_venders, ]);
    onnus_menu::schema($arr_option_module['content'], 'filler', []);


    // if (!onnus_menu::load($arr_option_sort, 'tray-option-sort', 'onnus-interface')) {

    // $arr_image_recent = ['file' => 'tray-apps/icon-recent.svg', 'module' => 'onnus-interface', 'attributes' => 'class{}data-onnus{color-fill[i#5]}', 'method' => 'onn_int_app_sort_recent' ];
    // $arr_image_label = ['file' => 'tray-apps/icon-label.svg', 'module' => 'onnus-interface', 'attributes' => 'class{}data-onnus{color-fill[i#5]}', 'method' => 'onn_int_app_sort_label' ];
    // $arr_image_date = ['file' => 'tray-apps/icon-date.svg', 'module' => 'onnus-interface', 'attributes' => 'class{}data-onnus{color-fill[i#5]}', 'method' => 'onn_int_app_sort_date' ];
    // $arr_image_updates = ['file' => 'tray-apps/icon-updates.svg', 'module' => 'onnus-interface', 'attributes' => 'class{}data-onnus{color-fill[i#5]}', 'method' => 'onn_int_app_sort_updates' ];

    // onnus_menu::schema($arr_content_label, 'button', ['icon' => '▲', 'label' => 'A-Z', 'alt' => 'ALT', 'onclick' => "onn_int_app_list_reverse(false);"]);
    // onnus_menu::schema($arr_content_label, 'button', ['icon' => '▼', 'label' => 'Z-A', 'alt' => 'ALT', 'onclick' => "onn_int_app_list_reverse(true);"]);
    // onnus_menu::schema($arr_content_label, 'spacer', []);

    // onnus_menu::schema($arr_content_date, 'button', ['icon' => '▲', 'label' => '9-0', 'alt' => 'ALT', 'onclick' => "onn_int_app_list_reverse(false);"]);
    // onnus_menu::schema($arr_content_date, 'button', ['icon' => '▼', 'label' => '0-9', 'alt' => 'ALT', 'onclick' => "onn_int_app_list_reverse(true);"]);
    // onnus_menu::schema($arr_content_date, 'spacer', []);

    onnus_menu::schema($arr_option_sort, 'container', ['tag' => 'sort-menu', 'attributes' => 'data-onnus{color[i#6]}class{onnus-menu onnus-menu-reverse onnus-menu-closed onnus-border-left-solid-1px onnus-tablet-position-absolute}', 'select' => 'sort-menu[]menu-plugins[]']);

    onnus_menu::schema($arr_content_sort, 'button', ['icon' => '₪', 'label' => 'Onnus Interface', 'alt' => 'ALT', 'onclick' => '']);
    onnus_menu::schema($arr_content_sort, 'spacer', []);

    onnus_menu::schema($arr_option_sort['content'], 'filler', []);
    onnus_menu::schema($arr_option_sort['content'], 'toggle', ['icon' => 'P', 'label' => 'Plugins', 'alt' => 'ALT', 'menu' => 'option-sort[]sort-menu[]', 'tag' => 'sort-menu[]menu-plugins[]', 'onclick' => "", 'content' => $arr_content_sort, ]);
    // onnus_menu::schema($arr_option_sort['content'], 'toggle', ['icon' => $arr_image_recent, 'label' => 'Recent', 'alt' => 'Recent Applications', 'menu' => 'option-sort[]sort-menu[]', 'tag' => 'sort-menu[]menu-recent[]', 'onclick' => "_onn_int_app_sort('recent');", ]);
    // onnus_menu::schema($arr_option_sort['content'], 'toggle', ['icon' => $arr_image_label, 'label' => 'Label', 'alt' => 'Label Applications', 'menu' => 'option-sort[]sort-menu[]', 'tag' => 'sort-menu[]menu-label[]', 'onclick' => "_onn_int_app_sort('label');", 'content' => $arr_content_label, ]);
    // onnus_menu::schema($arr_option_sort['content'], 'toggle', ['icon' => $arr_image_date, 'label' => 'Date', 'alt' => 'Date Applications', 'menu' => 'option-sort[]sort-menu[]', 'tag' => 'sort-menu[]menu-date[]', 'onclick' => "_onn_int_app_sort('date');", 'content' => $arr_content_date, ]);
    // onnus_menu::schema($arr_option_sort['content'], 'toggle', ['icon' => $arr_image_updates, 'label' => 'Updates', 'alt' => 'Updates Applications', 'menu' => 'option-sort[]sort-menu[]', 'tag' => 'sort-menu[]menu-updates[]', 'onclick' => "_onn_int_app_sort('updates');", ]);
    onnus_menu::schema($arr_option_sort['content'], 'filler', []);

    // onnus_menu::save($arr_option_sort, 'tray-option-sort', 'onnus-interface');

    //}


    onnus_html::element('tray-option', 'class{onnus-flex-row-1}');

        onnus_html::element('option-module', 'class{onnus-tablet-position-relative onnus-tablet-min-width-35px}');
            onnus_menu::generate($arr_option_module);
        onnus_html::element('option-module');

        onnus_html::element('option-browser', 'class{onnus-flex-row-1}');
            include_once('option/modules.php');
        onnus_html::element('option-browser');

        onnus_html::element('option-sort', 'class{onnus-tablet-position-relative onnus-tablet-min-width-35px}');
            onnus_menu::generate($arr_option_sort);
        onnus_html::element('option-sort');

    onnus_html::element('tray-option');

?>