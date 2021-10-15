<?php
   require_once '../../global.php';

   
   $page = $Functions->FilterText($_GET['page']);
   
   ?>
<?php if($page == "historique"){ ?>
<?php   global $db; 
   $result = $db->query("SELECT * FROM cms_trans_logs WHERE user_id = '".$Functions->User('id')."' ORDER BY id DESC");
   if($result->num_rows > 0){
   while($data = $result->fetch_array()){
   ?>
<div id="b201">
   <div id="b202"></div>
   <div id="b203"><?php echo $Functions->GetLastFace($data['time']); ?></div>
   <div id="b204"><b>Realizado bajo la dirección IP <?php echo $Functions->FilterText($data['ip_user']); ?></b><br><?php echo $Functions->FilterText($data['value']); ?></div>
</div>
<?php }}else{ echo '<div id="b144">
   <center>
   <div id="b145"></div>
   </center>
   <br>
   No se han registrado transacciones en su cuenta.</div>';} ?>
<?php }elseif($page == "mobis"){ ?>
<?php global $db;
   $sql = $db->query("SELECT user_id, room_id, GROUP_CONCAT(item_id) item_id FROM items WHERE room_id = '0' AND user_id = '".$Functions->User('id')."' GROUP BY item_id HAVING COUNT(item_id)>0 ORDER BY id DESC;");
   if($sql->num_rows > 0){
   while($furni = $sql->fetch_array()){
   
    $sql2 = $db->query("SELECT * FROM items WHERE item_id = '". $furni['item_id'] ."' && room_id = '0'");
   
    $sql3 = $db->query("SELECT * FROM items_base WHERE id = '". $furni['item_id'] ."' LIMIT 1");
    $item = $sql3->fetch_array();
    
             ?>

             <div class="ysnz<?php echo $furni['item_id']; ?>" onclick="BoutiqueInventaireDelete('mobis','<?php echo $furni['item_id']; ?>')" id="b104x">
<div id="b104z">
<div id="b104l"></div>
</div>
<img style="transform:scale(2);" src="<?php echo SWFICON . str_replace("*","_", $item['item_name']); ?>_icon.png">
<div id="b105"><?php echo $sql2->num_rows; ?></div>
</div>


<!--<div class="ysnz<?php echo $furni['item_id']; ?>" onclick="BoutiqueInventaireObjet('mobis','<?php echo $furni['item_id']; ?>');" id="b104">
   <img style="transform:scale(2);" src="<?php echo SWFICON . str_replace("*","_", $item['item_name']); ?>_icon.png">
   <div id="b105"><?php echo $sql2->num_rows; ?></div>
</div>-->
<?php }}else{echo'<div id="b144">
   <center>
   <div id="b145"></div>
   </center>
   <br>
   Tu inventario esta vacio.</div>';} ?>
<?php }elseif($page == "badges"){ ?>
<?php global $db;
   $sql = $db->query("SELECT * FROM users_badges WHERE user_id = '". $Functions->User('id') ."' ORDER BY id");
   if($sql->num_rows > 0){
   while($badge = $sql->fetch_array()){
   
   if($badge['badge_slot'] == 1){
   $text = 'Haz click en mí para retirarme';}else{ $text = 'Haz click en mí para usarme';}
   
   if($badge['badge_slot'] == 0){
            ?>
<div class="bsnz<?php echo $badge['id']; ?>" onclick="BoutiqueInventaireObjet('badges','<?php echo $badge['id']; ?>');" id="b104">
   <img style="transform:scale(1);" src="<?php echo BADGEURL . $badge['badge_id'] ?>.gif">
</div>
<?php }}}else{echo'<div id="b144">
   <center>
   <div id="b145"></div>
   </center>
   <br>No tienes placas.</div>';} ?>
<?php }elseif ( $page == "apparts" ) { 

$sql = $db->query("SELECT * FROM rooms WHERE owner_id = '". $Functions->User('id') ."' ORDER BY id");
   if($sql->num_rows > 0){
   while($room = $sql->fetch_array()){ 

      $c = $_SERVER['DOCUMENT_ROOT'].'/newfoto/thumbnail/'.$room['id'].'.png';
                                    if(file_exists($c)) {
                                       $img = PATH.'/newfoto/thumbnail/'.$room['id'].'.png';
                                     }else{
                                       $img = PATH.'/app/assets/img/rooms.png';
                                     } ?>

 <div class="b206<?php echo $room['id']; ?>" id="b206">
<img id="b207" src="<?php echo $img; ?>"/>
<div id="b208">
<?php echo $Functions->FilterText($room['caption']); ?> </div>
<div id="b209"></div>
<div style="position:absolute;bottom:0px;right:5px;">
<a room="<?php echo $room['id']; ?>" place="<?php echo $Functions->FilterText($room['caption']); ?>"
                           href="<?php echo PATH; ?>/room/<?php echo $room['id']; ?>">
<div style="background:rgb(208,208,208);color:black;" onclick="closePorteMonnaie()"
                                 id="b227"
                                 onclick="BoutiqueOpenRoom('<?php echo $room['id']; ?>','<?php echo $Functions->FilterText($room['caption']); ?>','','<?php echo $img; ?>')">
<div style="background:rgb(234,234,234);" id="b193"></div>
Visitar
</div>
</a>
<div class="b227x" id="b227"
                                 onclick="BoutiqueOpenRoom('<?php echo $room['id']; ?>','<?php echo $Functions->FilterText($room['caption']); ?>','','<?php echo $img; ?>')">
<div id="b193"></div>
Transferir
</div>
</div>
</div>
  <?php }}else{ echo'<div id="b144">
   <center>
   <div id="b145"></div>
   </center>
   <br>No tienes salas.</div>'; } ?>




   <?php } ?>