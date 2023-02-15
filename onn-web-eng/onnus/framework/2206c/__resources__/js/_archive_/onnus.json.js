export async function constructor () {

    console.log('onnus_json.constructor();');

}


export async function debug () {

    // console.log('onnus_json.debug();');

}


export async function read(
    str_path_index
) {

    const requests = [str_path_index];


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
        
    return arr_json[0];

}