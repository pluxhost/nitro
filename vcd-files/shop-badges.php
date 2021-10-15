<?php
   ob_start();
   require_once 'global.php';
   
   $Functions->Logged("allow");
   
   $TplClass->SetParam('title', 'Tienda de placas');
   $TplClass->SetParam('description', 'Tienda oficial de placas');
   $TplClass->SetParam('activeBadges', 'router-link-exact-active router-link-active');
         
   $TplClass->AddTemplate("header", "header");
   ?>
<div class="app">
   <div class="website-bg">
      <div class="mid"></div>
   </div>
   <div class="page online shop-badges">
      <?php $TplClass->AddTemplate("header", "menu"); ?>
      <div class="left">
         <div class="global-box box-buy-badges-pack">
            <div class="title">Paquete de placas</div>
            <div class="content">
               <?php
                  $resultsbs    = $db->query("SELECT * FROM cms_shop_badges WHERE type = '1' ORDER BY id DESC");
                  if ( $resultsbs->num_rows > 0 ) {
                  while($shopBadges = $resultsbs->fetch_array()) {
                  
                  $badCodes = explode(',', $shopBadges['code']);
                  ?>
               <div class="pack">
                  <div class="content <?php if (  $shopBadges['available'] > 0 ) { echo "available"; } ?>">
                     <div class="badges">
                        <div class="badge"><img src="<?php echo BADGEURL . $badCodes[0]; ?>.gif"></div>
                        <div class="badge"><img src="<?php echo BADGEURL . $badCodes[1]; ?>.gif"></div>
                        <?php if ( !empty($badCodes[2]) ) { ?>
                        <div class="badge"><img src="<?php echo BADGEURL . $badCodes[2]; ?>.gif"></div>
                        <?php } if ( !empty($badCodes[3]) ) { ?>
                        <div class="badge"><img src="<?php echo BADGEURL . $badCodes[3]; ?>.gif"></div>
                        <?php } if ( !empty($badCodes[4]) ) { ?>
                        <div class="badge"><img src="<?php echo BADGEURL . $badCodes[4]; ?>.gif"></div>
                        <?php } if ( !empty($badCodes[5]) ) { ?>
                        <div class="badge"><img src="<?php echo BADGEURL . $badCodes[5]; ?>.gif"></div>
                        <?php } ?>
                     </div>
                     <div class="line"><span><?php echo $Functions->FilterText($shopBadges['title']); ?></span> <span class="available <?php echo $shopBadges['id'];?>"><?php if (  $shopBadges['available'] > 0 ) { echo $shopBadges['available'] . " restante"; } else { echo "Stock agotado"; } ?></span></div>
                     <div class="line">
                        <div class="btn" onclick="buyBadge('<?php echo $shopBadges['id']; ?>', '1')"> <?php echo substr_count($shopBadges['code'],","); ?> Comprar paquete por <?php echo $shopBadges['price'];?> diamantes</div>
                     </div>
                  </div>
               </div>
               <?php }} else { ?>
               <div class="box-error error">
                  <img src="<?php echo FILES; ?>/assets/img/error/avatar.png" class="error-avatar"> 
                  <span>Sin placas para mostrar.</span>
               </div>
               <?php } ?>
            </div>
         </div>
      </div>
      <div class="right">
         <div class="global-box box-buy-badges">
            <div class="title">Placas</div>
            <div class="content">
               <?php
                  $resultsb    = $db->query("SELECT * FROM cms_shop_badges WHERE type = '0' ORDER BY id DESC");
                  if ( $resultsb->num_rows > 0 ) {
                  while($shopBadge = $resultsb->fetch_array()) {
                  ?>
               <div class="badge">
                  <div class="content <?php if (  $shopBadge['available'] > 0 ) { echo "available"; } ?> ">
                     <div class="badge"><img src="<?php echo BADGEURL . $shopBadge['code']; ?>.gif"></div>
                     <div class="infos"><span id="<?php echo $shopBadge['id']; ?>"><?php if (  $shopBadge['available'] > 0 ) { echo $shopBadge['available'] . " restante"; } else { echo "Stock agotado"; } ?></span> <span class="value"><?php echo $shopBadge['price'];?> diamantes</span></div>
                     <div class="line">
                        <div class="btn" id="btnSubmit<?php echo $shopBadge['id']; ?>" onclick="buyBadge('<?php echo $shopBadge['id']; ?>', '0')">Comprar placa</div>
                     </div>
                  </div>
               </div>
               <?php }} else { ?>
               <div class="box-error error">
                  <img src="<?php echo FILES; ?>/assets/img/error/avatar.png" class="error-avatar"> 
                  <span>Sin placas para mostrar.</span>
               </div>
               <?php } ?>
            </div>
         </div>
      </div>
      <?php $TplClass->AddTemplate("others", "users-currency"); ?>
   </div>
</div>
<?php $TplClass->AddTemplate("others", "footer"); ?>