<?php
   ob_start();
   require_once '../../global.php';
   ob_end_flush();	
   
   
   if($_POST)
   {
    $type = $Functions->FilterText($_POST['type']);
    $id = $Functions->FilterText($_POST['id']);
   
   
   if($type == 'mobis'){
	   $sqlss = $db->query("SELECT * FROM items WHERE room_id = '0' AND user_id = '".$Functions->User('id')."' AND item_id = '". $id ."'");
	   
   $sql3 = $db->query("SELECT * FROM furniture WHERE id = '". $id ."'");
   $item = $sql3->fetch_array();

   
    if($sqlss->num_rows > 0){
   	$json["reponse"] = 'ok';
	$json["image"] = SWFICON . str_replace("*","_", $item['item_name']).'_icon.png';
	$json["nom"] = $item['public_name'];
   	echo json_encode($json);
   }else{
   $json["reponse"] = 'erreur';
   	echo json_encode($json);
   }
   
   
   }elseif($type == 'mobisdelete'){
   if($user['online'] == 1){

		}else{
			$db->query("DELETE FROM items WHERE user_id = '".$Functions->User('id')."' && item_id = '".$id."' && room_id = '0'");
			
		$json["reponse"] = 'ok';
		echo json_encode($json);
	  }
   
   
   }elseif($type == 'badges'){
$sql = $db->query("SELECT * FROM users_badges WHERE id = '". $id ."'");
$badge = $sql->fetch_array();

   
    if($sql->num_rows > 0){
   	$json["reponse"] = 'ok';
	$json["image"] = BADGEURL . $badge['badge_id'].'.gif';
	$json["nom"] = $badge['badge_id'];
   	echo json_encode($json);
   }else{
   $json["reponse"] = 'erreur';
   	echo json_encode($json);
   }
   
   
   }elseif($type == 'badgesdelete'){
  $db->query("DELETE FROM users_badges WHERE user_id = '".$Functions->User('id')."' && id = '".$id."' LIMIT 1");
		$json["reponse"] = 'ok';
		echo json_encode($json);
	  }
   
   
   }
      
   ?>