<?php
   ob_start();
   require_once '../../global.php';
   ob_end_flush();	
      
   if($_POST)
   {
    $id = $Functions->FilterText($_POST['id']);
   

    $result = $db->query("SELECT * FROM cms_notifications WHERE id = '{$id}' AND user_two_id = '{$Functions->User('id')}' LIMIT 1");
   
   
    if($result->num_rows > 0){
   	$json["reponse"] = 'ok';
   	echo json_encode($json);

   
    $db->query("DELETE FROM cms_notifications WHERE id = '{$id}' AND user_two_id = '{$Functions->User('id')}' LIMIT 1");
   
   
   
   }}
   
   ?>