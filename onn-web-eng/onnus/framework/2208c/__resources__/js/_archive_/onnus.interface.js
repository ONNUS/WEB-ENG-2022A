export async function constructor () {

    await onnus.import('element');

    onnus.data.interface = onnus.data.interface ?? [];
    onnus.data.interface.content = onnus.data.interface.content ?? false;
    onnus.data.interface.tray = onnus.data.interface.tray ?? false;

    onnus.data.interface.focus = onnus.data.interface.focus ?? false;
    onnus.data.interface.window = onnus.data.interface.window ?? false;

    initialize();

}


export async function debug() {}


export async function initialize() {

    let int_elements = 0;
    let int_attribute = 0;
    let obj_elements = document.getElementsByTagName("*");


    for (let obj_element of obj_elements) {

        int_elements++;

        for (let str_attribute of obj_element.getAttributeNames()) {

            int_attribute++;

            if (str_attribute == 'alt') {
                obj_element.addEventListener('mouseenter', status, false);
            }

        }

    }

    if (onnus.tag) {
        onnus.tag.write('interface-bar[]bar-status[]', '| ' + int_elements + ' Elements | ' + int_attribute + ' Attributes |');
    }

}


export async function title(
    str_title
) {

    onnus.tag.write('interface-nav[]nav-title[]', str_title);

}

export async function status(
    obj
) {

    if (obj.type == 'mouseenter') {

        onnus.tag.write('interface-bar[]bar-alt[]', obj.target.getAttribute('alt'));

        onnus.element.show('interface-bar[]');

    }

}


export async function leave() {

    if (onnus.data.interface.content == true) {return;}
    if (onnus.data.interface.tray == true) {return;}

    // console.log('onnus.data.interface.tray = ', onnus.data.interface.tray);

    onnus.element.hide('interface-bar[]');
    onnus.element.hide('interface-tray[]');

    if (onnus.data.interface.state != 'open') {



    }

}

export async function toggle(
    str_type
) {

    let str_nav_title = '';

    // onnus.data.interface.state = onnus.data.interface.state ?? 'open';

    // console.log('--------------------');
    

    if (onnus.data.interface.type == str_type) {

        if (onnus.data.interface.state == 'close') {
            onnus.data.interface.state = 'open';
        } else if (onnus.data.interface.state == 'open') {
            onnus.data.interface.state = 'close';
            onnus.data.interface.type = '';
        } else {
            onnus.data.interface.state = 'open';
        }

    } else {

        onnus.data.interface.state = 'open';

    }

    if (onnus.data.interface.state == 'open') {

        // let str_api_tag = 'interface-tray[]tray-' + str_type + '[]';
        let str_api_tag = 'onnus-interface[]interface-tray[]';

        onnus.element.show(str_api_tag);
        // onnus.element.show('interface-tray[]');
        onnus.element.show('interface-bar[]');

        open('tray');

        // if (str_type != 'app') {onnus.element.hide('interface-tray[]tray-app[]');}
        // if (str_type != 'menu') {onnus.element.hide('interface-tray[]tray-menu[]');}
        // if (str_type != 'user') {onnus.element.hide('interface-tray[]tray-user[]');}

        if (!onnus.data.interface[str_type] || onnus.data.interface.type != str_type) {

            onnus.cache('tray');

            onnus.api('onnus/interface/menu/' + str_type, str_api_tag, null, '_tray');

            onnus.data.interface[str_type] = str_api_tag;

        }

        if (str_type == 'app') {
            str_nav_title = 'Application Browser';
        } else if (str_type == 'menu') {
            str_nav_title = 'Menus Browser';
        } else if (str_type == 'user') {
            str_nav_title = 'User Account';
        }

    } else if (onnus.data.interface.state == 'close') {

        // onnus.element.hide('interface-tray[]');

        close('tray');

    }

    onnus.data.interface.type = str_type;

    await onnus.tag.write('interface-nav[]nav-title[]', str_nav_title);

    // console.log('onnus.data.interface.state =', onnus.data.interface.state);

}

export async function open(
    str_open
) {

    let str_element = '';

    let obj_onnus_interface = await onnus.tag.get('body[]onnus-interface[]');


    if (str_open == 'content' || str_open == 'app') {


        obj_onnus_interface.classList.remove('onnus-content-min');
        obj_onnus_interface.classList.add('onnus-content-max');

        str_element = 'nav-app[]app-';

        title('');

        if (str_open == 'app') {
            close('tray');
            str_open = 'content';
        }

    } else if (str_open == 'tray') {

        str_element = 'nav-menu[]menu-';

    } else {
        
        onnus.cache('interface');

        // onnus.api('app/' + str_open + '/interface', 'onnus-interface[]interface-content[]', null, '_skip');
        onnus.api('app/' + str_open + '/interface', 'onnus-interface[]interface-content[]', null, '_interface');

        obj_onnus_interface.classList.remove('onnus-content-min');
        obj_onnus_interface.classList.add('onnus-content-max');

        close('tray');

        str_element = 'nav-app[]app-';
        str_open = 'content';

    }

    if (str_element) {

        onnus.data.interface[str_open] = true;

        onnus.element.show(str_element + 'close[]');
        onnus.element.hide(str_element + 'open[]');

        onnus.element.show('onnus-interface[]interface-' + str_open + '[]');

    }


}

export async function close(
    str_close
) {

    let str_element = '';


    if (str_close == 'content') {

        let obj_onnus_interface = await onnus.tag.get('body[]onnus-interface[]');

        obj_onnus_interface.classList.add('onnus-content-min');
        obj_onnus_interface.classList.remove('onnus-content-max');

        str_element = 'nav-app[]app-';

    } else if (str_close == 'tray') {

        // onnus.cache('tray');

        title('');

        onnus.data.interface.state = 'close';

        str_element = 'nav-menu[]menu-';

    }

    if (str_element) {

        onnus.data.interface[str_close] = false;

        onnus.element.show(str_element + 'open[]');
        onnus.element.hide(str_element + 'close[]');

        onnus.element.hide('onnus-interface[]interface-' + str_close + '[]');

    }

}


