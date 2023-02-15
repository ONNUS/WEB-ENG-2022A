// export async function __construct () {}
export async function constructor() {

    onnus.data.menu = onnus.data.menu ?? [];
    onnus.data.menu.toggle = onnus.data.menu.toggle ?? [];
    onnus.data.menu.mobile = onnus.data.menu.mobile ?? true;


    let obj_ele_html_body = await onnus.tag.get('html[]body[]');

    obj_ele_html_body.addEventListener("click", body);

}


export async function debug() {

    // await onnus.load(['element']);

    console.log('💫 onnus_debug.debug(); 💫');

    await onnus.import(['tag','attribute','element']);

    await onnus['tag'].debug();
    await onnus['attribute'].debug();
    await onnus['element'].debug();

}


export async function body() {

    let obj_window_media = window.matchMedia("(max-width: 844px)");


    if (obj_window_media.matches) {

        if (onnus.data.menu.mobile) {

            for (let str_toggle in onnus.data.menu.toggle) {
                closed(str_toggle);
            }

        } else {

            onnus.data.menu.mobile = true;

        }

    } else {

        onnus.data.menu.mobile = true;

    }

}


export async function onload(
    str_type = null,
    str_menu = null,
    str_default = null,
) {

    if (str_type == 'toggle') {

        let obj_menu_bar = null;
        let obj_menu_content = null;

        if (onnus.data.menu.toggle[str_menu]) {
            obj_menu_bar = await onnus.tag.get(onnus.data.menu.toggle[str_menu].previous);
            obj_menu_content = await onnus.tag.get(onnus.data.menu.toggle[str_menu].selected + 'menu-content[]');
        } else {

            onnus.data.menu.toggle[str_menu] = onnus.data.menu.toggle[str_menu] ?? [];

            onnus.data.menu.toggle[str_menu].previous = onnus.data.menu.toggle[str_menu].previous ?? str_default + 'menu-bar[]';
            onnus.data.menu.toggle[str_menu].selected = onnus.data.menu.toggle[str_menu].selected ?? str_default;

            obj_menu_bar = await onnus.tag.get(onnus.data.menu.toggle[str_menu].previous);
            obj_menu_content = await onnus.tag.get(onnus.data.menu.toggle[str_menu].selected + 'menu-content[]');

        }

        if (obj_menu_bar) {

            obj_menu_bar.setAttribute('data-onnus', 'color-background[i#3]');
            obj_menu_bar.classList.add('onnus-toggle-selected');
            obj_menu_bar.style.backgroundColor = await onnus.style.color('i#17', 1);

            if (obj_menu_content) {
                obj_menu_content.classList.remove('onnus-menu-collapse');
            }

        }

    }

}


export async function toggle(
    str_menu_element,
    str_menu_content
) {

    onnus.data.menu.mobile = false;

    onnus.data.menu.toggle[str_menu_element] = onnus.data.menu.toggle[str_menu_element] ?? [];
    onnus.data.menu.toggle[str_menu_element].selected = onnus.data.menu.toggle[str_menu_element].selected ?? '';
    onnus.data.menu.toggle[str_menu_element].previous = onnus.data.menu.toggle[str_menu_element].previous ?? false;
    onnus.data.menu.toggle[str_menu_element].status = onnus.data.menu.toggle[str_menu_element].status ?? false;


    if (onnus.data.menu.toggle[str_menu_element].selected != str_menu_content) {

        onnus.data.menu.toggle[str_menu_element].selected = str_menu_content;

        if (onnus.data.menu.toggle[str_menu_element].previous) {

            let obj_previous_menu_bar_icon = await onnus.tag.get(onnus.data.menu.toggle[str_menu_element].previous);

            obj_previous_menu_bar_icon.setAttribute('data-onnus', '');
            obj_previous_menu_bar_icon.classList.remove('onnus-toggle-selected');
            obj_previous_menu_bar_icon.style.backgroundColor = '';

        }

        onnus.data.menu.toggle[str_menu_element].previous = str_menu_content + 'menu-bar[]';

        let obj_menu_bar_icon = await onnus.tag.get(onnus.data.menu.toggle[str_menu_element].previous);

        obj_menu_bar_icon.setAttribute('data-onnus', 'color-background[i#3]');
        obj_menu_bar_icon.classList.add('onnus-toggle-selected');
        obj_menu_bar_icon.style.backgroundColor = await onnus.style.color('i#17', 1);

    } else if (onnus.data.menu.toggle[str_menu_element].selected == str_menu_content) {

        let obj_element = await onnus.tag.get(str_menu_element);

        if (!obj_element) {return;}

        onnus.data.menu.toggle[str_menu_element].status = obj_element.classList.toggle('onnus-menu-closed');

    }


    let obj_window_media = window.matchMedia("(max-width: 844px)");

    if (obj_window_media.matches) {

        for (let str_toggle in onnus.data.menu.toggle) {

            if (str_toggle == str_menu_element) {continue;}

            closed(str_toggle);

        }

    }

}

export async function collapse(
    str_menu_content,
    str_menu_element
) {

    // let obj_menu_bar = await onnus.tag.get(str_menu_content + 'menu-bar[]');
    let obj_menu_content = await onnus.tag.get(str_menu_content + 'menu-content[]');
    let obj_menu_container = await onnus.tag.get(str_menu_element);

    if (!obj_menu_container) {return;}


    toggle(str_menu_element, str_menu_content);

    let obj_menu_collapse = obj_menu_container.getElementsByTagName('menu-content');

    for (let obj_menu_tag of obj_menu_collapse) {
        obj_menu_tag.classList.add('onnus-menu-collapse');
    }


    if (!obj_menu_content) {return;}

    obj_menu_content.classList.remove('onnus-menu-collapse');

}


export async function open(
    str_element
) {

    let obj = await onnus.tag.get(str_element);

    if (!obj) {return;}

    obj.classList.remove('onnus-menu-closed');

}

export async function closed(
    str_element
) {

    let obj = await onnus.tag.get(str_element);

    if (!obj) {return;}

    obj.classList.add('onnus-menu-closed');

}

