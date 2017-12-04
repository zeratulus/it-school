<?php
ini_set("display_errors", 1);

$url = '';

foreach ($_POST as $key => $value) {
    $url .= $key . '=' . $value;
    if (end($_POST) != $value) {
        $url .= '&';
    }
//    echo $key . ':' . $value . '<br>';
}

echo $url . '<br>';

$redirect = 'http://html-1.dev/post-to-get/get.php?' . $url;

header('Location: ' . $redirect); //301 redirect

//echo '<script>window.location.href = "'.$redirect.'"</script>';













//Hello Sergei