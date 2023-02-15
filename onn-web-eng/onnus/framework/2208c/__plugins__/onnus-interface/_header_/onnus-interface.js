var obj_ele_interface;

var obj_interface_bar_toggle;
var obj_interface_bar_session_elements;
var obj_interface_bar_session_attributes;

var obj_interface_bar_toggle_icon_arrow

var obj_interface_tray;

var obj_interface_icon_selected;

var obj_interface_bar_session_icon;
var obj_interface_bar_support_icon;
var obj_interface_nav_option_icon;

var obj_interface_nav;
var obj_interface_nav_menu_tray;
var obj_interface_nav_menu_user;
var obj_interface_nav_menu_option;



onnus.data.interface = onnus.data.interface ?? [];
onnus.data.interface.tray = onnus.data.interface.tray ?? false;
onnus.data.interface.current = onnus.data.interface.current ?? false;
onnus.data.interface.application = onnus.data.interface.application ?? false;


async function onnus_interface() {

    await onnus.import(['element', 'menu']);

    obj_ele_interface = await onnus.tag.get('html[]body[]body-interface[]');

    obj_ele_interface.addEventListener("mouseover", onnus_interface_mouseover);
    obj_ele_interface.addEventListener("mouseleave", onnus_interface_mouseleave);

    obj_interface_tray = await onnus.tag.get('body-interface[]interface-tray[]');
    
    obj_interface_bar_support_icon = await onnus.tag.get('body-interface[]interface-bar[]bar-support[]support-icon[]');
    // obj_interface_bar_support_icon.addEventListener("click", onnus_interface_bar_support_icon);

    obj_interface_bar_toggle = await onnus.tag.get('body-interface[]interface-bar[]bar-toggle[]');
    // obj_interface_bar_toggle.addEventListener("click", onnus_interface_bar_toggle);

    // obj_interface_bar_toggle_icon_arrow = await onnus.tag.get('#id[icon-arrow]');
    // obj_interface_bar_toggle_icon_arrow = obj_interface_bar_toggle_icon_arrow.getSVGDocument();;
    // obj_interface_bar_toggle_icon_arrow.addEventListener("mousedown", onnus_interface_bar_toggle);

    // obj_interface_bar_toggle = await onnus.tag.get('#id[icon-arrow]');
    // obj_interface_bar_toggle.addEventListener("click", onnus_interface_bar_toggle);

    // console.log('obj_interface_bar_toggle', obj_interface_bar_toggle);
    
    // obj_interface_bar_session_icon.addEventListener("click", onnus_interface_bar_session_icon);
    
    obj_interface_bar_session_elements = await onnus.tag.get('body-interface[]interface-bar[]bar-session[]session-elements[]');
    obj_interface_bar_session_attributes = await onnus.tag.get('body-interface[]interface-bar[]bar-session[]session-attributes[]');
    
    obj_interface_nav = await onnus.tag.get('body-interface[]interface-nav[]');


    obj_interface_bar_session_icon = await onnus.tag.get('body-interface[]interface-bar[]bar-session[]session-icon[]');
    obj_interface_bar_support_icon = await onnus.tag.get('body-interface[]interface-bar[]bar-support[]support-icon[]');

    obj_interface_nav_menu_tray = await onnus.tag.get('body-interface[]interface-nav[]nav-menu[]menu-tray[]');
    obj_interface_nav_menu_user = await onnus.tag.get('body-interface[]interface-nav[]nav-menu[]menu-user[]');
    obj_interface_nav_menu_option = await onnus.tag.get('body-interface[]interface-nav[]nav-menu[]menu-option[]');

    obj_interface_nav_option_icon = await onnus.tag.get('body-interface[]interface-nav[]nav-option[]option-icon[]');
    
    // obj_interface_nav_menu_user.addEventListener("click", onnus_interface_nav_menu_user);
    // obj_interface_nav_menu_tray.addEventListener("click", onnus_interface_nav_menu_tray);

    // console.log('obj_interface_nav_menu_user', obj_interface_nav_menu_user);

    // obj_interface_nav_menu_option.addEventListener("click", onnus_interface_nav_menu_option);

    // obj_interface_nav_option_icon.addEventListener("click", onnus_interface_nav_option_icon);

    onnus_interface_bar_session();

}

onnus_interface();


async function onnus_interface_bar_session() {

    let int_elements = 0;
    let int_attribute = 0;
    let obj_elements = document.getElementsByTagName("*");


    for (let obj_element of obj_elements) {

        int_elements++;

        for (let str_attribute of obj_element.getAttributeNames()) {

            int_attribute++;

            if (str_attribute == 'alt') {
                // obj_element.addEventListener('mouseenter', status, false);
            }

        }

    }

    if (onnus.tag) {
        onnus.tag.write(obj_interface_bar_session_elements, int_elements + ' Elements');
        onnus.tag.write(obj_interface_bar_session_attributes, int_attribute + ' Attributes');
    }

}

