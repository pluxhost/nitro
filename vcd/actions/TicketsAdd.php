<?php
require_once '../../global.php';

    $subject    = $Functions->FilterText($_POST['subject']);
    $category   = $Functions->FilterText($_POST['category']);
    $content    = $Functions->FilterTextF($_POST['content']);
    $screenshot = $Functions->FilterTextF($_POST['screenshot']);

        $security = $db->query("SELECT * FROM cms_tickets WHERE user_id = '{$Functions->Me('id')}' ORDER by id DESC");
        $sec      = $security->fetch_array();

        if ($subject == '' || $category == '' || $content == '') {
            $json["reponse"] = 'error';
            $json["msg"] = 'Por favor complete los campos vacíos.';
            echo json_encode($json);
        } elseif (strlen($content) < 50) {
            $json["reponse"] = 'error';
            $json["msg"] = 'Su ticket debe tener al menos 50 caracteres de largo.';
            echo json_encode($json);
        } elseif ($sec['time'] >= time() - 300) {
            $json["reponse"] = 'error';
            $json["msg"] = 'Debes esperar 5 min. para crear otro ticket.';
            echo json_encode($json);
        } else {
            $json["reponse"] = 'ok';
            $json["msg"] = 'Ticket enviado correctamente.';

            $dbQuery             = array();
            $dbQuery['user_id']  = $Functions->Me('id');
            $dbQuery['subject']  = $subject;
            $dbQuery['content']  = $content;
            $dbQuery['category'] = $category;
            $dbQuery['type']     = '0';
            $dbQuery['time']     = time();
            $query               = $db->insertInto('cms_tickets', $dbQuery);
            $id                  = $db->insert_id();

            $resultf   = $db->query("SELECT * FROM cms_tickets WHERE id = '{$id}' ORDER BY id DESC LIMIT 1");
            $ticketinfo = $resultf->fetch_array();

            $json["post"] = '<div class="ticket">
                     <div class="title" ticket="'.$ticketinfo['id'].'">
                        <div class="status">
                           <img id="status'.$ticketinfo['id'].'" src="'.FILES.'/assets/img/ticket-open.png"></div>
                           '.$Functions->FilterText($ticketinfo['subject']).'
                     </div> 
                     <div class="body" style="display: none;" ticketBody="'.$ticketinfo['id'].'"></div> 
                        </div>
                     </div>';
            echo json_encode($json);
        }
?>