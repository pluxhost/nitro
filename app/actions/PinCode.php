<?php
   ob_start();
   require_once '../../global.php';
   ob_end_flush();	
      
   if($_POST)
   {
    $pin = $Functions->FilterText($_POST['pin']);
	$t = $Functions->FilterText($_POST['t']);
   
      
   if($t == 1){
    if($Functions->UserCustom('pincode', $Functions->User('id')) == $pin){
   	$json["reponse"] = 'ok';
   	echo json_encode($json);
   	
    $db->query("UPDATE cms_users SET pin_attempts = '3'  WHERE id = '".$Functions->User('id')."' LIMIT 1");
    $db->query("UPDATE cms_users SET pin = '2'  WHERE id = '".$Functions->User('id')."' LIMIT 1");
	$db->query("UPDATE cms_users SET pin_time = '".time()."'  WHERE id = '".$Functions->User('id')."' LIMIT 1");
   
   
   }elseif($Functions->UserCustom('pin_attempts', $Functions->User('id')) == 3 AND $Functions->UserCustom('pincode', $Functions->User('id')) !== $pin){

   $json["reponse"] = 'erreur';
   	echo json_encode($json);
   	
	$db->query("UPDATE cms_users SET pin_attempts = pin_attempts - '1' WHERE id = '".$Functions->User('id')."' LIMIT 1");
   
   }elseif($Functions->UserCustom('pin_attempts', $Functions->User('id')) == 2 AND $Functions->UserCustom('pincode', $Functions->User('id')) !== $pin){
   
   $json["reponse"] = 'erreur2';
   	echo json_encode($json);
   	
	$db->query("UPDATE cms_users SET pin_attempts = pin_attempts - '1' WHERE id = '".$Functions->User('id')."' LIMIT 1");
   
   
   }elseif($Functions->UserCustom('pin_attempts', $Functions->User('id')) == 1 AND $Functions->UserCustom('pincode', $Functions->User('id')) !== $pin){
   
   $json["reponse"] = 'erreur3';
   	echo json_encode($json);
	$db->query("UPDATE cms_users SET pin_attempts = pin_attempts - '1' WHERE id = '".$Functions->User('id')."' LIMIT 1");
    $db->query("UPDATE cms_users SET pin_time = '".time()."'  WHERE id = '".$Functions->User('id')."' LIMIT 1");

   
   }
   
   }elseif($t == 2){
   
   $json["reponse"] = 'ok';
   	echo json_encode($json);
	

   
   
   }
   
   }
   
   ?>