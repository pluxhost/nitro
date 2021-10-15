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

    if ($info['time'] >= time() - 60) {

        $json["reponse"] = 'erreur';
        $json["message"] = 'Hey.';
        echo json_encode($json);

    } else if ($result2->num_rows == 0) {
        $json["reponse"] = 'ok';
        $json["action"] = 'add';

        $rrp = $db->query("SELECT * FROM cms_timeline WHERE post_id = '".$info['retweet_id']."'");
        $info2   = $rrp->fetch_array();

        if ( $rrp->num_rows > 0 ) {

        $result3 = $db->query("SELECT * FROM cms_timeline WHERE post_id = '" . $info2['retweet_id'] . "'");

        }else{ 

        $result3 = $db->query("SELECT * FROM cms_timeline WHERE post_id = '" . $id . "'");

        }

        $json["rr"] = $result3->num_rows;

        $json["html2"] = '<i class="zoom fal fa-retweet" style="color: rgb(23,191,99);"></i>';

        echo json_encode($json);


        $dbQuery               = array();
        $dbQuery['user_id']    = $Functions->User('id');
        $dbQuery['type']       = 'retweet';
        $dbQuery['retweet_id'] = $id;
        $dbQuery['time']       = time();
        $query                 = $db->insertInto('cms_timeline', $dbQuery);


            if ($info['user_id'] !== $Functions->User('id')) {
            $dbQuery = array();
            $dbQuery['user_id']     = $Functions->User('id');
            $dbQuery['user_two_id'] = $info['user_id'];
            $dbQuery['category']    = 'post-rt';
            $dbQuery['publi_id']    = $id;
            $dbQuery['time']        = time();
            $query                  = $db->insertInto('cms_notifications', $dbQuery);
            }


    } else {
        $json["reponse"] = 'ok';
        $json["action"] = 'remove-rt';

        $rrp = $db->query("SELECT * FROM cms_timeline WHERE post_id = '".$id."'");
        $info2   = $rrp->fetch_array();

        if ( $rrp->num_rows > 0 ) {

        $result3 = $db->query("SELECT * FROM cms_timeline WHERE post_id = '" . $id . "'");

        }else{ 

        $result3 = $db->query("SELECT * FROM cms_timeline WHERE retweet_id = '" . $id . "'");

        }

        $json["rr"] = $result3->num_rows;

        $json["html2"] = '<i class="zoom fal fa-retweet"></i>';

        $db->query("DELETE FROM cms_timeline WHERE user_id = '" . $Functions->User('id') . "' AND retweet_id = '{$id}' LIMIT 1");
        $db->query("DELETE FROM cms_notifications WHERE user_id = '".$Functions->User('id')."' AND category = 'post-rt' AND publi_id = '".$id."' LIMIT 1");
        echo json_encode($json);
    }
}
?>