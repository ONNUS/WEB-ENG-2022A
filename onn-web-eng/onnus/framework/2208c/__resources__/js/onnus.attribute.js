export async function constructor() {}


export async function debug() {

    console.log("🔆 onnus_attribute.debug(); 🔆");
    
    let obj_debug = document.getElementById('debug');
    console.log("💢 let obj_debug = document.getElementById('debug'); 💢");

    let arr_attribute_get = await onnus['attribute'].get(obj_debug,'id[]onclick[]class[onnus]');
    console.log("💢 let arr_attribute_get = onnus['attribute'].get(obj_id,'id[]onclick[]class[onnus]'); 💢\n", arr_attribute_get);

    // let obj_tag_set = await onnus['tag'].set('html[]body[]debug[]div[3]');
    // let onnus_debug = await import('./onnus_debug.js');

    // onnus_debug.debug();

}


export async function get(
    obj_attribute,
    str_slm_attribute
) {

    let arr_return = [];
    let arr_slm_attribute = str_slm_attribute.split("]");

    // console.log('arr_slm_attribute = ', arr_slm_attribute);

    for (let int in arr_slm_attribute) {

        if (arr_slm_attribute[int]) {

            let arr_attribute = arr_slm_attribute[int].split("[");
            let str_attribute_name = arr_attribute[0];
            let str_attribute_value = arr_attribute[1] || '';

            // console.log('str_attribute_name = ', str_attribute_name);
            // console.log('str_attribute_value = ', str_attribute_value);

            arr_return[str_attribute_name] = obj_attribute.getAttribute(str_attribute_name) || str_attribute_value;

        }

    }

    return arr_return;

    // check obj_tag

    // obj_tag.getAttribute();

    // trun str_slm_attribute to array

    // console.log('onnus_attribute.get();');
    
}

export async function set(
    obj,
    str_arr_attribute
) {

    if (!str_arr_attribute) {return;}

    let str_split_start, str_split_end;


    if (str_arr_attribute.includes('{') && str_arr_attribute.includes('}')) {

        str_split_start = '}';
        str_split_end = '{';

    } else if (str_arr_attribute.includes('[') && str_arr_attribute.includes(']')) {

        str_split_start = '}';
        str_split_end = '{';

    }

    if (str_split_start && str_split_end) {
    
        let arr_attribute = str_arr_attribute.split(str_split_start);

        for (let str_attribute of arr_attribute) {

            if (!str_attribute) {continue;}

            let arr_name_value, str_attribute_name, str_attribute_value;

            arr_name_value = str_attribute.split(str_split_end);

            str_attribute_name = arr_name_value[0] ?? null;
            str_attribute_value = arr_name_value[1] ?? '';

            obj.setAttribute(str_attribute_name, str_attribute_value);

            console.log('arr_name_value =', arr_name_value);
            console.log('str_attribute =', str_attribute);
            console.log('typeof obj =', typeof obj);

        }

    } else {

        obj.setAttribute(str_arr_attribute, '');

    }

}


export async function exist() {

    console.log('onnus_attribute.exist();');
    
}

export async function read() {

    console.log('onnus_attribute.read();');

}

export async function write() {

    console.log('onnus_attribute.write();');

}

export async function remove() {

    console.log('onnus_attribute.remove();');

}
