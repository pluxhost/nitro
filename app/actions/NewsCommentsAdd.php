<?php
   ob_start();
   require_once '../../global.php';
   ob_end_flush();	
   
   
   if($_POST)
   {
    $message = $Functions->FilterText2($_POST['contenu']);
    $newsid = $Functions->FilterText($_POST['newsid']);
   
   
   
   
   $result = $db->query("SELECT * FROM cms_comments_news WHERE new_id = '".$newsid."' AND username = '".$Functions->User('username')."'");
   $info = $result->fetch_array();
   
   
   
   if($info['time'] >= time() - 180){
   $json["reponse"] = 'erreur';
   $json["message"] = 'Debes esperar 3 min. para enviar otro mensaje.';
   	echo json_encode($json);
    
    }else{
     
    $json["reponse"] = 'ok';
   	echo json_encode($json);
    
    $dbQuery= array();
          $dbQuery['username'] = $Functions->User('username');
          $dbQuery['commentary'] = $message;
          $dbQuery['new_id'] = $newsid;
          $dbQuery['time'] = time();
          $query = $db->insertInto('cms_comments_news', $dbQuery);
    
    }
    
    
   
   }
   
   ?>