/**
 * Copyright (c) 2020 | Onnus Developer Foundation 503c
 * Copyright (c) 2020 | Onnus Developer Core LLC
 *
 * long description for the file
 *
 * @summary short description for the file
 * @author Jasen Crockett <jasenc@onnus.org>
 *
 * Created      : 2020-08-19 01:23:45 :
 * Modified     : 2022-04-30 05:06:40 :
 */


class onnus {

    static data = [];


    static async initialize() {

        this.data.cache = this.data.cache ?? [];
        this.data.element = this.data.element ?? false; // update to blank array
        this.data.index = this.data.index ?? false; // update to blank array
        this.data.script = this.data.script ?? [];
        this.data.style = this.data.style ?? [];

        this.data.cache.body = this.data.cache.body ?? [];
        this.data.cache.tray = this.data.cache.tray ?? [];
        this.data.cache.interface = this.data.cache.interface ?? [];

        window.addEventListener('load', function(event) {
            onnus.moderate();
        });

    }

    static async moderate(
        obj_api_json
    ) {

        await this.import(['tag','style']);

        // this.data.script = this.data.script ?? [];
        // this.data.style = this.data.style ?? [];

        let arr_cache = [];

        // let obj_elements = document.getElementsByTagName("*");

        // for (let obj_element of obj_elements) {
        for (let obj_element of document.getElementsByTagName('*')) {

            if (obj_element.tagName == 'LINK' && obj_element.getAttribute('rel') == 'stylesheet') {

                let str_element_href = obj_element.getAttribute('href');

                this.data.style[str_element_href] = obj_element;

                if (obj_api_json && !obj_api_json.style[str_element_href]) {
                    arr_cache[str_element_href] = obj_element;
                } else if (!this.data.css[str_element_href]) {
                    this.data.css[str_element_href] = obj_element;
                }

            }

            if (obj_element.tagName == 'SCRIPT' && obj_element.getAttribute('type') == 'text/javascript') {

                let str_element_src = obj_element.getAttribute('src');

                this.data.script[str_element_src] = obj_element;

                // index update point
                if (obj_api_json && !obj_api_json.style[str_element_src]) {
                    arr_cache[str_element_src] = obj_element;
                } else if (!this.data.index.js[str_element_src]) {
                    arr_cache[str_element_src] = obj_element;
                }

            }

            for (let arr_class of obj_element.classList.entries()) {

                if (
                    arr_class[1].includes("onn-") ||
                    arr_class[1].includes("onnus-")
                ) {

                    let str_css_file = '';

                    for (let str_css_name of arr_class[1].split('-')) {

                        if (str_css_file) {
                            str_css_file += '-' + str_css_name;
                        } else {
                            str_css_file = str_css_name;
                        }

                        // index update point
                        let str_css_path = '/' + this.data.index.directory['fra_res_css'] + str_css_file + '.css';

                        // index update point
                        if (this.data.index.css[str_css_file] && !this.data.css[str_css_path]) {

                            let obj_link = document.createElement('link');

                            obj_link.rel = 'stylesheet';
                            obj_link.href = str_css_path;

                            this.data.css[str_css_path] = document.head.appendChild(obj_link);

                            arr_cache[str_css_path] = this.data.css[str_css_path];

                            this.log('OJF 🔆 Status | onnus | moderate | ADDED | 🟢 str_css_path = ' + str_css_path,'','css');

                        }

                    }

                }

            }

            for (let str_attribute of obj_element.getAttributeNames()) {

                let str_att_values = obj_element.getAttribute(str_attribute);

                if (
                    str_att_values.includes("onnus.") &&
                    str_att_values.includes("(") &&
                    str_att_values.includes(")")
                ) {

                    let str_js_file = '';

                    let arr_att_values = str_att_values.split('.');

                    arr_att_values.pop();

                    for (let str_js_name of arr_att_values) {

                        if (str_js_name == 'console') {continue;}

                        if (str_js_name.includes('(')) {
                            str_js_name = str_js_name.split('(')[1];
                        }

                        if (str_js_file) {
                            str_js_file += '.' + str_js_name;
                        } else {
                            str_js_file = str_js_name;
                        }

                        if (this.data.index.js[str_js_file] && str_js_name != 'onnus') {
                            this.import(str_js_name);
                        }

                    }

                }

                if (str_attribute != 'data-onnus') {continue;}

                for (let str_function of obj_element.getAttribute(str_attribute).split(']')) {

                    if (!str_function) {continue;}

                    let arr_function = str_function.split('[');


                    onnus.style.element(obj_element, arr_function[0].trim(), arr_function[1].trim());

                }

            }

        }

        if (obj_api_json) {

            if ('script' in obj_api_json) {

                for (let str_script_path in obj_api_json.script) {

                    if (!this.data.script[str_script_path]) {

                        let obj_script = document.createElement('script');

                        obj_script.type = 'text/javascript';
                        // obj_script.src = '/' + str_script_path;
                        obj_script.src = str_script_path;

                        arr_cache[str_script_path] = document.head.appendChild(obj_script);

                    }

                }

            }

            if ('style' in obj_api_json) {

                for (let str_style_path in obj_api_json.style) {

                    if (!this.data.style[str_style_path]) {

                        let obj_style = document.createElement('link');

                        obj_style.rel = 'stylesheet';
                        obj_style.type = 'text/css';
                        obj_style.href = str_style_path;

                        arr_cache[str_style_path] = document.head.appendChild(obj_style);

                    }

                }

            }

            if (obj_api_json._post._api_get == '_tray') {

                for (let str_cache in arr_cache) {

                    if (
                        !this.data.cache.body[str_cache] && 
                        !this.data.cache.interface[str_cache]
                    ) {
                        this.data.cache.tray[str_cache] = arr_cache[str_cache];
                        // console.log('_tray | str_cache =', str_cache);
                    }

                }

                // console.log('TRAY this.data.cache.tray =', this.data.cache.tray);

            } else if (obj_api_json._post._api_get == '_interface') {

                for (let str_cache in arr_cache) {

                    if (
                        !this.data.cache.body[str_cache] && 
                        !this.data.cache.tray[str_cache]
                    ) {
                        this.data.cache.interface[str_cache] = arr_cache[str_cache];
                        // console.log('_interface | str_cache =', str_cache);
                    }

                }

                // console.log('INTERFACE this.data.cache.interface =', this.data.cache.interface);

            }

            if (this.interface) {
                this.interface.initialize();
            }

        } else {

            for (let str_cache in arr_cache) {

                if (!this.data.cache.body[str_cache]) {
                    this.data.cache.body[str_cache] = arr_cache[str_cache];
                }

            }

        }

        // onnus.style.update();

    }


