// export async function __construct () {}
export async function constructor() {}


export async function debug() {

    console.log('🔆 onnus_tag.debug(); 🔆');

    let obj_tag_set = await onnus['tag'].set('html[]body[]debug[]div[3]');
    console.log("💢 let obj_tag_set = await onnus['tag'].set('html[]body[]debug[]div[3]'); 💢\n", obj_tag_set);

    let obj_tag_get = await onnus['tag'].get('html[]body[]debug[]div[1]');
    obj_tag_get.innerHTML = 'DEBUG | onnus_tag | get | html[]body[]debug[]div[1]';

    console.log("💢 let obj_tag_get = await onnus['tag'].get('html[]body[]debug[]div[1]'); 💢\n", obj_tag_get);
    console.log("💢 obj_tag_get.innerHTML =", obj_tag_get.innerHTML, ' 💢');

}


export async function get(
    str_slm_tag
) {

    let arr_slm_tag = str_slm_tag.split("]");
    let obj_get_element = null;


    for (let int in arr_slm_tag) {

        if (arr_slm_tag[int]) {

            let arr_tag_tags = arr_slm_tag[int].split("[");
            let str_tag_name = arr_tag_tags[0];
            let int_tag_value = arr_tag_tags[1] || 0;
            let obj_child_element = null;


            if (str_tag_name.toLowerCase() == '#id') {

                obj_get_element = document.getElementById(int_tag_value);

                // console.log('2 str_tag_name =',typeof obj_get_element);
                // return obj_get_element;

            } else if (!obj_get_element) {

                obj_get_element = document.getElementsByTagName(str_tag_name)[int_tag_value];
                
            } else {

                obj_child_element = obj_get_element.getElementsByTagName(str_tag_name)[int_tag_value];

                obj_get_element = obj_child_element;

            }

            if (!obj_get_element) {
                return null;
            }

        }

    }

    return obj_get_element;

}

export async function set(
    str_slm_tag
) {

    let arr_slm_tag = str_slm_tag.split("]");

    let obj_set_tag = null, obj_set_element = null;
    let obj_child_tag = null, obj_child_element = null;


    for (let int in arr_slm_tag) {

        if (arr_slm_tag[int]) {

            let arr_tag_tags = arr_slm_tag[int].split("[");

            let str_tag_name = arr_tag_tags[0];
            let int_tag_value = arr_tag_tags[1] || 0;

            if (obj_set_element == null) {

                obj_set_element = document.getElementsByTagName(str_tag_name)[int_tag_value];

                if (obj_set_element == null) {

                    for (let int = 0; int <= int_tag_value; int++) {
                        document.body.appendChild(document.createElement(str_tag_name));
                    }

                }

                obj_set_tag = document.getElementsByTagName(str_tag_name);
                obj_set_element = obj_set_tag[int_tag_value];

            } else {

                obj_child_tag = obj_set_element.getElementsByTagName(str_tag_name);
                obj_child_element = obj_child_tag[int_tag_value];

                if (obj_child_element == null) {

                    for (let int = 0; int <= int_tag_value; int++) {

                        if (obj_child_tag[int] == null) {
                            obj_set_element.appendChild(document.createElement(str_tag_name));
                        }

                    }

                    obj_child_tag = obj_set_element.getElementsByTagName(str_tag_name);
                    obj_child_element = obj_child_tag[int_tag_value];

                }

                obj_set_tag = obj_child_tag;
                obj_set_element = obj_child_element;

            }
            
        }

    }

    return obj_set_element;

}

export async function get_set(
    str_obj
) {

    let obj_tag;


    if (typeof str_obj == 'string') {

        obj_tag = await get(str_obj);

        if (obj_tag == undefined) {
            obj_tag = await set(str_obj);
        }

    } else if (typeof str_obj == 'object') {

        obj_tag = str_obj;

    }

    return obj_tag;

}


export async function exist(
    str_obj_tag
) {

    let arr_slm_tag = str_obj_tag.split("]");
    let obj_get_element = null;

    for (let int in arr_slm_tag) {

        if (arr_slm_tag[int]) {

            let arr_tag_tags = arr_slm_tag[int].split("[");
            let str_tag_name = arr_tag_tags[0];
            let int_tag_value = arr_tag_tags[1] || 0;

            if (!obj_get_element) {

                obj_get_element = document.getElementsByTagName(str_tag_name)[int_tag_value];

                if (obj_get_element == undefined) {return false;}

            } else {

                let obj_child_element = obj_get_element.getElementsByTagName(str_tag_name)[int_tag_value];

                obj_get_element = obj_child_element;

                if (obj_child_element == undefined) {return false;}

            }

        }

    }

    return true;

}

export async function read(
    str_obj_tag
) {

    let obj_tag = await get(str_obj_tag);


    if (obj_tag != undefined) {
        return obj_tag.innerHTML;
    } else {
        return '';
    }

}

export async function write(
    str_obj_tag,
    str_tag_html
) {

    let obj_tag = await get_set(str_obj_tag);


    obj_tag.innerHTML = str_tag_html;

}

export async function remove(
    str_obj_tag
) {

    let obj_tag = await get(str_obj_tag);


    if (obj_tag != undefined) {

        obj_tag.remove();

        return true;

    }

    return false;

}


export async function hide(
    obj,
    str_display = 'none'
) {

    if (typeof obj == 'string') {
        obj = await get(obj);
    }

    if (obj) {
        obj.style.display = str_display;
    }

}

export async function show(
    obj,
    str_display = 'block'
) {

    if (typeof obj == 'string') {
        obj = await get(obj);
    }

    if (obj) {
        obj.style.display = str_display;
    }

}

export async function toggle(
    obj,
    str_display = 'block'
) {

    if (typeof obj == 'string') {
        obj = await get(obj);
    }

    if (obj.style.display == '' || obj.style.display == 'none') {
        obj.style.display = str_display;
    } else {
        obj.style.display = 'none';
    }

}