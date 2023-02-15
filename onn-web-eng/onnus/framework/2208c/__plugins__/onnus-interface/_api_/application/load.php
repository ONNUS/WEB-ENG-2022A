<?php 

    $str_application = self::$data['_post']['application'] ?? false;
    $str_interface = self::$data['_post']['interface'] ?? false;
    $str_view = self::$data['_post']['view'] ?? 'dashboards';

    if (isset(index::$data['_api_'][$str_application])) {

        $str_interface_directory = index::$data['_api_'][$str_application];
        $str_interface_path_php = $str_interface_directory . $str_interface . '.php';
        $str_interface_path_js = $str_interface_directory . $str_interface . '.js';

        if (onnus_file::exist($str_interface_path_js)) {
            // onnus_api::$data['script']['/' . $str_interface_path_js] = null;
            self::$data['script']['/' . $str_interface_path_js] = null;
        }

        if (onnus_file::exist($str_interface_path_php)) {
            include_once($str_interface_path_php);
        } else {

            echo '<p>';
                echo '<b>APPLICATION INTERFACE NOT FOUND</b><br><br>';
                echo '<b>Directory</b> <br>', $str_interface_directory, "\n <br>";
                echo '<b>Path</b> <br>', $str_interface_path_php, "\n <br>";
                echo '<b>Application</b> <br>', $str_application, "\n <br>";
                echo '<b>Interface</b> <br>', $str_interface, "\n <br>";
            echo '</p>';

        }

    } else {

        echo '<b>APPLICATION INTERFACE NOT FOUND</b>';

        echo '<hr>🟪 onnus_index - index::$data | __destruct <br><pre>', print_r(index::$data), '</pre>','<br>';

    }

?>