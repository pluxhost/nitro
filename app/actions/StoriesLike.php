<?php
ob_start();
require_once '../../global.php';
ob_end_flush();

if ($_POST) {
    $id     = $Functions->FilterText($_POST['id']);

    $result = $db->query("SELECT * FROM cms_stories_likes WHERE photo_id = '{$id}' AND user_id = '{$Functions->User('id')}' LIMIT 1");

    if ($Functions->User('id') > 0) {
        if ($result->num_rows > 0) {
            $json["type"] = '2';
            echo json_encode($json);

            $db->query("DELETE FROM cms_stories_likes WHERE photo_id = '{$id}' AND user_id = '{$Functions->User('id')}' LIMIT 1");

        } else {
            $json["type"] = '1';
            echo json_encode($json);
            
            $dbRegister             = array();
            $dbRegister['user_id']  = $Functions->User('id');
            $dbRegister['photo_id'] = $id;
            $dbRegister['time']     = time();
            $query                  = $db->insertInto('cms_stories_likes', $dbRegister);
        }
    }
}
?>