<?php
   ob_start();
   require_once '../../global.php';
   ob_end_flush();	
      
   if($_POST)
   {
    $id = $Functions->FilterText($_POST['id']);
   
   if($Functions->User('rank') >= MERANK)
   {
   $result = $db->query("SELECT * FROM cms_timeline WHERE post_id = '{$id}' LIMIT 1");
   }else{
    $result = $db->query("SELECT * FROM cms_timeline WHERE post_id = '{$id}' AND user_id = '{$Functions->User('id')}' LIMIT 1");
   }
   
   
    if($result->num_rows > 0){
   	$json["reponse"] = 'ok';
   	echo json_encode($json);

    if($Functions->User('rank') >= MERANK)
   {
   $db->query("DELETE FROM cms_timeline WHERE post_id = '{$id}' LIMIT 1");
   }else{
    $db->query("DELETE FROM cms_timeline WHERE post_id = '{$id}' AND user_id = '{$Functions->User('id')}' LIMIT 1");
   }
   
   
   }else{
   	$json["reponse"] = 'erreur';
   	echo json_encode($json);
   	   
   }
   }
   
   ?>