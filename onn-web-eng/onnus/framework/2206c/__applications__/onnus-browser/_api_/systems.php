<?php

    onnus_html::element('module-content', 'class{onnus-flex-row-1 onnus-grid-columns-2 onnus-mobile-grid-columns-1 onnus-padding-10px onnus-min-max-height-100 onnus-overflow-auto}');

        onnus_html::element('content-dashboard', 'class{onnus-flex-column onnus-margin-15px onnus-min-height-200px onnus-border-solid-1px}data-onnus{color[i#4]}');
            onnus_html::element('dashboard-header', "class{onnus-flex-0 onnus-flex-core onnus-min-height-35px onnus-border-bottom-solid-1px onnus-cursor-pointer}data-onnus{color[i#6]}onclick{onnus_browser_content_load('systems/onnus');}", 'Onnus');
            onnus_html::element('dashboard-content', 'class{onnus-flex-1 onnus-flex-core onnus-min-height-35px onnus-border-bottom-solid-1px}', '');
        onnus_html::element('content-dashboard');

        onnus_html::element('content-dashboard', 'class{onnus-flex-column onnus-margin-15px onnus-min-height-200px onnus-border-solid-1px}data-onnus{color[i#4]}');
            onnus_html::element('dashboard-header', "class{onnus-flex-0 onnus-flex-core onnus-min-height-35px onnus-border-bottom-solid-1px onnus-cursor-pointer}data-onnus{color[i#6]}onclick{onnus_browser_content_load('systems/data');}", 'Data');
            onnus_html::element('dashboard-content', 'class{onnus-flex-1 onnus-flex-core onnus-min-height-35px onnus-border-bottom-solid-1px}', '');
        onnus_html::element('content-dashboard');

        onnus_html::element('content-dashboard', 'class{onnus-flex-column onnus-margin-15px onnus-min-height-200px onnus-border-solid-1px}data-onnus{color[i#4]}');
            onnus_html::element('dashboard-header', "class{onnus-flex-0 onnus-flex-core onnus-min-height-35px onnus-border-bottom-solid-1px onnus-cursor-pointer}data-onnus{color[i#6]}onclick{onnus_browser_content_load('systems/debug');}", 'Debug');
            onnus_html::element('dashboard-content', 'class{onnus-flex-1 onnus-flex-core onnus-min-height-35px onnus-border-bottom-solid-1px}', '');
        onnus_html::element('content-dashboard');

        onnus_html::element('content-dashboard', 'class{onnus-flex-column onnus-margin-15px onnus-min-height-200px onnus-border-solid-1px}data-onnus{color[i#4]}');
            onnus_html::element('dashboard-header', "class{onnus-flex-0 onnus-flex-core onnus-min-height-35px onnus-border-bottom-solid-1px onnus-cursor-pointer}data-onnus{color[i#6]}onclick{onnus_browser_content_load('systems/logs');}", 'Logs');
            onnus_html::element('dashboard-content', 'class{onnus-flex-1 onnus-flex-core onnus-min-height-35px onnus-border-bottom-solid-1px}', '');
        onnus_html::element('content-dashboard');

        // onnus_html::element('content-dashboard', 'class{onnus-margin-15px onnus-min-height-200px}data-onnus{color[i#4]}', 'Onnus');
        // onnus_html::element('content-dashboard', 'class{onnus-margin-15px onnus-min-height-200px}data-onnus{color[i#4]}', 'Data');
        // onnus_html::element('content-dashboard', 'class{onnus-margin-15px onnus-min-height-200px}data-onnus{color[i#4]}', 'Debug');
        // onnus_html::element('content-dashboard', 'class{onnus-margin-15px onnus-min-height-200px}data-onnus{color[i#4]}', 'Logs');

    onnus_html::element('module-content');

    onnus_html::element('content-filter', 'class{--onnus-tablet-position-relative onnus-border-left-solid-1px onnus-min-width-35px onnus-tablet-min-width-35px}data-onnus{color[i#6]}');
        // onnus_menu::generate($arr_option_sort);
    onnus_html::element('content-filter');

?>