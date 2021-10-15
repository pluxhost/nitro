<?php
   ob_start();
   require_once 'global.php';
   
   $Functions->Logged("allow");
   
   $TplClass->SetParam('activeCNews', 'router-link-exact-active router-link-active');
   
   $getid = $Functions->FilterText($_GET['id']);
   
   if(empty($getid)){
   $resultNews = $db->query("SELECT * FROM cms_news ORDER BY id DESC LIMIT 1");
   $news = $resultNews->fetch_array();
   $getid = $news['id'];
   }else{
   $resultNews = $db->query("SELECT * FROM cms_news WHERE id = '{$getid}' LIMIT 1");
   $news = $resultNews->fetch_array();
   }
   
   
   $TplClass->SetParam('title', $Functions->FilterText($news['title']));
   $TplClass->SetParam('description', $Functions->FilterText($news['story']));
         
   $TplClass->AddTemplate("header", "header");
   ?>
<div class="app">
   <div class="website-bg">
      <div class="mid"></div>
   </div>
   <div class="page online events">
      <?php $TplClass->AddTemplate("header", "menu"); ?>
      <?php $TplClass->AddTemplate("others", "users-currency"); ?>
      <div class="left">
         <div class="">
            <div class="global-box last">
               <div class="title">
                  Últimas noticias
               </div>
               <div class="content">
                  <?php 
                     $resultN     = $db->query("SELECT * FROM cms_news ORDER BY id DESC");
                     while ( $nws = $resultN->fetch_array() ) {
                     ?>
                  <a class="<?php if ( $nws['id'] == $news['id'] ) { echo 'slc '; } ?>notPublished" href="/community/news/<?php echo $nws['id']; ?>">
                  <span class="chevron"></span>
                  <?php echo $Functions->FilterText($nws['title']); ?>
                  </a>
                  <?php } ?>
               </div>
            </div>
         </div>
      </div>
      <div class="right visible">
         <div class="specific-event">
            <div theme="light" class="global-box body">
               <div class="title"><?php echo $Functions->FilterText($news['title']); ?></div>
               <div class="content">
                  <div class="description"><?php echo $Functions->FilterText($news['story']); ?></div>
                  <div class="body">
                     <p> <?php echo $Functions->FilterTextF($news['longstory']); ?> </p>
                  </div>
               </div>
            </div>
            <div class="global-box box-new-dedicace">
               <div class="content">
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
                     <div class="input-group">
                        <input id="btnnSubmit" type="submit" value="Publicar comentario" onclick="addCommentNews(<?php echo $news['id']; ?>)">
                     </div>
                  </div>
               </div>
            </div>
            <div class="comments">
               <?php 
                  $resultCN     = $db->query("SELECT * FROM cms_news_comments WHERE post_id = '{$news['id']}' ");
                  if ( $resultCN->num_rows > 0 ) {
                  while ( $Cnws = $resultCN->fetch_array() ) {
                  ?>
               <div class="global-box box-comment">
                  <div class="content">
                     <div class="left">
                        <div class="avatar">
                           <img src="<?php echo AVATARIMAGE . $Functions->User('look', $Cnws['user_id']); ?>">
                        </div>
                     </div>
                     <div class="right">
                        <div class="top">
                           Publicado por <a href="#" class=""><?php echo $Functions->User('username', $Cnws['user_id']); ?></a> <?php echo $Functions->GetLast2($Cnws['time']); ?>
                        </div>
                        <span class="message-emotes habbofont value"><?php echo $Functions->FilterTextF($Cnws['content']); ?></span>
                     </div>
                  </div>
               </div>
               <?php }}else{ ?>
               <div class="box-error error">
                  <img src="<?php echo FILES; ?>/assets/img/error/avatar.png" class="error-avatar"> 
                  <span>Sin comentarios todavía.</span>
               </div>
               <?php } ?>
            </div>
         </div>
      </div>
   </div>
</div>
<?php $TplClass->AddTemplate("others", "footer"); ?>