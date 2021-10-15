   <?php

   ob_start();
   require_once '../../global.php';
   ob_end_flush();	
      
   if($_POST)
   {

    if($Functions->User('id') > 0){
    $myid = $Functions->FilterText($_POST['myid']);
    $userid = $Functions->FilterText($_POST['userid']);
    $type = $Functions->FilterText($_POST['type']);

    $r1 = $db->query("SELECT * FROM messenger_requests WHERE from_id = '{$myid}' AND to_id = '{$userid}' LIMIT 1");
    $r2 = $db->query("SELECT * FROM messenger_requests WHERE from_id = '{$userid}' AND to_id = '{$myid}' LIMIT 1");

   if($type == "delete"){
       $json["reponse"] = 'ppp';
       $json["button"]  = '<div onclick="Peti("'.$myid.'", "'.$userid.'", "send")" class="b313 hoverClickable" style="background: #38a9ff">
                  <i class="fas fa-user-plus" style="font-size: 100%;position: relative;top: 8px;left: 8px;"></i>
                          </div>';
       $json["sss"] = '<div id="fil69" style="background: #B73535"><div id="fil73" style="top: 35px;position: relative;"><center>Solicitud rechazada.</center></div></div>';

       echo json_encode($json);

       $db->query("DELETE FROM messenger_requests WHERE from_id = '{$myid}' AND to_id = '{$userid}' LIMIT 1");
       $db->query("DELETE FROM messenger_requests WHERE from_id = '{$userid}' AND to_id = '{$myid}' LIMIT 1");
       $db->query("DELETE FROM cms_notifications WHERE user_id = '{$userid}' AND user_two_id = '{$myid}' AND category = 'request' LIMIT 1");
       $db->query("DELETE FROM cms_notifications WHERE user_id = '{$myid}' AND user_two_id = '{$userid}' AND category = 'request' LIMIT 1");

    }elseif($type == "delete-friend"){
       $json["reponse"] = 'ppp';
       $json["button"]  = '<div onclick="Peti("'.$myid.'", "'.$userid.'", "send")" class="b313 hoverClickable"  style="background: #38a9ff">
                  <i class="fas fa-user-plus" style="font-size: 100%;position: relative;top: 8px;left: 8px;"></i>
                          </div>';
       echo json_encode($json);
       $db->query("DELETE FROM messenger_friendships WHERE user_one_id = '{$myid}' AND user_two_id = '{$userid}' LIMIT 1");
       $db->query("DELETE FROM messenger_friendships WHERE user_one_id = '{$userid}' AND user_two_id = '{$myid}' LIMIT 1");

    }elseif($type == "send"){
      $json["reponse"] = 'ppp';
      $json["button"]  = '<div onclick="Peti("'.$myid.'", "'.$userid.'", "delete")" class="b313 hoverClickable" style="background: #38a9ff">
                  <i class="fas fa-user-check" style="font-size: 15px;font-size: 100%;position: relative;top: 8px;left: 8px;"></i>
                          </div>';
      echo json_encode($json);

      $dbQuery= array();
      $dbQuery['from_id'] = $myid;
      $dbQuery['to_id']   = $userid;
      $query              = $db->insertInto('messenger_requests', $dbQuery);

      $dbQuery = array();
      $dbQuery['user_id'] = $myid;
      $dbQuery['user_two_id'] = $userid;
      $dbQuery['category'] = 'request';
      $dbQuery['time'] = time();
      $query = $db->insertInto('cms_notifications', $dbQuery);

    }elseif($type == "confirm"){
      $json["reponse"] = 'ppp';
      $json["button"]  = '<div onclick="Peti("'.$myid.'", "'.$userid.'", "delete-friend")" class="b313dele hoverClickabledele"  style="background: #ec2134">
                  <i class="fas fa-user-times" style="font-size: 15px;font-size: 100%;position: relative;top: 8px;left: 8px;"></i>
                          </div>';
      $json["sss"] = '<div id="fil69" style="background: #13944d"><div id="fil73" style="top: 35px;position: relative;"><center>Solicitud aceptada </center></div></div>';    

      echo json_encode($json);

      $dbQuery                = array();
      $dbQuery['user_one_id'] = $myid;
      $dbQuery['user_two_id'] = $userid;
      $query                  = $db->insertInto('messenger_friendships', $dbQuery);
      $db->query("DELETE FROM messenger_requests WHERE from_id = '{$myid}' AND to_id = '{$userid}' LIMIT 1");
      $db->query("DELETE FROM messenger_requests WHERE from_id = '{$userid}' AND to_id = '{$myid}' LIMIT 1");
      $db->query("DELETE FROM cms_notifications WHERE user_id = '{$userid}' AND user_two_id = '{$myid}' AND category = 'request' LIMIT 1");

    }elseif($r1->num_rows > 0 || $r2->num_rows > 0){
       $json["reponse"] = 'erreur';
       $json["msg"]     = 'Error: Ya se envio la solicitud.';
       echo json_encode($json);

    }else{
       $json["reponse"] = 'erreur';
       $json["msg"]     = 'Error: ...';
       echo json_encode($json);

    }

   }

   }

   
   ?>