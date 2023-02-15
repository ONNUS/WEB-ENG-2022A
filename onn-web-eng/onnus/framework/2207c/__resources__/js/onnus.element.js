// export async function __construct () {}
export async function constructor() {

    await onnus.import(['tag','attribute']);

}


export async function debug() {

    console.log('🔆 onnus_element.debug(); 🔆');

    let bol_element_exist = await onnus['element'].exist('html[]body[]debug[]div[3]);');
    console.log("💢 await onnus['element'].exist('html[]body[]debug[]div[3]' ⭕", bol_element_exist, "💢");

    // let obj_element_write = await onnus['element'].write('html[]body[]debug[]div[3]','class[color content]id[debug_write]','onnus element write debug');
    // let obj_element_write = await onnus['element'].write('html[]body[]debug[]div[3]','onnus element write debug');
    
    let obj_element_write = await onnus['element'].write('html[]body[]debug[]div[3]','class{onnus-color onnus-content}data-onnus{color[i#5] color-hover[i#15]}','<b>html</b>');
    console.log("💢 await onnus['element'].write('html[]body[]debug[]div[3]','onnus element write debug'); 💢");
    
    obj_element_write = await onnus['element'].write('html[]body[]debug[]div[4]','class{onnus-color onnus-content}selected','<b>html</b>');
    console.log("💢 await onnus['element'].write('html[]body[]debug[]div[4]','onnus element write debug'); 💢");

    let str_element_read = await onnus['element'].read('html[]body[]debug[]div[3]');
    console.log("💢 await onnus['element'].read('html[]body[]debug[]div[3]'); ⭕", str_element_read, "💢");

    bol_element_exist = await onnus['element'].exist('html[]body[]debug[]div[3]');
    console.log("💢 await onnus['element'].exist('html[]body[]debug[]div[3]'); ⭕", bol_element_exist, "💢");

    // let bol_element_remove = await onnus['element'].remove('html[]body[]main[]div[3]');

}


export async function get(
    obj
) {

    return await onnus.tag.get(obj);

}

export async function set(
    obj
) {

    return await onnus.tag.set(obj);

}


export async function exist(
    str_obj_tag
) {

    return await onnus.tag.exist(str_obj_tag);

}

export async function read(
    str_obj_tag
) {

    return await onnus.tag.read(str_obj_tag);

}

export async function write(
    str_obj_tag,
    str_arr_attribute,
    str_html
) {

    let obj_tag = await onnus.tag.get_set(str_obj_tag);


    onnus.attribute.set(obj_tag, str_arr_attribute);

    onnus.tag.write(obj_tag, str_html);

}

export async function remove(
    str_obj_tag
) {

    let obj_element = await onnus.tag.get(str_obj_tag);

    if (obj_element != undefined) {

        obj_element.remove();

        return true;

    }

    return false;

}


export async function hide(
    obj,
    str_display = 'none'
) {

    onnus.tag.hide(obj, str_display);

}

export async function show(
    obj,
    str_display = 'flex'
) {

    onnus.tag.show(obj, str_display);

}

export async function toggle(
    obj,
    str_display = 'flex'
) {

    onnus.tag.toggle(obj, str_display);

}