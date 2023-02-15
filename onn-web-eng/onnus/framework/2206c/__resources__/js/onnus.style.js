// export async function __construct () {}
export async function constructor () {

    onnus.data.interface = onnus.data.interface ?? [];
    onnus.data.interface.schema = onnus.data.interface.schema ?? [];
    onnus.data.interface.invert = onnus.data.interface.invert ?? false;

    onnus.data.interface.schema['i'] = 0;

}


export async function debug () {

    console.log('💫 onnus_style.debug(); 💫');

    // var doc_svg = document.getElementById("onnus-browser").getSVGDocument();
    var doc = document.getElementById("onnus-browser");
    var doc_svg = doc.getSVGDocument();
    
    console.log('doc', doc_svg);
    
    if (doc_svg === null) {return;}

    console.log('doc.type', doc.type);
    console.log('doc_svg.getElementById("onnus-browser").style.fill', doc_svg.getElementById("onnus-browser").style.fill);

    doc_svg.getElementById("onnus-browser").style.fill = '#f94d4d';

    // doc_svg.getElementById("onnus-browser").setAttribute("fill", "#f94d4d");
    // doc.getElementById("XMLID_84_").removeAttribute("class");


}


export async function update() {

    for (let obj_element of document.getElementsByTagName("*")) {

        for (let str_attribute of obj_element.getAttributeNames()) {

            if (str_attribute != 'data-onnus') {continue;}

            for (let str_function of obj_element.getAttribute(str_attribute).split(']')) {

                if (!str_function) {continue;}

                let arr_function = str_function.split('[');
                
                if (obj_element.tagName.toLowerCase() === 'object' || obj_element.id) {

                    let obj_svg = obj_element.getSVGDocument();

                    if (!obj_svg) {continue;}

                    let obj_svg_class = obj_svg.getElementsByClassName('cls-1');

                    if (obj_svg) {
                        obj_svg_class[0].style.fill = await color(arr_function[1].trim(), 1);
                    }

                } else {
                    this.element(obj_element, arr_function[0].trim(), arr_function[1].trim());
                }

                
            }
            
        }

    }

}

export async function element(
    str_obj,
    str_fun_name,
    str_fun_values
) {

    let obj_tag = await onnus.tag.get_set(str_obj);


    let bol_backgroundColor, bol_borderColor, bol_fontColor;
    let bol_backgroundColor_hover, bol_borderColor_hover, bol_fontColor_hover;


    if (str_fun_name == 'schema') {

        let arr_schema = str_fun_values.split('#');

        onnus.data.interface = onnus.data.interface ?? []; 
        onnus.data.interface.schema = onnus.data.interface.schema ?? []; 

        onnus.data.interface.schema[arr_schema[0]] = arr_schema[1];

    } else if (str_fun_name == 'color') {

        bol_backgroundColor = true;
        bol_borderColor = true;
        bol_fontColor = true;
        
    } else if (str_fun_name == 'color-hover') {

        bol_backgroundColor_hover = true;
        bol_borderColor_hover = true;
        bol_fontColor_hover = true;

    } else if (str_fun_name == 'color-background') {

        bol_backgroundColor = true;

    } else if (str_fun_name == 'color-border') {

        bol_borderColor = true;

    } else if (str_fun_name == 'color-font') {

        bol_fontColor = true;

    } else if (str_fun_name == 'color-background-hover') {

        bol_backgroundColor_hover = true;

    } else if (str_fun_name == 'color-border-hover') {

        bol_borderColor_hover = true;

    } else if (str_fun_name == 'color-font-hover') {

        bol_fontColor_hover = true;

    }

    if (bol_backgroundColor_hover) {

        obj_tag.dataset.onnBacCol = obj_tag.dataset.onnBacCol ??  obj_tag.style.backgroundColor;
        obj_tag.dataset.onnBacColMouEnt = await color(str_fun_values,0);

        obj_tag.addEventListener('mouseenter', backgroundColor, false);
        obj_tag.addEventListener('mouseleave', backgroundColor, false);

    } else if (bol_backgroundColor) {

        backgroundColor(obj_tag, str_fun_values, 0);

    }

    if (bol_borderColor_hover) {

        obj_tag.dataset.onnBorCol = obj_tag.dataset.onnBorCol ??  obj_tag.style.borderColor;
        obj_tag.dataset.onnBorColMouEnt = await color(str_fun_values,1);

        obj_tag.addEventListener('mouseenter', borderColor, false);
        obj_tag.addEventListener('mouseleave', borderColor, false);

    } else if (bol_borderColor) {

        borderColor(obj_tag, str_fun_values, 1);

    }

    if (bol_fontColor_hover) {

        obj_tag.dataset.onnFonCol = obj_tag.dataset.onnFonCol ??  obj_tag.style.color;
        obj_tag.dataset.onnFonColMouEnt = await color(str_fun_values,2);

        obj_tag.addEventListener('mouseenter', fontColor, false);
        obj_tag.addEventListener('mouseleave', fontColor, false);

    } else if (bol_fontColor) {

        fontColor(obj_tag, str_fun_values, 2);

    }

}

