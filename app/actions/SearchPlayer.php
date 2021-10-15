<?php
ob_start();
require_once '../../global.php';
if (isset($_POST['username'])) {
    $username = $Functions->FilterText($_POST['username']);
    if (!empty($username)) {

        $username_query = $db->query("SELECT * FROM $users WHERE username LIKE '%".$username."%' ORDER BY username ASC LIMIT 5");
        $count          = $username_query->num_rows;
        $ui             = $username_query->fetch_array();


        
        if ($count > 0) {

                    while($fila = $username_query->fetch_array()){

                        if($data['online'] == "1"){
                     $status = "opacity: 1;";
                     }else{
                     $status = "opacity: 0.6;";
                     }

            $json["html"] = '<br><br><br><br><br>hola';


            }


            $json["username"] = $ui['username'];
            $json["figure"]   = AVATARIMAGE . $ui['look'] . '&headonly=1';
            echo json_encode($json);
        } else {
            $json["username"] = NULL;
            $json["figure"]   = PATH . '/app/assets/img/frank_head.png';
            echo json_encode($json);
        }




    }
}
?>