async function onnus_interface_mouseover() {

    onnus.element.show(obj_interface_nav);

}

async function onnus_interface_mouseleave() {

    if (!onnus.data.interface.tray) {
        onnus.element.hide(obj_interface_nav);
    }

}

async function onnus_interface_tray(
    str_view = '',
) {

    if (str_view == 'toggle' && !onnus.data.interface.tray) {

        if (onnus.data.interface.current) {
            str_view = onnus.data.interface.current;
        } else {

            onnus_interface_nav_menu_tray();

            return;

        }

    } else if (str_view  == 'toggle' && onnus.data.interface.tray) {

        onnus.data.interface.tray = str_view;

    }


    if (str_view == onnus.data.interface.tray) {

        if (str_view == 'toggle') {
            onnus_interface_tray_close();
        }

    } else {

        if (obj_interface_icon_selected) {
            obj_interface_icon_selected.classList.remove('onnus-interface-icon-selected');
        }

        onnus.data.interface.current = str_view;

        if (str_view == 'applications') {
            obj_interface_icon_selected = obj_interface_nav_menu_tray;
        } else if (str_view == 'account') {
            obj_interface_icon_selected = obj_interface_nav_menu_user;
        } else if (str_view == 'options') {
            obj_interface_icon_selected = obj_interface_nav_menu_option;
        } else if (str_view == 'edit') {
            obj_interface_icon_selected = obj_interface_nav_option_icon;
        } else if (str_view == 'system') {
            obj_interface_icon_selected = obj_interface_bar_support_icon;
        } else if (str_view == 'session') {
            obj_interface_icon_selected = obj_interface_bar_session_icon;
        }

        if (obj_interface_icon_selected) {
            obj_interface_icon_selected.classList.add('onnus-interface-icon-selected');
        }

        onnus.data.interface.tray = str_view;

        obj_ele_interface.classList.add('onnus-interface-tray');
        obj_interface_bar_toggle.classList.add('onnus-interface-tray-open');

    }

}


async function onnus_interface_content_close() {

    if (onnus.data.interface.application == false) {return;}

    onnus.data.interface.application = false;
    onnus.data.interface.tray = false;

    obj_ele_interface.classList.add('onnus-content-min');
    obj_ele_interface.classList.remove('onnus-content-max');

    obj_ele_interface.classList.remove('onnus-interface-tray');
    obj_ele_interface.classList.remove('onnus-interface-application');
    obj_interface_bar_toggle.classList.remove('onnus-interface-tray-open');

    if (obj_interface_icon_selected) {
        obj_interface_icon_selected.classList.remove('onnus-interface-icon-selected');
    }

}

async function onnus_interface_tray_close() {

    onnus.data.interface.tray = false;

    obj_ele_interface.classList.remove('onnus-interface-tray');
    obj_interface_bar_toggle.classList.remove('onnus-interface-tray-open');

    if (obj_interface_icon_selected) {
        obj_interface_icon_selected.classList.remove('onnus-interface-icon-selected');
    }

}


async function onnus_interface_bar_toggle() {

    onnus_interface_tray('toggle');

}


async function onnus_interface_bar_session_icon() {

    onnus_interface_tray('session');

    if (!onnus.data.interface.tray) {return;}

    onnus.api('onnus-interface/tray/session', 'body-interface[]interface-tray[]', null, '_tray');

}

async function onnus_interface_nav_menu_tray() {

    let bol_nav_menu_tray = true;

    if (onnus.data.interface.current == 'applications') {
        bol_nav_menu_tray = false;
    }

    onnus_interface_tray('applications');


    if (!onnus.data.interface.tray || !bol_nav_menu_tray) {return;}

    onnus.api('onnus-interface/tray/applications', 'body-interface[]interface-tray[]', null, '_tray');

}

async function onnus_interface_nav_menu_user() {

    onnus_interface_tray('account');


    if (!onnus.data.interface.tray) {return;}

    onnus.api('onnus-interface/tray/account', 'body-interface[]interface-tray[]', null, '_tray');

}

async function onnus_interface_nav_menu_option() {

    onnus_interface_tray('options');


    if (!onnus.data.interface.tray) {return;}

    let arr_api_data = {};

    if (onnus.data.interface.application) {
        arr_api_data['application'] = onnus.data.interface.application;
    } else {
        arr_api_data['application'] = 'onnus-browser';
    }

    onnus.api('onnus-interface/tray/options', 'body-interface[]interface-tray[]', arr_api_data, '_tray');

}

async function onnus_interface_nav_menu_option_open(
    str_application = false
) {

    onnus_interface_tray('options');


    if (!onnus.data.interface.tray) {return;}

    let arr_api_data = {};
    arr_api_data['application'] = str_application;

    onnus.api('onnus-interface/tray/options', 'body-interface[]interface-tray[]', arr_api_data, '_tray');

}

async function onnus_interface_nav_option_icon() {

    onnus_interface_tray('edit');

    if (!onnus.data.interface.tray) {return;}

    onnus.api('onnus-interface/tray/edit', 'body-interface[]interface-tray[]', null, '_tray');

}

