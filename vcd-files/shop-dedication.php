<?php
   ob_start();
   require_once 'global.php';
   
   $Functions->Logged("allow");
   
   $TplClass->SetParam('title', 'Hacer una dedicatoria');
   $TplClass->SetParam('description', 'Hacer una dedicatoria');
   $TplClass->SetParam('activeDedication', 'router-link-exact-active router-link-active');
         
   $TplClass->AddTemplate("header", "header");
   ?>
<div class="app">
   <div class="website-bg">
      <div class="mid"></div>
   </div>
   <div class="page online shop-dedicaces">
      <?php $TplClass->AddTemplate("header", "menu"); ?>
      <div class="left">
         <div class="global-box box-new-dedicace">
            <div class="title">
               Publica una nueva dedicatoria
            </div>
            <div class="content">
               <p class="description">
                  Un pensamiento para convertir, un amor para revelar, ¡las dedicatorias están ahí para eso! Esto aparecerá en la parte superior del sitio por la maldita suma de <b>10 Diamantes</b>.
               </p>
               <div class="na">
                  <div class="input-group">
                     <label for="value">Escribir un comentario<b id="ct">Quedan 200 caracteres</b></label> 
                     <textarea name="value" id="value" placeholder="Escribe un comentario aquí" maxlength="200"></textarea>
                     <div class="emotes">
                        <img src="<?php echo FILES; ?>/assets/img/emojis/addict.png" emoji title=":addict:" alt="<?php echo FILES; ?>/assets/img/emojis/addict.png">
                        <img src="<?php echo FILES; ?>/assets/img/emojis/angry.png" emoji title=":angry:" alt="<?php echo FILES; ?>/assets/img/emojis/angry.png">
                        <img src="<?php echo FILES; ?>/assets/img/emojis/blush.png" emoji title=":blush:" alt="<?php echo FILES; ?>/assets/img/emojis/blush.png">
                        <img src="<?php echo FILES; ?>/assets/img/emojis/broken_heart.png" emoji title=":broken_heart:" alt="<?php echo FILES; ?>/assets/img/emojis/broken_heart.png">
                        <img src="<?php echo FILES; ?>/assets/img/emojis/clown.png" emoji title=":clown:" alt="<?php echo FILES; ?>/assets/img/emojis/clown.png">
                        <img src="<?php echo FILES; ?>/assets/img/emojis/cry.png" emoji title=":cry:" alt="<?php echo FILES; ?>/assets/img/emojis/cry.png">
                        <img src="<?php echo FILES; ?>/assets/img/emojis/cute.png" emoji title=":cute:" alt="<?php echo FILES; ?>/assets/img/emojis/cute.png">
                        <img src="<?php echo FILES; ?>/assets/img/emojis/drool.png" emoji title=":drool:" alt="<?php echo FILES; ?>/assets/img/emojis/drool.png">
                        <img src="<?php echo FILES; ?>/assets/img/emojis/fearful.png" emoji title=":fearful:" alt="<?php echo FILES; ?>/assets/img/emojis/fearful.png">
                        <img src="<?php echo FILES; ?>/assets/img/emojis/happy.png" emoji title=":happy:" alt="<?php echo FILES; ?>/assets/img/emojis/happy.png">
                        <img src="<?php echo FILES; ?>/assets/img/emojis/heart.png" emoji title=":heart:" alt="<?php echo FILES; ?>/assets/img/emojis/heart.png">
                        <img src="<?php echo FILES; ?>/assets/img/emojis/in_love.png" emoji title=":inlove:" alt="<?php echo FILES; ?>/assets/img/emojis/in_love.png">
                        <img src="<?php echo FILES; ?>/assets/img/emojis/innocent.png" emoji title=":innocent:" alt="<?php echo FILES; ?>/assets/img/emojis/innocent.png">
                        <img src="<?php echo FILES; ?>/assets/img/emojis/joy.png" emoji title=":joy:" alt="<?php echo FILES; ?>/assets/img/emojis/joy.png">
                        <img src="<?php echo FILES; ?>/assets/img/emojis/loved.png" emoji title=":loved:" alt="<?php echo FILES; ?>/assets/img/emojis/loved.png">
                        <img src="<?php echo FILES; ?>/assets/img/emojis/mad.png" emoji title=":mad:" alt="<?php echo FILES; ?>/assets/img/emojis/mad.png">
                        <img src="<?php echo FILES; ?>/assets/img/emojis/mouth_closed.png" emoji title=":mouth_closed:" alt="<?php echo FILES; ?>/assets/img/emojis/mouth_closed.png">
                        <img src="<?php echo FILES; ?>/assets/img/emojis/neutral.png" emoji title=":neutral:" alt="<?php echo FILES; ?>/assets/img/emojis/neutral.png">
                        <img src="<?php echo FILES; ?>/assets/img/emojis/shocked.png" emoji title=":shocked:" alt="<?php echo FILES; ?>/assets/img/emojis/shocked.png">
                        <img src="<?php echo FILES; ?>/assets/img/emojis/smiling.png" emoji title=":smiling:" alt="<?php echo FILES; ?>/assets/img/emojis/smiling.png">
                        <img src="<?php echo FILES; ?>/assets/img/emojis/sob.png" emoji title=":sob:" alt="<?php echo FILES; ?>/assets/img/emojis/sob.png">
                        <img src="<?php echo FILES; ?>/assets/img/emojis/sunglasses.png" emoji title=":sunglasses:" alt="<?php echo FILES; ?>/assets/img/emojis/sunglasses.png">
                        <img src="<?php echo FILES; ?>/assets/img/emojis/suspect.png" emoji title=":suspect:" alt="<?php echo FILES; ?>/assets/img/emojis/suspect.png">
                        <img src="<?php echo FILES; ?>/assets/img/emojis/tongue_out.png" emoji title=":tongue_out:" alt="<?php echo FILES; ?>/assets/img/emojis/tongue_out.png">
                        <img src="<?php echo FILES; ?>/assets/img/emojis/twisted.png" emoji title=":twisted:" alt="<?php echo FILES; ?>/assets/img/emojis/twisted.png">
                        <img src="<?php echo FILES; ?>/assets/img/emojis/wink.png" emoji title=":wink:" alt="<?php echo FILES; ?>/assets/img/emojis/wink.png">
                     </div>
                  </div>
                  <div class="input-group"><input type="submit" id="btnnSubmit" value="Hacer una dedicatoria por 10 diamantes" onclick="addDedication()"></div>
               </div>
            </div>
         </div>
      </div>
      <div class="right">
         <div>
            <div class="global-box box-my-dedicace">
               <div class="title">
                  Mis dedicatorias esperando validación
               </div>
               <div class="content newD">
                  <?php global $db, $Functions;
                  $result    = $db->query("SELECT * FROM cms_dedication WHERE user_id = '{$Functions->Me('id')}' AND public = '0' ORDER BY id ASC ");
                  if ( $result->num_rows > 0 ) {
                  while($nws = $result->fetch_array()) {
                  ?>
                  <div class="line" id="<?php echo $nws['id']; ?>">
                     <div class="message-emotes">
                        <img src="<?php echo FILES; ?>/assets/img/ticket-close.png">
                        <?php echo $Functions->FilterTextF($nws['message']); ?>
                     </div>
                     <div class="btn" onclick="deleteDedication('<?php echo $nws['id']; ?>');">Borrar</div>
                  </div>
                  <?php }} else { ?>
                     <div class="box-error error"><img src="<?php echo FILES; ?>/assets/img/error/avatar.png" class="error-avatar"> <span>Sin dedicación pendiente de validación.</span></div>
                  <?php } ?>
               </div>
               <div class="title notop">
                  Mis dedicatorias publicadas
               </div>
               <div class="content">
                  

                  <?php global $db, $Functions;
                  $result    = $db->query("SELECT * FROM cms_dedication WHERE user_id = '{$Functions->Me('id')}' AND public = '1' ORDER BY id ASC ");
                  if ( $result->num_rows > 0 ) {
                  while($nws = $result->fetch_array()) {
                  ?>
                  <div class="line" id="<?php echo $nws['id']; ?>">
                     <div class="message-emotes">
                        <img src="<?php echo FILES; ?>/assets/img/ticket-open.png">
                        <?php echo $Functions->FilterTextF($nws['message']); ?>
                     </div>
                     <div class="btn" onclick="deleteDedication('<?php echo $nws['id']; ?>');">Borrar</div>
                  </div>
                  <?php }} else { ?>
                     <div class="box-error error"><img src="<?php echo FILES; ?>/assets/img/error/avatar.png" class="error-avatar"> <span>Sin dedicación validada.</span></div>
                  <?php } ?>
               </div>
            </div>
         </div>
      </div>
      <?php $TplClass->AddTemplate("others", "users-currency"); ?>
   </div>
</div>
<?php $TplClass->AddTemplate("others", "footer"); ?>