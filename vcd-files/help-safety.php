<?php
   ob_start();
   require_once 'global.php';
   
   $Functions->Logged("allow");
   
   $TplClass->SetParam('title', 'Consejo de seguridad');
   $TplClass->SetParam('description', 'Consejo de seguridad');
   $TplClass->SetParam('activeHelpsafety', 'router-link-exact-active router-link-active');
         
   $TplClass->AddTemplate("header", "header");
   ?>
<div class="app">
   <div class="website-bg">
      <div class="mid"></div>
   </div>
   <div class="page online help-safety">
      <?php $TplClass->AddTemplate("header", "menu"); ?>
      <div class="content">
         <div class="background">
            <h1>Consejo de seguridad</h1>
         </div>
         <div class="global-box">
            <div class="content">
               <div class="col left">
                  <div class="case">
                     <span class="title">Proteja su información personal</span> 
                     <img src="<?php echo FILES; ?>/assets/img/help/good-1.png"> 
                     <span>Nunca se sabe con quién está realmente chateando en línea, por lo que nunca dé su nombre real, dirección, número de teléfono, fotografías o el nombre de su escuela. Compartir esta información personal puede llevarlo a ser estafado, intimidado o ponerlo en peligro.</span>
                  </div>
                  <div class="case">
                     <span class="title">No ceda a la presión de los demás</span> 
                     <img src="<?php echo FILES; ?>/assets/img/help/good-2.png"> 
                     <span>Que todos hagan algo no es una razón para que lo hagas si no te sientes cómodo con la idea.</span>
                  </div>
                  <div class="case">
                     <span class="title">¡No temas decirlo!</span> 
                     <img src="<?php echo FILES; ?>/assets/img/help/good-3.png"> 
                     <span>Si alguien te hace sentir incómodo o te asusta con amenazas en Habbo, infórmalo inmediatamente a un moderador usando el botón de alerta.</span>
                  </div>
                  <div class="case">
                     <span class="title">Sea un surfista inteligente</span> 
                     <img src="<?php echo FILES; ?>/assets/img/help/good-4.png"> 
                     <span>Los sitios web que te dan tokens, furnis o que pretenden ser nuevos sitios de <?php echo $Functions->WebSettings('hotelname'); ?> o páginas del personal de <?php echo $Functions->WebSettings('hotelname'); ?> son estafas para robar tu contraseña. No les dé sus datos de contacto y nunca descargue archivos de esos sitios, ya que podrían ser spyware o virus.</span>
                  </div>
               </div>
               <div class="col right">
                  <div class="case">
                     <span class="title">Protege tu privacidad</span> 
                     <img src="<?php echo FILES; ?>/assets/img/help/bad-1.png"> 
                     <span>Mantén tus datos de contacto de Skype, Discord, Facebook, Instagram o incluso Snapchat para ti. Nunca se sabe a dónde puede llevarlo.</span>
                  </div>
                  <div class="case">
                     <span class="title">¡Mantén a tus amigos en píxeles!</span> 
                     <img src="<?php echo FILES; ?>/assets/img/help/bad-2.png"> 
                     <span>Nunca conozcas en la vida real a personas que conoces solo a través de Internet, ¡las personas no siempre son quienes dicen ser! Si alguien te pide que lo conozcas en la vida real, es mejor que digas "¡No, gracias!" y notifique a un moderador, a sus padres u otro adulto de confianza.</span>
                  </div>
                  <div class="case">
                     <span class="title">Suelta las fotos</span> 
                     <img src="<?php echo FILES; ?>/assets/img/help/bad-3.png"> 
                     <span>No tiene control sobre sus fotos e imágenes de la cámara web una vez que las ha compartido en Internet, no puede recuperarlas. Se pueden compartir con cualquier persona, en cualquier lugar y se pueden utilizar para intimidar, chantajear o amenazar. Antes de publicar una foto, pregúntese si se siente cómodo con personas que no conoce que la vean.</span>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <?php $TplClass->AddTemplate("others", "users-currency"); ?>
   </div>
</div>
<?php $TplClass->AddTemplate("others", "footer"); ?>