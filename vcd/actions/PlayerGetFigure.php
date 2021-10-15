<?php
ob_start();
require_once '../../global.php';

$q   = $Functions->FilterText($_POST[user]);
$sql = $db->query("SELECT * FROM $users WHERE username = '$q'");
$fila = $sql->fetch_array();

if ($sql->num_rows == 0) {

    $json["look"] = AVATARIMAGE . 'he-201404-1198.ca-1814-62.ch-3185-110.hr-831-1036.hd-190-1359.lg-281-62';
    echo json_encode($json);

} else {

    $json["look"] = AVATARIMAGE . $fila['look'];
    echo json_encode($json);
}
?>