<?php
   require_once '../../global.php';
   
   $id = $Functions->FilterText($_GET['id']);
   
   ?>
<?php if(!empty($id)){ ?>
<?php
   $resultticket = $db->query("SELECT * FROM cms_tickets WHERE id = '".$id."'");
     while($ticket = $resultticket->fetch_array()){
   
      $ru = $db->query("SELECT * FROM $users WHERE username = '".$ticket['username']."'");
      $ui = $ru->fetch_array();
   
   if($Functions->User('rank') >= MINRANK || $ticket['username'] == $Functions->User('username')){ 
   ?>
<div id="ai55">
   <div id="ai56"></div>
   <?php if($ticket['cerrado'] == 1){  ?>
   <div style="background:rgb(34,177,76)" id="ai57">Cerrado</div>
   <?php }elseif($ticket['abierto'] == 0){  ?>
   <div style="background:rgb(255,127,39)" id="ai57">En espera</div>
   <?php }elseif($ticket['abierto'] == 1){  ?>
   <div id="ai57">En curso</div>
   <?php }  ?>
   <div id="ai58">Lista de mensajes</div>
</div>
<div id="ai59">
   <div id="ai60">
      <div id="ai61" style="background:url(<?php echo AVATARIMAGE . $ui['look']; ?>&size=l);"></div>
      <div id="ai62">
         <u><?php echo $ui['username']; ?></u>: <?php echo $Functions->FilterText($ticket['content']); ?> 
      </div>
   </div>
   <?php
      $rticket = $db->query("SELECT * FROM cms_tickets WHERE posted_in = '".$id."' ORDER BY id ASC");
      while($ticketc = $rticket->fetch_array()){
         
         $userinfo = $db->query("SELECT * FROM $users WHERE username = '".$ticketc['username']."'");
         $userrinf = $userinfo->fetch_array();
            
            if($ticketc['username'] == $Functions->User('username')){
                   ?>
   <div id="ai60">
      <div id="ai61" style="background:url(<?php echo AVATARIMAGE . $userrinf['look']; ?>&size=l);"></div>
      <div id="ai62">
         <u><?php echo $userrinf['username']; ?></u>: <?php echo $Functions->FilterText($ticketc['content']); ?> 
      </div>
   </div>
   <?php }elseif($ticketc['type'] == 'respuestaticket' || $ticketc['type'] == 'respuesta'){ ?>
   <div id="ai63">
      <div id="ai64" style="background:url(<?php echo AVATARIMAGE . $userrinf['look']; ?>&size=l&direction=4&head_direction=4);"></div>
      <div id="ai65">
         <u><?php echo $userrinf['username']; ?></u>: <?php echo $Functions->FilterText($ticketc['content']); ?> 
      </div>
   </div>
   <?php }} ?>
</div>
<?php } ?>
<div id="ai66">
   <div id="ai67">
      <div id="ai68"></div>
      <div id="ai69">Responder ticket</div>
   </div>
   <textarea title="content" id="ai70"></textarea>
   <div onclick="helpTicketReponse(<?php echo $ticket['id']; ?>);" id="ai71">
      <div id="ai72"></div>
      Responder
   </div>
</div>
<?php }} ?>