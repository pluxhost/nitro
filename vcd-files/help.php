<?php
   ob_start();
   require_once 'global.php';
   
   $Functions->Logged("true");
   
   $TplClass->SetParam('title', 'Pedir ayuda');
   $TplClass->SetParam('description', 'Pedir ayuda');
   $TplClass->SetParam('activeHelp', 'router-link-exact-active router-link-active');
         
   $TplClass->AddTemplate("header", "header");
   ?>
<div class="app">
   <div class="website-bg">
      <div class="mid"></div>
   </div>
   <div class="page online help-tickets">
      <?php $TplClass->AddTemplate("header", "menu"); ?>
      <div class="left">
         <div class="global-box new-ticket">
            <div class="title">
               Pedir ayuda
            </div>
            <div class="content">
               <p class="description">
                  ¿Un pequeño problema? ¿Un problema con la cafetera? Desde la configuración de su cuenta hasta problemas de compras en la tienda, encontrará ayuda con todo aquí. Bienvenido al paraiso.
               </p>
               <div class="form">
                  <div class="input z">
                     <label for="type">Tipo de problema</label> 
                     <div class="select-options">
                        <div class="select-button">
                           <span id="c_title">Seleccione una opción</span> 
                           <div class="chevron"></div>
                        </div>
                        <div class="options" style="display: none;">
                           <input type="hidden" id="category" value="">
                           <span option_id="1" class="option" c_title="Soporte general (respuesta en 24 horas)">
                           Soporte general (respuesta en 24 horas)
                           </span>
                           <span option_id="2" class="option" c_title="Soporte técnico (respuesta en 72 horas) - mensaje enviado solo al moderador">
                           Soporte técnico (respuesta en 72 horas) - mensaje enviado solo al moderador
                           </span>
                           <span option_id="3" class="option" c_title="Soporte de estafa de casino (se requiere captura de pantalla)">
                           Soporte de estafa de casino (se requiere captura de pantalla)
                           </span>
                           <span option_id="4" class="option" c_title="Apoyo a la asociación">
                           Apoyo a la asociación
                           </span>
                        </div>
                     </div>
                  </div>
                  <div class="input right">
                     <label for="subject">Asunto del mensaje</label> 
                     <input id="subject" type="text" placeholder="blablabla">
                  </div>
                  <div class="input">
                     <label for="content">Contenido de la solicitud</label> 
                     <textarea id="content" placeholder="Escribe aquí..." maxlength="500"></textarea>
                  </div>
                  <div class="input">
                     <label for="screenshot">Captura de pantalla del problema</label> 
                     <input type="text" name="screenshot" id="screenshot" placeholder="URL de la imagen/captura de pantalla del problema (https://imgur.com/)">
                  </div>
                  <div class="input">
                     <input type="submit" value="Enviar solicitud de ayuda" id="btnSubmit" onclick="addTickets()">
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="right">
         <div>
            <div class="global-box box-my-tickets">
               <div class="title">
                  Mis tickets
               </div>
               <div class="content" id="addTicket">
                  <?php
                     $result    = $db->query("SELECT * FROM cms_tickets WHERE posted_in = 0 AND type = '0' ORDER BY id ASC");
                     if ( $result->num_rows > 0 ) {
                     while($ticket = $result->fetch_array()) {
                     ?>
                  <div class="ticket">
                     <div class="title" ticket="<?php echo $ticket['id']; ?>">
                        <div class="status">
                           <img id="status<?php echo $ticket['id']; ?>" src="<?php echo FILES; ?>/assets/img/ticket-<?php if ( $ticket['open'] == '0' ) { echo 'open'; }else { echo 'close'; } ?>.png">
                        </div>
                        <?php echo $Functions->FilterText($ticket['subject']); ?>
                     </div>
                     <div class="body" style="display: none;" ticketBody="<?php echo $ticket['id']; ?>"></div>
                  </div>
                  <?php }}else{ ?>
                  <div class="box-error error">
                     <img src="<?php echo FILES; ?>/assets/img/error/avatar.png" class="error-avatar"> 
                     <span>No ha enviado ningún ticket.</span>
                  </div>
                  <?php } ?>
               </div>
            </div>
         </div>
      </div>
      <?php $TplClass->AddTemplate("others", "users-currency"); ?>
   </div>
</div>
<?php $TplClass->AddTemplate("others", "footer"); ?>