<?php
ob_start();
require_once '../../global.php';
ob_end_flush();

if ($_POST) {
    $id     = $Functions->FilterText($_POST['contentid']);
    $type   = $Functions->FilterText($_POST['type']);
    $page   = $Functions->FilterText($_POST['page']);

    $users = $db->query("SELECT * FROM $users WHERE username = '{$_SESSION['username']}' AND password = '{$_SESSION['password']}'");

    $result = $db->query("SELECT * FROM cms_likes WHERE publi_id = '" . $id . "' AND username = '" . $Functions->User('username') . "' AND page = '" . $page . "' LIMIT 1");
    $info   = $result->fetch_array();

    if ($users->num_rows > 0) {
        if ($result->num_rows == 0) {
            $json["reponse"] = 'new';
            echo json_encode($json);

            $dbRegister             = array();
            $dbRegister['username'] = $Functions->User('username');
            $dbRegister['type']     = $type;
            $dbRegister['page']     = $page;
            $dbRegister['publi_id'] = $id;
            $dbRegister['time']     = time();
            $query                  = $db->insertInto('cms_likes', $dbRegister);

        } elseif ($info["type"] == $type) {
            $json["reponse"] = 'remove';
            echo json_encode($json);

            $db->query("DELETE FROM cms_likes WHERE publi_id = '" . $id . "' AND username = '" . $Functions->User('username') . "' AND page = '" . $page . "' AND type = '" . $type . "' LIMIT 1");

        } else {
            $json["reponse"] = 'edit';
            $json["type"]    = $info["type"];
            echo json_encode($json);
            
            $db->query("UPDATE cms_likes SET type = '" . $type . "' WHERE publi_id = '" . $id . "' AND username = '" . $Functions->User('username') . "' AND page = '" . $page . "'");
        }
    }
}
?>