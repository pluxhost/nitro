<?php
   ob_start();
   require_once '../../global.php';
   ob_end_flush();   
   
   
   function generarCodigo($longitud) {
      $key = '';
      $pattern = '0123456789';
      $max = strlen($pattern)-1;
      for($i=0;$i < $longitud;$i++) $key .= $pattern{mt_rand(0,$max)};
      return $key;
     }
    
   if($_POST)
   {
      $step = $Functions->FilterText($_POST['step']);
      
      
      
if($step == 1)
   {  
$code = generarCodigo(6);

   $email = $Functions->FilterText($_POST['email']);
   $captcha = $Functions->FilterText($_POST['code']);
   $emailsql = $db->query("SELECT * FROM $users WHERE mail = '{$email}'");
   $userinfo = $emailsql->fetch_array();

   $emailsqlcustom = $db->query("SELECT * FROM cms_users WHERE id = '".$userinfo['id']."'");
   $userinfocustom = $emailsqlcustom->fetch_array();
   
   if($_SESSION['captcha'] !== strtoupper($captcha)){
      $json["reponse"] = 'captcha';
      echo json_encode($json);
      
   }elseif( $userinfo['mail'] !== $email ){
      $json["reponse"] = 'mail';
      echo json_encode($json);
   
   }elseif($userinfo['mail'] == $email){
      $json["reponse"] = 'ok';
    echo json_encode($json);
   $db->query("UPDATE cms_users SET code_forgot = '".$code."', forgot_time = '".time()."' WHERE id = '".$userinfo['id']."'");

   $dbQuery= array();
          $dbQuery['user_id'] = $userinfo['id'];
          $dbQuery['email'] = $email;
        $dbQuery['time'] = time();
          $query = $db->insertInto('cms_forgot', $dbQuery);
   
     
        
        
      
   
   
      }
   }elseif($step == 2){
   
   
   $pass = $Functions->FilterPASS($_POST['mdp']);
   $rpass = $Functions->FilterPASS($_POST['mdpconfirm']);
   $code = $Functions->FilterText($_POST['clee']);

   $sql = $db->query("SELECT * FROM cms_users WHERE code_forgot = '{$code}'");
   $userinfo = $sql->fetch_array();

   $sql2 = $db->query("SELECT * FROM $users WHERE id = '".$userinfo['id']."'");
   $userinfo2 = $sql2->fetch_array();
   
    if( $code == '' || $pass == '' || $rpass == '' ){
      $json["reponse"] = 'code';
      $json["reponse"] = 'error';
      echo json_encode($json);
      
   }elseif( $userinfo['code_forgot'] !== $code ){
      $json["reponse"] = 'code';
      echo json_encode($json);
      
   }elseif( strlen($pass) !== strlen($rpass) ){
      $json["reponse"] = 'error';
      echo json_encode($json);
   
   }else{
      $json["reponse"] = 'ok';
      echo json_encode($json);
   $db->query("UPDATE $users SET password = '".md5($pass)."' WHERE id = '".$userinfo2['id']."' LIMIT 1");
   }
   
   }
   }
   ?>