    static async import(
        str_arr_js_name,
        str_js_prefix = 'onnus.'
    ) {

        // this.data.index = this.data.index ?? false; // index update point
        // this.data.element = this.data.element ?? false; // index update point

        this.data.js = this.data.js ?? []; // index update point
        this.data.css = this.data.css ?? []; // index update point

        let str_js_name, str_js_file_name, str_js_file_directory, str_js_file_path;
        let arr_js_name = [];


        if (!this.data.index) {

            const requests = ['/index.json']; // index update point

            const arr_json = await Promise
                .all(
                    requests.map(
                        url => fetch(url)
                    )
                )
                .then(
                    async (res) => {
                        return Promise.all(
                            res.map(
                                async (data) => await data.json()
                            )
                        )
                    }
                );

            this.data.index = arr_json[0]; // index update point

        }

        if (typeof str_arr_js_name === 'string') {
            arr_js_name[0] = str_arr_js_name;
        } else {
            arr_js_name = str_arr_js_name;
        }

        str_js_file_directory = '/' + this.data.index.directory['fra_res_js']; // index update point

        for (let int in arr_js_name) {

            str_js_name = arr_js_name[int];

            str_js_file_name = str_js_prefix + str_js_name;  // index update point
            str_js_file_path = this.data.index['js'][str_js_file_name]; // index update point

            if (
                onnus[str_js_name] == undefined && 
                str_js_file_path && 
                !this.data['js'][str_js_file_name]
            ) {

                let str_js_file =  str_js_file_directory + str_js_file_path;  // index update point

                this.data['js'][str_js_file_name] = str_js_file;  // index update point

                this.log('OJF 🔆 Status | onnus | import | 🟩 str_js_name = ' + str_js_name,'','js');  // index update point

                // console.log('str_js_file =', str_js_file);
                // console.log('onnus[str_js_name] =', onnus[str_js_name]);
                onnus[str_js_name] = await import(str_js_file);

                if (typeof onnus[str_js_name].constructor === 'function') {
                    await onnus[str_js_name].constructor();
                }

            }

        }

    }

    static async api(
        str_api_url,
        str_api_tag,
        arr_api_data,
        str_api_get
    ) {

        let obj_form_data = new FormData();

        for (let str_api_data in arr_api_data) {
            obj_form_data.append(str_api_data, arr_api_data[str_api_data]);
        }

        if (str_api_tag) {obj_form_data.append('_api_tag', str_api_tag);}
        if (str_api_get) {obj_form_data.append('_api_get', str_api_get);}

		let arr_api_request = {
			method : 'POST',
			mode : 'cors',
			body : obj_form_data
		};

        if (!str_api_url.includes('/api/')) {
            str_api_url = '/api/' + str_api_url.trim('/');
        }

        // console.log('str_api_url =', str_api_url, '='); // debug for /api/ check

		let obj_request = new Request(str_api_url, arr_api_request);
		
		fetch (obj_request)
            .then ((obj_response) => {

                if (obj_response.ok) {
                    return obj_response.json();
                } else {
                    throw new Error('Fetch Failed')
                }

            })
            .then (async (obj_json) => {

                if ('html' in obj_json) {

                    for (let str_element_path in obj_json.html) {

                        await this.element.write(str_element_path, null, obj_json.html[str_element_path]);

                        // await this.element.show(str_element_path);

                    }

                }

                onnus.cache('clear','_tray');

                await this.moderate(obj_json);

            })
            .catch ((obj_err) => {

                console.log('ERROR:', obj_err.message);

            });

    }

