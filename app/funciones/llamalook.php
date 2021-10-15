<?php

ob_start();
require_once '../../global.php';

$q = $Functions->FilterText($_POST[q]);

$sql = $db->query("SELECT * FROM users WHERE username = '$q'");

if($sql->num_rows == 0){

echo '<img data-img="'.FILES.'/img/index/avatarimage.png" draggable="false" src="'.FILES.'/img/index/avatarimage.png" />';

}else{

while($fila = $sql->fetch_array()){

echo '<img data-img="'.AVATARIMAGE.''.$fila['look'].'&action=std&gesture=sml&direction=4&head_direction=4&size=n&img_format=png" draggable="false" src="'.AVATARIMAGE.''.$fila['look'].'&action=std&gesture=sml&direction=4&head_direction=4&size=n&gesture='.$fila['avatar_gesture'].'&img_format=png" />';

}

}

?>