async function onnus_interface_bar_support_icon() {

    onnus_interface_tray('system');

    if (!onnus.data.interface.tray) {return;}

    onnus.api('onnus-interface/tray/system', 'body-interface[]interface-tray[]', null, '_tray');

}

async function onnus_interface_application(
    obj,
    event,
) {

    let str_onnus_app_mod = obj.getAttribute('data-onn-app-mod');
    let str_onnus_app_int = obj.getAttribute('data-onn-app-int') ?? 'interface';

    onnus_interface_application_open(str_onnus_app_mod, str_onnus_app_int);

    return;

    // console.log('💫========================💫');
    // console.log('💫 str_onnus_app_mod', str_onnus_app_mod);
    // console.log('💫 str_onnus_app_int', str_onnus_app_int);
    // console.log('💫obj', obj);
    // console.log('💫event', event);

    let arr_api_data = {};
    arr_api_data['application'] = str_onnus_app_mod;
    arr_api_data['interface'] = str_onnus_app_int;

    obj_ele_interface.classList.remove('onnus-content-min');
    obj_ele_interface.classList.add('onnus-content-max');

    obj_ele_interface.classList.remove('onnus-interface-tray');
    obj_ele_interface.classList.add('onnus-interface-application');

    onnus.data.interface.tray = false;
    onnus.data.interface.application = str_onnus_app_mod;

    if (obj_interface_icon_selected) {
        obj_interface_icon_selected.classList.remove('onnus-interface-icon-selected');
    }

    onnus.api('onnus-interface/application/load', 'body-interface[]interface-content[]', arr_api_data, '_application');

    // onnus.element.hide('body-interface[]interface-tray[]');

}

async function onnus_interface_application_open (
    str_application,
    str_interface,
) {

    let arr_api_data = {};

    arr_api_data['application'] = str_application;
    arr_api_data['interface'] = str_interface;

    obj_ele_interface.classList.remove('onnus-content-min');
    obj_ele_interface.classList.add('onnus-content-max');

    obj_ele_interface.classList.remove('onnus-interface-tray');
    obj_ele_interface.classList.add('onnus-interface-application');

    onnus.data.interface.tray = false;
    onnus.data.interface.application = str_application;

    if (obj_interface_icon_selected) {
        obj_interface_icon_selected.classList.remove('onnus-interface-icon-selected');
    }

    onnus.api('onnus-interface/application/load', 'body-interface[]interface-content[]', arr_api_data, '_application');

}

async function onnus_interface_application_load (
    str_application,
    str_interface,
    str_view,
) {

    let arr_api_data = {};

    arr_api_data['application'] = str_application;
    arr_api_data['interface'] = str_interface;
    arr_api_data['view'] = str_view;

    obj_ele_interface.classList.remove('onnus-content-min');
    obj_ele_interface.classList.add('onnus-content-max');

    obj_ele_interface.classList.remove('onnus-interface-tray');
    obj_ele_interface.classList.add('onnus-interface-application');

    onnus.data.interface.tray = false;
    onnus.data.interface.application = str_application;

    if (obj_interface_icon_selected) {
        obj_interface_icon_selected.classList.remove('onnus-interface-icon-selected');
    }

    onnus.api('onnus-interface/application/load', 'body-interface[]interface-content[]', arr_api_data, '_application');

}


async function onn_int_app_view_search() {

    onnus.menu.collapse('filters-menu[]menu-search[]', 'apps-filters[]filters-menu[]'); // fix for menu icon object onclick method

    onn_int_app_view('search');

}

async function onn_int_app_view_venders() {

    onnus.menu.collapse('filters-menu[]menu-venders[]', 'apps-filters[]filters-menu[]'); // fix for menu icon object onclick method

    onn_int_app_view('venders');

}

async function onn_int_app_sort_recent() {

    onnus.menu.collapse('options-menu[]menu-recent[]', 'apps-options[]options-menu[]');// fix for menu icon object onclick method

    onn_int_app_sort('recent');

}

async function onn_int_app_sort_label() {

    onnus.menu.collapse('options-menu[]menu-label[]', 'apps-options[]options-menu[]'); // fix for menu icon object onclick method

    onn_int_app_sort('label');

}

async function onn_int_app_sort_date() {

    onnus.menu.collapse('options-menu[]menu-date[]', 'apps-options[]options-menu[]'); // fix for menu icon object onclick method

    onn_int_app_sort('date');

}

async function onn_int_app_sort_updates() {

    onnus.menu.collapse('options-menu[]menu-updates[]', 'apps-options[]options-menu[]'); // fix for menu icon object onclick method

    onn_int_app_sort('updates');

}


function onnus_interface_invert(
    bol_state
) {

    onnus.data.interface.invert = bol_state;

    onnus.style.update();

}

function onnus_interface_picker(
    int_color
) {

    onnus.data.interface.schema['i'] = int_color;

    onnus.style.update();

}