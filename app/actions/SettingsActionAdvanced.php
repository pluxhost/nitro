<?php
ob_start();
require_once '../../global.php';
ob_end_flush();
function generarCodigo($longitud)
{
    $key     = '';
    $pattern = '0123456789';
    $max     = strlen($pattern) - 1;
    for ($i = 0; $i < $longitud; $i++)
        $key .= $pattern{mt_rand(0, $max)};
    return $key;
}

$code = generarCodigo(6);

if ($_POST) {
    $type = $Functions->FilterText($_POST['type']);

    if ($type == 'password') {

        $n = $Functions->FilterPASS($_POST['n']);
        $v = $Functions->FilterPASS($_POST['v']);
        $o = $Functions->FilterPASS($_POST['o']);

        if ( password_verify($o, $Functions->User('password')) == 0 ) {
            $json["reponse"] = 'erreur';
            $json["message"] = 'Tu contraseña actual no coincide';
            echo json_encode($json);
        } elseif (strlen($n) < 6 || strlen($v) > 32) {
            $json["reponse"] = 'erreur';
            $json["message"] = 'Inserta una contraseña válida';
            echo json_encode($json);
        } elseif ($n !== $v) {
            $json["reponse"] = 'erreur';
            $json["message"] = 'Las contraseñas no son iguales';
            echo json_encode($json);
        } elseif ($Functions->UserCustom('time_pass', $Functions->User('id')) >= time() - 180) {
            $json["reponse"] = 'erreur';
            $json["message"] = 'Debes esperar 3 min. para volver a cambiar tu contraseña.';
            echo json_encode($json);
        } else {
            $json["reponse"] = 'ok';
            $json["message"] = 'Actualizado con éxito';
            echo json_encode($json);
			
			$pass = password_hash($n, PASSWORD_DEFAULT);

            $db->query("UPDATE $users SET password = '" . $pass . "' WHERE id = '{$Functions->User('id')}' LIMIT 1");

            $db->query("UPDATE cms_users SET time_pass = '" . time() . "' WHERE id = '{$Functions->User('id')}' LIMIT 1");

            $_SESSION['password'] = $pass;
        }
    } elseif ($type == 'pinone') {

        $pin      = $Functions->FilterText($_POST['pin']);
        $password = $Functions->FilterText($_POST['password']);
        $oldpin   = $Functions->FilterText($_POST['oldpin']);
		
		$pass = password_hash($password, PASSWORD_DEFAULT);
		
        if ( password_verify($password, $Functions->User('password')) == 0 ) {
            $json["reponse"] = 'erreur';
            $json["message"] = 'La contraseña no coincide';
            echo json_encode($json);
        } elseif (strlen($pin) < 4) {
            $json["reponse"] = 'erreur';
            $json["message"] = 'Tu PIN tiene que tener 4 dígitos.';
            echo json_encode($json);
        } elseif ($pin == '') {
            $json["reponse"] = 'erreur';
            $json["message"] = 'Ingrese un PIN';
            echo json_encode($json);
        } else {
            $json["reponse"] = 'ok';
            $json["message"] = 'Actualizado con éxito';
            echo json_encode($json);

            $db->query("UPDATE cms_users SET pincode = '{$pin}', pin = '2' WHERE id = '{$Functions->User('id')}' LIMIT 1");

        }
    } elseif ($type == 'pintwo') {

        $pin      = $Functions->FilterText($_POST['pin']);
        $password = $Functions->FilterText($_POST['password']);
        $oldpin   = $Functions->FilterText($_POST['oldpin']);
        $del      = $Functions->FilterText($_POST['del']);
		
		$pass = password_hash($password, PASSWORD_DEFAULT);

        if ($del == 'supp') {
            if ( password_verify($password, $Functions->User('password')) == 1 AND $oldpin == $Functions->UserCustom('pincode', $Functions->User('id'))) {

                $db->query("UPDATE cms_users SET pincode = '', pin = '0' WHERE id = '{$Functions->User('id')}' LIMIT 1");

                $json["reponse"] = 'ok';
                $json["message"] = 'Actualizado con éxito';
                echo json_encode($json);
            } elseif ( password_verify($password, $Functions->User('password')) == 0 ) {
                $json["reponse"] = 'erreur';
                $json["message"] = 'La contraseña no coincide';
                echo json_encode($json);
            } elseif ($oldpin !== $Functions->UserCustom('pincode', $Functions->User('id'))) {
                $json["reponse"] = 'erreur';
                $json["message"] = 'Tu PIN actual no coincide';
                echo json_encode($json);
            } else {

                $db->query("UPDATE cms_users SET pin = '0' WHERE id = '{$Functions->User('id')}' LIMIT 1");

                $json["reponse"] = 'ok';
                $json["message"] = 'Actualizado con éxito';
                echo json_encode($json);
            }
        } elseif ( password_verify($password, $Functions->User('password')) == 0 ) {
            $json["reponse"] = 'erreur';
            $json["message"] = 'La contraseña no coincide';
            echo json_encode($json);
        } elseif (strlen($pin) < 4) {
            $json["reponse"] = 'erreur';
            $json["message"] = 'Tu PIN tiene que tener 4 dígitos.';
            echo json_encode($json);
        } elseif ($pin == '') {
            $json["reponse"] = 'erreur';
            $json["message"] = 'Ingrese un PIN';
            echo json_encode($json);
        } elseif ($oldpin !== $Functions->UserCustom('pincode', $Functions->User('id'))) {
            $json["reponse"] = 'erreur';
            $json["message"] = 'Tu PIN actual no coincide';
            echo json_encode($json);
        } else {
            $json["reponse"] = 'ok';
            $json["message"] = 'Actualizado con éxito';
            echo json_encode($json);

            $db->query("UPDATE cms_users SET pincode = '{$pin}', pin = '2' WHERE id = '{$Functions->User('id')}' LIMIT 1");

        }
    } elseif ($type == 'mail1') {
        $mail = $Functions->FilterText($_POST['mail']);

        $ru = $db->query("SELECT * FROM $users WHERE mail = '{$mail}'");
        $u  = $ru->fetch_array();

        if ($mail == '') {
            $json["reponse"] = 'erreur';
            $json["message"] = 'Campos vacíos, inténtalo de nuevo.';
            echo json_encode($json);
        } elseif ($Functions->UserCustom('email', $Functions->User('id')) == 1 AND $mail == $Functions->User('mail')) {
            $json["reponse"] = 'erreur';
            $json["message"] = 'Correo electrónico existente, inténtalo de nuevo.';
            echo json_encode($json);
            /*}elseif($mail !== $user['mail'] AND $ru->num_rows == 1){
            $json["reponse"] = 'erreur';
            $json["message"] = 'Correo electrónico existente, inténtalo de nuevo.';
            echo json_encode($json);
            */
        } else {
            $json["reponse"] = 'ok';
            $json["etype"] = 'confirmemail';
            $json["eemail"] = $mail;
            echo json_encode($json);

            $db->query("UPDATE cms_users SET code_forgot = '" . $code . "', email = '0' WHERE id = '" . $Functions->User('id') . "'");

            $db->query("UPDATE $users SET mail = '" . $Functions->FilterText($mail) . "' WHERE id = '" . $Functions->User('id') . "'");
        }
    } elseif ($type == 'mail2') {

        $code = $Functions->FilterText($_POST['code']);

        $ru = $db->query("SELECT * FROM cms_users WHERE id = '{$Functions->User('id')}' AND code_forgot = '{$code}'");
        $u  = $ru->fetch_array();

        if ($code == '') {
            $json["reponse"] = 'erreur';
            $json["message"] = 'Campos vacíos, inténtalo de nuevo.';
            echo json_encode($json);
        } elseif ($Functions->UserCustom('code_forgot', $Functions->User('id')) !== $code) {
            $json["reponse"] = 'erreur';
            $json["message"] = 'Código incorrecto, inténtalo de nuevo.';
            echo json_encode($json);
        } else {
            $json["reponse"] = 'ok';
            $json["message"] = 'Tu dirección de correo electrónico ha sido confirmada.';
            echo json_encode($json);

            $db->query("UPDATE cms_users SET email = '1' WHERE id = '" . $Functions->User('id') . "'");
            
        }
    } elseif ($type == 'profile') {

        $p = $Functions->FilterText($_POST['p']);
        $b = $Functions->FilterText($_POST['b']);
        $c = $Functions->FilterText($_POST['c']);
        $t = $Functions->FilterText($_POST['t']);

        $ru = $db->query("SELECT * FROM cms_users WHERE id = '{$Functions->User('id')}'");
        $u  = $ru->fetch_array();

        if ($p == '' || $b == ''  || $c == '') {
            $json["reponse"] = 'erreur';
            $json["message"] = 'Campos vacíos, inténtalo de nuevo.';
            echo json_encode($json);
        } else {
            $json["reponse"] = 'ok';
            $json["message"] = 'Perfil editado.';
            echo json_encode($json);

            if ($t == 'pprofile') {
                $json["rp"] = '/app/assets/img/files/profile/ph.png';
            }elseif ($t == 'bprofile') {
                $json["rb"] = '/app/assets/img/files/profile/bg.gif';
            }

            $db->query("UPDATE cms_users SET photo = '{$p}', background = '{$b}', colour = '{$c}' WHERE id = '" . $Functions->User('id') . "'");
            
        }
    } elseif ($type == 'nightmode') {

        $ru = $db->query("SELECT * FROM cms_users WHERE id = '{$Functions->User('id')}'");
        $u  = $ru->fetch_array();

        if ($u['night_mode'] == 0) {
             $db->query("UPDATE cms_users SET night_mode = '1' WHERE id = '" . $Functions->User('id') . "'");
             $json["reponse"] = 'ok';
             $json["n"] = '1';
             echo json_encode($json);
        } else if ($u['night_mode'] == 1) {
            $db->query("UPDATE cms_users SET night_mode = '0' WHERE id = '" . $Functions->User('id') . "'");
            $json["reponse"] = 'ok';
            $json["n"] = '0';
            echo json_encode($json);
        }
    }
}
?>