<?php
ob_start();
require_once '../../global.php';
ob_end_flush();


if ($_POST) {
    $type = $Functions->FilterText($_POST['type']);

    if ($type == 'ignore_invites') {
        if ($Functions->UserSettings('block_friendrequests') == 0) {
            $json["reponse"] = 'ok';
            $json["text"]    = 'NO';
            echo json_encode($json);
			
			$db->query("UPDATE users_settings SET block_friendrequests = '1'  WHERE id = '". $Functions->User('id') ."' LIMIT 1");

        } else {
            $json["reponse"] = 'ok';
            $json["text"]    = 'SÍ';
            echo json_encode($json);

            $db->query("UPDATE users_settings SET block_friendrequests = '0'  WHERE id = '". $Functions->User('id') ."' LIMIT 1");

        }
    } elseif ($type == 'block_roominvites') {
        if ($Functions->UserSettings('block_roominvites') == 0) {
            $json["reponse"] = 'ok';
            $json["text"]    = 'NO';
            echo json_encode($json);

            $db->query("UPDATE users_settings SET block_roominvites = '1'  WHERE id = '". $Functions->User('id') ."' LIMIT 1");

        } else {
            $json["reponse"] = 'ok';
            $json["text"]    = 'SÍ';
            echo json_encode($json);

            $db->query("UPDATE users_settings SET block_roominvites = '0'  WHERE id = '". $Functions->User('id') ."' LIMIT 1");

        }
    } elseif ($type == 'cms_mentions') {
        if ($Functions->UserCustom('cms_mentions', $Functions->User('id')) == 0) {
            $json["reponse"] = 'ok';
            $json["text"]    = 'NO';
            echo json_encode($json);

            $db->query("UPDATE cms_users SET cms_mentions = '1'  WHERE id = '" . $Functions->User('id') . "' LIMIT 1");

        } else {
            $json["reponse"] = 'ok';
            $json["text"]    = 'SÍ';
            echo json_encode($json);

            $db->query("UPDATE cms_users SET cms_mentions = '0'  WHERE id = '" . $Functions->User('id') . "' LIMIT 1");

        }
    }
}
?>