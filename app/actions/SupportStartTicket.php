<?php
ob_start();
require_once '../../global.php';
ob_end_flush();

if ($_POST) {
    $sujetTitle = $Functions->FilterText($_POST['sujetTitle']);
    $category   = $Functions->FilterText($_POST['category']);
    $priority   = $Functions->FilterText($_POST['priority']);
    $editeur    = $Functions->FilterText2($_POST['details']);

    $security = $db->query("SELECT * FROM cms_tickets WHERE username = '" . $Functions->User('username') . "' ORDER by id DESC");
    $sec      = $security->fetch_array();

    if (strlen($editeur) < 30) {
        $json["type"]    = 'error';
        $json["message"] = 'Necesitamos más detalles.';
        echo json_encode($json);
    } elseif ($sec['time'] >= time() - 180) {
        $json["type"]    = 'error';
        $json["message"] = 'Debes esperar 3 min. para enviar otro mensaje.';
        echo json_encode($json);
    } else {
        $json["type"] = 'success';
        echo json_encode($json);
        
        $dbQuery             = array();
        $dbQuery['username'] = $Functions->User('username');
        $dbQuery['title']    = $sujetTitle;
        $dbQuery['content']  = $editeur;
        $dbQuery['category'] = $category;
        $dbQuery['type']     = "ticket";
        $dbQuery['priority'] = $priority;
        $dbQuery['time']     = time();
        $query               = $db->insertInto('cms_tickets', $dbQuery);
    }
}
?>