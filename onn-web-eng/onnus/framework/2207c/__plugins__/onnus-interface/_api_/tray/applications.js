onnus.data.interface.browser = onnus.data.interface.browser ?? [];
onnus.data.interface.browser.view = onnus.data.interface.browser.view ?? 'venders';
onnus.data.interface.browser.mode = onnus.data.interface.browser.mode ?? 'label';


// async function onn_int_app_view_search() {
//     onnus.menu.collapse('filters-menu[]menu-search[]', 'apps-filters[]filters-menu[]'); // fix for menu icon object onclick method
//     onn_int_app_view('search');
// }

// async function onn_int_app_view_venders() {
//     onnus.menu.collapse('filters-menu[]menu-venders[]', 'apps-filters[]filters-menu[]'); // fix for menu icon object onclick method
//     onn_int_app_view('venders');
// }

// async function onn_int_app_sort_recent() {
//     onnus.menu.collapse('options-menu[]menu-recent[]', 'apps-options[]options-menu[]');// fix for menu icon object onclick method
//     onn_int_app_sort('recent');
// }

// async function onn_int_app_sort_label() {
//     onnus.menu.collapse('options-menu[]menu-label[]', 'apps-options[]options-menu[]'); // fix for menu icon object onclick method
//     onn_int_app_sort('label');
// }

// async function onn_int_app_sort_date() {
//     onnus.menu.collapse('options-menu[]menu-date[]', 'apps-options[]options-menu[]'); // fix for menu icon object onclick method
//     onn_int_app_sort('date');
// }

// async function onn_int_app_sort_updates() {
//     onnus.menu.collapse('options-menu[]menu-updates[]', 'apps-options[]options-menu[]'); // fix for menu icon object onclick method
//     onn_int_app_sort('updates');
// }

// $arr_image_recent = ['file' => 'tray-apps/icon-recent.svg', 'module' => 'onnus-interface', 'attributes' => 'class{}data-onnus{color-fill[i#5]}', 'method' => 'onn_int_app_view_recent' ];
// $arr_image_label = ['file' => 'tray-apps/icon-label.svg', 'module' => 'onnus-interface', 'attributes' => 'class{}data-onnus{color-fill[i#5]}', 'method' => 'onn_int_app_view_label' ];
// $arr_image_date = ['file' => 'tray-apps/icon-date.svg', 'module' => 'onnus-interface', 'attributes' => 'class{}data-onnus{color-fill[i#5]}', 'method' => 'onn_int_app_view_date' ];
// $arr_image_updates = ['file' => 'tray-apps/icon-updates.svg', 'module' => 'onnus-interface', 'attributes' => 'class{}data-onnus{color-fill[i#5]}', 'method' => 'onn_int_app_view_updates' ];


async function onn_int_app_view(
    str_view = null,
) {

    if (str_view) {

        if (onnus.data.interface.browser.view == str_view) {
            return;
        } else {
            onnus.data.interface.browser.view = str_view;
        }

    }

    arr_api_data = {};
    arr_api_data['sort'] = onnus.data.interface.browser.mode;

    if (onnus.data.interface.browser.view == 'search') {
        onnus.api('onnus-interface/tray/applications/search', 'body-interface[]interface-tray[]tray-apps[]apps-browser[]', arr_api_data, '_tray');
    } else if (onnus.data.interface.browser.view == 'venders') {
        onnus.api('onnus-interface/tray/applications/venders', 'body-interface[]interface-tray[]tray-apps[]apps-browser[]', arr_api_data, '_tray');
    }

}

async function onn_int_app_sort(
    str_sort = '',
) {

    if (str_sort) {

        if (onnus.data.interface.browser.mode == str_sort) {
            return;
        } else {
            onnus.data.interface.browser.mode = str_sort;
        }

    }

    arr_api_data = {};
    arr_api_data['sort'] = onnus.data.interface.browser.mode;

    if (onnus.data.interface.browser.view == 'search') {
        onnus.api('onnus-interface/tray/applications/search', 'body-interface[]interface-tray[]tray-apps[]apps-browser[]', arr_api_data, '_tray');
    } else if (onnus.data.interface.browser.view == 'venders') {
        onnus.api('onnus-interface/tray/applications/venders', 'body-interface[]interface-tray[]tray-apps[]apps-browser[]', arr_api_data, '_tray');
    }

}


async function onn_int_app_list_reverse(
    bol_reverse = true
) {

    let obj_int_tra_app_browser_list_grid;

    obj_int_tra_app_browser_list_grid = await onnus.tag.get('body-interface[]interface-tray[]tray-apps[]apps-browser[]browser-list[]list-grid[]');

    if (bol_reverse == true) {
        obj_int_tra_app_browser_list_grid.style.flexDirection = 'row-reverse';
        obj_int_tra_app_browser_list_grid.style.flexWrap = "wrap-reverse";
    } else {
        obj_int_tra_app_browser_list_grid.style.flexDirection = 'row';
        obj_int_tra_app_browser_list_grid.style.flexWrap = "wrap";
    }
    
}