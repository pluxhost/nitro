<?php
ob_start();
require_once '../../global.php';
ob_end_flush();

if ($_POST) {
    $message = $Functions->FilterTextF($_POST['message']);
    $id      = $Functions->FilterText($_POST['id']);

    $result = $db->query("SELECT * FROM cms_timeline WHERE post_id = '" . $id . "'");
    $info   = $result->fetch_array();

    $result2 = $db->query("SELECT * FROM cms_timeline WHERE user_id = '" . $Functions->User('id') . "' AND retweet_id = '" . $id . "' LIMIT 1");
    $info2    = $result2->fetch_array();

    $result3 = $db->query("SELECT * FROM cms_timeline WHERE retweet_id = '" . $id . "'");

    if ($result2->num_rows > 0) {
        $rrr = $result3->num_rows - 1;
        
        $json["reponse"] = 'ok';
        $json["action"] = 'remove-rt';
        $json["id"] = $info2['post_id'];
        $json["html"] = '<i class="zoom fal fa-retweet"></i> 
                           <span id="texttt">'.$rrr.'</span>';

        $db->query("DELETE FROM cms_timeline WHERE user_id = '" . $Functions->User('id') . "' AND retweet_id = '{$id}' LIMIT 1");
        $db->query("DELETE FROM cms_notifications WHERE user_id = '".$Functions->User('id')."' AND category = 'post-rt' AND publi_id = '".$id."' LIMIT 1");
        echo json_encode($json);
    }
}
?>