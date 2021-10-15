<?php
require_once '../../../global.php';
   
    $Functions->Logged("true");
    $Functions->LoggedHk(MINRANK);

    $type = $Functions->FilterText($_GET['type']);
 
if (!empty($_FILES)) {
     
    $tempFile = $_FILES['file']['tmp_name'];          //3 
    $name_img = $_FILES['file']['name']; 
    $name_img2 = $_FILES['file']['name'];	
	
	 $cadena = $name_img;
     $tutorial = explode('.',$cadena);

    $targetFile =  $_SERVER['DOCUMENT_ROOT'].'/swf/up/'. $name_img2.'.'.$tutorial[1];  //5

    if($type == 'bg'){

    if (($_FILES["file"]["type"] == "image/png"))
       {  
        move_uploaded_file($tempFile,$targetFile); //6
        $dbQuery['user_id'] = $Functions->Me('id');
        $dbQuery['data']    = $name_img;
        $dbQuery['type']    = $type;
        $dbQuery['time']    = time();
        $query              = $db->insertInto('cms_logs_upbadges', $dbQuery);
       }

   }elseif($type == 'postimg'){

    if (($_FILES["file"]["type"] == "image/gif")
   || ($_FILES["file"]["type"] == "image/jpeg")
   || ($_FILES["file"]["type"] == "image/jpg")
   || ($_FILES["file"]["type"] == "image/png"))
       {  
        move_uploaded_file($tempFile,$targetFile); //6
       }

   }elseif($type == 'img'){
    move_uploaded_file($tempFile,$targetFile); //6
        $dbQuery['user_id'] = $Functions->Me('id');
        $dbQuery['data']    = $name_img;
        $dbQuery['type']    = $type;
        $dbQuery['time']    = time();
        $query              = $db->insertInto('cms_logs_upbadges', $dbQuery);
        }

        $dbStaffLogAdd = array();
        $dbStaffLogAdd['user_id'] = $Functions->Me('id');
        $dbStaffLogAdd['message'] = 'Ha subido un archivo al servidor. ('.$name_img.')';
        $dbStaffLogAdd['rank']    = $Functions->Me('rank');
        $dbStaffLogAdd['action']  = 'Subio un archivo al servidor';
        $dbStaffLogAdd['time']    = time();
        $query                    = $db->insertInto('cms_stafflogs', $dbStaffLogAdd);
     
}
?>