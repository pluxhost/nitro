<?php
   require_once '../../global.php';

     $page = $Functions->FilterText($_GET['page']);

   ?>

<?php if($page == 'index'){ ?>
<div onclick="helpConseils(0);" id="ai27">
   <div id="ai28"></div>
   <div id="ai29"></div>
</div>
<div id="ai12">
   <div id="secionconseils">
      <div id="ai13">Un instante...</div>
   </div>
</div>
<div id="ai15">
   <div id="ai16"></div>
   <div id="ai17">
      Si ve que un usuario se comporta mal, acosa a otros o no respeta las reglas del Hotel, repórtelo y los moderadores lo verán.
   </div>
   <div onclick="helpConditions()" id="ai18">
      <div id="ai19"></div>
      Condiciones de uso
   </div>
</div>
<div class="end"></div>
<?php if($Functions->User('id') > 0){ ?>
<div id="ai20">
   <div id="ai21"></div>
   <div onclick="helpPage('support');" id="ai22">
      <div id="ai23"></div>
      <div id="ai24"></div>
      Nuevo ticket
   </div>
   <div id="ai25">
      <h1 id="ai26">Solicitud de ayuda</h1>
      <br>
      Obtenga ayuda de un moderador, en caso de que no pueda encontrar lo que está buscando en la sección de consejos
   </div>
</div>
<?php } ?>

<?php }elseif($page == 'ticket'){ ?>
<div id="ai41">
<?php global $db;
   $resultticket = $db->query("SELECT * FROM cms_tickets WHERE username = '".$Functions->User('username')."'  && type = 'ticket' ORDER BY id DESC");
   if($resultticket->num_rows > 0){
     while($ticket = $resultticket->fetch_array()){

       $rt = $db->query("SELECT * FROM cms_tickets WHERE type = 'respuesta' ORDER BY id DESC LIMIT 1");
       $ti = $rt->fetch_array();

      $ru = $db->query("SELECT * FROM users WHERE username = '".$ti['username']."'");
      $ui = $ru->fetch_array();
   ?>
   <div onclick="helpTicket(<?php echo $ticket['id']; ?>)" id="ai42">
      <div id="ai43"><?php echo $Functions->FilterText($ticket['title']); ?></div>
      <?php if($ticket['cerrado'] == 1){  ?>
      <div id="ai50">
         <div style="background:url(<?php echo AVATARIMAGE . $ui['figure']; ?>&size=n&headonly=1);" id="ai45"></div>
         <div id="ai46"><?php echo $ui['username']; ?></div>
         <div id="ai51"></div>
      </div>
      <?php }elseif($ticket['abierto'] == 0){  ?>
      <div id="ai52">
         <div id="ai53"></div>
      </div>
      <?php }elseif($ticket['abierto'] == 1){  ?>
      <div id="ai44">
         <div style="background:url(<?php echo AVATARIMAGE . $ui['figure']; ?>&size=n&headonly=1);" id="ai45"></div>
         <div id="ai46"><?php echo $ui['username']; ?></div>
         <div id="ai47"></div>
      </div>
      <?php }  ?>
      <div id="ai48"></div>
      <div id="ai49"><?php echo $Functions->GetLast($ticket['time']); ?></div>
   </div>

<?php } ?>

</div>
<div id="ai54"></div>
<?php }else{ ?>

<div id="ai41">
   <div id="ai73" style="width:57%;"></div>
   <div id="ai73" style="width:92%;"></div>
   <div id="ai73" style="width:84%;"></div>
   <div id="ai73" style="width:84%;"></div>
   <div id="ai73" style="width:60%;"></div>
   <div id="ai73" style="width:98%;"></div>
   <div id="ai73" style="width:67%;"></div>
   <div id="ai73" style="width:94%;"></div>
   <div id="ai73" style="width:70%;"></div>
   <div id="ai73" style="width:60%;"></div>
   <div id="ai73" style="width:58%;"></div>
   <div id="ai73" style="width:71%;"></div>
   <div id="ai73" style="width:61%;"></div>
   <div id="ai73" style="width:93%;"></div>
   <div id="ai73" style="width:66%;"></div>
</div>
<div id="ai54"></div>
<?php } ?>

<?php }elseif($page == 'support'){ ?>
<div id="ai31">
   <div id="ai32">
      <div id="ai33"></div>
      <div id="ai34">Solicitud de ayuda</div>
   </div>
   <input type="text" id="ai35" placeholder="El tema"/>
   <select class="aitype" id="ai36">
      <option value="1">Problema técnico</option>
      <option value="2">Problema en la tienda</option>
      <option value="3">Problema de moderación</option>
      <option value="4">Problema de animación</option>
      <option value="5">Problema con los furnis</option>
      <option value="6">Problema con el foro</option>
      <option value="7">Los furnis faltantes</option>
   </select>
   <select class="aiimportance" id="ai36">
      <option value="1">No es urgente</option>
      <option value="2">Poco urgente</option>
      <option value="3">Bastante urgente</option>
      <option value="4">Urgente</option>
      <option value="5">Muy urgente</option>
   </select>
   <div id="ai37">
      <button id="articlescombbcode" type="button" onclick="balise('bold');"><b>B</b></button>
      <button id="articlescombbcode" type="button" onclick="balise('underline')"><u>U</u></button>
      <button id="articlescombbcode" type="button" onclick="balise('italic')"><i>I</i></button>
      <button id="articlescombbcode" type="button" onclick="balise('createLink');">Link</button>
      <button id="articlescombbcode" type="button" onclick="balise('insertImage');">Imagen</button>
   </div>
   <div id="editeur"
      style="width:calc(100% - 20px);color:black;border-radius:14px;left:0px;height:auto;min-height:150px;background:rgb(245,245,245);"
      contentEditable></div>
   <div onclick="helpSupportStart()" id="ai38">
      <div id="ai39"></div>
      Enviar mi solicitud de ayuda
   </div>
   <div class="end"></div>
</div>
<?php } ?>
