<?php
require_once '../../global.php';

    $post_id = $Functions->FilterText($_POST['id']);
    $content  = $Functions->FilterTextF($_POST['content']);

        $security = $db->query("SELECT * FROM cms_forum_comments WHERE user_id = '{$Functions->Me('id')}' ORDER BY id DESC");
        $sec      = $security->fetch_array();

        $rf = $db->query("SELECT * FROM cms_forum WHERE id = '{$post_id}' ORDER BY id DESC");
        $f  = $rf->fetch_array();

        if ( $content == '' || !empty($id)) {
            $json["reponse"] = 'error';
            $json["msg"] = 'Por favor complete los campos vacíos.';
            echo json_encode($json);
        } elseif ($f['comments'] == '0') {
            $json["reponse"] = 'error';
            $json["msg"] = 'No se puede comentar en este tema.';
            echo json_encode($json);
        } elseif (strlen($content) < 50) {
            $json["reponse"] = 'error';
            $json["msg"] = 'Su tema debe tener al menos 50 caracteres de largo.';
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
            $dbQuery['category'] = $f['category'];
            $dbQuery['time']     = time();
            $query               = $db->insertInto('cms_forum_comments', $dbQuery);
            $id                  = $db->insert_id();

            $resultf   = $db->query("SELECT * FROM cms_forum_comments WHERE id = '{$id}'");
            $foruminfo = $resultf->fetch_array();

            $json["post"] = '<div class="global-box content thread comment">
         <div class="body">
            <div class="top">
               <div class="avatar">
                  <img src="' . AVATARIMAGE . $Functions->Me('look') . '"></div>
               <div class="informations">
                  <span>Escrito por <a href="#" class="">' . $Functions->Me('username') . '</a></span> 
                  <span>Publicado justo ahora</span>
               </div>
               <div class="status"></div>
            </div>
            <div class="thread markdown-formatter">
               <p>' . $content . '</p>
            </div>
            <div class="informations">
               <span>No se ha realizado ninguna modificación a esta respuesta hasta la fecha</span> 
               <div class="right">
             
               </div>
            </div>
         </div>
      </div>';
            echo json_encode($json);
        }
?>