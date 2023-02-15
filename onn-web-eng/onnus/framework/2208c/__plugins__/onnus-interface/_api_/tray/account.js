var obj_onn_int_tray_account;
var obj_onn_int_acc_options_profile;
var obj_onn_int_acc_options_interface;
var obj_onn_int_acc_options_settings;
var obj_onn_int_acc_options_sessions;
var obj_onn_int_acc_options_logout;


async function onnus_interface_account() {

    obj_onn_int_tray_account = await onnus.tag.get('interface-tray[]tray-account[]');
    obj_onn_int_acc_options_profile = await onnus.tag.get('interface-tray[]tray-account[]account-options[]options-profile[]');
    obj_onn_int_acc_options_interface = await onnus.tag.get('interface-tray[]tray-account[]account-options[]options-interface[]');
    obj_onn_int_acc_options_settings = await onnus.tag.get('interface-tray[]tray-account[]account-options[]options-settings[]');
    obj_onn_int_acc_options_sessions = await onnus.tag.get('interface-tray[]tray-account[]account-options[]options-sessions[]');
    obj_onn_int_acc_options_logout = await onnus.tag.get('interface-tray[]tray-account[]account-options[]options-logout[]');

    // obj_onn_int_acc_options_profile.addEventListener("click", onn_int_acc_options_profile);
    // obj_onn_int_acc_options_interface.addEventListener("click", onn_int_acc_options_interface);
    // obj_onn_int_acc_options_settings.addEventListener("click", onn_int_acc_options_settings);
    // obj_onn_int_acc_options_sessions.addEventListener("click", onn_int_acc_options_sessions);
    // obj_onn_int_acc_options_logout.addEventListener("click", onn_int_acc_options_logout);

}

onnus_interface_account();


async function onn_int_acc_options_profile() {
    onn_int_acc_options_select('profile');
}

async function onn_int_acc_options_interface() {
    onn_int_acc_options_select('interface');
}

async function onn_int_acc_options_settings() {
    onn_int_acc_options_select('settings');
}

async function onn_int_acc_options_sessions() {
    onn_int_acc_options_select('sessions');
}

async function onn_int_acc_options_logout() {
    onn_int_acc_options_select('logout');
}


async function onn_int_acc_options_select(
    str_mode = '',
) {

    let obj_onn_int_tray_account_tmp = await onnus.tag.get('interface-tray[]tray-account[]');

    if (str_mode == 'profile') {
        str_class = 'onnus-interface-account-profile';
    } else if (str_mode == 'interface') {
        str_class = 'onnus-interface-account-interface';
    } else if (str_mode == 'settings') {
        str_class = 'onnus-interface-account-settings';
    } else if (str_mode == 'sessions') {
        str_class = 'onnus-interface-account-sessions';
    } else if (str_mode == 'logout') {
        str_class = 'onnus-interface-account-logout';
    }

    obj_onn_int_tray_account_tmp.removeAttribute('class');

    obj_onn_int_tray_account_tmp.classList.add('onnus-flex-row-1');
    obj_onn_int_tray_account_tmp.classList.add('onnus-mobile-flex-column-1');
    obj_onn_int_tray_account_tmp.classList.add(str_class);

    onnus.api('onnus-interface/tray/account/' + str_mode, 'interface-tray[]tray-account[]account-content[]', null, '_tray');

}