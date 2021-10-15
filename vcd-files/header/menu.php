<div class="jesuisresponsivelol">
   <div id="site-header">
      <div class="center">
         <a href="/" class="logo router-link-exact-active router-link-active"></a> 
         <ul class="navigation">
            <li>
               <span><?php echo $USERNAME; ?></span> 
               <ul class="sub">
                  <li><a href="/home" class="<?php echo $activeHome; ?>">Mi perfil</a></li>
                  <li  onclick="window.location.href='/bye'"><a href="/bye" class="" style="color: red">Salir</a></li>
               </ul>
            </li>
            <li>
               <span>Comunidad</span> 
               <ul class="sub">
                  <li><a href="/community/news" class="<?php echo $activeCNews; ?>">Noticias</a></li>
                  <li><a href="/community/staff" class="<?php echo $activeCStaff; ?>">Equipo</a></li>
                  <li><a href="/community/forum" class="<?php echo $activeCForum; ?>">Foro</a></li>
               </ul>
            </li>
            <li class="">
              <a href="/community/forum">Foro</a>
            </li>
            <li>
               <span>Tienda</span> 
               <ul class="sub">
                  <li><a href="/shop/badges" class="<?php echo $activeBadges; ?>">Placas</a></li>
                  <li><a href="/shop/dedication" class="<?php echo $activeDedication; ?>">Dedicatoria</a></li>
               </ul>
            </li>
            <li>
               <span>TOP</span> 
               <ul class="sub">
                  <li><a href="/top/rich" class="<?php echo $activeToprich; ?>">Top riqueza</a></li>
                  <li><a href="/top/stats" class="<?php echo $activeTopstats; ?>">Top Estadísticas</a></li>
               </ul>
            </li>
            <li>
               <span>Ayuda</span> 
               <ul class="sub">
                  <li><a href="/help" class="<?php echo $activeHelp; ?>">Mis tickets</a></li>
                  <li><a href="/help/safety" class="<?php echo $activeHelpsafety; ?>">Consejos de seguridad</a></li>
                  <li><a href="/help/habboAttitude" class="<?php echo $activeHelphabboAttitude; ?>">Actitud Habbo</a></li>
                  <li><a href="/help/newbie" class="<?php echo $activeHelpnewbie; ?>">Guía para principiantes</a></li>
               </ul>
            </li>
            <?php echo $HKLINK; ?>
         </ul>
      </div>
      <div class="down">
         <a href="/community/forum" class="btn">Accede al foro</a> 
         <div class="dedibar round">
            <div class="title">
               Dedicatorias
            </div>
            <marquee onmouseover="this.stop();" onmouseout="this.start();">
               <?php global $db, $Functions;
                  $result    = $db->query("SELECT * FROM cms_dedication WHERE public = '1' ORDER BY rand()");
                  while($nws = $result->fetch_array()) {
                  ?>
               <div class="dedi">
                  <b><?php echo $Functions->User('username', $nws['user_id']); ?>:</b> 
                  <span class="message-emotes habbofont">
                  <?php echo $Functions->FilterTextF($nws['message']); ?>
                  </span>
               </div>
               <?php } ?>
            </marquee>
            <a href="/shop/dedication" class="add"></a>
         </div>
       
         <buttom type="buttom" onclick="location.href='https://nitro.pluxnetworks.com/flash'" class="btn right after" style=" width:60px;">Flash</buttom>
         
         
         <buttom type="buttom" onclick="location.href='https://nitro.pluxnetworks.com/nitro'" class="btn right after" style=" width:60px; background: #daa520;">nitro</buttom>
  
      </div>
   </div>
   <div id="tablet-header" class="header">
      <div class="nav">
         <a href="/user" class="logo router-link-exact-active router-link-active"><img src="<?php echo FILES; ?>/assets/img/logo-little.png"></a> 
         <div class="right">
            <div class="bubble hotel"><img src="<?php echo FILES; ?>/assets/img/hotel.png"></div>
            <a href="/user" class="bubble me router-link-exact-active router-link-active"><img src="<?php echo AVATARIMAGE . $LOOK; ?>&direction=3&gesture=sml"></a> 
            <div class="bubble dot">···</div>
         </div>
      </div>
   </div>
   <div id="tablet-navigation" class="">
      <div class="top">
         <div class="close"><span></span> <span class="s"></span></div>
      </div>
      <div class="avatar">
         <div class="image">
            <div class="img"><img src="<?php echo AVATARIMAGE . $LOOK; ?>&size=l&direction=3&gesture=sml"></div>
         </div>
         <div class="text"><span>Conectado como</span> <span class="bold"><?php echo $USERNAME; ?></span></div>
      </div>
      <div class="navigation">
         <ul>
            <!----> 
            <li>
               <div class="img"><img src="<?php echo FILES; ?>/assets/img/big-icons/head-community.png"></div>
               <span>Comunidad</span> <!---->
            </li>
            <li>
               <div class="img"><img src="<?php echo FILES; ?>/assets/img/big-icons/head-shop.png"></div>
               <span>Tienda</span> <!---->
            </li>
            <li>
               <div class="img"><img src="<?php echo FILES; ?>/assets/img/big-icons/head-gamerzone.gif"></div>
               <span>Zona Gamer</span> <!---->
            </li>
            <li>
               <div class="img"><img src="<?php echo FILES; ?>/assets/img/big-icons/head-casino.png"></div>
               <span>Casino</span> <!---->
            </li>
            <li>
               <div class="img"><img src="<?php echo FILES; ?>/assets/img/big-icons/head-top.png"></div>
               <span>Top</span> <!---->
            </li>
            <li>
               <div class="img"><img src="<?php echo FILES; ?>/assets/img/big-icons/head-help.png"></div>
               <span>Ayuda</span> <!---->
            </li>
         </ul>
      </div>
   </div>
   <!----> 
   <div class="box-error errrror">
      <img src="<?php echo FILES; ?>/assets/img/evacontente.png" class="error-avatar"> 
      <span>¡Hemos actualizado las aplicaciones de Windows y Mac! Puede acceder a él haciendo clic en el botón "Entrar al hotel".<br> En caso de problemas durante la instalación, puede encontrar tutoriales para <a href="/community/forum">Windows</a> y <a href="/community/forum">Mac</a>.
      No olvide reinstalar su aplicación.</span>
   </div>
</div>