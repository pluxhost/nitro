<?php
   ob_start();
   require_once '../../global.php';
   ob_end_flush();  
   
   $page = $Functions->FilterText($_GET['page']);
   
   ?>
<?php if($page == "profile"){ ?>

<div class="pa4">
<div class="pa5 FlexCenter">
<div onclick="CloseSettingsAvances()" class="pa6"></div>
<div class="pa7">
<div class="pa9">Editar perfil</div>
</div>
<div class="pa10">
En este apartado, podrás editar tu foto de perfil, tu fondo, cambiar tu color representativo, y activar el modo nocturno. 
</div>
<div class="pa11" style="height: 145%">
<div class="pa12">
<input id="pprofile" value="<?php echo $Functions->UserCustom('photo', $Functions->User('id')); ?>" class="pa13">
</div>

<div class="pa12">
<input id="bprofile" value="<?php echo $Functions->UserCustom('background', $Functions->User('id')); ?>" class="pa13">

</div>

<div class="pa12" style="width: 60%; float: left;">
<input id="cprofile" value="<?php echo $Functions->UserCustom('colour', $Functions->User('id')); ?>" class="pa13" type="color">
</div>

<div class="pa12" style="width: 10%;float: left; left: 130px">
<div onclick="nightMode()" class="pa14 FlexCenter">
<i class="fas fa-adjust" style="font-size: 200%;<?php if ($Functions->UserCustom('night_mode', $Functions->User('id')) == 0) { ?>-webkit-transform: rotate(180deg);<?php } ?>"></i>
</div>
</div>


<div class="pa16" style="margin-top: 90px">


<div onclick="SettingsActionProfile()" class="pa14 FlexCenter" style="width: 100%;position: relative;left: 1px;">
<div style="font-size: 200%;color: #666666" id="vp">Validar</div>
</div>


</div>
</div>
</div>
<div class="pa23" style="height: 28%">
<div class="pa24">
<div class="pa32">



</div>
</div>
</div>
</div>

<?php }elseif($page == "password"){ ?>
<div onclick="CloseSettingsAvances()" id="fermeture"></div>
<div id="settings37">
   <div id="settings14"
      style="background:url(<?php echo PATH ?>/app/assets/img/pagesettings.png) -182px 0px;margin-top:20px;left:-8px;"></div>
   <div id="settings38">Mi contraseña</div>
   <div id="settings39">
      <div id="settings40"></div>
      <div id="settings41">
         <?php if($Functions->UserCustom('time_pass', $Functions->User('id')) == '0'){ ?>
         ¡Tu contraseña nunca ha sido cambiada!
         <?php }else{ ?>
         Último cambio de contraseña hace <b><?php echo $Functions->GetLastFace($Functions->UserCustom('time_pass', $Functions->User('id'))); ?></b>
         <?php } ?> 
      </div>
   </div>
   <div id="settings42">Quiero cambiar mi contraseña</div>
   <input type="password" id="newpassword" placeholder="Mi nueva contraseña" class="indexinput"
      style="width:calc(100% - 25px);"/>
   <div id="indexformsepare"></div>
   <input type="password" id="verifpassword" placeholder="Repite la contraseña" class="indexinput"
      style="width:calc(100% - 25px);"/>
   <div id="passsepare"></div>
   <input type="password" id="oldpassword" placeholder="Mi contraseña actual" class="indexinput"
      style="width:calc(100% - 25px);"/>
   <div id="indexformsepare"></div>
   <div id="settings43" onclick="SettingsActionPassword()">Editar</div>
</div>
<?php }elseif($page == "friends"){ ?>
<div class="settingsload" id="settings16" style="transform: scale(1); transition: 0.4s; display: block;">
   <div onclick="CloseSettingsAvances()" id="fermeture"></div>
   <div id="settings19">
      <div id="settings20">Mis amigos</div>
      <div id="settings22">
         <?php 	global $db;
            $result = $db->query("SELECT * FROM messenger_friendships WHERE user_one_id = '".$Functions->User('id')."' OR user_two_id = '".$Functions->User('id')."' ORDER BY id DESC");
            while($data = $result->fetch_array()){
            
              if($data['user_one_id'] == $Functions->User('id')){$friendv = $data['user_two_id'];}
              elseif($data['user_two_id'] == $Functions->User('id')){$friendv = $data['user_one_id'];
              }
              $result2 = $db->query("SELECT * FROM $users WHERE id = '".$friendv."' AND online = '1' LIMIT 1");
            if($result2->num_rows > 0){
            $statuson = 'Conectados';
            }elseif($result2->num_rows == 0){
            $statusoff = 'Desconectados';
            }
            }
            
            if($result2->num_rows == 0){
            $statuson = 'Hotel Manager';
            }
            
              ?>
         <div id="settings23"><?php echo $statuson; ?></div>
         <?php 	global $db;
            $result = $db->query("SELECT * FROM messenger_friendships WHERE user_one_id = '".$Functions->User('id')."' OR user_two_id = '".$Functions->User('id')."' ORDER BY id DESC");
            if($result->num_rows > 0){
            while($data = $result->fetch_array()){
            
              if($data['user_one_id'] == $Functions->User('id')){$friendv = $data['user_two_id'];}
              elseif($data['user_two_id'] == $Functions->User('id')){$friendv = $data['user_one_id'];
              }
              $result2 = $db->query("SELECT * FROM $users WHERE id = '".$friendv."' AND online = '1'");
              while($userinfo = $result2->fetch_array()){
              ?>
         <div id="selectfriends<?php echo $data['id']; ?>" onclick="SelectFriend('friendsinfo','<?php echo $data['id']; ?>');" class="settings24">
            <div id="settings25" style="background:url(<?php echo AVATARIMAGE . $userinfo['look']; ?>&action=std&gesture=std&direction=2&head_direction=2&size=n&headonly=1&img_format=png)"></div>
            <div id="settings26">
               <?php echo $userinfo['username']; ?> 
            </div>
         </div>
         <?php }}}else{ ?>
         <div class="settings24">
            <div id="settings25" style="background:url(<?php echo PATH ?>/app/assets/img/headfrank.png)"></div>
            <div id="settings26">Frank</div>
         </div>
         <?php } ?>
         <div id="settings27"><?php echo $statusoff; ?></div>
         <?php 	global $db;
            $result = $db->query("SELECT * FROM messenger_friendships WHERE user_one_id = '".$Functions->User('id')."' OR user_two_id = '".$Functions->User('id')."' ORDER BY id DESC");
            while($data = $result->fetch_array()){
            
              if($data['user_one_id'] == $Functions->User('id')){$friendv = $data['user_two_id'];}
              elseif($data['user_two_id'] == $Functions->User('id')){$friendv = $data['user_one_id'];
              }
              $result2 = $db->query("SELECT * FROM $users WHERE id = '".$friendv."' AND online = '0'");
              while($userinfo = $result2->fetch_array()){
              ?>
         <div id="selectfriends<?php echo $data['id']; ?>" onclick="SelectFriend('friendsinfo','<?php echo $data['id']; ?>');" class="settings24">
            <div id="settings25" style="background:url(<?php echo AVATARIMAGE . $userinfo['look']; ?>&action=std&gesture=std&direction=2&head_direction=2&size=n&headonly=1&img_format=png)"></div>
            <div id="settings26">
               <?php echo $userinfo['username']; ?> 
            </div>
         </div>
         <?php }} ?>
      </div>
      <?php 	global $db;
         $result = $db->query("SELECT * FROM messenger_friendships WHERE user_one_id = '".$Functions->User('id')."' OR user_two_id = '".$Functions->User('id')."' ORDER BY id DESC");
         if($result->num_rows > 0){
         $data = $result->fetch_array();
         
           if($data['user_one_id'] == $Functions->User('id')){$friendv = $data['user_two_id'];}
           elseif($data['user_two_id'] == $Functions->User('id')){$friendv = $data['user_one_id'];
           }
           $result2 = $db->query("SELECT * FROM $users WHERE id = '".$friendv."'");
           $userinfo = $result2->fetch_array();
         
         $rstats = $db->query("SELECT * FROM user_stats WHERE id = '".$userinfo['id']."'");
           $stats = $rstats->fetch_array();
           ?>
      <div id="settings28">
         <div id="motto">
            <div id="settings29">
               <?php echo $userinfo['username']; ?><br>
               <x style="font-size:50%;"><?php echo $Functions->FilterText($userinfo['motto']); ?></x>
            </div>
         </div>
         <div id="settings30"></div>
         <div id="settings31"><?php echo number_format($stats['AchievementScore']); ?></div>
         <div id="settings32">Última conexión <?php echo $Functions->GetLast2($userinfo['last_online']); ?></div>
         <div id="settings33"></div>
         <center>
            <div id="settings34" style="background: url(<?php echo AVATARIMAGE . $userinfo['look']; ?>&action=std&gesture=std&direction=2&head_direction=2&size=l&img_format=png);"></div>
         </center>
         <div style="display:none" id="friendid"><?php echo $data['id']; ?></div>
         <div onclick="SelectFriend('deletefriend')" id="settings35">Borrar a <?php echo $userinfo['username']; ?> de mis amigos</div>
      </div>
      <?php }else{ ?>
      <div id="settings28">
         <div id="motto">
            <div id="settings29">
               Frank<br>
               <x style="font-size:50%;">Manager del Hotel</x>
            </div>
         </div>
         <div id="settings30"></div>
         <div id="settings31">0</div>
         <div id="settings32">Conectado</div>
         <div id="settings33"></div>
         <center>
            <div id="settings34" style="background: url(<?php echo PATH ?>/app/assets/img/frank.png);"></div>
         </center>
         <div style="display:none" id="friendid">0</div>
         <div onclick="SelectFriend('deletefriend')" id="settings35">Borrar a Frank de mis amigos</div>
      </div>
      <?php } ?>
      <div onclick="SelectFriend('deleteallfriend','0')" id="settings36">
         Eliminar a todos mis amigos
      </div>
   </div>
</div>
<?php }elseif($page == "pin"){ ?>
<?php if($Functions->UserCustom('email', $Functions->User('id')) == 1){
   if($Functions->UserCustom('pin', $Functions->User('id')) == 0){ ?>
<div onclick="CloseSettingsAvances()" id="fermeture"></div>
<div id="settings37">
   <div id="settings14" style="background:url(<?php echo PATH ?>/app/assets/img/pagesettings.png) -268px 0px;margin-top:20px;left:-8px;"></div>
   <div id="settings38">Código PIN</div>
   <div id="settings46"></div>
   <div id="settings47">
      <x id="settings48">Asegure su cuenta ahora!</x>
      <br>
      <x style="font-size:110%;">
         Para mayor seguridad, recomendamos activar el código pin, además de la contraseña para evitar intrusos en su cuenta
      </x>
   </div>
   <div id="settings42">Cambiar mi código pin de 4 dígitos</div>
   <div id="settings49">
      <div onclick="CliquePin('a');" id="a" class="pin">..</div>
      <div onclick="CliquePin('b');" id="b" class="pin">..</div>
      <div onclick="CliquePin('c');" id="c" class="pin">..</div>
      <div onclick="CliquePin('d');" id="d" class="pin">..</div>
      <div onclick="CliquePin('e');" id="e" class="pin">..</div>
      <div onclick="CliquePin('f');" id="f" class="pin">..</div>
      <div onclick="CliquePin('g');" id="g" class="pin">..</div>
      <div onclick="CliquePin('h');" id="h" class="pin">..</div>
      <div onclick="CliquePin('i');" id="i" class="pin">..</div>
      <div onclick="CliquePin('j');" id="j" class="pin">..</div>
      <div onclick="CliquePin('x');" class="pinreset">BORRAR</div>
   </div>
   <div id="settings50">
      <input type="text" id="currentpin" placeholder="Código PIN" class="indexinput" readonly="readonly" style="width:calc(100% - 25px);">
      <div style="position:relative;height:12px;"></div>
      <input type="password" id="password2" placeholder="Mi contraseña" class="indexinput"
         style="width:calc(100% - 25px);"/>
      <div id="indexformsepare"></div>
      <div id="settings43" onclick="SettingsActionPin('one')">Modificar</div>
   </div>
   <div class="end"></div>
</div>
<?php }elseif($Functions->UserCustom('pin', $Functions->User('id')) == 1 || $Functions->UserCustom('pin', $Functions->User('id')) == 2){ ?>
<div onclick="CloseSettingsAvances()" id="fermeture"></div>
<div id="settings37">
   <div id="settings14" style="background:url(<?php echo PATH ?>/app/assets/img/pagesettings.png) -268px 0px;margin-top:20px;left:-8px;"></div>
   <div id="settings38">Código PIN</div>
   <div id="settings46"></div>
   <div id="settings47">
      <x id="settings48">Asegure su cuenta ahora!</x>
      <br>
      <x style="font-size:110%;">
         Para mayor seguridad, recomendamos activar el código pin, además de la contraseña para evitar intrusos en su cuenta
      </x>
   </div>
   <div id="settings42">Cambiar mi código pin de 4 dígitos</div>
   <div id="settings49">
      <div onclick="CliquePin('a');" id="a" class="pin">..</div>
      <div onclick="CliquePin('b');" id="b" class="pin">..</div>
      <div onclick="CliquePin('c');" id="c" class="pin">..</div>
      <div onclick="CliquePin('d');" id="d" class="pin">..</div>
      <div onclick="CliquePin('e');" id="e" class="pin">..</div>
      <div onclick="CliquePin('f');" id="f" class="pin">..</div>
      <div onclick="CliquePin('g');" id="g" class="pin">..</div>
      <div onclick="CliquePin('h');" id="h" class="pin">..</div>
      <div onclick="CliquePin('i');" id="i" class="pin">..</div>
      <div onclick="CliquePin('j');" id="j" class="pin">..</div>
      <div onclick="CliquePin('x');" class="pinreset">BORRAR</div>
   </div>
   <div id="settings50">
      <input type="text" id="currentpin" placeholder="Código PIN (si desea modificarlo)" class="indexinput" readonly="readonly" style="width:calc(100% - 25px);">
      <div style="position:relative;height:19px;"></div>
      <input type="text" id="oldpin" maxlength="4" placeholder="Mi PIN actual" class="indexinput" style="width:calc(100% - 25px);">
      <div style="position:relative;height:19px;"></div>
      <input type="password" id="password2" placeholder="Mi contraseña" class="indexinput"
         style="width:calc(100% - 25px);"/>
      <div id="indexformsepare"></div>
   </div>
   <div class="end"></div>
   <br>
   <div class="WsjU" id="settings43" style="width:50%;float:left;" onclick="SettingsActionPin('two')">
      Modificar
   </div>
   <div class="LsjU" id="settings43" style="width:50%;float:left;background:rgb(240,72,81)" onclick="SettingsActionPin('two','supp')">Desactivar</div>
</div>
<?php }}else{ ?>
<div onclick="CloseSettingsAvances()" id="fermeture"></div>
<div id="settings51">
   <div id="forum60">
      <center>
         <div id="forum55"></div>
         Comience confirmando su dirección de correo electrónico.
      </center>
   </div>
</div>
<?php }}elseif($page == "mail"){ ?>
<div onclick="CloseSettingsAvances()" id="fermeture"></div>
<div id="settings37">
   <div id="settings14" style="background:url(<?php echo PATH ?>/app/assets/img/pagesettings.png) 0px 0px;margin-top:20px;left:-8px;"></div>
   <div id="settings38" style="top:35px;">Mi correo electrónico</div>
   <div id="settings39">
      <div id="settings40"></div>
      <div id="sendemail" style="color:rgba(100,100,100,0); font-size:0px;visibility: hidden"></div>
      <div style="font-size:140%;top:29px;" id="settings41"><?php if($Functions->UserCustom('email', $Functions->User('id')) == 0){ ?>Debes confirmar tu correo electrónico para disfrutar al máximo el juego<?php }else{ ?>Tu dirección de correo electrónico ha sido confirmada<?php } ?></div>
   </div>
   <div id="settings42">Quiero cambiar mi dirección de correo electrónico</div>
   <div style="position:relative;" id="settings45">
      <input type="text" id="email" value="<?php echo $Functions->User('mail'); ?>" class="indexinput" style="width:calc(100% - 25px);">
      <div id="indexformsepare"></div>
      <div onclick="SettingsActionMail('one')" id="settings43" class="fghjs1">Enviar un correo electrónico de confirmación</div>
   </div>
   <div id="settings44">
      <input type="text" id="code" placeholder="El código de confirmación" class="indexinput" style="width:calc(100% - 25px);">
      <div id="indexformsepare"></div>
      <div onclick="SettingsActionMail('two')" id="settings43" class="fghjs2">Validar</div>
   </div>
</div>
<?php } ?>