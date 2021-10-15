<?php
   require_once '../../../global.php';


   $json["diamants"] = $Functions->User('vip_points');
   $json["duckets"]   = $Functions->User('activity_points');
   $json["jetons"]   = $Functions->User('gotw_points');
   echo json_encode($json);   
?>
