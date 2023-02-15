<?php 

    $str_button_class = 'class{onnus-margin-5px onnus-border-solid-2px onnus-select-none onnus-cursor-pointer onnus-padding-top-bottom-5px onnus-padding-left-right-20px}';

    onnus_html::element('content-interface', 'class{onnus-flex-column-1 onnus-flex-core onnus-min-height-100}');

        onnus_html::element('interface-size', 'class{onnus-flex-column-1 onnus-flex-core}');
            onnus_html::element('b', '', 'Interface Size');
            onnus_html::element('button', $str_button_class . 'data-onnus{color[i#5] color-hover[i#15]}', 'Normal');
        onnus_html::element('interface-size');

        onnus_html::element('interface-invert', 'class{onnus-flex-column-1 onnus-flex-core}');
            onnus_html::element('b', '', 'Invert Interface');
            onnus_html::element('button', $str_button_class . 'data-onnus{color[i#15] color-hover[i#5]}onclick{onnus_interface_invert(true);}', 'Light');
            onnus_html::element('button', $str_button_class . 'data-onnus{color[i#5] color-hover[i#15]}onclick{onnus_interface_invert(false);}', 'Dark');
        onnus_html::element('interface-invert');

    onnus_html::element('content-interface');


    onnus_html::element('content-picker', 'class{onnus-flex-column-2 onnus-flex-left-middle onnus-mobile-padding-top-bottom-15px}');

        onnus_html::element('picker-header', '', '<b>Interface Color</b>');

        onnus_html::element('picker-colors', 'class{onnus-flex-1 onnus-margin-5px onnus-grid-rows-5 onnus-grid-columns-5}');

            $str_color_option_class = 'onnus-flex-core onnus-max-min-height-25px onnus-max-min-width-25px onnus-margin-3px onnus-border-solid-5px onnus-select-none onnus-cursor-pointer';
            $str_color_option_class .= ' onnus-mobile-max-min-height-40px onnus-mobile-max-min-width-40px onnus-mobile-margin-5px';

            for ($int = 0; $int <= 24; $int++) {
                onnus_html::element('colors-option', "class{{$str_color_option_class}}data-onnus{color[{$int}-5] color-hover[{$int}-15]}onclick{onnus_interface_picker({$int});}", $int);
            }

        onnus_html::element('picker-colors');

    onnus_html::element('content-picker');

?>