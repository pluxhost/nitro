<?php global $db, $Functions; ?>
<div class="box-grosshhag hiddenIfResponsive">
   <a href="/user" class="global-box me router-link-exact-active router-link-active"><img src="<?php echo AVATARIMAGE . $Functions->Me('look'); ?>&direction=3&gesture=sml"></a> 
   <div class="global-box wallet">
      <div class="content">
     
         <p class="w-1 has-tooltip tltp">
            <span class="tltptxt">Créditos</span>
            <img src="<?php echo FILES; ?>/assets/img/currency/infinity.gif"> 
            <span class="text"><?php echo $Functions->number_format_short($Functions->Me('credits')); ?></span>
         </p>
         <p class="w-2 has-tooltip tltp">
            <span class="tltptxt">Duckets</span>
            <img src="<?php echo FILES; ?>/assets/img/currency/duckets.gif"> 
            <span class="text"><?php echo $Functions->number_format_short($Functions->Me('pixels')); ?></span>
         </p>
         <p class="w-3 has-tooltip tltp" data-original-title="sdfdfsdfsssssssssssssssffds">
            <span class="tltptxt">Diamantes</span>
            <img src="<?php echo FILES; ?>/assets/img/currency/diamants.gif"> 
            <span class="text"><?php echo $Functions->number_format_short($Functions->Me('points')); ?></span>
         </p>
     
      </div>
   </div>
</div>
