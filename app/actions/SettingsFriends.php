<?php
   ob_start();
   require_once '../../global.php';
   ob_end_flush();	
    
   
   $type = $Functions->FilterText($_POST['type']);
   $id = $Functions->FilterText($_POST['id']);
   
   
   
    if($type == "friendsinfo"){ 
   
   $result = $db->query("SELECT * FROM messenger_friendships WHERE id = '".$id."'");
   $data = $result->fetch_array();
   
   if($data['user_one_id'] == $Functions->User('id')){$friendv = $data['user_two_id'];}
                 elseif($data['user_two_id'] == $Functions->User('id')){$friendv = $data['user_one_id'];
                 }
   
   $u = $db->query("SELECT * FROM $users WHERE id = '".$friendv."'");
   $ui = $u->fetch_array(); 
   $rstats = $db->query("SELECT * FROM user_stats WHERE id = '".$ui['id']."'");
   $stats = $rstats->fetch_array();
   
   
   $json["username"] = $ui['username'];
   $json["activity_points"] = number_format($stats['AchievementScore']);
   $json["last_online"] = $Functions->GetLast2($ui['last_online']);
   $json["figure"] = AVATARIMAGE . $ui['look'].'&action=std&gesture=std&direction=2&head_direction=2&size=l&img_format=png';
   $json["motto"] = $Functions->FilterText($ui['motto']);
   $json["id"] = $id;
   	echo json_encode($json);
   
   
   
   
   }elseif($type == "deletefriend" && !empty($id)){ 
   
   $result = $db->query("SELECT * FROM messenger_friendships WHERE id = '".$id."'");
   $data = $result->fetch_array();
   
   if($result->num_rows == 0){ 
   $json["type"] = 'error';
   $json["message"] = 'No eres amigo de esta persona.';
   	echo json_encode($json);
   
   
   }elseif($id == $Functions->User('id')){ 
   $json["type"] = 'error';
   $json["message"] = 'Heyy, error.';
   	echo json_encode($json);
   
   
   }else{ 
   $json["type"] = 'success';
   $json["message"] = 'Este usuario ya no es tu amigo/a.';
   	echo json_encode($json);
   
   $db->query("DELETE FROM messenger_friendships WHERE id = '".$id."' LIMIT 1");
   
   
   if($data['user_one_id'] == $Functions->User('id')){$friendv = $data['user_two_id'];}
                 elseif($data['user_two_id'] == $Functions->User('id')){$friendv = $data['user_one_id'];
                 }
   
   $u = $db->query("SELECT * FROM $users WHERE id = '".$friendv."'");
   $ui = $u->fetch_array(); 
   }
   
   
   }elseif($type == "deleteallfriend"){ 
   
   $result = $db->query("SELECT * FROM messenger_friendships WHERE user_one_id = '".$Functions->User('id')."' OR user_two_id = '".$Functions->User('id')."'");
   
   if($result->num_rows == 0){ 
   $json["type"] = 'error';
   $json["message"] = 'No tienes amigos.';
   	echo json_encode($json);
   
   
   
   }else{ 
   $json["type"] = 'success';
   $json["message"] = 'Ya no tienes amigos.';
   	echo json_encode($json);
   
   $db->query("DELETE FROM messenger_friendships WHERE user_one_id = '".$Functions->User('id')."' OR user_two_id = '".$Functions->User('id')."'");
   }
   
   
   }
   
   ?>