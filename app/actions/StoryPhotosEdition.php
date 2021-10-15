<?php
ob_start();
require_once '../../global.php';
ob_end_flush();

$id          = $Functions->FilterText($_POST['id']);
$positionTop = $Functions->FilterText($_POST['positionTop']);
$content     = $Functions->FilterText($_POST['content']);

$result = $db->query("SELECT * FROM cms_stories WHERE photo = '{$id}' LIMIT 1");
$info   = $result->fetch_array();
if ($result->num_rows > 0) {

	 $db->query("UPDATE items_camera SET `top` = '" . $positionTop . "', `text` = '" . $content . "' WHERE id = '" . $id . "'");

    $db->query("UPDATE cms_stories SET `top` = '" . $positionTop . "', `text` = '" . $content . "' WHERE photo = '" . $id . "'");
    
    $json["reponse"] = 'ok';
    echo json_encode($json);
} else {

	$db->query("UPDATE items_camera SET `top` = '" . $positionTop . "', `text` = '" . $content . "' WHERE id = '" . $id . "'");

    $db->query("UPDATE cms_stories SET `top` = '" . $positionTop . "', `text` = '" . $content . "' WHERE photo = '" . $id . "'");
    
    $json["reponse"] = 'ok';
    echo json_encode($json);
}
?>