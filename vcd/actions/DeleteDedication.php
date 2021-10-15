<?php
require_once '../../global.php';

    $id  = $Functions->FilterTextF($_POST['id']);

        $security = $db->query("SELECT * FROM cms_dedication WHERE id = '{$id}' AND user_id = '{$Functions->Me('id')}'");
        $sec      = $security->fetch_array();


        
        if ( $security->num_rows == 0 ) {
            $json["reponse"] = 'error';
            $json["msg"] = 'No puedes borrar esta dedicatoria.';
            echo json_encode($json);
        } else {
            $json["reponse"] = 'ok';
            $json["msg"] = 'Dedicatoria borrada correctamente.';

            $db->query("DELETE FROM cms_dedication WHERE id = '{$id}' LIMIT 1");
            echo json_encode($json);
        }
?>