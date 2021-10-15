<?php
   ob_start();
   require_once 'global.php';
   
   $Functions->Logged("allow");
   
   $TplClass->SetParam('title', 'Parejas');
   $TplClass->SetParam('description', 'Vota por tu pareja favorita');
   $TplClass->SetParam('activeCCouples', 'router-link-exact-active router-link-active');
         
   $TplClass->AddTemplate("header", "header");
   ?>
<div class="app">
   <div class="website-bg">
      <div class="mid"></div>
   </div>
   <div class="page online couples">
      <?php $TplClass->AddTemplate("header", "menu"); ?>
      <div class="content">
         <div class="left">
            <div class="global-box couples">
               <div class="title">
                  Parejas en <?php echo $Functions->WebSettings('hotelname'); ?>
                  <img src="<?php echo FILES; ?>/assets/img/points-de-réputation.gif?eb0ab789fae44c3fd39fc85a134b1301" style="float: right; margin-top: 2px;">
               </div>
               <div class="content">
                  <p class="description">
                     Presente con el objetivo de mostrar su amor a plena luz del día, este ranking muestra las 25 parejas <?php echo $Functions->WebSettings('hotelname'); ?> más populares. También es posible realizar una búsqueda para encontrar una pareja no cotizada.
                     <br><br>
                     Oh, sí, casi lo olvido... Cada 2 semanas, se retira el <b>10% de los votos</b> de cada pareja para dar paso a los activos.
                  </p>
               </div>
               <div class="content search"><input type="text" placeholder="Encuentra una pareja"></div>
               <!----> 
               <div class="content">
                  <div class="top">
                     <div class="couple-box top" data-pos="1">
                        <div class="users">
                           <div class="user"><img src="<?php echo AVATARIMAGE; ?>he-3329-92-92.ea-3196-153638.fa-3276-1320.hr-9777571-32.lg-30061-81-92.hd-629-1370.sh-725-92.ca-3414-71.ch-3036-92-110&direction=1&gesture=sml"></div>
                           <div class="user second"><img src="<?php echo AVATARIMAGE; ?>wa-3264-1408-1408.cc-3360-92.ha-1004-1427.sh-3016-92.ch-3077-80-92.lg-3057-92.hr-3172-32.fa-3344-68.hd-3091-4&direction=5&action=drk&gesture=sml"></div>
                        </div>
                        <div class="names"><a href="/user/homepage" class="">Asiiia</a> <a href="/user/homepage" class="">Ohlys</a></div>
                        <div class="buttons">
                           <span>41823 votes</span> 
                           <div class="vote">Votar (3)</div>
                        </div>
                     </div>
                     <div class="couple-box top" data-pos="2">
                        <div class="users">
                           <div class="user"><img src="<?php echo AVATARIMAGE; ?>hr-3056-1407.ch-9015-110.fa-1201-110.cc-3360-110.lg-3078-110.ea-3168-110.wa-3072-110-1408.hd-629-4.ca-3175-1410&direction=1&gesture=sml"></div>
                           <div class="user second"><img src="<?php echo AVATARIMAGE; ?>cc-33811-110-153640.wa-2001-153638.hd-3100-4.ch-3013-110.lg-3328-110-153640.cp-3207-110-110.he-987462912-89-92.hr-9824-61.ha-3352-110-1409&direction=5&action=drk&gesture=sml"></div>
                        </div>
                        <div class="names"><a href="/user/homepage" class="">---Steph---</a> <a href="/user/homepage" class="">-soli-</a></div>
                        <div class="buttons">
                           <span>40228 votes</span> 
                           <div class="vote">Votar (3)</div>
                        </div>
                     </div>
                     <div class="couple-box top" data-pos="3">
                        <div class="users">
                           <div class="user"><img src="<?php echo AVATARIMAGE; ?>lg-3526-81-1408.ch-3203-92.hd-3095-3.hr-28021715-32&direction=1&gesture=sml"></div>
                           <div class="user second"><img src="<?php echo AVATARIMAGE; ?>hr-3012-61.ea-1401-110.hd-600-3.sh-3064-110.ch-3076-96-110.he-3358-92-96.lg-3283-110-110&direction=5&action=drk&gesture=sml"></div>
                        </div>
                        <div class="names"><a href="/user/homepage" class="">Ownex</a> <a href="/user/homepage" class="">Mirandar</a></div>
                        <div class="buttons">
                           <span>32814 votes</span> 
                           <div class="vote">Votar (3)</div>
                        </div>
                     </div>
                  </div>
                  <div class="all">
                     <div class="couple-box">
                        <div class="users">
                           <div class="user"><img src="<?php echo AVATARIMAGE; ?>lg-720-1324.he-9125-92.fa-3276-1274.sh-3035-1222.hd-600-1359.hr-5485-1035-61.ha-92141833-92.ch-685-92&direction=1&gesture=sml"></div>
                           <div class="user second"><img src="<?php echo AVATARIMAGE; ?>hr-3791-45.hd-3106-2.ch-660-1313.lg-3078-62.sh-725-62.ha-1005-1336.he-1604-89.ea-9834-1433.fa-3276-97.ca-64951-85.wa-64854-87.cc-8225-92&direction=5&action=drk&gesture=sml"></div>
                        </div>
                        <div class="names"><a href="/user/homepage" class="">Lethia</a> <a href="/user/homepage" class="">Orquidea</a></div>
                        <div class="buttons">
                           <span>21470 votes</span> 
                           <div class="vote">Votar (3)</div>
                        </div>
                     </div>
                     <div class="couple-box">
                        <div class="users">
                           <div class="user"><img src="<?php echo AVATARIMAGE; ?>hd-3091-4.sh-725-73.ha-3347-73-1408.hr-3322-45.lg-3058-73.cc-3327-73-73&direction=1&gesture=sml"></div>
                           <div class="user second"><img src="<?php echo AVATARIMAGE; ?>lg-3601111-110.sh-290-110.ea-1402-110.fa-4541998-110.cc-3542-92-110.hr-1171832-158639.ha-987462911-96.ch-215-110.hd-3092-2&direction=5&action=drk&gesture=sml"></div>
                        </div>
                        <div class="names"><a href="/user/homepage" class="">Kweds</a> <a href="/user/homepage" class="">Nicolas117</a></div>
                        <div class="buttons">
                           <span>16859 votes</span> 
                           <div class="vote">Votar (3)</div>
                        </div>
                     </div>
                  </div>
                  <ul data-v-82963a40="" id="pagination">
                     <li data-v-82963a40="" class="prev-item disabled">
                        <a data-v-82963a40="" tabindex="-1" class="prev-link-item">Anterior</a>
                     </li>
                     <li data-v-82963a40="" class="page-item active">
                        <a data-v-82963a40="" tabindex="0" class="page-link-item">1</a>
                     </li>
                     <li data-v-82963a40="" class="next-item disabled">
                        <a data-v-82963a40="" tabindex="-1" class="next-link-item">Siguiente</a>
                     </li>
                  </ul>
               </div>
               <!---->
            </div>
         </div>
         <div class="right">
            <!----> 
            <div class="global-box ask-for-couple">
               <div class="title">
                  Manejar mi pareja
               </div>
               <form class="content">
                  <p>
                     Escribe el usuario de la persona a la que quieres pedirle la mano, vive feliz y tengan muchos hijos (siempre y cuando la persona acepte).
                  </p>
                  <input type="text" name="username" placeholder="Usuario de tu alma gemela"> <input type="submit" value="Enviar petición">
               </form>
            </div>
            <div class="global-box couple-requests">
               <div class="title">
                  Solicitudes de pareja recibidas
                  <span class="btn accept" style="float: right;"><img src="<?php echo FILES; ?>/assets/img/reload.png?cdc3479ddaf4671f68a0b61fd838824f"></span>
               </div>
               <div class="content">
                  <p>
                     Encuentra a continuación lo que otros jugadores han preguntado sobre ti.
                  </p>
                  <div class="box-error error" style="margin-top: 15px;"><img src="<?php echo FILES; ?>/assets/img/error/avatar.png" class="error-avatar"> <span>No tienes ninguna solicitud</span></div>
               </div>
            </div>
            <div class="global-box couple-requests">
               <div class="title">
                  Solicitudes de pareja enviadas
                  <span class="btn accept" style="float: right;"><img src="<?php echo FILES; ?>/assets/img/reload.png?cdc3479ddaf4671f68a0b61fd838824f"></span>
               </div>
               <div class="content">
                  <p>
                     Encuentre a continuación las solicitudes enviadas a otros usuarios. <br><br> ¿Ha declarado su amor por la persona equivocada? ¿Se acabó tu amor a primera vista? Si este es el caso, simplemente tiene que hacer clic en la cruz junto al usuario para cancelar la solicitud.
                  </p>
                  <div class="box-error error" style="margin-top: 15px;"><img src="<?php echo FILES; ?>/assets/img/error/avatar.png" class="error-avatar"> <span>No has enviado ninguna solicitud</span></div>
               </div>
            </div>
         </div>
         <?php $TplClass->AddTemplate("others", "users-currency"); ?>
      </div>
   </div>
</div>
<?php $TplClass->AddTemplate("others", "footer"); ?>