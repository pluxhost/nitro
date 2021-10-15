<?php
   ob_start();
   require_once 'global.php';
   
   $Functions->Logged("false");
   
   //IP BAN
   $ip = $Functions->getRealIP();
   $checkban = $db->query("SELECT * FROM bans WHERE ip = '".$ip."' LIMIT 1");
   if( $checkban->num_rows > 0 ){
    header("LOCATION: ". PATH ."/ban/".$ban['id']);
   }
   //END IP BAN
   ?>
<html lang="es-ES">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <meta name="Author" content="Forbi">
      <meta name="language" content="es-ES">
      <meta name="twitter:title" content="<?php echo $Functions->WebSettings('hotelname'); ?>: Crea tu Habbo, decora tu habitación con tu propio estilo! Chatea con tus amigos, participa en una amplia variedad de actividades.">
      <meta name="twitter:description" content="<?php echo $Functions->WebSettings('hotelname'); ?> - ¡Consigue muchos amigos, conviértete en un verdadero <?php echo $Functions->WebSettings('hotelname'); ?>! Alójate GRATIS en <?php echo $Functions->WebSettings('hotelname'); ?>, uno de los Hoteles virtuales más grandes de Latinoamérica.">
      <meta name="hreflang" content="es-ES">
      <meta name="twitter:site" content="<?php echo TWITTER; ?>">
      <meta name="twitter:card" content="summary">
      <meta name="twitter:image:src" content="<?php echo PATH; ?>/img/og_img2.png">
      <meta name="twitter:image" content="<?php echo PATH; ?>/img/og_img2.png">
      <meta name="twitter:domain" content="<?php echo PATH; ?>">
      <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no, shrink-to-fit=no">
      <meta name="description" content="<?php echo $Functions->WebSettings('hotelname'); ?> - ¡Consigue muchos amigos, conviértete en un verdadero <?php echo $Functions->WebSettings('hotelname'); ?>! Alójate GRATIS en <?php echo $Functions->WebSettings('hotelname'); ?>, uno de los Hoteles virtuales más grandes de Latinoamérica.">
      <meta name="keywords" content="bobba">
      <meta name="Geography" content="España">
      <meta name="country" content="España">
      <meta name="Language" content="Español">
      <meta name="identifier-url" content="<?php echo PATH; ?>/">
      <meta name="category" content="Website">
      <meta property="og:title" content="<?php echo $Functions->WebSettings('hotelname'); ?>: Crea tu Habbo, decora tu habitación con tu propio estilo! Chatea con tus amigos, participa en una amplia variedad de actividades.">
      <meta property="og:description" content="<?php echo $Functions->WebSettings('hotelname'); ?> - ¡Consigue muchos amigos, conviértete en un verdadero <?php echo $Functions->WebSettings('hotelname'); ?>! Alójate GRATIS en <?php echo $Functions->WebSettings('hotelname'); ?>, uno de los Hoteles virtuales más grandes de Latinoamérica.">
      <meta property="og:site_name" content="<?php echo $Functions->WebSettings('hotelname'); ?>">
      <meta property="og:url" content="<?php echo PATH; ?>/">
      <meta property="og:type" content="website">
      <meta property="og:image" content="<?php echo PATH; ?>/img/og_img2.png">
      <meta property="og:locale" content="es_ES">
      <link rel="canonical" href="<?php echo PATH; ?>/">
      <link rel="shortcut icon" href="/favicon.ico" type="image/vnd.microsoft.icon">
      <link rel="icon" type="image/vnd.microsoft.icon" href="favicon.ico">
      <title><?php echo $Functions->WebSettings('hotelname'); ?>: Crea tu Habbo, decora tu habitación con tu propio estilo! Chatea con tus amigos, participa en una amplia variedad de actividades.</title>
      <link rel="stylesheet" href="<?php echo FILES; ?>/assets/css/app.css?<?php echo $Functions->reloadxxx(5); ?>">
      <link rel="stylesheet" href="<?php echo FILES; ?>/assets/fontawesome/css/all.css?23" type="text/css" media="all" />
   </head>
   <body>
      <div class="app">
         <div class="page login">
            <div class="backgrounds"></div>
            <div class="avatar-login">
               <?php 
                  $lookquery = $db->query("SELECT * FROM $users ORDER BY rand()");
                     $lookrand  = $lookquery->fetch_array();
                   ?>
               <img src="<?php echo AVATARIMAGE . $Functions->User('look', $lookrand['id']); ?>&direction=2&gesture=sml&head_direction=3&size=b" alt="<?php echo $Functions->User('username', $lookrand['id']); ?>">
            </div>
            <div class="center">
               <div class="logo">
                  <img src="<?php echo FILES; ?>/assets/img/logo.png" alt="Logo">
               </div>
               <form method="POST" class="" id="connection">
                  <div class="input">
                     <input type="text" name="login-username" id="login-username" placeholder="Usuario"> 
                     <div class="avatar"></div>
                  </div>
                  <div class="input">
                     <input type="password" name="login-password" id="login-password" placeholder="Contraseña"> 
                  
                  </div>
                  <div class="input">
                     <input type="submit" class="btn-login" value="Iniciar sesión">
                  </div>
               </form>
               <div class="down">
                  <span>¿Quieres unirte a la aventura?</span> 
                  <a href="/register" class="">Crea una cuenta nueva</a>
               </div>
            </div>
            <div id="flash-error" class="flash-error not-blurry">
               <div class="box-error" id="nError">
                  <img src="<?php echo FILES; ?>/assets/img/error/avatar.png" class="error-avatar" id="avatarN"> 
                  <span></span>
               </div>
            </div>
         </div>
      </div>
   </body>
   <script type="text/javascript" src="<?php echo FILES; ?>/assets/js/jquery.js"></script>
   <script type="text/javascript" src="<?php echo FILES; ?>/assets/js/app.js?<?php echo $Functions->reloadxxx(5); ?>"></script>
</html>