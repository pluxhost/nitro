<?php

ob_start();
require_once '../../global.php';

$q = $Functions->FilterText($_POST[q]);

$sql = $db->query("SELECT * FROM users WHERE username LIKE '%".$q."%' ORDER BY username ASC LIMIT 5");
if($sql->num_rows == 0){

echo '<div class="col-sm-12 post-snippet masonry-item" style="left:56px;width:361px;top:-8px;" >
<div class="inner" style="padding: 1px;border-radius: 3px;background: #e9ebee;border: 2px solid #46658a;color: #7c8996;background: #e9ebee;">
<center>No hay ningun usuario llamado <b>'.$q.'</b></center>
</div>
</div>';

}else{
  echo '
<div class="col-sm-12 post-snippet masonry-item" style="left:56px;width:361px;top:-8px;" >
  <div class="inner" style="padding: 0px;border-radius: 3px;background: #e9ebee;border: 2px solid #46658a;color: #7c8996;background: #e9ebee;">';

while($fila = $sql->fetch_array()){

echo '<a href="/profile/'.$fila['username'].'" style="    position: relative;top: -4px;font-size:14px;"><div class="accueilselect2 mb0">
    <div class="slideDown" style="
							background: url('.AVATARIMAGE.''.$fila['look'].'&amp;direction=3&amp;head_direction=3&amp;size=b&amp;gesture='.$fila['avatar_gesture'].') no-repeat;
                background-color: '.$fila['cms_color_c'].';
									background-position: -13px -24px;
									border: none;
									border-radius: 3px;
									width: 40px;
									z-index: 11;
									height: 40px;
									margin: 0px 8px 0 1px;
									float: left;
									"></div>

'.str_ireplace($q,'<font color="#003c70"><b>'.$q.'</b></font>',$fila['username']).'</div></a><hr style="margin-top:-35px;clear: both;border: 1px solid transparent; height: 0px;">
';

}

echo'</div>
</div>';
}

?>
