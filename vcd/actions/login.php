<?php
require_once '../../global.php';
$user    = strtolower($Functions->FilterText($_POST['username']));
$pass    = $Functions->FilterPASS($_POST['password']);
$us      = $db->query("SELECT * FROM $users WHERE username = '" . $user . "' OR mail = '" . $user . "' ");
$u       = $us->fetch_array();
$Checked = $db->query("SELECT * FROM $users WHERE id = '{$u['id']}'");
$row     = $Checked->fetch_array();
if (password_verify($pass, $row['password'])) {
    $passFinal = $row['password'];
} else {
    $passFinal = NULL;
}
if (isset($user) AND isset($pass)) {
    if (empty($user) || empty($pass)) {
        $json["reponse"] = 'error';
        $json["msg"]     = 'Rellene los campos obligatorios.';
        echo json_encode($json);
    } elseif ($Functions->CheckLogged($u['username'], $passFinal)) {
        $json["reponse"] = 'ok';
        $json["msg"]     = 'Bienvenido '.$row['username'].', ya está conectado.';
        echo json_encode($json);
    } elseif ($us->num_rows == 0) {
        $json["reponse"] = 'error';
        $json["msg"]     = 'Los datos ingresados no fueron encontrados.';
        echo json_encode($json);
    } else {
        $json["reponse"] = 'error';
        $json["msg"]     = 'Los datos son incorrectos.';
        echo json_encode($json);
    }
}
?>