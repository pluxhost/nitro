<?php
   ob_start();
   require_once 'global.php';
   
   $Functions->Logged("allow");
   
   $TplClass->SetParam('title', 'Consejo de seguridad');
   $TplClass->SetParam('description', 'Consejo de seguridad');
   $TplClass->SetParam('activeHelpnewbie', 'router-link-exact-active router-link-active');
         
   $TplClass->AddTemplate("header", "header");
   ?>
<div class="app">
   <div class="website-bg">
      <div class="mid"></div>
   </div>
   <div class="page online help-newbie">
      <?php $TplClass->AddTemplate("header", "menu"); ?>
      <div class="content">
         <div class="background">
            <h1>Guía para principiantes</h1>
         </div>
         <div class="global-box">
            <div class="content">
               <div class="case">
                  <span class="title">1. Navegador</span> 
                  <img src="<?php echo FILES; ?>/assets/img/help/1.png"> 
                  <span>El navegador es una herramienta del hotel que le permite encontrar una sala para visitar.</span>
               </div>
               <div class="case">
                  <span class="title">2. Salas públicos</span> 
                  <img src="<?php echo FILES; ?>/assets/img/help/2.png"> 
                  <span>Busque en el Navegador del Hotel la sala que desea visitar. ¡Encontrarás bares, cafés, teatros y más!</span>
               </div>
               <div class="case">
                  <span class="title">3. Salas privados </span> 
                  <img src="<?php echo FILES; ?>/assets/img/help/3.png"> 
                  <span>¡Eres tú quien decide! ¡Elige la forma, los colores, los muebles y todo eso gratis!</span>
               </div>
               <div class="case">
                  <span class="title">4. Furnis</span> 
                  <img src="<?php echo FILES; ?>/assets/img/help/4.png"> 
                  <span>En el hotel hablamos de "furnis", ¡hay miles de todo tipo! Puedes comprarlos en el catálogo.</span>
               </div>
               <div class="case">
                  <span class="title">5. Catálogo</span> 
                  <img src="<?php echo FILES; ?>/assets/img/help/5.png"> 
                  <span>Encuentra tu felicidad en el catálogo de nuestro hotel. Te permite comprar miles de artículos, rares o clásicos.</span>
               </div>
               <div class="case">
                  <span class="title">6. Animales</span> 
                  <img src="<?php echo FILES; ?>/assets/img/help/6.png"> 
                  <span>Adopta, cuida, alimenta y entrena a tu propia mascota en tu sala. ¡Hay multitud de razas!</span>
               </div>
               <div class="case">
                  <span class="title">7. Seguridad</span> 
                  <img src="<?php echo FILES; ?>/assets/img/help/7.png"> 
                  <span>El hotel está moderado 24/7 por el equipo retro. Tiene derechos y deberes de consultar y aplicar <a href="/papers/termsAndConditions" target="_blank">aquí</a>.</span>
               </div>
               <div class="case">
                  <span class="title">8. Concursos</span> 
                  <img src="<?php echo FILES; ?>/assets/img/help/8.png"> 
                  <span>En la sección de Noticias del sitio web, encontrará noticias diarias sobre nuevos juegos, concursos y eventos.</span>
               </div>
               <div class="case">
                  <span class="title">9. Ropa y bailes</span> 
                  <img src="<?php echo FILES; ?>/assets/img/help/9.png"> 
                  <span>Elige el estilo que más te convenga en el hotel: clásico, fashion, gángster, punk, rock... ¡Realmente hay algo para todos!</span>
               </div>
               <div class="case">
                  <span class="title">10. Página principal</span> 
                  <img src="<?php echo FILES; ?>/assets/img/help/10.png"> 
                  <span>¡Crea y personaliza tu propia página de inicio de Habbo según tus gustos y únete a grupos!</span>
               </div>
            </div>
         </div>
      </div>
      <?php $TplClass->AddTemplate("others", "users-currency"); ?>
   </div>
</div>
<?php $TplClass->AddTemplate("others", "footer"); ?>