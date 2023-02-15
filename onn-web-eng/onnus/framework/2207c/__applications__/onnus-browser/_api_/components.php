<?php

onnus_html::element('module-content', 'class{onnus-flex-row-1 onnus-grid-columns-3 onnus-mobile-grid-columns-1 onnus-padding-10px onnus-min-max-height-100 onnus-overflow-auto}');

        onnus_html::element('content-dashboard', 'class{onnus-flex-column onnus-margin-15px onnus-min-height-200px onnus-border-solid-1px}data-onnus{color[i#4]}');
            onnus_html::element('dashboard-header', "class{onnus-flex-0 onnus-flex-core onnus-min-height-35px onnus-border-bottom-solid-1px onnus-cursor-pointer}data-onnus{color[i#6]}onclick{onnus_browser_content_load('components/apis');}", "API's");
            onnus_html::element('dashboard-content', 'class{onnus-flex-1 onnus-flex-core onnus-min-height-35px onnus-border-bottom-solid-1px}', '');
        onnus_html::element('content-dashboard');

        onnus_html::element('content-dashboard', 'class{onnus-flex-column onnus-margin-15px onnus-min-height-200px onnus-border-solid-1px}data-onnus{color[i#4]}');
            onnus_html::element('dashboard-header', "class{onnus-flex-0 onnus-flex-core onnus-min-height-35px onnus-border-bottom-solid-1px onnus-cursor-pointer}data-onnus{color[i#6]}onclick{onnus_browser_content_load('components/pages');}", 'Pages');
            onnus_html::element('dashboard-content', 'class{onnus-flex-1 onnus-flex-core onnus-min-height-35px onnus-border-bottom-solid-1px}', '');
        onnus_html::element('content-dashboard');

        onnus_html::element('content-dashboard', 'class{onnus-flex-column onnus-margin-15px onnus-min-height-200px onnus-border-solid-1px}data-onnus{color[i#4]}');
            onnus_html::element('dashboard-header', "class{onnus-flex-0 onnus-flex-core onnus-min-height-35px onnus-border-bottom-solid-1px onnus-cursor-pointer}data-onnus{color[i#6]}onclick{onnus_browser_content_load('components/layouts');}", 'Layouts');
            onnus_html::element('dashboard-content', 'class{onnus-flex-1 onnus-flex-core onnus-min-height-35px onnus-border-bottom-solid-1px}', '');
        onnus_html::element('content-dashboard');

        onnus_html::element('content-dashboard', 'class{onnus-flex-column onnus-margin-15px onnus-min-height-200px onnus-border-solid-1px}data-onnus{color[i#4]}');
            onnus_html::element('dashboard-header', "class{onnus-flex-0 onnus-flex-core onnus-min-height-35px onnus-border-bottom-solid-1px onnus-cursor-pointer}data-onnus{color[i#6]}onclick{onnus_browser_content_load('components/menus');}", 'Menus');
            onnus_html::element('dashboard-content', 'class{onnus-flex-1 onnus-flex-core onnus-min-height-35px onnus-border-bottom-solid-1px}', '');
        onnus_html::element('content-dashboard');

        onnus_html::element('content-dashboard', 'class{onnus-flex-column onnus-margin-15px onnus-min-height-200px onnus-border-solid-1px}data-onnus{color[i#4]}');
            onnus_html::element('dashboard-header', "class{onnus-flex-0 onnus-flex-core onnus-min-height-35px onnus-border-bottom-solid-1px onnus-cursor-pointer}data-onnus{color[i#6]}onclick{onnus_browser_content_load('components/headers');}", 'Headers');
            onnus_html::element('dashboard-content', 'class{onnus-flex-1 onnus-flex-core onnus-min-height-35px onnus-border-bottom-solid-1px}', '');
        onnus_html::element('content-dashboard');

        onnus_html::element('content-dashboard', 'class{onnus-flex-column onnus-margin-15px onnus-min-height-200px onnus-border-solid-1px}data-onnus{color[i#4]}');
            onnus_html::element('dashboard-header', "class{onnus-flex-0 onnus-flex-core onnus-min-height-35px onnus-border-bottom-solid-1px onnus-cursor-pointer}data-onnus{color[i#6]}onclick{onnus_browser_content_load('components/footers');}", 'Footers');
            onnus_html::element('dashboard-content', 'class{onnus-flex-1 onnus-flex-core onnus-min-height-35px onnus-border-bottom-solid-1px}', '');
        onnus_html::element('content-dashboard');

        onnus_html::element('content-dashboard', 'class{onnus-flex-column onnus-margin-15px onnus-min-height-200px onnus-border-solid-1px}data-onnus{color[i#4]}');
            onnus_html::element('dashboard-header', "class{onnus-flex-0 onnus-flex-core onnus-min-height-35px onnus-border-bottom-solid-1px onnus-cursor-pointer}data-onnus{color[i#6]}onclick{onnus_browser_content_load('components/elements');}", 'Elements');
            onnus_html::element('dashboard-content', 'class{onnus-flex-1 onnus-flex-core onnus-min-height-35px onnus-border-bottom-solid-1px}', '');
        onnus_html::element('content-dashboard');

        // onnus_html::element('content-dashboard', 'class{onnus-margin-15px onnus-min-height-150px}data-onnus{color[i#4]}', 'APIs');
        // onnus_html::element('content-dashboard', 'class{onnus-margin-15px onnus-min-height-150px}data-onnus{color[i#4]}', 'Pages');
        // onnus_html::element('content-dashboard', 'class{onnus-margin-15px onnus-min-height-150px}data-onnus{color[i#4]}', 'Layouts');

        // onnus_html::element('content-dashboard', 'class{onnus-margin-15px onnus-min-height-150px}data-onnus{color[i#4]}', 'Menus');
        // onnus_html::element('content-dashboard', 'class{onnus-margin-15px onnus-min-height-150px}data-onnus{color[i#4]}', 'Headers');
        // onnus_html::element('content-dashboard', 'class{onnus-margin-15px onnus-min-height-150px}data-onnus{color[i#4]}', 'Footers');

        // onnus_html::element('content-dashboard', 'class{onnus-margin-15px onnus-min-height-150px}data-onnus{color[i#4]}', 'Elements');

    onnus_html::element('module-content');

    onnus_html::element('content-filter', 'class{--onnus-tablet-position-relative onnus-border-left-solid-1px onnus-min-width-35px onnus-tablet-min-width-35px}data-onnus{color[i#6]}');
        // onnus_menu::generate($arr_option_sort);
    onnus_html::element('content-filter');

?>