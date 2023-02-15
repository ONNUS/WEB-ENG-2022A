<?php

    // self::set('title','404 Page Not Found | Onnus WEB Engine');
    onnus_page::title('404 Page Not Found | Onnus WEB Engine');

    onnus_page::layout('onnus-light');

    $arr_page_data = self::$data;

    unset($arr_page_data['content']);

?>

<h1>404 | Page Not Found</h1>
<p>Onnus WEB Engine</p>

<?php echo '<hr><pre>'; print_r($arr_page_data); echo '</pre><hr>';?>