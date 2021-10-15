<?php
   ob_start();
   require_once 'global.php';
   
   $Functions->Logged("allow");
   
   $TplClass->SetParam('title', 'Foro');
   $TplClass->SetParam('description', 'Foro');
   $TplClass->SetParam('activeCForum', 'router-link-exact-active router-link-active');
         
   $TplClass->AddTemplate("header", "header");
   ?>
<div class="app">
   <div class="website-bg">
      <div class="mid"></div>
   </div>
   <div class="page online forum">
      <?php $TplClass->AddTemplate("header", "menu"); ?>
      <?php $TplClass->AddTemplate("others", "users-currency"); ?>
      <div class="forum">
         <div class="global-box header">
            <h1><img src="<?php echo FILES; ?>/assets/img/forum/duck.gif">Foro de <?php echo $Functions->WebSettings('hotelname'); ?>
            </h1>
            <a href="/community/forum/create" class="">Nuevo tema</a>
         </div>
         <div class="content home">
            <?php 
               $resultfc              = $db->query("SELECT * FROM cms_forum_category ORDER BY id ASC");
               while ( $forumCategory = $resultfc->fetch_array() ) {
               ?>
            <div class="line">
               <div class="left">
                  <div class="background" style="background-image: url(<?php echo $forumCategory['image']; ?>);"></div>
                  <a href="<?php echo PATH; ?>/community/forum/category/<?php echo $forumCategory['id']; ?>-<?php echo $forumCategory['link']; ?>" class="link">
                  <?php echo $Functions->FilterText($forumCategory['title']); ?>
                  </a> 
                  <p><?php echo $Functions->FilterText($forumCategory['description']); ?></p>
               </div>
               <div class="stats">
                  <div class="top">
                     <div class="col min">
                        <h1>Temas</h1>
                        <span><?php $post = $db->query("SELECT * FROM cms_forum WHERE category = '{$forumCategory['id']}'");
                           $posts = $post->fetch_array(); 
                           echo $post->num_rows; ?></span>
                     </div>
                     <div class="col min">
                        <h1>Respuestas</h1>
                        <span><?php $comments = $db->query("SELECT * FROM cms_forum_comments WHERE post_id = '{$posts['id']}'"); echo $comments->num_rows; ?></span>
                     </div>
                     <div class="col users_activity">
                        <h1>Usuarios activos</h1>
                        <div class="users">
                           <?php 
                              $resultc     = $db->query("SELECT * FROM cms_forum_comments WHERE category = '{$forumCategory['id']}' GROUP BY user_id ORDER BY id DESC LIMIT 5");
                              while ( $u_a = $resultc->fetch_array() ) {
                              
                              ?>
                           <div class="response-avatar has-tooltip tltp">
                              <span class="tltptxt"><?php echo $Functions->User('username', $u_a['user_id']); ?></span>
                              <img src="<?php echo AVATARIMAGE . $Functions->User('look', $u_a['user_id']); ?>&headonly=1&size=s">
                           </div>
                           <?php } 
                              $more_ua = $db->query("SELECT * FROM cms_forum_comments WHERE category = '{$forumCategory['id']}' GROUP BY user_id ORDER BY id DESC");
                              $total_more = $more_ua->num_rows - 5;
                              if ( $total_more > 0 ) {
                              ?>
                           <div class="response-more-counter"><span>+<?php echo $total_more; ?></span></div>
                           <?php } ?>
                        </div>
                     </div>
                  </div>
                  <div class="down">
                     <h1>Último tema activo</h1>
                     <?php $rpost = $db->query("SELECT * FROM cms_forum WHERE category = '{$forumCategory['id']}' ORDER BY id DESC");
                        $p = $rpost->fetch_array(); ?>
                     <a href="/community/forum/thread/<?php echo $p['id']; ?>-<?php echo $Functions->FilterTextLink($p['title']); ?>" class="">
                     <?php echo $Functions->FilterText($p['title']); ?>
                     </a>
                  </div>
               </div>
            </div>
            <?php } ?>
         </div>
      </div>
   </div>
</div>
<?php $TplClass->AddTemplate("others", "footer"); ?>