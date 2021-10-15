<?php
   ob_start();
   require_once '../../global.php';
   ob_end_flush();	
   
   if($_POST)
   {
    $type = $Functions->FilterText2($_POST['type']);
    $id = $Functions->FilterText($_POST['id']);
   
   if($Functions->User('id') > 0){
   
   if($type == "badges" && !empty($id)){
   
   $result = $db->query("SELECT * FROM cms_buy_badge WHERE id = '".$id."'");
   $data = $result->fetch_array();
   
   $rs = $db->query("SELECT * FROM user_badges WHERE user_id = '".$Functions->User('id')."' AND (badge_id = '".$data['code']."' OR badge_id = '".$data['code2']."' OR badge_id = '".$data['code3']."' OR badge_id = '".$data['code4']."' OR badge_id = '".$data['code5']."') LIMIT 1");
   $c = $rs->fetch_array();
   
   $rs1 = $db->query("SELECT * FROM user_badges WHERE user_id = '".$Functions->User('id')."' AND badge_id = '".$data['code']."' LIMIT 1");
   $c1 = $rs1->fetch_array();
   
   $rs2 = $db->query("SELECT * FROM user_badges WHERE user_id = '".$Functions->User('id')."' AND badge_id = '".$data['code2']."' LIMIT 1");
   $c2 = $rs2->fetch_array();
   
   $rs3 = $db->query("SELECT * FROM user_badges WHERE user_id = '".$Functions->User('id')."' AND badge_id = '".$data['code3']."' LIMIT 1");
   $c3 = $rs3->fetch_array();
   
   $rs4 = $db->query("SELECT * FROM user_badges WHERE user_id = '".$Functions->User('id')."' AND badge_id = '".$data['code4']."' LIMIT 1");
   $c4 = $rs4->fetch_array();
   
   $rs5 = $db->query("SELECT * FROM user_badges WHERE user_id = '".$Functions->User('id')."' AND badge_id = '".$data['code5']."' LIMIT 1");
   $c5 = $rs5->fetch_array();

   
   
   if($Functions->User('vip_points') < $data['price']){
   $json["reponse"] = 'monnaie';
   	echo json_encode($json);
    
    }elseif($Functions->User('online') == 1){

   $json["reponse"] = 'possede';
   $json["msg"] = 'Debes estar desconectado';
   echo json_encode($json);
   

    }elseif($rs->num_rows > 0){

   $json["reponse"] = 'possede';
   $json["msg"] = 'Ya tienes estas placas';
   echo json_encode($json);
   

    }else{
    
    $dbBadge['user_id'] = $Functions->User('id');
    $dbBadge['ip_user'] = $Functions->getRealIP();
    $dbBadge['value'] = 'Usted ha comprado un paquete de placas.';
    $dbBadge['value_staff'] = 'El usuario '.$Functions->User('username').' ha comprado el pack de placa de ID: '.$id;
    $dbBadge['time'] = time();
    $dbBadge['type'] = 'badge';
    $query = $db->insertInto('cms_trans_logs', $dbBadge);


	$db->query("UPDATE $users SET vip_points = vip_points - '".$data['price']."' WHERE id = '".$Functions->User('id')."'");
    $db->query("UPDATE cms_buy_badge SET dispo = dispo - '1' WHERE id = '".$data['id']."'");
		
  $r = $Functions->User('vip_points') - $data['price'];
	$json["jetons"] = $Functions->number_format_short($Functions->User('activity_points'));
	$json["diamants"] = $r;
     
    $json["reponse"] = 'ok';
   	echo json_encode($json);
	
	if($rs1->num_rows == 0){
	if($data['code'] == NULL){}else{
		$dbBadge= array();
    $dbBadge['user_id'] = $Functions->User('id');
    $dbBadge['badge_id'] = $data['code'];
    $query = $db->insertInto('user_badges', $dbBadge);
		}}
		
		if($rs2->num_rows == 0){
		if($data['code2'] == NULL){}else{
			$dbBadge= array();
    $dbBadge['user_id'] = $Functions->User('id');
    $dbBadge['badge_id'] = $data['code2'];
    $query = $db->insertInto('user_badges', $dbBadge);
			}}
			
			if($rs3->num_rows == 0){
			if($data['code3'] == NULL){}else{
				$dbBadge= array();
    $dbBadge['user_id'] = $Functions->User('id');
    $dbBadge['badge_id'] = $data['code3'];
    $query = $db->insertInto('user_badges', $dbBadge);
				}}
				
				if($rs4->num_rows == 0){
				if($data['code4'] == NULL){}else{
					$dbBadge= array();
    $dbBadge['user_id'] = $Functions->User('id');
    $dbBadge['badge_id'] = $data['code4'];
    $query = $db->insertInto('user_badges', $dbBadge);
					}}
					
					if($rs5->num_rows == 0){
					if($data['code5'] == NULL){}else{
						$dbBadge= array();
    $dbBadge['user_id'] = $Functions->User('id');
    $dbBadge['badge_id'] = $data['code5'];
    $query = $db->insertInto('user_badges', $dbBadge);
	}}
    
    }
    
    
   
   }/*elseif($type == "vip"){
   
   
   if($Functions->User('vip_points') <= 100){
   $json["reponse"] = 'monnaie';
   	echo json_encode($json);
    
    }elseif($Functions->User('rank') > 2){
		
   $json["reponse"] = 'erreur';
   $json["msg"] = 'Tu rango está por encima del VIP.';
   echo json_encode($json);
   
   }else{
   
   $db->query("UPDATE $users SET vip_points = vip_points - '100' WHERE id = '".$Functions->User('id')."'");
   $db->query("UPDATE $users SET vip_mes = vip_mes + '1' WHERE id = '".$Functions->User('id')."'");
   $db->query("UPDATE $users SET vip_time = '".time()."' WHERE id = '".$Functions->User('id')."'");
   $db->query("UPDATE $users SET rank = '2' WHERE id = '".$Functions->User('id')."'");
	
	
   $r = $Functions->User('vip_points') - 100;
	$json["jetons"] = $Functions->number_format_short($Functions->User('activity_points'));
	$json["diamants"] = $Functions->number_format_short($r);
	$json["date"] = $Functions->GetLastFace(time());
	
   $json["reponse"] = 'ok';
   echo json_encode($json);
   
   }
   
   }*/
   
   
   
   
   
   }
   
   
   
   
   
   }
   
   ?>