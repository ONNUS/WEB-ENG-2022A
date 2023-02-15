<?php

    onnus_menu::schema($arr_option_sort, 'container', ['tag' => 'sort-debug', 'attributes' => 'data-onnus{color[i#6]}class{onnus-menu onnus-menu-reverse onnus-menu-closed onnus-border-left-solid-1px onnus-tablet-position-absolute}', 'select' => 'sort-debug[]menu-views[]']);

    onnus_menu::schema($arr_content_sort, 'button', ['icon' => 'G', 'label' => 'Grid', 'alt' => 'ALT', 'onclick' => "onnus.list.view('grid', 'content-browser[]browser-content[]content-module[]content-list[]');"]);
    onnus_menu::schema($arr_content_sort, 'button', ['icon' => 'D', 'label' => 'Detail', 'alt' => 'ALT', 'onclick' => "onnus.list.view('detail', 'content-browser[]browser-content[]content-module[]content-list[]');"]);
    onnus_menu::schema($arr_content_sort, 'spacer', []);

    onnus_menu::schema($arr_option_sort['content'], 'toggle', ['icon' => 'V', 'label' => 'Views', 'alt' => 'ALT', 'menu' => 'content-filter[]sort-debug[]', 'tag' => 'sort-debug[]menu-views[]', 'onclick' => "", 'content' => $arr_content_sort, ]);
    onnus_menu::schema($arr_option_sort['content'], 'filler', []);


    onnus_html::element('content-list', 'class{onnus-list-style-grid --onnus-list-style-detail}');

        onnus_html::element('list-content', '');

            onnus_html::element('content-header', '', 'Content Header');

            onnus_html::element('content-list', '');

                onnus_html::element('list-item', '');

                    onnus_html::element('item-data', '');

                        onnus_html::element('data-value', '', 'Value A');
                        onnus_html::element('data-value', '', 'Value B');
                        onnus_html::element('data-value', '', 'Value C');
                        onnus_html::element('data-option', '', 'Options');

                    onnus_html::element('item-data');

                    onnus_html::element('item-label', '', 'Name');

                onnus_html::element('list-item');

                onnus_html::element('list-item', 'data-onnus{color-hover[i#6]}');

                    onnus_html::element('item-data', 'data-onnus{color[i#4] color-border[i#10] color-font[i#4] color-hover[i#6]}');

                        onnus_html::element('data-value', '', 'Value 1');
                        onnus_html::element('data-value', '', 'Value 2');
                        onnus_html::element('data-value', '', 'Value 3');
                        onnus_html::element('data-option', '', '<button>Option</button>');

                    onnus_html::element('item-data');

                    onnus_html::element('item-label', '', 'Item Label');

                onnus_html::element('list-item');

                onnus_html::element('list-item', 'data-onnus{color-hover[i#6]}');

                    onnus_html::element('item-data', 'data-onnus{color[i#4] color-border[i#10] color-font[i#4] color-hover[i#6]}');

                        onnus_html::element('data-value', '', 'Value 1');
                        onnus_html::element('data-value', '', 'Value 2');
                        onnus_html::element('data-value', '', 'Value 3');
                        onnus_html::element('data-option', '', '<button>Option</button>');

                    onnus_html::element('item-data');

                    onnus_html::element('item-label', '', 'Item Label');

                onnus_html::element('list-item');

                onnus_html::element('list-item', 'data-onnus{color-hover[i#6]}');

                    onnus_html::element('item-data', 'data-onnus{color[i#4] color-border[i#10] color-font[i#4] color-hover[i#6]}');

                        onnus_html::element('data-value', '', 'Value 1');
                        onnus_html::element('data-value', '', 'Value 2');
                        onnus_html::element('data-value', '', 'Value 3');
                        onnus_html::element('data-option', '', '<button>Option</button>');

                    onnus_html::element('item-data');

                    onnus_html::element('item-label', '', 'Item Label');

                onnus_html::element('list-item');

            onnus_html::element('content-list');

        onnus_html::element('list-content');

        onnus_html::element('list-content', '');

            onnus_html::element('content-header', '', 'Content Header');

            onnus_html::element('content-list', '');

                onnus_html::element('list-item', '');

                    onnus_html::element('item-data', '');

                        onnus_html::element('data-value', '', 'Value A');
                        onnus_html::element('data-value', '', 'Value B');
                        onnus_html::element('data-value', '', 'Value C');
                        onnus_html::element('data-option', '', 'Options');

                    onnus_html::element('item-data');

                    onnus_html::element('item-label', '', 'Name');

                onnus_html::element('list-item');

                onnus_html::element('list-item', 'data-onnus{color-hover[i#6]}');

                    onnus_html::element('item-data', 'data-onnus{color[i#4] color-border[i#10] color-font[i#4] color-hover[i#6]}');

                        onnus_html::element('data-value', '', 'Value 1');
                        onnus_html::element('data-value', '', 'Value 2');
                        onnus_html::element('data-value', '', 'Value 3');
                        onnus_html::element('data-option', '', '<button>Option</button>');

                    onnus_html::element('item-data');

                    onnus_html::element('item-label', '', 'Item Label');

                onnus_html::element('list-item');

                onnus_html::element('list-item', 'data-onnus{color-hover[i#6]}');

                    onnus_html::element('item-data', 'data-onnus{color[i#4] color-border[i#10] color-font[i#4] color-hover[i#6]}');

                        onnus_html::element('data-value', '', 'Value 1');
                        onnus_html::element('data-value', '', 'Value 2');
                        onnus_html::element('data-value', '', 'Value 3');
                        onnus_html::element('data-option', '', '<button>Option</button>');

                    onnus_html::element('item-data');

                    onnus_html::element('item-label', '', 'Item Label');

                onnus_html::element('list-item');

                onnus_html::element('list-item', 'data-onnus{color-hover[i#6]}');

                    onnus_html::element('item-data', 'data-onnus{color[i#4] color-border[i#10] color-font[i#4] color-hover[i#6]}');

                        onnus_html::element('data-value', '', 'Value 1');
                        onnus_html::element('data-value', '', 'Value 2');
                        onnus_html::element('data-value', '', 'Value 3');
                        onnus_html::element('data-option', '', '<button>Option</button>');

                    onnus_html::element('item-data');

                    onnus_html::element('item-label', '', 'Item Label');

                onnus_html::element('list-item');

                onnus_html::element('list-item', 'data-onnus{color-hover[i#6]}');

                    onnus_html::element('item-data', 'data-onnus{color[i#4] color-border[i#10] color-font[i#4] color-hover[i#6]}');

                        onnus_html::element('data-value', '', 'Value 1');
                        onnus_html::element('data-value', '', 'Value 2');
                        onnus_html::element('data-value', '', 'Value 3');
                        onnus_html::element('data-option', '', '<button>Option</button>');

                    onnus_html::element('item-data');

                    onnus_html::element('item-label', '', 'Item Label');

                onnus_html::element('list-item');

                onnus_html::element('list-item', 'data-onnus{color-hover[i#6]}');

                    onnus_html::element('item-data', 'data-onnus{color[i#4] color-border[i#10] color-font[i#4] color-hover[i#6]}');

                        onnus_html::element('data-value', '', 'Value 1');
                        onnus_html::element('data-value', '', 'Value 2');
                        onnus_html::element('data-value', '', 'Value 3');
                        onnus_html::element('data-option', '', '<button>Option</button>');

                    onnus_html::element('item-data');

                    onnus_html::element('item-label', '', 'Item Label');

                onnus_html::element('list-item');

            onnus_html::element('content-list');

        onnus_html::element('list-content');

    onnus_html::element('content-list');

    onnus_html::element('content-filter', 'class{onnus-tablet-position-relative onnus-min-width-35px onnus-tablet-min-width-35px}data-onnus{color[i#6]}');
        onnus_menu::generate($arr_option_sort);
    onnus_html::element('content-filter');

?>