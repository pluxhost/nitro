<?php
ob_start();
require_once '../../global.php';
ob_end_flush();

if ($_POST) {
    $user     = $Functions->FilterText($_POST['identifiant']);
    $pass     = $Functions->FilterPASS($_POST['password']);
    $captcha  = $Functions->FilterText($_POST['captcha']);

    $us = $db->query("SELECT * FROM $users WHERE username = '" . $user . "' OR mail = '" . $user . "' ");
    $u  = $us->fetch_array();

    $checkban = $db->query("SELECT * FROM bans WHERE value = '{$user}' LIMIT 1");
    $ban  = $checkban->fetch_array();

    if ($checkban->num_rows > 0) {
        $json["id"]      = $user;
        $json["reponse"] = 'bannis';
        $json["id"]      = $ban['id'];
        echo json_encode($json);
    } else if ($u['cuenta_suspendida'] == 1) {
        $json["text"]    = 'Cuenta suspendida temporalmente';
        $json["reponse"] = 'suspendida';
        echo json_encode($json);
    } else if (isset($user) AND isset($pass)) {
        $a = $Functions->FilterText($user);
        $b = $Functions->FilterPASS($pass);
        if (empty($a) || empty($b)) {
            $json["reponse"] = 'erreur';
            $json["text"]    = 'Los identificadores son incorrectos.';
            echo json_encode($json);
        } elseif ($Functions->CheckLogged($a, md5($b))) {
            $json["reponse"] = 'ok';
            echo json_encode($json);
        } else {
            $json["reponse"] = 'erreur';
            $json["text"]    = 'Los datos son incorrectos.';
            echo json_encode($json);
        }
    }
}
?>