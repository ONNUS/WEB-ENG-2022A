<?php 

    $arr_image_search = ['file' => 'tray-apps/icon-app-search.svg', 'module' => 'onnus-interface', 'attributes' => 'class{}data-onnus{color-fill[i#5]}', 'method' => 'onn_int_app_view_search' ];
    $arr_image_venders = ['file' => 'tray-apps/icon-app-venders.svg', 'module' => 'onnus-interface', 'attributes' => 'class{}data-onnus{color-fill[i#5]}', 'method' => 'onn_int_app_view_venders' ];

    // onnus_menu::schema($arr_content_venders, 'spacer', []);
    onnus_menu::schema($arr_content_venders, 'button', ['icon' => '₪', 'label' => 'Onnus', 'alt' => 'ALT', 'onclick' => '']);
    onnus_menu::schema($arr_content_venders, 'spacer', []);

    onnus_menu::schema($arr_menu_filters, 'container', ['tag' => 'filters-menu', 'attributes' => 'data-onnus{color[i#6]}class{onnus-menu onnus-menu-closed onnus-border-right-solid-1px onnus-tablet-position-absolute}', 'select' => 'filters-menu[]menu-venders[]']);

    onnus_menu::schema($arr_menu_filters['content'], 'filler', []);
    onnus_menu::schema($arr_menu_filters['content'], 'toggle', ['icon' => $arr_image_search, 'label' => 'Search', 'alt' => 'ALT', 'menu' => 'apps-filters[]filters-menu[]', 'tag' => 'filters-menu[]menu-search[]', 'onclick' => "onn_int_app_view('search');", ]);
    onnus_menu::schema($arr_menu_filters['content'], 'toggle', ['icon' => $arr_image_venders, 'label' => 'Venders', 'alt' => 'ALT', 'menu' => 'apps-filters[]filters-menu[]', 'tag' => 'filters-menu[]menu-venders[]', 'onclick' => "onn_int_app_view('venders');", 'content' => $arr_content_venders, ]);
    onnus_menu::schema($arr_menu_filters['content'], 'filler', []);


    if (!onnus_menu::load($arr_menu_options, 'tray-apps-options', 'onnus-interface')) {

        $arr_image_recent = ['file' => 'tray-apps/icon-recent.svg', 'module' => 'onnus-interface', 'attributes' => 'class{}data-onnus{color-fill[i#5]}', 'method' => 'onn_int_app_sort_recent' ];
        $arr_image_label = ['file' => 'tray-apps/icon-label.svg', 'module' => 'onnus-interface', 'attributes' => 'class{}data-onnus{color-fill[i#5]}', 'method' => 'onn_int_app_sort_label' ];
        $arr_image_date = ['file' => 'tray-apps/icon-date.svg', 'module' => 'onnus-interface', 'attributes' => 'class{}data-onnus{color-fill[i#5]}', 'method' => 'onn_int_app_sort_date' ];
        $arr_image_updates = ['file' => 'tray-apps/icon-updates.svg', 'module' => 'onnus-interface', 'attributes' => 'class{}data-onnus{color-fill[i#5]}', 'method' => 'onn_int_app_sort_updates' ];

        // onnus_menu::schema($arr_content_label, 'spacer', []);
        onnus_menu::schema($arr_content_label, 'button', ['icon' => '▲', 'label' => 'A-Z', 'alt' => 'ALT', 'onclick' => "onn_int_app_list_reverse(false);"]);
        onnus_menu::schema($arr_content_label, 'button', ['icon' => '▼', 'label' => 'Z-A', 'alt' => 'ALT', 'onclick' => "onn_int_app_list_reverse(true);"]);
        onnus_menu::schema($arr_content_label, 'spacer', []);

        // onnus_menu::schema($arr_content_date, 'spacer', []);
        onnus_menu::schema($arr_content_date, 'button', ['icon' => '▲', 'label' => '9-0', 'alt' => 'ALT', 'onclick' => "onn_int_app_list_reverse(false);"]);
        onnus_menu::schema($arr_content_date, 'button', ['icon' => '▼', 'label' => '0-9', 'alt' => 'ALT', 'onclick' => "onn_int_app_list_reverse(true);"]);
        onnus_menu::schema($arr_content_date, 'spacer', []);

        onnus_menu::schema($arr_menu_options, 'container', ['tag' => 'options-menu', 'attributes' => 'data-onnus{color[i#6]}class{onnus-menu onnus-menu-reverse onnus-menu-closed onnus-border-left-solid-1px onnus-tablet-position-absolute}', 'select' => 'options-menu[]menu-label[]']);

        onnus_menu::schema($arr_menu_options['content'], 'filler', []);
        onnus_menu::schema($arr_menu_options['content'], 'toggle', ['icon' => $arr_image_recent, 'label' => 'Recent', 'alt' => 'Recent Applications', 'menu' => 'apps-options[]options-menu[]', 'tag' => 'options-menu[]menu-recent[]', 'onclick' => "onn_int_app_sort('recent');", ]);
        onnus_menu::schema($arr_menu_options['content'], 'toggle', ['icon' => $arr_image_label, 'label' => 'Label', 'alt' => 'Label Applications', 'menu' => 'apps-options[]options-menu[]', 'tag' => 'options-menu[]menu-label[]', 'onclick' => "onn_int_app_sort('label');", 'content' => $arr_content_label, ]);
        onnus_menu::schema($arr_menu_options['content'], 'toggle', ['icon' => $arr_image_date, 'label' => 'Date', 'alt' => 'Date Applications', 'menu' => 'apps-options[]options-menu[]', 'tag' => 'options-menu[]menu-date[]', 'onclick' => "onn_int_app_sort('date');", 'content' => $arr_content_date, ]);
        onnus_menu::schema($arr_menu_options['content'], 'toggle', ['icon' => $arr_image_updates, 'label' => 'Updates', 'alt' => 'Updates Applications', 'menu' => 'apps-options[]options-menu[]', 'tag' => 'options-menu[]menu-updates[]', 'onclick' => "onn_int_app_sort('updates');", ]);
        onnus_menu::schema($arr_menu_options['content'], 'filler', []);

        onnus_menu::save($arr_menu_options, 'tray-apps-options', 'onnus-interface');

    }


    onnus_html::element('tray-apps', 'class{onnus-flex-row-1}');

        onnus_html::element('apps-filters', 'class{onnus-tablet-position-relative onnus-tablet-min-width-35px}');
            onnus_menu::generate($arr_menu_filters);
        onnus_html::element('apps-filters');

        onnus_html::element('apps-browser', 'class{onnus-flex-column-1 onnus-flex-core}');
            include_once('applications/venders.php');
        onnus_html::element('apps-browser');

        onnus_html::element('apps-options', 'class{onnus-tablet-position-relative onnus-tablet-min-width-35px}');
            onnus_menu::generate($arr_menu_options);
        onnus_html::element('apps-options');

    onnus_html::element('tray-apps');

?>