<?php
ob_start();
require_once '../../global.php';
ob_end_flush();

if ($_POST) {
    $id          = $Functions->FilterText($_POST['id']);
    $positionTop = $Functions->FilterText($_POST['positionTop']);
    $content     = $Functions->FilterText($_POST['content']);

    $result = $db->query("SELECT * FROM cms_stories WHERE photo = '{$id}' LIMIT 1");

    if ($result->num_rows > 0) {
        $json["reponse"] = 'error';
        echo json_encode($json);
    } else {
        $json["reponse"] = 'ok';
        echo json_encode($json);

        $dbRegister            = array();
        $dbRegister['user_id'] = $Functions->User('id');
        $dbRegister['photo']   = $id;
        $dbRegister['top']     = $positionTop;
        $dbRegister['text']    = $content;
        $dbRegister['time']    = time();
        $query                 = $db->insertInto('cms_stories', $dbRegister);

        $db->query("UPDATE items_camera SET `text` = '" . $content . "' WHERE id = '" . $id . "' AND creator_id = '".$Functions->User('id')."'");

        
        $db->query("UPDATE users SET cms_stories = cms_stories + '1' WHERE id = '" . $Functions->User('id') . "'");
    }
}
?>