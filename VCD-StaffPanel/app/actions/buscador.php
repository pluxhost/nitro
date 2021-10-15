<?php

ob_start();
require_once '../../../global.php';

$q = $Functions->FilterText($_POST[q]);

$sql = $db->query("SELECT * FROM $users WHERE username LIKE '%".$q."%' ORDER BY username ASC");
if($sql->num_rows == 0){

echo '<center style="color: red;">No hay ningun usuario llamado <b>'.$q.'</b></center>';

}else{
  echo '<legend><span>Resultados</span></legend>';

while($fila = $sql->fetch_array()){

echo '<div class="profile-tile" style="float: left;margin-right: 15px">
               <a class="profile-tile-box" href="'.HK.'files/users/edit.php?action=users&id='.$fila['id'].'">
                  <div class="pt-avatar-w"><img alt="" src="'.AVATARIMAGE . $Functions->User('look', $fila['id']) .'&amp;gesture=sml"></div>
                  <div class="pt-user-name">'.str_ireplace($q,'<font color="#003c70"><b style="font-weight: bold;"><strong>'.$q.'</strong></b></font>',$Functions->User('username', $fila['id'])).'</div>
               </a>

            </div>';

}

}

?>
