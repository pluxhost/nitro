<?php
ob_start();
require_once '../../global.php';
ob_end_flush();

$type = $Functions->FilterText($_POST['type']);

if ($type == "username") {
    $user   = $Functions->FilterText($_POST['word']);
    $filter = preg_replace("/[^a-z\d\-=\!@:\.,]/i", "", $user);

    $us = $db->query("SELECT * FROM $users WHERE username = '" . $user . "'");

    if ($us->num_rows > 0 || $user !== $filter || strlen($user) < 2 || strlen($user) > 18 || strpos($user, 'MOD-') !== false || strpos($user, 'mod-') !== false) {
        $json["reponse"] = false;
        echo json_encode($json);
    } else {
        $json["reponse"] = true;
        echo json_encode($json);
    }
} elseif ($type == "email") {
    $email       = $Functions->FilterText($_POST['word']);
    $email_check = preg_match("/^[a-z0-9_\.-]+@([a-z0-9]+([\-]+[a-z0-9]+)*\.)+[a-z]{2,7}$/i", $email);

    $us = $db->query("SELECT * FROM $users WHERE mail = '" . $email . "'");

    if ($us->num_rows > 0 || $email_check !== 1) {
        $json["reponse"] = false;
        echo json_encode($json);
    } else {
        $json["reponse"] = true;
        echo json_encode($json);
    }
} elseif ($type == "look") {
    $gender = $Functions->FilterText($_POST['gender']);
    if ($gender == "M") {

        $usm   = $db->query("SELECT * FROM $users WHERE gender = 'M' ORDER BY rand()");
        $lookm = $usm->fetch_array();

        $json["id"]   = $lookm["look"];
        $json["look"] = AVATARIMAGE . $lookm["look"] . 'action=std,wav&gesture=sml&direction=2&head_direction=3&size=l';
        echo json_encode($json);
    } else if ($gender == "F") {

        $usf   = $db->query("SELECT * FROM $users WHERE gender = 'F' ORDER BY rand()");
        $lookf = $usf->fetch_array();

        $json["id"]   = $lookf["look"];
        $json["look"] = AVATARIMAGE . $lookf["look"] . 'action=std,wav&gesture=sml&direction=2&head_direction=3&size=l';
        echo json_encode($json);
    }
}
?>