export async function color(
    str_values,
    int_mode
) {

    let bol_multiplier, bol_scheme;

    let int_hue, int_saturation, int_lightness, int_lightness_color, int_lightness_inverted;
    
    let arr_schema = str_values.split('#');
    let arr_color_schema = str_values.split('-');
    let arr_fun_pipe = str_values.split('|');
    let arr_fun_comma = str_values.split(',');


    if (arr_schema.length >= 2) {

        onnus.data.interface = onnus.data.interface ?? [];
        onnus.data.interface.schema = onnus.data.interface.schema ?? [];

        if (onnus.data.interface.schema[arr_schema[0]] >= 0) {

            bol_multiplier = true;
            bol_scheme = true;

            int_hue = onnus.data.interface.schema[arr_schema[0]] ?? 0;
            int_lightness = arr_schema[1] ?? 50;
            int_saturation = arr_schema[2] ?? 100;

            if (onnus.data.interface.invert) {
                int_lightness = 20 - int_lightness;
            }

        }

    } else if (arr_fun_pipe.length >= 2) {

        bol_multiplier = true;
        bol_scheme = false;

        int_hue = arr_fun_pipe[0] ?? 0;
        int_lightness = arr_fun_pipe[1] ?? 50;
        int_saturation = arr_fun_pipe[2] ?? 100;

    } else if (arr_color_schema.length >= 2) {

        bol_multiplier = true;
        bol_scheme = true;

        int_hue = arr_color_schema[0] ?? 0;
        int_lightness = arr_color_schema[1] ?? 50;
        int_saturation = arr_color_schema[2] ?? 100;

    } else if (arr_fun_comma.length >= 2) {

        bol_multiplier = false;
        bol_scheme = false;

        int_hue = arr_fun_comma[0] ?? 0;
        int_lightness = arr_fun_comma[1] ?? 50;
        int_saturation = arr_fun_comma[2] ?? 100;

    }

    if (bol_multiplier) {

        if (int_hue == 0) {int_saturation = 0;}

        if (int_hue <= 25) {
            int_hue = (int_hue - 1) * 15;
        }

        if (int_lightness <= 20) {
            int_lightness = int_lightness * 5;
        }

        if (int_saturation <= 10) {
            int_saturation = int_saturation * 10;
        }

    }

    if (bol_scheme) {

        if (int_lightness >= 0 && int_lightness <= 15) {
            int_lightness_color = 75;
        } else if (int_lightness >= 15 && int_lightness <= 25) {
            int_lightness_color = 80;
        } else if (int_lightness >= 25 && int_lightness <= 35) {
            int_lightness_color = 85;
        } else if (int_lightness >= 35 && int_lightness <= 40) {
            int_lightness_color = 90;
        } else if (int_lightness >= 40 && int_lightness <= 45) {
            int_lightness_color = 95;
        } else if (int_lightness >= 45 && int_lightness <= 55) {
            int_lightness_color = 25;
        } else if (int_lightness >= 55 && int_lightness <= 75) {
            int_lightness_color = 30;
        } else if (int_lightness >= 75 && int_lightness <= 85) {
            int_lightness_color = 35;
        } else {
            int_lightness_color = 30;
        }
        
    }

    if (int_mode == 1) {

        if (onnus.data.interface.invert) {

        } else {
            // int_lightness_inverted = 100 - int_lightness;
        }
        int_lightness_inverted = 100 - int_lightness;

        int_lightness = int_lightness_inverted;

    } else if (int_mode == 2) {

        int_lightness = int_lightness_color;

    }

    // if (onnus.data.interface.invert) {
    //     int_lightness = 100 - int_lightness;
    // }

    return 'hsl(' + int_hue + ', ' + int_saturation + '%, ' + int_lightness + '%)';

}

export async function backgroundColor(
    str_obj,
    str_values,
    str_color_mode
) {

    let obj_tag = await onnus.tag.get_set(str_obj);


    if (obj_tag.type == 'mouseenter') {
        obj_tag.target.style.backgroundColor = obj_tag.target.dataset.onnBacColMouEnt;
    } else if (obj_tag.type == 'mouseleave') {
        obj_tag.target.style.backgroundColor = obj_tag.target.dataset.onnBacCol;
    } else {

        let str_color_code = await color(str_values, str_color_mode);

        obj_tag.dataset.onnBacCol = str_color_code;

        obj_tag.style.backgroundColor = str_color_code;

    }

}

export async function borderColor(
    str_obj,
    str_values,
    str_color_mode
) {

    let obj_tag = await onnus.tag.get_set(str_obj);


    if (obj_tag.type == 'mouseenter') {
        obj_tag.target.style.borderColor = obj_tag.target.dataset.onnBorColMouEnt;
    } else if (obj_tag.type == 'mouseleave') {
        obj_tag.target.style.borderColor = obj_tag.target.dataset.onnBorCol;
    } else {

        let str_color_code = await color(str_values, str_color_mode);

        obj_tag.dataset.onnBorCol = str_color_code;

        obj_tag.style.borderColor = str_color_code;

    }

}

export async function fontColor(
    str_obj,
    str_values,
    str_color_mode
) {

    let obj_tag = await onnus.tag.get_set(str_obj);


    if (obj_tag.type == 'mouseenter') {
        obj_tag.target.style.color = obj_tag.target.dataset.onnFonColMouEnt;
    } else if (obj_tag.type == 'mouseleave') {
        obj_tag.target.style.color = obj_tag.target.dataset.onnFonCol;
    } else {

        let str_color_code = await color(str_values, str_color_mode);

        obj_tag.dataset.onnFonCol = str_color_code;

        obj_tag.style.color = str_color_code;

    }

}