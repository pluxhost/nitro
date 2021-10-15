<?php
   ob_start();
   require_once 'global.php';
   
   $Functions->Logged("allow");
   
   $TplClass->SetParam('title', 'Fotos');
   $TplClass->SetParam('description', 'Fotos');
   $TplClass->SetParam('activeCPhotos', 'router-link-exact-active router-link-active');
         
   $TplClass->AddTemplate("header", "header");
   ?>
<div class="app">
   <div class="website-bg">
      <div class="mid"></div>
   </div>
   <div class="page online photos">
      <?php $TplClass->AddTemplate("header", "menu"); ?>
      <div class="content">
         <div class="left">
            <div class="photos">
               <div data-masonry="{ &quot;horizontalOrder&quot;: true, &quot;itemSelector&quot;: &quot;.photo&quot;, stagger: &quot;0.5s&quot; }" class="content" style="position: relative; height: 617.656px;">
                  <div class="box-photo" style="position: absolute; left: 0px; top: 0px;">
                     <div class="picture"><img src="<?php echo FILES; ?>/assets/img/photos/1.png"></div>
                     <div class="picture-info-overlay">
                        <div class="overlay-content">
                           <img src="https://avatar.h-alpha.fr/habbo-imaging/avatarimage?figure=lg-3216-89.hd-3098-3.ch-655-92.hr-838-32.sh-1935-61&headonly=1&direction=3&size=l"> 
                           <div>
                              <h4 style="margin-bottom: 10px;">09H45</h4>
                              <div class="btn">Ver</div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="box-photo" style="position: absolute; left: 297.5px; top: 0px;">
                     <div class="picture"><img src="<?php echo FILES; ?>/assets/img/photos/2.png"></div>
                     <div class="picture-info-overlay">
                        <div class="overlay-content">
                           <img src="https://avatar.h-alpha.fr/habbo-imaging/avatarimage?figure=ha-1013-1326.ch-987435752-92.hr-1751-1404.cc-887-1409.lg-757015-1326-153640.sh-3035-92.hd-600-1.he-64890-89.wa-65254-89.fa-3276-72&headonly=1&direction=3&size=l"> 
                           <div>
                              <h4 style="margin-bottom: 10px;">Darinouille</h4>
                              <div class="btn">Ver</div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="btn">
               Cargar más fotos
            </div>
         </div>
         <?php $TplClass->AddTemplate("others", "users-currency"); ?>
      </div>
   </div>
</div>
<?php $TplClass->AddTemplate("others", "footer"); ?>