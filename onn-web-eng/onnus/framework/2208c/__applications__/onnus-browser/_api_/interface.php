<?php 

    // if (!onnus_menu::load($arr_option_sort, 'tray-option-sort', 'onnus-interface')) {

        $arr_image_search = ['file' => 'tray-apps/icon-app-search.svg', 'module' => 'onnus-interface', 'attributes' => 'class{}data-onnus{color-fill[i#5]}', 'method' => '' ];
        $arr_image_venders = ['file' => 'tray-apps/icon-app-venders.svg', 'module' => 'onnus-interface', 'attributes' => 'class{}data-onnus{color-fill[i#5]}', 'method' => '' ];

        onnus_menu::schema($arr_option_module, 'container', ['tag' => 'browser-options', 'attributes' => 'data-onnus{color[i#6]}class{onnus-menu onnus-menu-closed onnus-border-right-solid-1px --onnus-tablet-position-absolute}', 'select' => 'browser-options[]menu-dashboards[]']);

        // onnus_menu::schema($arr_option_module['content'], 'spacer', []);
        onnus_menu::schema($arr_option_module['content'], 'toggle', ['icon' => 'D', 'label' => 'Dashboards', 'alt' => 'ALT', 'menu' => 'content-options[]browser-options[]', 'tag' => 'browser-options[]menu-dashboards[]', 'api' => 'dashboards', 'onclick' => "onnus_browser_content_load('dashboards');" ]);

        onnus_menu::schema($arr_content_components, 'button', ['icon' => '₪', 'label' => 'APIs', 'alt' => 'ALT', 'api' => 'components/apis', 'onclick' => "onnus_browser_content_load('components/apis');"]);
        onnus_menu::schema($arr_content_components, 'button', ['icon' => '₪', 'label' => 'Pages', 'alt' => 'ALT', 'api' => 'components/pages', 'onclick' => "onnus_browser_content_load('components/pages');"]);
        onnus_menu::schema($arr_content_components, 'button', ['icon' => '₪', 'label' => 'Layouts', 'alt' => 'ALT', 'api' => 'components/layouts', 'onclick' => "onnus_browser_content_load('components/layouts');"]);
        onnus_menu::schema($arr_content_components, 'button', ['icon' => '₪', 'label' => 'Menus', 'alt' => 'ALT', 'api' => 'components/menus', 'onclick' => "onnus_browser_content_load('components/menus');"]);
        onnus_menu::schema($arr_content_components, 'button', ['icon' => '₪', 'label' => 'Headers', 'alt' => 'ALT', 'api' => 'components/headers', 'onclick' => "onnus_browser_content_load('components/headers');"]);
        onnus_menu::schema($arr_content_components, 'button', ['icon' => '₪', 'label' => 'Footers', 'alt' => 'ALT', 'api' => 'components/footers', 'onclick' => "onnus_browser_content_load('components/footers');"]);
        onnus_menu::schema($arr_content_components, 'button', ['icon' => '₪', 'label' => 'Elements', 'alt' => 'ALT', 'api' => 'components/elements', 'onclick' => "onnus_browser_content_load('components/elements');"]);
        onnus_menu::schema($arr_content_components, 'spacer', []);

        onnus_menu::schema($arr_option_module['content'], 'toggle', ['icon' => 'C', 'label' => 'Components', 'alt' => 'ALT', 'menu' => 'content-options[]browser-options[]', 'tag' => 'browser-options[]menu-components[]', 'api' => 'components', 'onclick' => "onnus_browser_content_load('components');", 'content' => $arr_content_components, ]);

        onnus_menu::schema($arr_content_resources, 'button', ['icon' => '₪', 'label' => 'Applications', 'alt' => 'ALT', 'api' => 'resources/applications', 'onclick' => "onnus_browser_content_load('resources/applications');"]);
        onnus_menu::schema($arr_content_resources, 'button', ['icon' => '₪', 'label' => 'Plugins', 'alt' => 'ALT', 'api' => 'resources/plugins', 'onclick' => "onnus_browser_content_load('resources/plugins');"]);
        onnus_menu::schema($arr_content_resources, 'button', ['icon' => '₪', 'label' => 'Libraries', 'alt' => 'ALT', 'api' => 'resources/libraries', 'onclick' => "onnus_browser_content_load('resources/libraries');"]);
        onnus_menu::schema($arr_content_resources, 'button', ['icon' => '₪', 'label' => 'Classes', 'alt' => 'ALT', 'api' => 'resources/classes', 'onclick' => "onnus_browser_content_load('resources/classes');"]);
        onnus_menu::schema($arr_content_resources, 'spacer', []);

        onnus_menu::schema($arr_option_module['content'], 'toggle', ['icon' => 'R', 'label' => 'Resources', 'alt' => 'ALT', 'menu' => 'content-options[]browser-options[]', 'tag' => 'browser-options[]menu-resources[]', 'api' => 'resources', 'onclick' => "onnus_browser_content_load('resources');", 'content' => $arr_content_resources, ]);

        onnus_menu::schema($arr_content_accounts, 'button', ['icon' => '₪', 'label' => 'Users', 'alt' => 'ALT', 'api' => 'accounts/users', 'onclick' => "onnus_browser_content_load('accounts/users');"]);
        onnus_menu::schema($arr_content_accounts, 'button', ['icon' => '₪', 'label' => 'Permissions', 'alt' => 'ALT', 'api' => 'accounts/permissions', 'onclick' => "onnus_browser_content_load('accounts/permissions');"]);
        onnus_menu::schema($arr_content_accounts, 'button', ['icon' => '₪', 'label' => 'Notifications', 'alt' => 'ALT', 'api' => 'accounts/notifications', 'onclick' => "onnus_browser_content_load('accounts/notifications');"]);
        onnus_menu::schema($arr_content_accounts, 'button', ['icon' => '₪', 'label' => 'Logs', 'alt' => 'ALT', 'api' => 'accounts/logs', 'onclick' => "onnus_browser_content_load('accounts/logs');"]);
        onnus_menu::schema($arr_content_accounts, 'spacer', []);

        onnus_menu::schema($arr_option_module['content'], 'toggle', ['icon' => 'A', 'label' => 'Accounts', 'alt' => 'ALT', 'menu' => 'content-options[]browser-options[]', 'tag' => 'browser-options[]menu-accounts[]', 'api' => 'accounts', 'onclick' => "onnus_browser_content_load('accounts');", 'content' => $arr_content_accounts, ]);

        onnus_menu::schema($arr_content_systems, 'button', ['icon' => '₪', 'label' => 'Onnus', 'alt' => 'ALT', 'api' => 'systems/onnus', 'onclick' => "onnus_browser_content_load('systems/onnus');"]);
        onnus_menu::schema($arr_content_systems, 'button', ['icon' => '₪', 'label' => 'Data', 'alt' => 'ALT', 'api' => 'systems/data', 'onclick' => "onnus_browser_content_load('systems/data');"]);
        onnus_menu::schema($arr_content_systems, 'button', ['icon' => '₪', 'label' => 'Debug', 'alt' => 'ALT', 'api' => 'systems/debug', 'onclick' => "onnus_browser_content_load('systems/debug');"]);
        onnus_menu::schema($arr_content_systems, 'button', ['icon' => '₪', 'label' => 'Logs', 'alt' => 'ALT', 'api' => 'systems/logs', 'onclick' => "onnus_browser_content_load('systems/logs');"]);
        onnus_menu::schema($arr_content_systems, 'spacer', []);

        onnus_menu::schema($arr_option_module['content'], 'toggle', ['icon' => 'S', 'label' => 'Systems', 'alt' => 'ALT', 'menu' => 'content-options[]browser-options[]', 'tag' => 'browser-options[]menu-systems[]', 'api' => 'systems', 'onclick' => "onnus_browser_content_load('systems');", 'content' => $arr_content_systems, ]);

        // onnus_menu::schema($arr_content_venders, 'spacer', []);
        onnus_menu::schema($arr_content_browser, 'folder', ['icon' => '►', 'label' => 'Server', 'alt' => 'Onnus Browser | //server', 'onclick' => "onnus_browser_folder('..', '0');" , 'menu_id' => 0]);
        onnus_menu::schema($arr_content_browser, 'folder', ['icon' => '►', 'label' => 'Public', 'alt' => 'Onnus Browser | //root', 'onclick' => "onnus_browser_folder('.', '1');" , 'menu_id' => 1]);
        onnus_menu::schema($arr_content_browser, 'spacer', []);

        // onnus_menu::schema($arr_option_module['content'], 'toggle', ['icon' => 'B', 'label' => 'Browser', 'alt' => 'ALT', 'menu' => 'content-options[]browser-options[]', 'tag' => 'browser-options[]menu-browser[]', 'api' => 'browser', 'onclick' => "onnus_browser_content_load('browser');", 'content' => $arr_content_browser, ]);
        // onnus_menu::schema($arr_option_module['content'], 'filler', []);

        onnus_menu::schema($arr_option_module['content'], 'browser', ['icon' => 'B', 'label' => 'Browser', 'alt' => 'ALT', 'menu' => 'content-options[]browser-options[]', 'tag' => 'browser-options[]menu-browser[]', 'api' => 'browser', 'onclick' => "onnus_browser_content_load('browser');", 'content' => $arr_content_browser, ]);
        
        onnus_menu::save($arr_option_module, 'options', 'onnus-browser');
        // onnus_menu::schema($arr_option_module['content'], 'filler', []);

        // onnus_menu::browser('B', 'Browser', 'Onnus Browser | Browser', 'browser-content[]content-menu[]', 'content-menu[]menu-browser[]', 'onnus_browser_content("browser");',
        //     [
        //         0 => ['type' => 'spacer'],
        //         1 => ['icon' => '►', 'label' => 'root', 'alt' => 'Onnus Browser | //server', 'onclick' => 'onnus_browser_folder(\'..\', \'0\');' , 'menu_id' => 0],
        //         2 => ['icon' => '►', 'label' => 'public', 'alt' => 'Onnus Browser | //root', 'onclick' => 'onnus_browser_folder(\'.\', \'1\');' , 'menu_id' => 1],
        //         3 => ['type' => 'spacer'],
        //     ]
        // );

    //}

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

        // onnus_menu::schema($arr_option_sort, 'container', ['tag' => 'browser-filters', 'attributes' => 'data-onnus{color[i#6]}class{onnus-menu onnus-menu-reverse onnus-menu-closed onnus-border-left-solid-1px --onnus-tablet-position-absolute}', 'select' => 'browser-filters[]menu-label[]']);

        // // onnus_menu::schema($arr_option_sort['content'], 'filler', []);
        // onnus_menu::schema($arr_option_sort['content'], 'toggle', ['icon' => $arr_image_recent, 'label' => 'Recent', 'alt' => 'Recent Applications', 'menu' => 'content-filter[]browser-filters[]', 'tag' => 'browser-filters[]menu-recent[]', 'onclick' => "_onn_int_app_sort('recent');", ]);
        // onnus_menu::schema($arr_option_sort['content'], 'toggle', ['icon' => $arr_image_label, 'label' => 'Label', 'alt' => 'Label Applications', 'menu' => 'content-filter[]browser-filters[]', 'tag' => 'browser-filters[]menu-label[]', 'onclick' => "_onn_int_app_sort('label');", 'content' => $arr_content_label, ]);
        // onnus_menu::schema($arr_option_sort['content'], 'toggle', ['icon' => $arr_image_date, 'label' => 'Date', 'alt' => 'Date Applications', 'menu' => 'content-filter[]browser-filters[]', 'tag' => 'browser-filters[]menu-date[]', 'onclick' => "_onn_int_app_sort('date');", 'content' => $arr_content_date, ]);
        // onnus_menu::schema($arr_option_sort['content'], 'toggle', ['icon' => $arr_image_updates, 'label' => 'Updates', 'alt' => 'Updates Applications', 'menu' => 'content-filter[]browser-filters[]', 'tag' => 'browser-filters[]menu-updates[]', 'onclick' => "_onn_int_app_sort('updates');", ]);
        // onnus_menu::schema($arr_option_sort['content'], 'filler', []);

        // onnus_menu::save($arr_option_sort, 'tray-option-sort', 'onnus-interface');

    //}

    onnus_html::element('content-browser', 'class{onnus-flex-column-1 onnus-min-height-100 --onnus-tablet-overflow-y-auto}data-onnus{color[i#2]]}');

        onnus_html::element('browser-nav', 'class{onnus-flex-row-0 onnus-min-height-35px onnus-flex-middle onnus-border-bottom-solid-1px onnus-tablet-display-none}data-onnus{color[i#4]}');

            onnus_html::element('nav-menu', 'class{onnus-flex-row-1 onnus-flex-center}');

                onnus_html::element('nav-menu', 'class{onnus-margin-left-right-3px onnus-padding-3px onnus-cursor-pointer}data-onnus{color-hover[i#8]}', 'File');
                onnus_html::element('nav-menu', 'class{onnus-margin-left-right-3px onnus-padding-3px onnus-cursor-pointer}data-onnus{color-hover[i#8]}', 'Edit');
                onnus_html::element('nav-menu', 'class{onnus-margin-left-right-3px onnus-padding-3px onnus-cursor-pointer}data-onnus{color-hover[i#8]}', 'View');
                onnus_html::element('nav-menu', 'class{onnus-margin-left-right-3px onnus-padding-3px onnus-cursor-pointer}data-onnus{color-hover[i#8]}', 'Tools');
                onnus_html::element('nav-menu', 'class{onnus-margin-left-right-3px onnus-padding-3px onnus-cursor-pointer}data-onnus{color-hover[i#8]}', 'Help');

            onnus_html::element('nav-menu');

            // onnus_html::element('nav-option', 'class{onnus-flex-row-0 onnus-flex-core onnus-min-width-35px}');

                // onnus_html::image('icon-close.svg', 'onnus-interface', 'class{onnus-width-height-20px}data-onnus{color-fill[i#5]}', 'onnus_interface_content_close');
                // onnus_html::image('icon-arrow.svg', 'onnus-interface', 'class{onnus-width-height-20px onnus-transform-rotate-180deg}data-onnus{color-fill[i#5]}', 'onnus_interface_content_close');

            // onnus_html::element('nav-option');

        onnus_html::element('browser-nav');

        onnus_html::element('browser-bar', 'class{onnus-flex-row onnus-border-bottom-solid-1px}data-onnus{color[i#4]}');
        
            onnus_html::element('bar-menu', 'class{onnus-flex-row onnus-flex-core onnus-min-width-35px onnus-border-right-solid-1px onnus-cursor-pointer}');
                onnus_html::image('icon-arrow-double.svg', 'onnus-interface', 'class{onnus-width-height-20px onnus-transform-rotate-90deg onnus-cursor-pointer}data-onnus{color-fill[i#5]}', 'onnus_browser_button');
            onnus_html::element('bar-menu');
            
            onnus_html::element('bar-location', 'class{onnus-flex-row-1 onnus-flex-center onnus-padding-10px onnus-font-weight-bold}');
                echo '<span>Onnus Browser Bar</span>';
            onnus_html::element('bar-location');

            onnus_html::element('bar-option', 'class{onnus-flex-row onnus-flex-core onnus-min-width-35px onnus-border-left-solid-1px}');
                onnus_html::image('icon-arrow-double.svg', 'onnus-interface', 'class{onnus-width-height-20px onnus-transform-rotate-270deg onnus-cursor-pointer}data-onnus{color-fill[i#5]}', 'onnus_browser_button');
            onnus_html::element('bar-option');
            
        onnus_html::element('browser-bar');

        onnus_html::element('browser-content', 'class{onnus-flex-row-1 onnus-min-height-100}');

            onnus_html::element('content-options', 'class{onnus-min-height-100 onnus-overflow-y-visible onnus-overflow-x-hidden --onnus-tablet-position-relative onnus-tablet-min-width-35px}');
                onnus_menu::generate($arr_option_module);
            onnus_html::element('content-options');

            onnus_html::element('content-module', 'class{onnus-flex-row-1}');
                // include_once('dashboards.php');
                include_once($str_view . '.php');
            onnus_html::element('content-module');

            // onnus_html::element('content-filter', 'class{--onnus-tablet-position-relative onnus-tablet-min-width-35px}');
            //     onnus_menu::generate($arr_option_sort);
            // onnus_html::element('content-filter');


        onnus_html::element('browser-content');

    onnus_html::element('content-browser');

?>