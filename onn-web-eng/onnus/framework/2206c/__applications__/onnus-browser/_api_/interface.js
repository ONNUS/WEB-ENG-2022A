var obj_onnus_broswer_content;


async function onnus_browser_content_load(
    str_view = false,
) {

    console.log('str_view =onnus-browser/' + str_view, '=');

    // arr_api_data

    onnus.api('onnus-browser/' + str_view, 'content-browser[]browser-content[]content-module[]', null, '_application');

}

async function onnus_browser_button() {
    console.log('onnus_browser_button');
}


// OLD CONCEPT CODE
function onnus_browser_content(
    str_api_content
) {

    // console.log('onnus_browser_content | str_api_content =', str_api_content);

    if (str_api_content == 'browser') {
        onnus_browser_folder(".", "0");
    }

}

async function onnus_browser_folder(
    str_folder_path,
    int_folder_id
) {

    let str_sbp_tag = '#id[onn-men-fol-' + int_folder_id + ']folder-content[]';

    let obj_folder_content = await onnus.tag.get('#id[onn-men-fol-' + int_folder_id + ']folder-content[]');

    onnus_browser_list(str_folder_path);

    if (!obj_folder_content.innerHTML) {

        let arr_data = [];
        let obj_folder_menu = document.getElementsByTagName("menu-folder");

        arr_data['_menu_folder'] = str_folder_path;
        arr_data['_menu_id'] = int_folder_id;
        arr_data['_menu_count'] = obj_folder_menu.length - 1;

        // onnus.api('onnus/folder', str_sbp_tag, arr_data, '_interface');

        // console.log('arr_data =', arr_data);

    } else {

        obj_folder_icon = await onnus.tag.get('#id[onn-men-fol-' + int_folder_id + ']folder-bar[]bar-icon[]');

        if (obj_folder_content.style.display == 'flex') {

            obj_folder_content.style.display = 'none';
            obj_folder_icon.innerHTML = '►';

        } else {

            obj_folder_content.style.display = 'flex';
            obj_folder_icon.innerHTML = '▼';

        }

    }

}

async function onnus_browser_list(
    str_folder_path,
    str_folder_type = 'onnus-list-grid'
) {

    let arr_data = [];

    arr_data['_folder_type'] = str_folder_type;
    arr_data['_folder_name'] = str_folder_path;

    // console.log('arr_data[_folder_name] =', arr_data['_folder_name']);

    onnus.api('onnus-browser/browser/list', 'content-browser[]browser-content[]content-module[]', arr_data, '_interface');

    // onnus.element.show('onnus-browser[]browser-address[]');

}

async function onnus_browser_editor(
    str_folder_path
) {
    let arr_data = [];

    arr_data['_file_editor'] = 'default';
    arr_data['_file_path'] = str_folder_path;

    // onnus.element.show('browser-content[]content-editor[]');
    // onnus.tag.write('browser-content[]content-editor[]', str_folder_path);

    // onnus.api('onnus/file', 'browser-content[]content-editor[]', arr_data, '_interface');

}


async function onnus_browser_dashboard(
    str_dashboard_name
) {

    console.log('str_dashboard_name =', str_dashboard_name);

}

// remove debug function
async function interface_id_debug() {

    // onnus.import('tag');

    // let obj = await onnus.tag.get('browser-content[]content-browser[]#id[debug_div]');
    let obj = await onnus.tag.get('#id[debug_div]debug[]div[2]');

    console.log('obj =', obj);

}