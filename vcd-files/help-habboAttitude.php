<?php
   ob_start();
   require_once 'global.php';
   
   $Functions->Logged("allow");
   
   $TplClass->SetParam('title', 'Actitud Habbo');
   $TplClass->SetParam('description', 'Actitud Habbo');
   $TplClass->SetParam('activeHelphabboAttitude', 'router-link-exact-active router-link-active');
         
   $TplClass->AddTemplate("header", "header");
   ?>
<div class="app">
   <div class="website-bg">
      <div class="mid"></div>
   </div>
   <div class="page online help-attitude">
      <?php $TplClass->AddTemplate("header", "menu"); ?>
      <div class="content">
         <div class="background">
            <h1><?php echo $Functions->WebSettings('hotelname'); ?> Actitud</h1>
         </div>
         <div class="global-box">
            <div class="content">
               <div class="col left">
                  <h1>Es genial</h1>
                  <div class="case">
                     <img src="<?php echo FILES; ?>/assets/img/help/left-1.png"> 
                     <div class="desc">
                        <span class="title">Jugar</span> 
                        <span class="d">¡Juega con tus amigos, crea tus juegos, diviértete y conoce a mucha gente!</span>
                     </div>
                  </div>
                  <div class="case">
                     <img src="<?php echo FILES; ?>/assets/img/help/left-2.png"> 
                     <div class="desc">
                        <span class="title">Para charlar</span> 
                        <span class="d">Habla con tus amigos, conoce nuevos Habbos y haz un montón de nuevos amigos ... ¡y más!</span>
                     </div>
                  </div>
                  <div class="case">
                     <img src="<?php echo FILES; ?>/assets/img/help/left-3.png"> 
                     <div class="desc">
                        <span class="title">Para encontrar un Habbo a tus pies</span> 
                        <span class="d">Coquetear, conocer, amar y tal vez encontrar un alma gemela... ¿o algo especial?</span>
                     </div>
                  </div>
                  <div class="case">
                     <img src="<?php echo FILES; ?>/assets/img/help/left-4.png"> 
                     <div class="desc">
                        <span class="title">Ayudar</span> 
                        <span class="d">¡Ayuda a un extraño, gana un amigo! O dos o tres. ¡Nunca sabes con quién te vas a encontrar!</span>
                     </div>
                  </div>
                  <div class="case">
                     <img src="<?php echo FILES; ?>/assets/img/help/left-5.png"> 
                     <div class="desc">
                        <span class="title">Crear</span> 
                        <span class="d">¡Da rienda suelta a tu creatividad, más fuerte que Andy Warhol con la cafeína! ¡Vaya más allá de los límites del estilo y la creación! ¡Sé el mejor!</span>
                     </div>
                  </div>
                  <div class="case">
                     <img src="<?php echo FILES; ?>/assets/img/help/left-6.png"> 
                     <div class="desc">
                        <span class="title">Trueque</span> 
                        <span class="d">¡Construye tu propio imperio rare operando como un profesional!</span>
                     </div>
                  </div>
                  <div class="case">
                     <img src="<?php echo FILES; ?>/assets/img/help/left-7.png"> 
                     <div class="desc">
                        <span class="title">Para usar el mercado</span> 
                        <span class="d">Si tiene talento para los negocios, use el mercado para vender sus Furnis y acumular créditos. Cuanto más sepa sobre el mundo de las finanzas, más éxito tendrá en <?php echo $Functions->WebSettings('hotelname'); ?>.</span>
                     </div>
                  </div>
                  <div class="case">
                     <img src="<?php echo FILES; ?>/assets/img/help/left-8.png"> 
                     <div class="desc">
                        <span class="title">Juegos</span> 
                        <span class="d">Sea el anfitrión perfecto creando juegos emocionantes para otros. Todos querrán venir a tu sala a jugar.</span>
                     </div>
                  </div>
               </div>
               <div class="col right">
                  <h1>Eso no es cool</h1>
                  <div class="case">
                     <img src="<?php echo FILES; ?>/assets/img/help/right-1.png"> 
                     <div class="desc">
                        <span class="title">Hacer trampa</span> 
                        <span class="d">Los tramposos nunca duran mucho. Simplemente estropean la diversión de los demás.</span>
                     </div>
                  </div>
                  <div class="case">
                     <img src="<?php echo FILES; ?>/assets/img/help/right-2.png"> 
                     <div class="desc">
                        <span class="title">Troll</span> 
                        <span class="d">A nadie le gustan los trolls, ni siquiera su madre, y nadie tolera los asaltos.</span>
                     </div>
                  </div>
                  <div class="case">
                     <img src="<?php echo FILES; ?>/assets/img/help/right-3.png"> 
                     <div class="desc">
                        <span class="title">Tener cybersexo</span> 
                        <span class="d">El cybersexo está estrictamente prohibido, las solicitudes de cámaras web resultarán en una penalización.</span>
                     </div>
                  </div>
                  <div class="case">
                     <img src="<?php echo FILES; ?>/assets/img/help/right-4.png"> 
                     <div class="desc">
                        <span class="title">Atrapar</span> 
                        <span class="d">Aprovecharse de otros Habbos suele crear mal karma... y disturbios.</span>
                     </div>
                  </div>
                  <div class="case">
                     <img src="<?php echo FILES; ?>/assets/img/help/right-5.png"> 
                     <div class="desc">
                        <span class="title">Copiar</span> 
                        <span class="d">¡Crea, no copie! Se original.</span>
                     </div>
                  </div>
                  <div class="case">
                     <img src="<?php echo FILES; ?>/assets/img/help/right-6.png"> 
                     <div class="desc">
                        <span class="title">Estafa</span> 
                        <span class="d">Robar no te hace rico, te convierte en un criminal. Y no está dando un buen ejemplo en absoluto.</span>
                     </div>
                  </div>
                  <div class="case">
                     <img src="<?php echo FILES; ?>/assets/img/help/right-7.png"> 
                     <div class="desc">
                        <span class="title">Vender por dinero real</span> 
                        <span class="d">No venda sus Furnis por dinero real. Es muy probable que lo pierda todo en un lugar inseguro. Además, tirarás a la basura todo el esfuerzo y el tiempo que dedicaste para llegar a donde estás.</span>
                     </div>
                  </div>
                  <div class="case">
                     <img src="<?php echo FILES; ?>/assets/img/help/right-8.png"> 
                     <div class="desc">
                        <span class="title">Apostar</span> 
                        <span class="d">Colocando furnis que pueden hacer que el juego sea aleatorio con la posibilidad de hacer apuestas. Podría meterte en problemas. Demuestra tus habilidades y no lo dejes al azar.</span>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <?php $TplClass->AddTemplate("others", "users-currency"); ?>
   </div>
</div>
<?php $TplClass->AddTemplate("others", "footer"); ?>