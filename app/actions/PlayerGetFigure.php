<?php
ob_start();
require_once '../../global.php';

$q   = $Functions->FilterText($_POST[q]);
$sql = $db->query("SELECT * FROM $users WHERE username = '$q'");

if ($sql->num_rows == 0) {
    echo '<img id="nin18" src="/app/assets/img/frank_head.png"></img>';
} else {
    while ($fila = $sql->fetch_array()) {
        echo '<img id="nin18" src="' . AVATARIMAGE . $fila['look'] . '&head_direction=2&headonly=1" />';
    }
}
?>