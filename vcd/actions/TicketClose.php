<?php
require_once '../../global.php';

    $ticket    = $Functions->FilterText($_POST['ticket']);

    $security = $db->query("SELECT * FROM cms_tickets WHERE id = '{$ticket}' AND user_id = '{$Functions->Me('id')}' AND open = '0' ");
    $sec      = $security->fetch_array();

        if ( $security == 0 ) {
            $json["reponse"] = 'error';
            $json["msg"] = 'No puedes borrar este ticket.';
            echo json_encode($json);
        } else {
            $json["reponse"] = 'ok';
            $json["msg"] = 'Ticket cerrado correctamente.';

            $db->query("UPDATE cms_tickets SET open = '1' WHERE id = '{$ticket}' AND user_id = '{$Functions->Me('id')}' LIMIT 1");
            echo json_encode($json);
        }
?>