export async function constructor() {}


export async function view(
    str_view,
    str_element,
) {

    // let str_class;

    let obj_list_container = await onnus.tag.get(str_element);

    // str_class = 'onnus-list-style-' + str_view;

    obj_list_container.setAttribute('class', '');
    obj_list_container.classList.add('onnus-list-style-' + str_view);

}