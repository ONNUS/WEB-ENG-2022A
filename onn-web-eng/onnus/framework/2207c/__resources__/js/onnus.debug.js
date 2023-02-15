export async function constructor () {}


export async function debug () {

    // await onnus.load(['element']);

    console.log('💫 onnus_debug.debug(); 💫');

    await onnus.import(['tag','attribute','element']);

    await onnus['tag'].debug();
    await onnus['attribute'].debug();
    await onnus['element'].debug();

    // console.log(onnus['element'].hide.debug());

    // onnus['attribute'].debug();

}


export async function log (
    str_log,
    str_css,
    str_type = 'message'
) {

    onnus.data.debug = onnus.data.debug ?? [];

    if (!onnus.data.debug[str_type]) {
        onnus.data.debug[str_type] = [];
    }

    let arr_data = [];

    arr_data['log'] = '💢 ' + str_log + ' 💢';
    arr_data['css'] = str_css;

    let int_count = onnus.data.debug[str_type].length;

    onnus.data.debug[str_type][int_count] = arr_data;

    // Message
    // Error
    // Warning
    // Info

}