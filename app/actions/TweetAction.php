<?php
ob_start();
require_once '../../global.php';
ob_end_flush();


if ($_POST) {
    if ($Functions->User('id') > 0) {

    $id     = $Functions->FilterText($_POST['id']);
    $action = $Functions->FilterText($_POST['action']);

    if ($action == "like") {

        $result = $db->query("SELECT * FROM cms_posts_fav WHERE post_id = '" . $id . "' AND user_id = '" . $Functions->User('id') . "' LIMIT 1");
        $info   = $result->fetch_array();

        if ($result->num_rows == 0) {
            $json["action"] = 'add';

            $dbQuery            = array();
            $dbQuery['post_id'] = $id;
            $dbQuery['user_id'] = $Functions->User('id');
            $dbQuery['time']    = time();
            $query              = $db->insertInto('cms_posts_fav', $dbQuery);

            $rp = $db->query("SELECT * FROM cms_timeline WHERE post_id = '" . $id . "'");
            $post   = $rp->fetch_array();

            if ($post['user_id'] !== $Functions->User('id')) {
            $dbQuery = array();
            $dbQuery['user_id']     = $Functions->User('id');
            $dbQuery['user_two_id'] = $post['user_id'];
            $dbQuery['category']    = 'post-fav';
            $dbQuery['publi_id']    = $id;
            $dbQuery['time']        = time();
            $query                  = $db->insertInto('cms_notifications', $dbQuery);
            }

            $result2 = $db->query("SELECT * FROM cms_posts_fav WHERE post_id = '" . $id . "'");

            $json["rr"] = $result2->num_rows;

            $json["html"] = '<i class="fas fa-heart" style="color: rgb(224,36,94);"></i> <span style="color: rgb(224,36,94);"><span id="texttt">'.$result2->num_rows.'</span></span>';
             $json["html2"] = '<i class="fas fa-heart" style="color: rgb(224,36,94);"></i>';
            echo json_encode($json);

        } else {
            $json["action"] = 'remove-fav';

            $db->query("DELETE FROM cms_posts_fav WHERE post_id = '{$id}' AND user_id = '" . $Functions->User('id') . "' LIMIT 1");
            $db->query("DELETE FROM cms_notifications WHERE user_id = '".$Functions->User('id')."' AND category = 'post-fav' AND publi_id = '".$id."' LIMIT 1");

            $result2 = $db->query("SELECT * FROM cms_posts_fav WHERE post_id = '" . $id . "'");

            $json["html"] = '<i class="fal fa-heart"></i> <span id="texttt">'.$result2->num_rows.'</span>';
            $json["html2"] = '<i class="fal fa-heart"></i>';
            $json["rr"] = $result2->num_rows;
            echo json_encode($json);

        }
    } 
}
}
?>