    static async cache(
        str_cache
    ) {

        for (let str_cache_path in onnus.data.cache[str_cache]) {

            // console.log('str_cache =', str_cache_path);

            if (str_cache_path.includes('.css')) {

                onnus.data.cache[str_cache][str_cache_path].remove();

                delete this.data.css[str_cache_path];  // index update point
                delete this.data.style[str_cache_path];  // index update point

                this.log('OJF 🔆 Status | onnus | cache | REMOVED | 🔘 str_style_path = ' + str_cache_path);

            } else if (str_cache_path.includes('.js')) {

                onnus.data.cache[str_cache][str_cache_path].remove();

                delete this.data.js[str_cache_path];  // index update point
                delete this.data.script[str_cache_path];  // index update point

                this.log('OJF 🔆 Status | onnus | cache | REMOVED | 🔘 str_script_path = ' + str_cache_path);

            }

        }

    }


    static async log (
        str_log,
        str_css,
        str_type = 'message'
    ) {

        if (!onnus['debug']) {
            onnus['debug'] = await import('./onnus.debug.js');
        }

        onnus['debug'].log(str_log,str_css,str_type);

    }

    static async status() {

        for (let str_key_1 in this.data.debug) {

            console.log('💠',str_key_1,'💠');

            let arr_key_1 = this.data.debug[str_key_1];

            if (!this.data.debug[str_key_1]) {continue;}

            for (let str_key_2 in arr_key_1) {

                if (!arr_key_1[str_key_2]) {continue;}

                console.log(arr_key_1[str_key_2]['log']);

            }

        }

    }

    // UPDATES SVG & ELEMENTS COLOR
    static async update() {
        onnus.style.update(); // TEMP METHOD
    }

    static async svg(
        obj,
        func,
    ) {

        // await this.import(['style']);

        let obj_svg = obj.getSVGDocument();
        // let str_id = obj.getAttribute('id');
        // let str_data_onnus = obj.getAttribute('data-onnus');
        // let str_onclick = obj.getAttribute('onclick');
        // let str_mousedown = obj.getAttribute('mousedown');

        // console.log(obj);
        // console.log('obj_svg =', obj_svg);
        // console.log('id =', str_id);
        // console.log('str_data_onnus =', str_data_onnus);
        // console.log('str_onclick =', str_onclick);
        // console.log('str_mousedown =', str_mousedown);
        
        if (obj_svg && typeof func !== 'undefined') {
        // if (obj_svg && func) {
            // typeof document !== "undefined"

            // var func_onclick = new Function(str_onclick);
            // obj_svg.addEventListener("mousedown", func);

            obj_svg.addEventListener('mousedown', (obj_event)=>{

                // console.log('obj_event.target =', obj_event.target);
                // console.log('obj_event =', obj_event);
                // console.log('obj =', obj);
                // console.log('obj_svg =', obj_svg);
                // console.log('func =', func);
                // e.target.addEventListener("mousedown", func);

                // func();
                func(obj, obj_event);

                // e.target.addEventListener("mousedown", func);

            });

            // console.log('SVG DOC', func);
        // } else {
            // console.log('SVG DOC FAILED');
        // } else if (typeof func === 'undefined') {
            // console.log('func =', func, '= NOT FOUND', obj);
        }

        if (obj.getAttribute('data-onnus')) {
            
            for (let str_function of obj.getAttribute('data-onnus').split(']')) {

                if (!onnus.style) {continue;}
                
                let arr_function = str_function.split('[');

                if (arr_function[0] == 'color-fill') {

                    // console.log("COLOR FILL COMMAND HERE", arr_function[0] , arr_function[1]);
                    // console.log("str_id", str_id);

                    let obj_svg_class = obj_svg.getElementsByClassName('cls-1');
                    // let obj_svg_id = obj_svg.getElementById(str_id);
                    // let obj_svg = obj_element.getSVGDocument();
                    // let obj_svg_tag = obj_svg.getElementsByTagName('svg')[0];

                    // if (!obj_svg_id || !obj_svg_id.style.fill) {continue;}

                    obj_svg_class[0].style.fill = await onnus.style.color(arr_function[1].trim(), 1);
                    // obj_svg.getElementById(str_id).style.fill = await onnus.style.color(arr_function[1].trim(), 1);
                    // obj_svg_tag.style.fill = await onnus.style.color(arr_function[1].trim(), 1);

                }

            }

        }

        // console.log(str_id);
        // onnus.style.update();

        // set color

        // set onclick options

    }

}


(async function () {await onnus.initialize()})();