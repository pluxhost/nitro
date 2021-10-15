<?php
require_once '../../global.php';

    $title    = $Functions->FilterText($_POST['title']);
    $category = $Functions->FilterText($_POST['category']);
    $content  = $Functions->FilterTextF($_POST['content']);
    //$type      = $Functions->FilterText($_POST['type']);
    //$id        = $Functions->FilterText($_POST['id']);

        $security = $db->query("SELECT * FROM cms_forum WHERE user_id = '{$Functions->Me('id')}' ORDER by id DESC");
        $sec      = $security->fetch_array();

        if ($title == '' || $category == '' || $content == '') {
            $json["reponse"] = 'error';
            $json["msg"] = 'Por favor complete los campos vacíos.';
            echo json_encode($json);
        } elseif (strlen($content) < 150) {
            $json["reponse"] = 'error';
            $json["msg"] = 'Su tema debe tener al menos 150 caracteres de largo.';
            echo json_encode($json);
        } elseif (strlen($title) < 10) {
            $json["reponse"] = 'error';
            $json["msg"] = 'El título de su tema debe tener al menos 10 caracteres de largo.';
            echo json_encode($json);
        } elseif ($sec['time'] >= time() - 300) {
            $json["reponse"] = 'error';
            $json["msg"] = 'Debes esperar 5 min. para crear otro tema.';
            echo json_encode($json);
        } else {
            $json["reponse"] = 'ok';
            $json["msg"] = 'Tema creado con éxito.';

            $dbQuery             = array();
            $dbQuery['user_id']  = $Functions->Me('id');
            $dbQuery['title']    = $title;
            $dbQuery['content']  = $content;
            $dbQuery['category'] = $category;
            $dbQuery['time']     = time();
            $query               = $db->insertInto('cms_forum', $dbQuery);
            $id                  = $db->insert_id();

            $resultf   = $db->query("SELECT * FROM cms_forum WHERE id = '{$id}' ORDER BY id DESC LIMIT 1");
            $foruminfo = $resultf->fetch_array();

            $json["id"] = $foruminfo['id'] . '-' . $Functions->FilterTextLink($foruminfo['title']);
            echo json_encode($json);
        }
?>