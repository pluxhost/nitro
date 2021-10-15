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
         <div class="page create">
            <div class="backgrounds"></div>
            <div class="center">
               <div class="logo">
                  <img src="<?php echo FILES; ?>/assets/img/logo.png" alt="Logo">
               </div>
               <form class="step" id="registration">
                  <div class="title">
                     <h1>Empecemos presentándonos...</h1>
                     <p>
                        Esta información permitirá a los jugadores conocerte en todo el hotel. También se utilizará para enviarte noticias de <?php echo $Functions->WebSettings('hotelname'); ?> por correo electrónico y recuperar tu contraseña, en caso de que la olvides. 
                        <br><br>
                        Su usuario puede contener letras (mayúsculas y minúsculas), números y líneas (-).
                     </p>
                  </div>
                  <div class="right noavatar">
                     <div class="input top">
                        <input type="email" name="mail" id="mail" placeholder="Correo electrónico">
                     </div>
                     <div class="input top right">
                        <input type="email" name="mail_confirmation" id="mail_confirmation" placeholder="Repite tu dirección de correo electrónico">
                     </div>
                     <div class="input">
                        <input type="text" name="username" id="username" placeholder="Nombre de usuario">
                     </div>
                     <div class="input top right">
                        <input type="date" name="birthday" id="birthday" placeholder="¿Cuándo naciste? (dd/mm/aaaa)">
                     </div>
                  </div>
                  <div class="title">
                     <h1>Un poco de seguridad...</h1>
                     <p>
                        Ahora, deberás escoger una contraseña para que protejas tu cuenta y puedas ser la única persona que puede acceder a ella.
                     </p>
                  </div>
                  <div class="right noavatar">
                     <div class="input top"><input type="password" name="password" id="password" placeholder="Contraseña"></div>
                     <div class="input top right"><input type="password" name="password_confirmation" id="password_confirmation" placeholder="Repite tu contraseña"></div>
                  </div>
                  <div class="title">
                     <h1>¡¡Más de una cosa!!</h1>
                     <p>
                        Antes de terminar, necesitamos determinar cómo se verá, por lo que depende de usted elegir un aspecto inicial. ¡Por supuesto, puede cambiar su apariencia después de ingresar al hotel!
                     </p>
                  </div>
                  <div class="avatar">
                     <img id="avatar-choice" src="<?php echo AVATARIMAGE; ?>he-201404-1198.ca-1814-62.ch-3185-110.hr-831-1036.hd-190-1359.lg-281-62" alt="Avatar de Soso" look="he-201404-1198.ca-1814-62.ch-3185-110.hr-831-1036.hd-190-1359.lg-281-62" gender="M">
                  </div>
                  <div class="right">
                     <div class="gender">
                        <h1>Yo soy una mujer</h1>
                        <div look="ca-64951-90.hr-8492-31.lg-3006-71-92.hd-600-3.sh-3277-74-71.he-1603-71.ch-665-92" class="look choice" gender="F">
                           <img src="<?php echo AVATARIMAGE; ?>ca-64951-90.hr-8492-31.lg-3006-71-92.hd-600-3.sh-3277-74-71.he-1603-71.ch-665-92&direction=3&gesture=sml">
                        </div>
                        <div look="ca-64839-110.hr-834-1028.ch-3213-92-73.lg-3018-1425.hd-600-3.sh-3089-110.he-3082-1330" class="look choice" gender="F">
                           <img src="<?php echo AVATARIMAGE; ?>ca-64839-110.hr-834-1028.ch-3213-92-73.lg-3018-1425.hd-600-3.sh-3089-110.he-3082-1330&direction=3&gesture=sml">
                        </div>
                        <div look="hr-7854147-1062.lg-3192-81.hd-600-3.sh-735-92.cc-3249-81-153640.he-3189-92.ch-883-92-92" class="look choice" gender="F">
                           <img src="<?php echo AVATARIMAGE; ?>hr-7854147-1062.lg-3192-81.hd-600-3.sh-735-92.cc-3249-81-153640.he-3189-92.ch-883-92-92&direction=3&gesture=sml">
                        </div>
                     </div>
                     <div class="gender right">
                        <h1>Yo soy un hombre</h1>
                        <div look="he-201404-1198.ca-1814-62.ch-3185-110.hr-831-1036.hd-190-1359.lg-281-62" class="look choice selected" gender="M">
                           <img src="<?php echo AVATARIMAGE; ?>he-201404-1198.ca-1814-62.ch-3185-110.hr-831-1036.hd-190-1359.lg-281-62&direction=3&gesture=sml">
                        </div>
                        <div look="wa-2001-153640.hr-1181032-45.ch-3208-82-153640.lg-3361-110.hd-180-3.sh-3089-110.he-1601-153638.ea-757003-153638" class="look choice" gender="M">
                           <img src="<?php echo AVATARIMAGE; ?>wa-2001-153640.hr-1181032-45.ch-3208-82-153640.lg-3361-110.hd-180-3.sh-3089-110.he-1601-153638.ea-757003-153638&direction=3&gesture=sml">
                        </div>
                        <div look="ca-3292-110.hr-3163-1394.ch-3032-85-1409.lg-3058-82.hd-209-3.sh-3089-85.he-3082-85" class="look choice" gender="M">
                           <img src="<?php echo AVATARIMAGE; ?>ca-3292-110.hr-3163-1394.ch-3032-85-1409.lg-3058-82.hd-209-3.sh-3089-85.he-3082-85&direction=3&gesture=sml">
                        </div>
                     </div>
                     <div class="input full">
                        <p>Al registrarse, acepta los Términos y condiciones. <a href="/" class="router-link-active">Condiciones de uso</a>.</p>
                        <input type="submit" value="Completa el registro y empieza a jugar">
                     </div>
                  </div>
               </form>
               <div class="down">
                  <span>¿Ya estás registrado en <?php echo $Functions->WebSettings('hotelname'); ?>?</span> 
                  <a href="/" class="">Acceder a mi cuenta</a>
               </div>
            </div>
         </div>
         <div id="flash-error" class="flash-error not-blurry">
            <div class="box-error" id="nError">
               <img src="<?php echo FILES; ?>/assets/img/error/avatar.png" class="error-avatar" id="avatarN"> 
               <span></span>
            </div>
         </div>
      </div>
   </body>
   <script type="text/javascript" src="<?php echo FILES; ?>/assets/js/jquery.js"></script>
   <script type="text/javascript" src="<?php echo FILES; ?>/assets/js/app.js?<?php echo $Functions->reloadxxx(5); ?>"></script>
</html>