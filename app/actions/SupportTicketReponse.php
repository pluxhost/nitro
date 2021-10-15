<?php
ob_start();
require_once '../../global.php';
ob_end_flush();

if ($_POST) {
    $message    = $Functions->FilterText2($_POST['message']);
    $ticketid   = $Functions->FilterText($_POST['ticketid']);

    $rticket    = $db->query("SELECT * FROM cms_tickets WHERE id = '" . $ticketid . "'");
    $ticketinfo = $rticket->fetch_array();

    $rt = $db->query("SELECT * FROM cms_tickets WHERE id = '" . $ticketid . "' AND type = 'ticket'");
    $t  = $rt->fetch_array();

    if ($rticket->num_rows == 0) {
        $json["type"] = 'error';
        echo json_encode($json);
    } else {
        $json["type"] = 'success';
        echo json_encode($json);

        $dbQuery              = array();
        $dbQuery['username']  = $Functions->User('username');
        $dbQuery['content']   = $message;
        $dbQuery['category']  = $ticketinfo['category'];
        $dbQuery['time']      = time();
        $dbQuery['type']      = "respuestaticket";
        $dbQuery['priority']  = $$ticketinfo['priority'];
        $dbQuery['title']     = $ticketinfo['title'];
        $dbQuery['posted_in'] = $ticketid;
        $query                = $db->insertInto('cms_tickets', $dbQuery);
        
        $db->query("UPDATE cms_tickets SET abierto = '0', cerrado = '0' WHERE id = '" . $ticketid . "'");
    }
}
?>