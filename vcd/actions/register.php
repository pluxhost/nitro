<?php
require_once '../../global.php';
$user        = $Functions->FilterText($_POST['username']);
$email       = strtolower($Functions->FilterText($_POST['email']));
$pass        = $Functions->FilterText($_POST['password']);
$rpass       = $Functions->FilterText($_POST['repassword']);
$reemail       = $Functions->FilterText($_POST['reemail']);
$birthday       = $Functions->FilterText($_POST['birthday']);
$look       = $Functions->FilterText($_POST['look']);
$gender       = $Functions->FilterText($_POST['gender']);


$result      = $db->query("SELECT * FROM $users WHERE username = '{$user}' OR mail = '{$email}' LIMIT 1");
$resultuser  = $db->query("SELECT * FROM $users WHERE username = '{$user}' LIMIT 1");
$resultmail  = $db->query("SELECT * FROM $users WHERE mail = '{$email}' LIMIT 1");
$filter      = preg_replace("/[^a-z\d\-=\!@:\.,]/i", "", $user);
$email_check = preg_match("/^[a-z0-9_\.-]+@([a-z0-9]+([\-]+[a-z0-9]+)*\.)+[a-z]{2,7}$/i", $email);


if ( $user == '' || $email == '' || $reemail == '' || $pass == '' || $rpass == '' || $birthday == '' ) {
    $json["reponse"] = 'error';
    $json["msg"]     = 'Rellene los campos obligatorios.';
    echo json_encode($json);
} elseif ( $resultuser->num_rows > 0 ) {
    $json["reponse"] = 'error';
    $json["msg"]     = 'El usuario ya está en uso.';
    echo json_encode($json);
} elseif ( $user !== $filter || strlen($user) < 2 || strlen($user) > 18 || strpos($user, 'MOD-') !== false || strpos($user, 'mod-') !== false || strpos($user, 'ADM-') !== false || strpos($user, 'adm-') !== false ) {
    $json["reponse"] = 'error';
    $json["msg"]     = 'Ingrese un nombre de usuario válido.';
    echo json_encode($json);
} elseif ( $email !== $reemail ) {
    $json["reponse"] = 'error';
    $json["msg"]     = 'El correo electrónico no coincide.';
    echo json_encode($json);
} elseif ( $resultmail->num_rows > 0 ) {
    $json["reponse"] = 'error';
    $json["msg"]     = 'El correo electrónico ya está en uso.';
    echo json_encode($json);
} elseif ( $email_check !== 1 ) {
    $json["reponse"] = 'error';
    $json["msg"]     = 'Ingrese un correo electrónico válido.';
    echo json_encode($json);
} elseif ( strlen($pass) !== strlen($rpass) ) {
    $json["reponse"] = 'error';
    $json["msg"]     = 'Las contraseñas no coinciden.';
    echo json_encode($json);
} else {
    $json["reponse"] = 'ok';

    $dbRegister                    = array();
    $dbRegister['username']        = $user;
    $dbRegister['password']        = password_hash($pass, PASSWORD_DEFAULT);
    $dbRegister['mail']            = $email;
    $dbRegister['account_created'] = time();
    $dbRegister['last_login']      = time();
    $dbRegister['last_online']     = time();
    $dbRegister['look']            = $look;
    $dbRegister['gender']          = $gender;
    $dbRegister['rank']            = 1;
    $dbRegister['ip_register']     = $Functions->getRealIP();
    $dbRegister['ip_current']      = $Functions->getRealIP();
    $query                         = $db->insertInto($users, $dbRegister);
    $id                            = $db->insert_id();



    $brthdy = explode('/',$birthday);

    $dbUsers          = array();
    $dbUsers['id']    = $id;
    $dbUsers['time']  = time();
    $dbUsers['day']   = $brthdy[0];
    $dbUsers['month'] = $brthdy[1];
    $dbUsers['year']  = $brthdy[2];
    $query            = $db->insertInto('cms_users', $dbUsers);

    $Checked                       = $db->query("SELECT * FROM $users WHERE id = '{$id}'");
    $row                           = $Checked->fetch_array();
        //creamos los diamantes a 0 y duckets

        $db->query("INSERT INTO `users_currency` (`user_id`, `type`, `amount`) VALUES ($id, '0', '".DUCKETS."');");
        $db->query("INSERT INTO `users_currency` (`user_id`, `type`, `amount`) VALUES ($id, '5', '".DIAMANTES."');");

    if ( $gender == 'M' ) {
        $gt = 'Bienvenido';
    } elseif ( $gender == 'F' ) {
        $gt = 'Bienvenida';
    }

    $json["msg"]     = $gt .' '. $row['username'].', se registró correctamente.';
    echo json_encode($json);


    if (password_verify($pass, $row['password'])) {
        $passFinal = $row['password'];
    } else {
        $passFinal = NULL;
    }
    if ($Functions->CheckLogged($user, $passFinal)) {
        session_start();
        $_SESSION['connection_type'] = "id";
    }
}
?>
