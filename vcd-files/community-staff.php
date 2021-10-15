<?php
   ob_start();
   require_once 'global.php';
   
   $Functions->Logged("allow");
   
   $TplClass->SetParam('title', 'Equipo Staff');
   $TplClass->SetParam('description', 'Equipo Staff');
   $TplClass->SetParam('activeCStaff', 'router-link-exact-active router-link-active');
         
   $TplClass->AddTemplate("header", "header");
   ?>
<div class="app">
   <div class="website-bg">
      <div class="mid"></div>
   </div>
   <div class="page online staff">
      <?php $TplClass->AddTemplate("header", "menu"); ?>
      <div class="content">
         <?php $TplClass->AddTemplate("others", "users-currency"); ?>
         <div class="col tablet">
            <div class="global-box">
               <div class="title">
                  Equipo <?php echo $Functions->WebSettings('hotelname'); ?>
               </div>
               <div class="content">
                  <p class="description">
                     El Equipo Staff es fundamental en el hotel, cada uno de sus integrantes tiene un rol diferente el cual promete asegurar la moderación o animación del juego. Te aseguran en todo momento, seguridad óptima así como actividades cálidas y acogedoras. Han jurado respetar los términos de uso de <?php echo $Functions->WebSettings('hotelname'); ?> sin abusos.
                     <br><br>
                     Para localizar a un miembro del Equipo Staff, consulte esta página o sus credenciales. Siempre lleva una insignia que los identifica, de lo contrario, no lo es.
                     <br><br>
                     La vigilancia del lugar está garantizada las 24 horas, los 7 días de la semana, por profesionales moderados que garantizan un juego seguro y contribuyen al buen vivir del hotel para todos los que se alojan allí.
                     <br><br>
                     Para cualquier solicitud, puede contactarnos <a href="/help" class="">aquí</a>.
                     <br>
                     <?php echo $Functions->WebSettings('hotelname'); ?>
                  </p>
               </div>
            </div>
         </div>
         <div class="col left">
            <!----> 
            <div class="global-box list">
               <div class="title" style="background-color: rgb(127, 179, 213);">
                  Administración
                  <!---->
               </div>
               <div class="content">
                  <?php    global $db;
                     $dd = $db->query("SELECT * FROM permissions WHERE id = '".MAXRANK."' ORDER BY id DESC");
                     $rank = $dd->fetch_array();
                     $ru = $db->query("SELECT * FROM $users WHERE rank = '". $rank['id'] ."' ORDER BY rank DESC");
                     if ( $ru->num_rows > 0 ) {
                     while($us = $ru->fetch_array()){
                      if($us['online'] == 1){
                          $status = 'online';
                          $avatarAction = '&gesture=sml&head_direction=3';
                      }else{
                          $status = 'offline';
                          $avatarAction = '&gesture=eyb';
                     }
                     if($Functions->UserCustom('cms_staffocult', $us['id']) == 0){
                     
                     ?>
                  <div class="box-staff" style="background-image: url(<?php echo FILES; ?>/assets/img/staff/staff.png);">
                     <div class="avatar <?php echo $status; ?>">
                        <img src="<?php echo AVATARIMAGE . $Functions->User('look', $us['id']); ?><?php if( $us['online'] == 0 ){ echo "&gesture=eyb"; } ?>" class="one">
                        <img src="<?php echo AVATARIMAGE . $Functions->User('look', $us['id']); ?><?php echo $avatarAction; ?>" class="two">
                     </div>
                     <div class="right">
                        <span class="username">
                        <a href="#" class=""><?php echo $Functions->FilterText($Functions->User('username', $us['id'])); ?></a> <?php if($Functions->FilterText($Functions->UserCustom('cms_role', $us['id'])) != "") echo "-" ?>  <i><?php echo $Functions->FilterText($Functions->UserCustom('cms_role', $us['id'])); ?></i>
                        </span> 
                        <span class="motto habbofont"><?php echo $Functions->FilterText($Functions->User('motto', $us['id'])); ?></span>
                     </div>
                  </div>
                  <?php }}} else { ?>
                  <div class="box-error error">
                     <img src="<?php echo FILES; ?>/assets/img/error/avatar.png" class="error-avatar"> 
                     <span>No hay miembros en esta categoría</span>
                  </div>
                  <?php } ?>
               </div>
            </div>
            <div class="global-box list">
               <div class="title" style="background-color: rgb(195, 155, 211);">
                  Comunidad y comunicación
                  <!---->
               </div>
               <div class="content">
                  <?php    global $db;
                     $dd = $db->query("SELECT * FROM permissions WHERE id = '".MERANK."' ORDER BY id DESC");
                     $rank = $dd->fetch_array();
                     $ru = $db->query("SELECT * FROM $users WHERE rank = '". $rank['id'] ."' ORDER BY rank DESC");
                     if ( $ru->num_rows > 0 ) {
                     while($us = $ru->fetch_array()){
                      if($us['online'] == 1){
                          $status = '#63C862';
                      }else{
                          $status = '#ED1C24';
                     }
                     if($Functions->UserCustom('cms_staffocult', $us['id']) == 0){
                     
                     ?>
                  <div class="box-staff" style="background-image: url(<?php echo FILES; ?>/assets/img/staff/staff.png);">
                     <div class="avatar offline">
                        <img src="<?php echo AVATARIMAGE . $Functions->User('look', $us['id']); ?>&gesture=eyb"> 
                        <img src="<?php echo AVATARIMAGE . $Functions->User('look', $us['id']); ?>&gesture=eyb">
                     </div>
                     <div class="right">
                        <span class="username">
                        <a href="#" class=""><?php echo $Functions->FilterText($Functions->User('username', $us['id'])); ?></a> <?php if($Functions->FilterText($Functions->UserCustom('cms_role', $us['id'])) != "") echo "-" ?>  <i><?php echo $Functions->FilterText($Functions->UserCustom('cms_role', $us['id'])); ?></i>
                        </span> 
                        <span class="motto habbofont"><?php echo $Functions->FilterText($Functions->User('motto', $us['id'])); ?></span>
                     </div>
                  </div>
                  <?php }}} else { ?>
                  <div class="box-error error">
                     <img src="<?php echo FILES; ?>/assets/img/error/avatar.png" class="error-avatar"> 
                     <span>No hay miembros en esta categoría</span>
                  </div>
                  <?php } ?>
               </div>
            </div>
            <div class="global-box list">
               <div class="title" style="background-color: rgb(241, 148, 138);">
                  Animación
                  <!---->
               </div>
               <div class="content">
                  <?php    global $db;
                     $dd = $db->query("SELECT * FROM permissions WHERE id = '".MINRANK."' ORDER BY id DESC");
                     $rank = $dd->fetch_array();
                     $ru = $db->query("SELECT * FROM $users WHERE rank = '". $rank['id'] ."' ORDER BY rank DESC");
                     if ( $ru->num_rows > 0 ) {
                     while($us = $ru->fetch_array()){
                      if($us['online'] == 1){
                          $status = '#63C862';
                      }else{
                          $status = '#ED1C24';
                     }
                     if($Functions->UserCustom('cms_staffocult', $us['id']) == 0){
                     
                     ?>
                  <div class="box-staff" style="background-image: url(<?php echo FILES; ?>/assets/img/staff/staff.png);">
                     <div class="avatar offline">
                        <img src="<?php echo AVATARIMAGE . $Functions->User('look', $us['id']); ?>&gesture=eyb"> 
                        <img src="<?php echo AVATARIMAGE . $Functions->User('look', $us['id']); ?>&gesture=eyb">
                     </div>
                     <div class="right">
                        <span class="username">
                        <a href="#" class=""><?php echo $Functions->FilterText($Functions->User('username', $us['id'])); ?></a> <?php if($Functions->FilterText($Functions->UserCustom('cms_role', $us['id'])) != "") echo "-" ?>  <i><?php echo $Functions->FilterText($Functions->UserCustom('cms_role', $us['id'])); ?></i>
                        </span> 
                        <span class="motto habbofont"><?php echo $Functions->FilterText($Functions->User('motto', $us['id'])); ?></span>
                     </div>
                  </div>
                  <?php }}} else { ?>
                  <div class="box-error error">
                     <img src="<?php echo FILES; ?>/assets/img/error/avatar.png" class="error-avatar"> 
                     <span>No hay miembros en esta categoría</span>
                  </div>
                  <?php } ?>
               </div>
            </div>
            <div class="global-box list">
               <div class="title" style="background-color: rgb(205, 97, 85);">
                  Moderación
                  <!---->
               </div>
               <div class="content">
                  <?php    global $db;
                     $dd = $db->query("SELECT * FROM permissions WHERE id = '4' ORDER BY id DESC");
                     $rank = $dd->fetch_array();
                     $ru = $db->query("SELECT * FROM $users WHERE rank = '". $rank['id'] ."' ORDER BY rank DESC");
                     if ( $ru->num_rows > 0 ) {
                     while($us = $ru->fetch_array()){
                      if($us['online'] == 1){
                          $status = '#63C862';
                      }else{
                          $status = '#ED1C24';
                     }
                     if($Functions->UserCustom('cms_staffocult', $us['id']) == 0){
                     
                     ?>
                  <div class="box-staff" style="background-image: url(<?php echo FILES; ?>/assets/img/staff/staff.png);">
                     <div class="avatar offline">
                        <img src="<?php echo AVATARIMAGE . $Functions->User('look', $us['id']); ?>&gesture=eyb"> 
                        <img src="<?php echo AVATARIMAGE . $Functions->User('look', $us['id']); ?>&gesture=eyb">
                     </div>
                     <div class="right">
                        <span class="username">
                        <a href="#" class=""><?php echo $Functions->FilterText($Functions->User('username', $us['id'])); ?></a> <?php if($Functions->FilterText($Functions->UserCustom('cms_role', $us['id'])) != "") echo "-" ?>  <i><?php echo $Functions->FilterText($Functions->UserCustom('cms_role', $us['id'])); ?></i>
                        </span> 
                        <span class="motto habbofont"><?php echo $Functions->FilterText($Functions->User('motto', $us['id'])); ?></span>
                     </div>
                  </div>
                  <?php }}} else { ?>
                  <div class="box-error error">
                     <img src="<?php echo FILES; ?>/assets/img/error/avatar.png" class="error-avatar"> 
                     <span>No hay miembros en esta categoría</span>
                  </div>
                  <?php } ?>
               </div>
            </div>
            <div class="global-box list">
               <div class="title" style="background-color: rgb(241, 178, 79);">
                  Casino
                  <!---->
               </div>
               <div class="content">
                  <?php    global $db;
                     $dd = $db->query("SELECT * FROM permissions WHERE id = '3' ORDER BY id DESC");
                     $rank = $dd->fetch_array();
                     $ru = $db->query("SELECT * FROM $users WHERE rank = '". $rank['id'] ."' ORDER BY rank DESC");
                     if ( $ru->num_rows > 0 ) {
                     while($us = $ru->fetch_array()){
                      if($us['online'] == 1){
                          $status = '#63C862';
                      }else{
                          $status = '#ED1C24';
                     }
                     if($Functions->UserCustom('cms_staffocult', $us['id']) == 0){
                     
                     ?>
                  <div class="box-staff" style="background-image: url(<?php echo FILES; ?>/assets/img/staff/staff.png);">
                     <div class="avatar offline">
                        <img src="<?php echo AVATARIMAGE . $Functions->User('look', $us['id']); ?>&gesture=eyb"> 
                        <img src="<?php echo AVATARIMAGE . $Functions->User('look', $us['id']); ?>&gesture=eyb">
                     </div>
                     <div class="right">
                        <span class="username">
                        <a href="#" class=""><?php echo $Functions->FilterText($Functions->User('username', $us['id'])); ?></a> <?php if($Functions->FilterText($Functions->UserCustom('cms_role', $us['id'])) != "") echo "-" ?>  <i><?php echo $Functions->FilterText($Functions->UserCustom('cms_role', $us['id'])); ?></i>
                        </span> 
                        <span class="motto habbofont"><?php echo $Functions->FilterText($Functions->User('motto', $us['id'])); ?></span>
                     </div>
                  </div>
                  <?php }}} else { ?>
                  <div class="box-error error">
                     <img src="<?php echo FILES; ?>/assets/img/error/avatar.png" class="error-avatar"> 
                     <span>No hay miembros en esta categoría</span>
                  </div>
                  <?php } ?>
               </div>
            </div>
         </div>
         <div class="col right notablet">
            <div class="global-box">
               <div class="title">
                  Equipo <?php echo $Functions->WebSettings('hotelname'); ?>
               </div>
               <div class="content">
                  <p class="description">
                     El Equipo Staff es fundamental en el hotel, cada uno de sus integrantes tiene un rol diferente el cual promete asegurar la moderación o animación del juego. Te aseguran en todo momento, seguridad óptima así como actividades cálidas y acogedoras. Han jurado respetar los términos de uso de <?php echo $Functions->WebSettings('hotelname'); ?> sin abusos.
                     <br><br>
                     Para localizar a un miembro del Equipo Staff, consulte esta página o sus credenciales. Siempre lleva una insignia que los identifica, de lo contrario, no lo es.
                     <br><br>
                     La vigilancia del lugar está garantizada las 24 horas, los 7 días de la semana, por profesionales moderados que garantizan un juego seguro y contribuyen al buen vivir del hotel para todos los que se alojan allí.
                     <br><br>
                     Para cualquier solicitud, puede contactarnos <a href="/help" class="">aquí</a>.
                     <br>
                     <?php echo $Functions->WebSettings('hotelname'); ?>
                  </p>
               </div>
            </div>
         </div>
         <div class="col right">
            <div class="global-box list">
               <div class="title" style="background-color: rgb(114, 137, 226);">
                  Eventos
                  <!---->
               </div>
               <div class="content">
                  <?php    global $db;
                     $dd = $db->query("SELECT * FROM permissions WHERE id = '2' ORDER BY id DESC");
                     $rank = $dd->fetch_array();
                     $ru = $db->query("SELECT * FROM $users WHERE rank = '". $rank['id'] ."' ORDER BY rank DESC");
                     if ( $ru->num_rows > 0 ) {
                     while($us = $ru->fetch_array()){
                      if($us['online'] == 1){
                          $status = '#63C862';
                      }else{
                          $status = '#ED1C24';
                     }
                     if($Functions->UserCustom('cms_staffocult', $us['id']) == 0){
                     
                     ?>
                  <div class="box-staff" style="background-image: url(<?php echo FILES; ?>/assets/img/staff/staff.png);">
                     <div class="avatar offline">
                        <img src="<?php echo AVATARIMAGE . $Functions->User('look', $us['id']); ?>&gesture=eyb"> 
                        <img src="<?php echo AVATARIMAGE . $Functions->User('look', $us['id']); ?>&gesture=eyb">
                     </div>
                     <div class="right">
                        <span class="username">
                        <a href="#" class=""><?php echo $Functions->FilterText($Functions->User('username', $us['id'])); ?></a> <?php if($Functions->FilterText($Functions->UserCustom('cms_role', $us['id'])) != "") echo "-" ?>  <i><?php echo $Functions->FilterText($Functions->UserCustom('cms_role', $us['id'])); ?></i>
                        </span> 
                        <span class="motto habbofont"><?php echo $Functions->FilterText($Functions->User('motto', $us['id'])); ?></span>
                     </div>
                  </div>
                  <?php }}} else { ?>
                  <div class="box-error error">
                     <img src="<?php echo FILES; ?>/assets/img/error/avatar.png" class="error-avatar"> 
                     <span>No hay miembros en esta categoría</span>
                  </div>
                  <?php } ?>
               </div>
            </div>
        
         </div>
      </div>
   </div>
</div>
<?php $TplClass->AddTemplate("others", "footer"); ?>
