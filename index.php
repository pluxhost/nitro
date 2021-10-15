<?php
   require_once 'global.php';
   $url = $Functions->FilterText($_GET['url']);


if ($url == NULL) {
    $urlf = 'index';
} else {
    $urlf = $url;
}

    $file = DIR . SEPARATOR . '/vcd-files/' . $urlf . '.php';

if (!file_exists($file)) {
    echo 'Archivo PHP no Encontrado', 'No se ha podido cargar el siguiente PHP: <b>' . $url . '.php</b>';
} else {
    include($file);
}
?>