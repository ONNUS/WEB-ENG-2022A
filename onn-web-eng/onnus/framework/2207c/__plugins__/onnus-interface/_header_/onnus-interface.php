<?php 

    onnus_html::element('body-interface', 'class{onnus-interface onnus-content-min onnus-overflow-hidden}');

        onnus_html::element('interface-bar', 'class{onnus-flex-row onnus-select-none onnus-tablet-padding-left-right-10px onnus-mobile-padding-left-right-5px}data-onnus{color[i#4]}');

            onnus_html::element('bar-support', 'class{onnus-flex-row-1 onnus-flex-core onnus-tablet-flex-left onnus-mobile-flex-left}'); // check into dobule flex mobile and tablet

                onnus_html::element('support-label', 'class{onnus-mobile-display-none}alt{Alt Label}', 'Status');

                onnus_html::element('support-icon', 'class{onnus-flex-row onnus-flex-core onnus-padding-right-left-4px onnus-mobile-padding-right-left-0px}alt{Alt Icon}data-onnus{color-border[i#15]}');
                    onnus_html::image('icon-support.svg', 'onnus-interface', 'class{onnus-margin-padding-2px onnus-width-height-25px}data-onnus{color-fill[i#5]}', 'onnus_interface_bar_support_icon');
                onnus_html::element('support-icon');

                onnus_html::element('support-status', 'class{onnus-mobile-display-none}alt{Alt Information}', 'On Hover Information');

            onnus_html::element('bar-support');

            onnus_html::element('bar-toggle', 'class{onnus-flex-row onnus-flex-core onnus-min-width-150px onnus-tablet-min-width-auto}');
                onnus_html::image('icon-arrow.svg', 'onnus-interface', 'class{onnus-width-height-25px}data-onnus{color-fill[i#5]}', 'onnus_interface_bar_toggle');
            onnus_html::element('bar-toggle');

            onnus_html::element('bar-close', 'class{onnus-flex-row onnus-flex-core onnus-min-width-150px onnus-tablet-min-width-auto onnus-display-none}');
                onnus_html::image('icon-close.svg', 'onnus-interface', 'class{onnus-width-height-25px}data-onnus{color-fill[i#5]}', 'onnus_interface_content_close');
            onnus_html::element('bar-close');

            onnus_html::element('bar-session', 'class{onnus-flex-row-1 onnus-flex-core onnus-tablet-flex-right onnus-mobile-flex-right}'); // check into dobule flex mobile and tablet

                onnus_html::element('session-elements', 'class{onnus-mobile-display-none}alt{HTML Elements}', '');

                onnus_html::element('session-icon', 'class{onnus-flex-row onnus-flex-core onnus-padding-right-left-4px onnus-mobile-padding-right-left-0px}alt{Status Label}');
                    onnus_html::image('icon-html.svg', 'onnus-interface', 'class{onnus-margin-padding-2px onnus-width-height-25px}data-onnus{color-fill[i#5]}', 'onnus_interface_bar_session_icon');
                onnus_html::element('session-icon');

                onnus_html::element('session-attributes', 'class{onnus-mobile-display-none}alt{HTML Attributes}', '');

            onnus_html::element('bar-session');

        onnus_html::element('interface-bar');

        onnus_html::element('interface-content', 'class{onnus-display-none onnus-flex-column-1 onnus-max-height-100 onnus-overflow-auto onnus-padding-10px onnus-tablet-padding-5px}data-onnus{color[i#16]}', '');

        onnus_html::element('interface-tray-nav', 'class{onnus-display-none onnus-select-none onnus-border-top-solid-1px onnus-tablet-padding-left-right-10px onnus-mobile-padding-left-right-5px}data-onnus{color[i#4]}');

            onnus_html::element('bar-toggle', 'class{onnus-flex-row-1 onnus-flex-core onnus-min-width-150px onnus-tablet-min-width-auto}');
                onnus_html::image('icon-arrow.svg', 'onnus-interface', 'class{onnus-width-height-25px}data-onnus{color-fill[i#5]}', 'onnus_interface_tray_close');
            onnus_html::element('bar-toggle');

        onnus_html::element('interface-tray-nav');

        onnus_html::element('interface-tray', 'class{onnus-display-none onnus-border-top-solid-1px onnus-max-min-height-250px onnus-mobile-flex-1 onnus-mobile-max-height-100 onnus-mobile-overflow-y-auto}data-onnus{color[i#2] color-border[i#4]}', '');

        onnus_html::element('interface-nav', 'class{onnus-display-none onnus-select-none onnus-border-top-solid-1px onnus-tablet-padding-left-right-10px onnus-mobile-padding-left-right-5px}data-onnus{color[i#4]}');

            onnus_html::element('nav-module', 'class{onnus-flex-row-1 onnus-flex-core onnus-tablet-flex-left}alt{Resent Modules}');

                onnus_html::image('onnus-browser.svg', 'onnus-browser', 'class{onnus-margin-right-5px onnus-width-height-25px}data-onnus{color-fill[i#5]}');
                onnus_html::image('onnus-exchange.svg', 'onnus-exchange', 'class{onnus-margin-right-5px onnus-width-height-25px onnus-mobile-display-none}data-onnus{color-fill[i#5]}');
                onnus_html::image('onnus-messenger.svg', 'onnus-messenger', 'class{onnus-margin-right-5px onnus-width-height-25px onnus-mobile-display-none}data-onnus{color-fill[i#5]}');
                onnus_html::image('tray-apps/icon-app.svg', 'onnus-interface', 'class{onnus-margin-right-5px onnus-width-height-25px onnus-mobile-display-none}data-onnus{color-fill[i#5]}');
                onnus_html::image('tray-apps/icon-app.svg', 'onnus-interface', 'class{onnus-margin-right-5px onnus-width-height-25px onnus-mobile-display-none}data-onnus{color-fill[i#5]}');

            onnus_html::element('nav-module');

            onnus_html::element('nav-menu', 'class{onnus-flex-row onnus-flex-core onnus-min-width-125px onnus-mobile-min-width-auto}alt{Navigation Menu}');

                onnus_html::element('menu-tray', '');
                    onnus_html::image('icon-applications.svg', 'onnus-interface', 'class{onnus-flex-core onnus-margin-padding-2px onnus-width-height-30px}data-onnus{color-fill[i#5]}', 'onnus_interface_nav_menu_tray');
                onnus_html::element('menu-tray');

                onnus_html::element('menu-user', '');
                    onnus_html::image('icon-user.svg', 'onnus-interface', 'class{onnus-flex-core onnus-margin-padding-2px onnus-width-height-30px}data-onnus{color-fill[i#5]}', 'onnus_interface_nav_menu_user');
                onnus_html::element('menu-user');

                onnus_html::element('menu-option', '');
                    onnus_html::image('icon-menu.svg', 'onnus-interface', 'class{onnus-flex-core onnus-margin-padding-2px onnus-width-height-30px}data-onnus{color-fill[i#5]}', 'onnus_interface_nav_menu_option');
                onnus_html::element('menu-option');

            onnus_html::element('nav-menu');

            onnus_html::element('nav-option', 'class{onnus-flex-row-1 onnus-flex-core onnus-tablet-flex-right}alt{Interface Options}');

                onnus_html::element('option-icon', '');
                    onnus_html::image('icon-settings.svg', 'onnus-interface', 'class{onnus-flex-core onnus-margin-padding-2px onnus-width-height-25px}data-onnus{color-fill[i#5]}', 'onnus_interface_nav_option_icon');
                onnus_html::element('option-icon');

            onnus_html::element('nav-option');

        onnus_html::element('interface-nav');

    onnus_html::element('body-interface');