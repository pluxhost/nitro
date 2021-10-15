<?php
ob_start();
require_once '../../global.php';
ob_end_flush();

if ($_POST) {
    $id = $Functions->FilterText($_POST['id']);

    $result = $db->query("SELECT * FROM cms_stories WHERE photo = '{$id}' LIMIT 1");
    $info   = $result->fetch_array();

    if ($result->num_rows > 0) {

        $db->query("DELETE FROM cms_stories WHERE photo = '" . $id . "'");
        $db->query("DELETE FROM cms_stories_views WHERE photo_id = '" . $info['id'] . "'");
        $db->query("DELETE FROM cms_stories_likes WHERE photo_id = '" . $info['id'] . "'");
        
        $json["reponse"] = 'ok';
        echo json_encode($json);
    } else {
    }
}
?>