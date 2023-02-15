<?php

    onnus_html::element('module-content', 'class{onnus-flex-row-1 onnus-grid-columns-3 onnus-mobile-grid-columns-1 onnus-padding-10px onnus-min-max-height-100 onnus-overflow-auto}');

        onnus_html::element('content-dashboard', 'class{onnus-flex-column onnus-margin-15px onnus-min-height-200px onnus-border-solid-1px}data-onnus{color[i#4]}');
            onnus_html::element('dashboard-header', "class{onnus-flex-0 onnus-flex-core onnus-min-height-35px onnus-border-bottom-solid-1px onnus-cursor-pointer}data-onnus{color[i#6]}onclick{onnus_browser_content_load('components');}", 'Components');
            onnus_html::element('dashboard-content', 'class{onnus-flex-column-1 onnus-flex-core onnus-min-height-35px onnus-border-bottom-solid-1px onnus-padding-top-bottom-5px}');

                onnus_html::element('content-bar', 'class{onnus-flex-row-1 onnus-max-height-25px onnus-min-width-100}');
                    onnus_html::element('bar-label', 'class{onnus-flex-row-1 onnus-flex-middle-right onnus-padding-right-5px}', "API's");
                    onnus_html::element('bar-info', 'class{onnus-flex-row-1 onnus-flex-middle onnus-padding-left-5px}', '000');
                onnus_html::element('content-bar');

                onnus_html::element('content-bar', 'class{onnus-flex-row-1 onnus-max-height-25px onnus-min-width-100}');
                    onnus_html::element('bar-label', 'class{onnus-flex-row-1 onnus-flex-middle-right onnus-padding-right-5px}', 'Pages');
                    onnus_html::element('bar-info', 'class{onnus-flex-row-1 onnus-flex-middle onnus-padding-left-5px}', '000');
                onnus_html::element('content-bar');

                onnus_html::element('content-bar', 'class{onnus-flex-row-1 onnus-max-height-25px onnus-min-width-100}');
                    onnus_html::element('bar-label', 'class{onnus-flex-row-1 onnus-flex-middle-right onnus-padding-right-5px}', 'Layouts');
                    onnus_html::element('bar-info', 'class{onnus-flex-row-1 onnus-flex-middle onnus-padding-left-5px}', '000');
                onnus_html::element('content-bar');

                onnus_html::element('content-bar', 'class{onnus-flex-row-1 onnus-max-height-25px onnus-min-width-100}');
                    onnus_html::element('bar-label', 'class{onnus-flex-row-1 onnus-flex-middle-right onnus-padding-right-5px}', 'Menus');
                    onnus_html::element('bar-info', 'class{onnus-flex-row-1 onnus-flex-middle onnus-padding-left-5px}', '000');
                onnus_html::element('content-bar');

                onnus_html::element('content-bar', 'class{onnus-flex-row-1 onnus-max-height-25px onnus-min-width-100}');
                    onnus_html::element('bar-label', 'class{onnus-flex-row-1 onnus-flex-middle-right onnus-padding-right-5px}', 'Headers');
                    onnus_html::element('bar-info', 'class{onnus-flex-row-1 onnus-flex-middle onnus-padding-left-5px}', '000');
                onnus_html::element('content-bar');

                onnus_html::element('content-bar', 'class{onnus-flex-row-1 onnus-max-height-25px onnus-min-width-100}');
                    onnus_html::element('bar-label', 'class{onnus-flex-row-1 onnus-flex-middle-right onnus-padding-right-5px}', 'Footers');
                    onnus_html::element('bar-info', 'class{onnus-flex-row-1 onnus-flex-middle onnus-padding-left-5px}', '000');
                onnus_html::element('content-bar');

                onnus_html::element('content-bar', 'class{onnus-flex-row-1 onnus-max-height-25px onnus-min-width-100}');
                    onnus_html::element('bar-label', 'class{onnus-flex-row-1 onnus-flex-middle-right onnus-padding-right-5px}', 'Elements');
                    onnus_html::element('bar-info', 'class{onnus-flex-row-1 onnus-flex-middle onnus-padding-left-5px}', '000');
                onnus_html::element('content-bar');

            onnus_html::element('dashboard-content');
        onnus_html::element('content-dashboard');

        onnus_html::element('content-dashboard', 'class{onnus-flex-column onnus-margin-15px onnus-min-height-200px onnus-border-solid-1px}data-onnus{color[i#4]}');
            onnus_html::element('dashboard-header', "class{onnus-flex-0 onnus-flex-core onnus-min-height-35px onnus-border-bottom-solid-1px onnus-cursor-pointer}data-onnus{color[i#6]}onclick{onnus_browser_content_load('resources');}", 'Resources');
            onnus_html::element('dashboard-content', 'class{onnus-flex-1 onnus-flex-core onnus-min-height-35px onnus-border-bottom-solid-1px}', '');
        onnus_html::element('content-dashboard');

        onnus_html::element('content-dashboard', 'class{onnus-flex-column onnus-margin-15px onnus-min-height-200px onnus-border-solid-1px}data-onnus{color[i#4]}');
            onnus_html::element('dashboard-header', "class{onnus-flex-0 onnus-flex-core onnus-min-height-35px onnus-border-bottom-solid-1px onnus-cursor-pointer}data-onnus{color[i#6]}onclick{onnus_browser_content_load('accounts');}", 'Accounts');
            onnus_html::element('dashboard-content', 'class{onnus-flex-1 onnus-flex-core onnus-min-height-35px onnus-border-bottom-solid-1px}', '');
        onnus_html::element('content-dashboard');

        onnus_html::element('content-dashboard', 'class{onnus-flex-column onnus-margin-15px onnus-min-height-200px onnus-border-solid-1px}data-onnus{color[i#4]}');
            onnus_html::element('dashboard-header', "class{onnus-flex-0 onnus-flex-core onnus-min-height-35px onnus-border-bottom-solid-1px onnus-cursor-pointer}data-onnus{color[i#6]}onclick{onnus_browser_content_load('systems');}", 'Systems');
            onnus_html::element('dashboard-content', 'class{onnus-flex-1 onnus-flex-core onnus-min-height-35px onnus-border-bottom-solid-1px}', '');
        onnus_html::element('content-dashboard');

        onnus_html::element('content-dashboard', 'class{onnus-flex-column onnus-margin-15px onnus-min-height-200px onnus-border-solid-1px}data-onnus{color[i#4]}');
            onnus_html::element('dashboard-header', "class{onnus-flex-0 onnus-flex-core onnus-min-height-35px onnus-border-bottom-solid-1px onnus-cursor-pointer}data-onnus{color[i#6]}onclick{onnus_browser_content_load('browser');}", 'Browser');
            onnus_html::element('dashboard-content', 'class{onnus-flex-1 onnus-flex-core onnus-min-height-35px onnus-border-bottom-solid-1px}', '');
        onnus_html::element('content-dashboard');

    onnus_html::element('module-content');

    onnus_html::element('content-filter', 'class{--onnus-tablet-position-relative onnus-border-left-solid-1px onnus-min-width-35px onnus-tablet-min-width-35px}data-onnus{color[i#6]}');
        // onnus_menu::generate($arr_option_sort);
    onnus_html::element('content-filter');

?>