<?php
   ob_start();
   require_once 'global.php';
   
   $Functions->Logged("allow");
   
   $TplClass->SetParam('title', 'Usuarios con mejor estadística');
   $TplClass->SetParam('description', 'Usuarios con mejor estadística');
   $TplClass->SetParam('activeTopstats', 'router-link-exact-active router-link-active');
         
   $TplClass->AddTemplate("header", "header");
   ?>
<div class="app">
   <div class="website-bg">
      <div class="mid"></div>
   </div>
   <div class="page online top-demi">
      <?php $TplClass->AddTemplate("header", "menu"); ?>
      <div class="content">
         <div class="col left">
            <div class="global-box box-top-gamers lb">
               <div class="title">
                  Top por Puntos de Recompensa
                  <img src="<?php echo FILES; ?>/assets/img/currency/win-wins.gif">
               </div>
               <!----> 
               <div class="content description">
                  <p class="description">Los puntos de recompensa <img src="<?php echo FILES; ?>/assets/img/currency/win-wins.gif"> se ganan gracias a las diversas <b>misiones</b> disponibles en el hotel.
                     Este número también está fuertemente relacionado con tu <b>tiempo de conexión</b> dentro de <?php echo $Functions->WebSettings('hotelname'); ?>.<br><br>
                     ¡También puedes adquirir puntos de recompensa <img src="<?php echo FILES; ?>/assets/img/currency/win-wins.gif"> gracias a los Megapack
                  </p>
               </div>
               <div class="content top">
                  <?php
                     $rpoints = $db->query("SELECT * FROM users_settings ORDER BY achievement_score DESC LIMIT 1");
                     $points = $rpoints->fetch_array();
                     
                     $rpoints2 = $db->query("SELECT * FROM users_settings WHERE achievement_score < '{$points['achievement_score']}' ORDER BY achievement_score DESC LIMIT 1");
                     $points2 = $rpoints2->fetch_array();
                     
                     $rpoints3 = $db->query("SELECT * FROM users_settings WHERE achievement_score < '{$points2['achievement_score']}' ORDER BY achievement_score DESC LIMIT 1");
                     $points3 = $rpoints3->fetch_array();
                     
                     ?>
                  <div class="pos second">
                     <div class="avatar"><img src="<?php echo AVATARIMAGE . $Functions->User('look', $points2['user_id']); ?>&head_direction=3&direction=3&gesture=sml"></div>
                     <div class="infos"><span class="username"><?php echo $Functions->User('username', $points2['user_id']); ?></span> <span class="nb"><?php echo number_format($Functions->UserSettings('achievement_score', $points2['user_id'])); ?> Puntos de Recompensa</span></div>
                  </div>
                  <div class="pos first">
                     <div class="avatar"><img src="<?php echo AVATARIMAGE . $Functions->User('look', $points['user_id']); ?>&head_direction=3&direction=3&gesture=sml"></div>
                     <div class="infos"><span class="username"><?php echo $Functions->User('username', $points['user_id']); ?></span> <span class="nb"><?php echo number_format($Functions->UserSettings('achievement_score', $points['user_id'])); ?> Puntos de Recompensa</span></div>
                  </div>
                  <div class="pos third">
                     <div class="avatar"><img src="<?php echo AVATARIMAGE . $Functions->User('look', $points3['user_id']); ?>&head_direction=3&direction=3&gesture=sml"></div>
                     <div class="infos"><span class="username"><?php echo $Functions->User('username', $points3['user_id']); ?></span> <span class="nb"><?php echo number_format($Functions->UserSettings('achievement_score', $points3['user_id'])); ?> Puntos de Recompensa</span></div>
                  </div>
               </div>
               <div class="content others">
                  <?php 
                     $result     = $db->query("SELECT * FROM users_settings ORDER BY achievement_score DESC LIMIT 15");
                     foreach(range(1, $result->num_rows) as $positionpoints){
                     $toppoints = $result->fetch_array();
                     if ( $toppoints['achievement_score'] < $points3['achievement_score'] ) {
                     ?>
                  <div class="line">
                     <div class="avatar"><img src="<?php echo AVATARIMAGE . $Functions->User('look', $toppoints['user_id']); ?>"></div>
                     <div class="infos"><span class="username"><?php echo $Functions->User('username', $toppoints['user_id']); ?></span> <span class="points"><img src="<?php echo FILES; ?>/assets/img/currency/jetons.gif">
                        <?php echo $Functions->UserSettings('achievement_score', $toppoints['user_id']); ?> Puntos de Recompensa
                        </span>
                     </div>
                     <div class="pos"><?php echo $positionpoints; ?></div>
                  </div>
                  <?php }} ?>
               </div>
            </div>
            <div class="global-box box-top-gamers me">
               <div class="title">
                  Mi top Puntos de Recompensa
                  <img src="<?php echo FILES; ?>/assets/img/currency/jetons.gif">
               </div>
               <!----> <!----> 
               <div class="content others">
                  <?php 
                     $result     = $db->query("SELECT * FROM users_settings ORDER BY achievement_score DESC");
                     foreach(range(1, $result->num_rows) as $positionpoints){
                     $myToppoints = $result->fetch_array();
                     
                     if ( $myToppoints['id'] == $Functions->Me('id') ) {
                     ?>
                  <div class="line">
                     <div class="avatar"><img src="<?php echo AVATARIMAGE . $Functions->User('look', $myToppoints['user_id']); ?>"></div>
                     <div class="infos"><span class="username"><?php echo $Functions->User('username', $myToppoints['user_id']); ?></span> <span class="points"><img src="<?php echo FILES; ?>/assets/img/currency/jetons.gif">
                        <?php echo $Functions->UserSettings('achievement_score', $myToppoints['user_id']); ?> points
                        </span>
                     </div>
                     <div class="pos"><?php echo $positionpoints; ?></div>
                  </div>
                  <?php }} ?>
               </div>
            </div>
         </div>
         <div class="col right">
            <div class="global-box box-top-gamers lb">
               <div class="title">
                  Top por Respetos
                  <img src="<?php echo FILES; ?>/assets/img/currency/respects.gif">
               </div>
               <!----> 
               <div class="content description">
                  <p class="description">Demuestre quién es el <b>jefe</b> del hotel obteniendo el mayor respeto <img src="/<?php echo FILES; ?>/assets/img/currency/respects.gif"> posible. 
                     Para conseguir estos puntos, nada podría ser más sencillo: los demás usuarios <b>deben respetarte</b>.
                  </p>
               </div>
               <div class="content top">
                  <?php
                     $rpixels = $db->query("SELECT * FROM users_settings ORDER BY respects_received DESC LIMIT 1");
                     $pixels = $rpixels->fetch_array();
                     
                     $rpixels2 = $db->query("SELECT * FROM users_settings WHERE respects_received < '{$pixels['respects_received']}' ORDER BY respects_received DESC LIMIT 1");
                     $pixels2 = $rpixels2->fetch_array();
                     
                     $rpixels3 = $db->query("SELECT * FROM users_settings WHERE respects_received < '{$pixels2['respects_received']}' ORDER BY respects_received DESC LIMIT 1");
                     $pixels3 = $rpixels3->fetch_array();
                     
                     ?>
                  <div class="pos second">
                     <div class="avatar"><img src="<?php echo AVATARIMAGE . $Functions->User('look', $pixels2['user_id']); ?>&head_direction=3&direction=3&gesture=sml"></div>
                     <div class="infos"><span class="username"><?php echo $Functions->User('username', $pixels2['user_id']); ?></span> <span class="nb"><?php echo number_format($Functions->UserSettings('respects_received', $pixels2['user_id'])); ?> respetos</span></div>
                  </div>
                  <div class="pos first">
                     <div class="avatar"><img src="<?php echo AVATARIMAGE . $Functions->User('look', $pixels['user_id']); ?>&head_direction=3&direction=3&gesture=sml"></div>
                     <div class="infos"><span class="username"><?php echo $Functions->User('username', $pixels['user_id']); ?></span> <span class="nb"><?php echo number_format($Functions->UserSettings('respects_received', $pixels['user_id'])); ?> respetos</span></div>
                  </div>
                  <div class="pos third">
                     <div class="avatar"><img src="<?php echo AVATARIMAGE . $Functions->User('look', $pixels3['user_id']); ?>&head_direction=3&direction=3&gesture=sml"></div>
                     <div class="infos"><span class="username"><?php echo $Functions->User('username', $pixels3['user_id']); ?></span> <span class="nb"><?php echo number_format($Functions->UserSettings('respects_received', $pixels3['user_id'])); ?> respetos</span></div>
                  </div>
               </div>
               <div class="content others">
                  <?php 
                     $result     = $db->query("SELECT * FROM users_settings ORDER BY respects_received DESC LIMIT 15");
                     foreach(range(1, $result->num_rows) as $positionPixels){
                     $topDuckets = $result->fetch_array();
                     if ( $topDuckets['respects_received'] < $pixels3['respects_received'] ) {
                     ?>
                  <div class="line">
                     <div class="avatar"><img src="<?php echo AVATARIMAGE . $Functions->User('look', $topDuckets['user_id']); ?>"></div>
                     <div class="infos"><span class="username"><?php echo $Functions->User('username', $topDuckets['user_id']); ?></span> <span class="points"><img src="<?php echo FILES; ?>/assets/img/currency/respects.gif">
                        <?php echo $Functions->UserSettings('respects_received', $topDuckets['user_id']); ?> respetos
                        </span>
                     </div>
                     <div class="pos"><?php echo $positionPixels; ?></div>
                  </div>
                  <?php }} ?>
               </div>
            </div>
            <div class="global-box box-top-gamers me">
               <div class="title">
                  Mi top Respeto
                  <img src="<?php echo FILES; ?>/assets/img/currency/respects.gif">
               </div>
               <!----> <!----> 
               <div class="content others">
                  <?php 
                     $result     = $db->query("SELECT * FROM users_settings ORDER BY respects_received DESC");
                     foreach(range(1, $result->num_rows) as $positionPixels){
                     $myTopDuckets = $result->fetch_array();
                     
                     if ( $myTopDuckets['id'] == $Functions->Me('id') ) {
                     ?>
                  <div class="line">
                     <div class="avatar"><img src="<?php echo AVATARIMAGE . $Functions->User('look', $myTopDuckets['user_id']); ?>"></div>
                     <div class="infos"><span class="username"><?php echo $Functions->User('username', $myTopDuckets['user_id']); ?></span> <span class="points"><img src="<?php echo FILES; ?>/assets/img/currency/respects.gif">
                        <?php echo $Functions->UserSettings('respects_received', $myTopDuckets['user_id']); ?> respetos
                        </span>
                     </div>
                     <div class="pos"><?php echo $positionPixels; ?></div>
                  </div>
                  <?php }} ?>
               </div>
            </div>
         </div>
         <?php $TplClass->AddTemplate("others", "users-currency"); ?>
      </div>
   </div>
</div>
<?php $TplClass->AddTemplate("others", "footer"); ?>