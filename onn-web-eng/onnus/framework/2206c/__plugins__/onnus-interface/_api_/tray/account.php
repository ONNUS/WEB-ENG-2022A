<?php 

    onnus_html::element('tray-account', 'class{onnus-flex-row-1 onnus-mobile-flex-column-1 onnus-interface-account-profile}');

        onnus_html::element('account-avatar', 'class{onnus-flex-row-1 onnus-flex-core onnus-border-right-solid-1px onnus-mobile-border-right-solid-0px onnus-mobile-border-bottom-solid-1px}');
            onnus_html::image('icon-user.svg', 'onnus-interface', 'class{onnus-width-height-160px}data-onnus{color-fill[i#5]}');
        onnus_html::element('account-avatar');

        onnus_html::element('account-options', 'class{onnus-flex-column-1 onnus-flex-core onnus-border-right-solid-1px onnus-mobile-border-right-solid-0px onnus-mobile-border-bottom-solid-1px}');

            $str_option_class = 'class{onnus-margin-5px onnus-cursor-pointer onnus-select-none onnus-padding-top-bottom-5px onnus-padding-left-right-20px}';

            onnus_html::element('options-profile', $str_option_class . 'data-onnus{color-hover[i#3]}onclick{onn_int_acc_options_profile();}', 'Profile');
            onnus_html::element('options-interface', $str_option_class . 'data-onnus{color-hover[i#3]}onclick{onn_int_acc_options_interface();}', 'Interface');
            onnus_html::element('options-settings', $str_option_class . 'data-onnus{color-hover[i#3]}onclick{onn_int_acc_options_settings();}', 'Settings');
            onnus_html::element('options-sessions', $str_option_class . 'data-onnus{color-hover[i#3]}onclick{onn_int_acc_options_sessions();}', 'Sessions');

        onnus_html::element('account-options');

        onnus_html::element('account-content', 'class{onnus-flex-column-1 onnus-flex-core onnus-text-align-center onnus-mobile-padding-top-bottom-5px onnus-mobile-padding-left-right-20px}');

            include_once('account/profile.php');
            
        onnus_html::element('account-content');

    onnus_html::element('tray-account');

?>