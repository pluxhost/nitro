<?php
require_once '../../global.php';

    $post_id = $Functions->FilterText($_POST['id']);
    $content  = $Functions->FilterTextF($_POST['content']);

        $security = $db->query("SELECT * FROM cms_news_comments WHERE user_id = '{$Functions->Me('id')}' ORDER BY id DESC");
        $sec      = $security->fetch_array();

        $rf = $db->query("SELECT * FROM cms_news WHERE id = '{$post_id}' ORDER BY id DESC");
        $f  = $rf->fetch_array();

        if ( $content == '' || !empty($id)) {
            $json["reponse"] = 'error';
            $json["msg"] = 'Por favor complete los campos vacíos.';
            echo json_encode($json);
        } elseif (strlen($content) < 10) {
            $json["reponse"] = 'error';
            $json["msg"] = 'Su tema debe tener al menos 10 caracteres de largo.';
            echo json_encode($json);
        } elseif ($sec['time'] >= time() - 300) {
            $json["reponse"] = 'error';
            $json["msg"] = 'Debes esperar 5 min. para crear otro tema.';
            echo json_encode($json);
        } else {
            $json["reponse"] = 'ok';
            $json["msg"] = 'Comentario creado con éxito.';

            $dbQuery             = array();
            $dbQuery['user_id']  = $Functions->Me('id');
            $dbQuery['post_id']  = $post_id;
            $dbQuery['content']  = $content;
            $dbQuery['time']     = time();
            $query               = $db->insertInto('cms_news_comments', $dbQuery);
            $id                  = $db->insert_id();

            $resultf   = $db->query("SELECT * FROM cms_news_comments WHERE id = '{$id}'");
            $foruminfo = $resultf->fetch_array();

            $json["post"] = '<div class="global-box box-comment">
            <div class="content">
               <div class="left">
                  <div class="avatar">
                     <img src="' . AVATARIMAGE . $Functions->Me('look') . '">
                  </div>
               </div>
               <div class="right">
                  <div class="top">
                     Publicado por <a href="/homepage/' . $Functions->Me('username') . '" class="">' . $Functions->Me('username') . '</a> justo ahora
                  </div>
                  <span class="message-emotes habbofont value">' . $content . '</span>
               </div>
            </div>
         </div>';
            echo json_encode($json);
        }
?>