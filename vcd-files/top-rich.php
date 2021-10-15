<?php
   ob_start();
   require_once 'global.php';
   
   $Functions->Logged("allow");
   
   $TplClass->SetParam('title', 'Usuarios con riqueza');
   $TplClass->SetParam('description', 'Usuarios con riqueza');
   $TplClass->SetParam('activeToprich', 'router-link-exact-active router-link-active');
         
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
                  Top por PluxCoin
                  <img src="<?php echo FILES; ?>/assets/img/currency/jetons.gif">
               </div>
               <!----> 
               <div class="content description">
                  <p class="description">El PluxCoin <img src="<?php echo FILES; ?>/assets/img/currency/jetons.gif"> es la moneda <b>más valiosa</b>. Puedes conseguirlo en 
                     la tienda comprando directamente y/o convirtiendo Diamantes. 
                     También puedes ganarlos durante <b>eventos especiales</b>.<br><br>
                     ¿Su objetivo? El PluxCoin <img src="<?php echo FILES; ?>/assets/img/currency/jetons.gif"> te será útil para <b>realizar compras</b> en el sitio como, por ejemplo <a href="/shop/badges">Placas</a>, 
                     <a href="/shop/dedication">Dedicatorias</a>...
                  </p>
               </div>
               <div class="content top">
                  <?php
                  //   $rpoints = $db->query("SELECT * FROM $users WHERE rank < '".MINRANK."' ORDER BY points DESC LIMIT 1");
                     $rpoints = $db->query("SELECT * FROM users_currency  WHERE type = '5' ORDER BY amount DESC LIMIT 1");
                     $points = $rpoints->fetch_array();
                     
                     //$rpoints2 = $db->query("SELECT * FROM $users WHERE points < '{$points['points']}' AND rank < '".MINRANK."' ORDER BY points DESC LIMIT 1");
                     $rpoints2 = $db->query("SELECT * FROM users_currency WHERE  type='5' AND amount < '{$points['amount']}' ORDER BY amount DESC LIMIT 1");
                     $points2 = $rpoints2->fetch_array();
                     
                   //  $rpoints3 = $db->query("SELECT * FROM $users WHERE points < '{$points2['points']}' AND rank < '".MINRANK."' ORDER BY points DESC LIMIT 1");
                     $rpoints3 = $db->query("SELECT * FROM users_currency WHERE type='5' AND amount < '{$points2['amount']}' ORDER BY amount DESC LIMIT 1");
                     $points3 = $rpoints3->fetch_array();
                   
                     ?>
                  <div class="pos second">
                     <div class="avatar"><img src="<?php echo AVATARIMAGE . $Functions->User('look', $points2['user_id']); ?>&head_direction=3&direction=3&gesture=sml"></div>
                     <div class="infos"><span class="username"><?php echo $Functions->User('username', $points2['user_id']); ?></span> <span class="nb"><?php echo number_format($Functions->User('points', $points2['user_id'])); ?> Diamantes</span></div>
                  </div>
                  <div class="pos first">
                     <div class="avatar"><img src="<?php echo AVATARIMAGE . $Functions->User('look', $points['user_id']); ?>&head_direction=3&direction=3&gesture=sml"></div>
                     <div class="infos"><span class="username"><?php echo $Functions->User('username', $points['user_id']); ?></span> <span class="nb"><?php echo number_format($Functions->User('points', $points['user_id'])); ?> Diamantes</span></div>
                  </div>
                  <div class="pos third">
                     <div class="avatar"><img src="<?php echo AVATARIMAGE . $Functions->User('look', $points3['user_id']); ?>&head_direction=3&direction=3&gesture=sml"></div>
                     <div class="infos"><span class="username"><?php echo $Functions->User('username', $points3['user_id']); ?></span> <span class="nb"><?php echo number_format($Functions->User('points', $points3['user_id'])); ?> Diamantes</span></div>
                  </div>
               </div>
               <div class="content others">
                  <?php 
                     $result     = $db->query("SELECT * FROM $users WHERE rank < '".MINRANK."' ORDER BY points DESC LIMIT 15");
                     foreach(range(1, $result->num_rows) as $positionpoints){
                     $toppoints = $result->fetch_array();
                     if ( $toppoints['points'] < $points3['points'] ) {
                     ?>
                  <div class="line">
                     <div class="avatar"><img src="<?php echo AVATARIMAGE . $Functions->User('look', $toppoints['user_id']); ?>"></div>
                     <div class="infos"><span class="username"><?php echo $Functions->User('username', $toppoints['user_id']); ?></span> <span class="points"><img src="<?php echo FILES; ?>/assets/img/currency/jetons.gif">
                        <?php echo $Functions->User('points', $toppoints['id']); ?> points
                        </span>
                     </div>
                     <div class="pos"><?php echo $positionpoints; ?></div>
                  </div>
                  <?php }} ?>
               </div>
            </div>
            <div class="global-box box-top-gamers me">
               <div class="title">
                  Mi top PluxCoin
                  <img src="<?php echo FILES; ?>/assets/img/currency/jetons.gif">
               </div>
               <!----> <!----> 
               <div class="content others">
                  <?php 
                     $result     = $db->query("SELECT * FROM $users ORDER BY points DESC");
                     foreach(range(1, $result->num_rows) as $positionpoints){
                     $myToppoints = $result->fetch_array();
                     
                     if ( $myToppoints['id'] == $Functions->Me('id') ) {
                     ?>
                  <div class="line">
                     <div class="avatar"><img src="<?php echo AVATARIMAGE . $Functions->User('look', $myToppoints['id']); ?>"></div>
                     <div class="infos"><span class="username"><?php echo $Functions->User('username', $myToppoints['id']); ?></span> <span class="points"><img src="<?php echo FILES; ?>/assets/img/currency/jetons.gif">
                        <?php echo $Functions->User('points', $myToppoints['id']); ?> points
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
                  Top por duckets
                  <img src="<?php echo FILES; ?>/assets/img/currency/duckets.gif">
               </div>
               <!----> 
               <div class="content description">
                  <p class="description">El Ducket <img src="<?php echo FILES; ?>/assets/img/currency/duckets.gif"> es una de las principales monedas de <?php echo $Functions->WebSettings('hotelname'); ?>. Se puede obtener diariamente ya que se le ofrecen 20 duckets <img src="<?php echo FILES; ?>/assets/img/currency/duckets.gif"> por <b>cada hora de estancia en nuestro hotel</b>. También se puede ganar en las <b>casillas</b> durante <b>animaciones</b> o <b>eventos especiales</b> pero también en 
                     <b>ciertas misiones</b> disponibles en el juego para los más fuertes. <br><br>
                     Esta moneda se puede <b>transformar en lingotes</b> y es muy útil para los fanáticos de los casinos, 
                     ya que <b>se puede apostar</b>para ganar, si tiene suerte, una suma mayor con 
                    rares e incluso ultra rares
                     También se puede usar para comprar paquetes de rares en el sitio.
                  </p>
               </div>
               <div class="content top">
                  <?php
                 //    $rpixels = $db->query("SELECT * FROM $users WHERE rank < '".MINRANK."' ORDER BY pixels DESC LIMIT 1");
                       $rpixels = $db->query("SELECT * FROM users_currency  WHERE type = '0' ORDER BY amount DESC LIMIT 1");
                     $pixels = $rpixels->fetch_array();
                     
                   //  $rpixels2 = $db->query("SELECT * FROM $users WHERE pixels < '{$pixels['pixels']}' AND rank < '".MINRANK."' ORDER BY pixels DESC LIMIT 1");
                     $rpixels2 =  $db->query("SELECT * FROM users_currency WHERE  type='0' AND amount < '{$pixels['amount']}' ORDER BY amount DESC LIMIT 1");
                     $pixels2 = $rpixels2->fetch_array();
                     
                    // $rpixels3 = $db->query("SELECT * FROM $users WHERE pixels < '{$pixels2['pixels']}' AND rank < '".MINRANK."' ORDER BY pixels DESC LIMIT 1");
                     $rpixels3 = $db->query("SELECT * FROM users_currency WHERE type='0' AND amount < '{$pixels2['amount']}' ORDER BY amount DESC LIMIT 1");
                     $pixels3 = $rpixels3->fetch_array();
                     


                   
                       
                     
              




                     ?>
                  <div class="pos second">
                     <div class="avatar"><img src="<?php echo AVATARIMAGE . $Functions->User('look', $pixels2['user_id']); ?>&head_direction=3&direction=3&gesture=sml"></div>
                     <div class="infos"><span class="username"><?php echo $Functions->User('username', $pixels2['user_id']); ?></span> <span class="nb"><?php echo number_format($Functions->User('pixels', $pixels2['user_id'])); ?> duckets</span></div>
                  </div>
                  <div class="pos first">
                     <div class="avatar"><img src="<?php echo AVATARIMAGE . $Functions->User('look', $pixels['user_id']); ?>&head_direction=3&direction=3&gesture=sml"></div>
                     <div class="infos"><span class="username"><?php echo $Functions->User('username', $pixels['user_id']); ?></span> <span class="nb"><?php echo number_format($Functions->User('pixels', $pixels['user_id'])); ?> duckets</span></div>
                  </div>
                  <div class="pos third">
                     <div class="avatar"><img src="<?php echo AVATARIMAGE . $Functions->User('look', $pixels3['user_id']); ?>&head_direction=3&direction=3&gesture=sml"></div>
                     <div class="infos"><span class="username"><?php echo $Functions->User('username', $pixels3['user_id']); ?></span> <span class="nb"><?php echo number_format($Functions->User('pixels', $pixels3['user_id'])); ?> duckets</span></div>
                  </div>
               </div>
               <div class="content others">
                  <?php 
                     $result     = $db->query("SELECT * FROM $users WHERE rank < '".MINRANK."' ORDER BY pixels DESC LIMIT 15");
                     foreach(range(1, $result->num_rows) as $positionPixels){
                     $topDuckets = $result->fetch_array();
                     if ( $topDuckets['pixels'] < $pixels3['pixels'] ) {
                     ?>
                  <div class="line">
                     <div class="avatar"><img src="<?php echo AVATARIMAGE . $Functions->User('look', $topDuckets['id']); ?>"></div>
                     <div class="infos"><span class="username"><?php echo $Functions->User('username', $topDuckets['id']); ?></span> <span class="points"><img src="<?php echo FILES; ?>/assets/img/currency/duckets.gif">
                        <?php echo $Functions->User('pixels', $topDuckets['id']); ?> duckets
                        </span>
                     </div>
                     <div class="pos"><?php echo $positionPixels; ?></div>
                  </div>
                  <?php }} ?>
               </div>
            </div>
            <div class="global-box box-top-gamers me">
               <div class="title">
                  Mi top duckets
                  <img src="<?php echo FILES; ?>/assets/img/currency/duckets.gif">
               </div>
               <!----> <!----> 
               <div class="content others">
                  <?php 
                     $result     = $db->query("SELECT * FROM $users ORDER BY pixels DESC");
                     foreach(range(1, $result->num_rows) as $positionPixels){
                     $myTopDuckets = $result->fetch_array();
                     
                     if ( $myTopDuckets['id'] == $Functions->Me('id') ) {
                     ?>
                  <div class="line">
                     <div class="avatar"><img src="<?php echo AVATARIMAGE . $Functions->User('look', $myTopDuckets['id']); ?>"></div>
                     <div class="infos"><span class="username"><?php echo $Functions->User('username', $myTopDuckets['id']); ?></span> <span class="points"><img src="<?php echo FILES; ?>/assets/img/currency/duckets.gif">
                        <?php echo $Functions->User('pixels', $myTopDuckets['id']); ?> duckets
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
