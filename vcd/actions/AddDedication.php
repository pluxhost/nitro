<?php
require_once '../../global.php';

    $content  = $Functions->FilterTextF($_POST['content']);

        $security = $db->query("SELECT * FROM cms_dedication WHERE user_id = '{$Functions->Me('id')}' ORDER BY id DESC");
        $sec      = $security->fetch_array();
        $amountFinal = 10 - $Functions->Me('points');
        $pfinal = abs($amountFinal);

        if ( $Functions->Me('points') < 10 ) {
            $json["reponse"] = 'error';
            $json["msg"] = 'Le falta '.$amountFinal.' Diamantes para hacer una dedicatoria.';
            echo json_encode($json);
        } elseif ( $content == '') {
            $json["reponse"] = 'error';
            $json["msg"] = 'Por favor complete los campos vacíos.';
            echo json_encode($json);
        } elseif ($sec['time'] >= time() - 300) {
            $json["reponse"] = 'error';
            $json["msg"] = 'Debes esperar 5 min. para crear otro tema.';
            echo json_encode($json);
        } else {
            $json["reponse"] = 'ok';
            $json["msg"] = 'Dedicatoria creada correctamente, se validará en unos instantes...';

           //$db->query("UPDATE $users SET points = points - '10' WHERE id = '{$Functions->Me('id')}'");
             $db->query("UPDATE users_currency SET amount = $pfinal WHERE user_id  = '{$Functions->Me('id')}' AND type = '5' ");
             



            $dbQuery             = array();
            $dbQuery['user_id']  = $Functions->Me('id');
            $dbQuery['message']  = $content;
            $dbQuery['public']   = '1';
            $dbQuery['time']     = time();
            $query               = $db->insertInto('cms_dedication', $dbQuery);
            $id                  = $db->insert_id();


            $resultf   = $db->query("SELECT * FROM cms_dedication WHERE id = '{$id}'");
            $foruminfo = $resultf->fetch_array();

            $json["post"] = '<div class="line" id="'.$foruminfo['id'].'">
                     <div class="message-emotes">
                        <img src="'.FILES.'/assets/img/ticket-close.png">
                        '.$Functions->FilterTextF($foruminfo['message']).'
                     </div>
                     <div class="btn" onclick="deleteDedication('.$foruminfo['id'].');">Borrar</div>
                  </div>';
            echo json_encode($json);
        }
?>
