<?php
ob_start();
require_once '../../global.php';
ob_end_flush();

if ($_POST) {
    $user    = $Functions->FilterText($_POST['pseudo']);
    $mail    = $Functions->FilterText($_POST['mail']);
    $pass    = $Functions->FilterPASS($_POST['password']);
    $captcha = $Functions->FilterText($_POST['captcha']);
    $figure  = $Functions->FilterText($_POST['figure']);
    $gender  = $Functions->FilterText($_POST['gender']);

    $json["reponse"] = 'ok';
    echo json_encode($json);

    $dbRegister                    = array();
    $dbRegister['username']        = $user;
    $dbRegister['password']        = md5($pass);
    $dbRegister['mail']            = $mail;
    $dbRegister['rank']            = 1;
    $dbRegister['look']            = $figure;
    $dbRegister['gender']          = $gender;
	$dbRegister['account_created'] = time();
    $dbRegister['last_online']     = time();
    $dbRegister['ip_last']         = $Functions->getRealIP();
    $dbRegister['ip_reg']          = $Functions->getRealIP();
    $query                         = $db->insertInto('users', $dbRegister);


    $dbUsers         = array();
    $dbUsers['time'] = time();
    $query           = $db->insertInto('cms_users', $dbUsers);
    
    if ($Functions->CheckLogged($user, md5($pass))) {
        session_start();
        $_SESSION['connection_type'] = "id";
    }
}
?>