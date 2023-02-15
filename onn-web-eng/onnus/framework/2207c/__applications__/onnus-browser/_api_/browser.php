<?php

    $arr_image_recent = ['file' => 'tray-apps/icon-recent.svg', 'module' => 'onnus-interface', 'attributes' => 'class{}data-onnus{color-fill[i#5]}', 'method' => 'onn_int_app_sort_recent' ];
    $arr_image_label = ['file' => 'tray-apps/icon-label.svg', 'module' => 'onnus-interface', 'attributes' => 'class{}data-onnus{color-fill[i#5]}', 'method' => 'onn_int_app_sort_label' ];
    $arr_image_date = ['file' => 'tray-apps/icon-date.svg', 'module' => 'onnus-interface', 'attributes' => 'class{}data-onnus{color-fill[i#5]}', 'method' => 'onn_int_app_sort_date' ];
    $arr_image_updates = ['file' => 'tray-apps/icon-updates.svg', 'module' => 'onnus-interface', 'attributes' => 'class{}data-onnus{color-fill[i#5]}', 'method' => 'onn_int_app_sort_updates' ];

    onnus_menu::schema($arr_content_label, 'button', ['icon' => '▲', 'label' => 'A-Z', 'alt' => 'ALT', 'onclick' => "onn_int_app_list_reverse(false);"]);
    onnus_menu::schema($arr_content_label, 'button', ['icon' => '▼', 'label' => 'Z-A', 'alt' => 'ALT', 'onclick' => "onn_int_app_list_reverse(true);"]);
    onnus_menu::schema($arr_content_label, 'spacer', []);

    onnus_menu::schema($arr_content_date, 'button', ['icon' => '▲', 'label' => '9-0', 'alt' => 'ALT', 'onclick' => "onn_int_app_list_reverse(false);"]);
    onnus_menu::schema($arr_content_date, 'button', ['icon' => '▼', 'label' => '0-9', 'alt' => 'ALT', 'onclick' => "onn_int_app_list_reverse(true);"]);
    onnus_menu::schema($arr_content_date, 'spacer', []);

    onnus_menu::schema($arr_option_sort, 'container', ['tag' => 'browser-filters', 'attributes' => 'data-onnus{color[i#6]}class{onnus-menu onnus-menu-reverse onnus-menu-closed onnus-border-left-solid-1px --onnus-tablet-position-absolute}', 'select' => 'browser-filters[]menu-label[]']);

    // onnus_menu::schema($arr_option_sort['content'], 'filler', []);
    onnus_menu::schema($arr_option_sort['content'], 'toggle', ['icon' => $arr_image_recent, 'label' => 'Recent', 'alt' => 'Recent Applications', 'menu' => 'content-filter[]browser-filters[]', 'tag' => 'browser-filters[]menu-recent[]', 'onclick' => "_onn_int_app_sort('recent');", ]);
    onnus_menu::schema($arr_option_sort['content'], 'toggle', ['icon' => $arr_image_label, 'label' => 'Label', 'alt' => 'Label Applications', 'menu' => 'content-filter[]browser-filters[]', 'tag' => 'browser-filters[]menu-label[]', 'onclick' => "_onn_int_app_sort('label');", 'content' => $arr_content_label, ]);
    onnus_menu::schema($arr_option_sort['content'], 'toggle', ['icon' => $arr_image_date, 'label' => 'Date', 'alt' => 'Date Applications', 'menu' => 'content-filter[]browser-filters[]', 'tag' => 'browser-filters[]menu-date[]', 'onclick' => "_onn_int_app_sort('date');", 'content' => $arr_content_date, ]);
    onnus_menu::schema($arr_option_sort['content'], 'toggle', ['icon' => $arr_image_updates, 'label' => 'Updates', 'alt' => 'Updates Applications', 'menu' => 'content-filter[]browser-filters[]', 'tag' => 'browser-filters[]menu-updates[]', 'onclick' => "_onn_int_app_sort('updates');", ]);
    onnus_menu::schema($arr_option_sort['content'], 'filler', []);

    onnus_html::element('module-content', 'class{onnus-flex-row-1 onnus-grid-columns-2 onnus-mobile-grid-columns-1 onnus-padding-10px onnus-min-max-height-100 onnus-overflow-auto}');

        onnus_html::element('content-dashboard', 'class{onnus-flex-column onnus-margin-15px onnus-min-height-200px onnus-border-solid-1px}data-onnus{color[i#4]}');
            onnus_html::element('dashboard-header', "class{onnus-flex-0 onnus-flex-core onnus-min-height-35px onnus-border-bottom-solid-1px onnus-cursor-pointer}data-onnus{color[i#6]}onclick{onnus_browser_folder('..', '0');}", 'Server');
            onnus_html::element('dashboard-content', 'class{onnus-flex-1 onnus-flex-core onnus-min-height-35px onnus-border-bottom-solid-1px}', '');
        onnus_html::element('content-dashboard');
    
        onnus_html::element('content-dashboard', 'class{onnus-flex-column onnus-margin-15px onnus-min-height-200px onnus-border-solid-1px}data-onnus{color[i#4]}');
            onnus_html::element('dashboard-header', "class{onnus-flex-0 onnus-flex-core onnus-min-height-35px onnus-border-bottom-solid-1px onnus-cursor-pointer}data-onnus{color[i#6]}onclick{onnus_browser_folder('.', '1');}", 'Public');
            onnus_html::element('dashboard-content', 'class{onnus-flex-1 onnus-flex-core onnus-min-height-35px onnus-border-bottom-solid-1px}', '');
        onnus_html::element('content-dashboard');

        // onnus_html::element('content-dashboard', 'class{onnus-margin-15px onnus-min-height-200px}data-onnus{color[i#4]}', 'Server');
        // onnus_html::element('content-dashboard', 'class{onnus-margin-15px onnus-min-height-200px}data-onnus{color[i#4]}', 'Public');

    onnus_html::element('module-content');

    onnus_html::element('content-filter', 'class{--onnus-tablet-position-relative onnus-border-left-solid-1px onnus-min-width-35px onnus-tablet-min-width-35px}data-onnus{color[i#6]}');
        // onnus_menu::generate($arr_option_sort);
    onnus_html::element('content-filter');

?>