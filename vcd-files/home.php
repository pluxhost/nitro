<?php
   ob_start();
   require_once 'global.php';
   
   $Functions->Logged("true");
   
   $TplClass->SetParam('title', 'Inicio');
   $TplClass->SetParam('description', 'Aquí está mi perfil');
   $TplClass->SetParam('activeHome', 'router-link-exact-active router-link-active');
         
   $TplClass->AddTemplate("header", "header");
   ?>
<div class="app">
   <style type="text/css">.social {
      width: 100%;
      display: flex;
      flex-direction: row;
      justify-content: space-between;
      }
      .social > .global-box {
      width: calc(100%/6 - 15px);
      clear: none;
      }
      .social > .global-box > .content > .btn {
      height: 60px;
      margin-top: 15px;
      line-height: 60px;
      padding-left: 70px;
      color: #ffffff;
      font-size: 20px;
      border-radius: 10px;
      background-repeat: no-repeat;
      background-position: center center;
      width: 100%;
      float: left;
      }
      .social > .global-box > .content > .btn.facebook {
      background-color: #496cb8;
      background-image: url(<?php echo FILES; ?>/assets/img/social/facebook.png);
      }
      .social > .global-box > .content > .btn.twitter {
      background-color: #55acee;
      background-image: url(<?php echo FILES; ?>/assets/img/social/twitter.png);
      }
      .social > .global-box > .content > .btn.instagram {
      background-color: #d24e62;
      background-image: url(<?php echo FILES; ?>/assets/img/social/instagram.png);
      }
      .social > .global-box > .content > .btn.snapchat {
      background-color: #fefc53;
      background-image: url(<?php echo FILES; ?>/assets/img/social/snapchat.png);
      }
      .social > .global-box > .content > .btn.discord {
      background-color: #7289da;
      background-image: url(<?php echo FILES; ?>/assets/img/social/discord.png);
      }
      .social > .global-box > .content > .btn.youtube {
      background-color: #e93323;
      background-image: url(<?php echo FILES; ?>/assets/img/social/youtube.png);
      }
      .global-box > .title > .btn {
      float: right;
      margin-left: 8px;
      }
      .global-box > .content > .line {
      width: 100%;
      margin-top: 10px;
      padding: 12px 15px;
      background-color: #3c3f51;
      border-radius: 10px;
      display: flex;
      justify-content: space-between;
      flex-direction: row;
      transition: 200ms ease-in-out background-color;
      align-items: center;
      }
      .global-box > .content > .line:first-child {
      margin-top: 0;
      }
      .global-box > .content > .line .left {
      display: flex;
      flex-direction: column;
      }
      .global-box > .content > .line .left a, .global-box > .content > .line .left span {
      color: #ffffff;
      transition: 200ms ease-in-out color;
      }
      .global-box > .content > .line .left > span {
      opacity: 0.8;
      margin-top: 2px;
      font-size: 14px;
      }
      .global-box > .content > .line .right {
      display: flex;
      height: 100%;
      align-items: center;
      }
      .global-box > .content > .line .right a {
      height: 40px;
      line-height: 40px;
      background-color: #6ebff3;
      color: #ffffff;
      padding: 0 15px;
      border-radius: 10px;
      font-size: 14px;
      transition: 200ms ease-in-out all;
      }
      .global-box > .content > .line .right a:hover {
      background-color: #5ba4dd;
      }
      .global-box > .content > .line[theme=light] {
      background: rgba(0, 0, 0, 0.1);
      }
      .global-box > .content > .line[theme=light] .left a, .global-box > .content > .line[theme=light] .left span {
      color: #3c3f51;
      }
      .global-box > .content > .line[theme=light] .right a {
      background-color: #347ae2;
      }
      .global-box > .content > .line[theme=light] .right a:hover {
      background-color: #1a5dc2;
      }
   </style>
   <div class="website-bg">
      <div class="mid"></div>
   </div>
   <div class="page online profile">
      <?php $TplClass->AddTemplate("header", "menu"); ?>
      <div class="full">
         <div class="left">
            <div id="user-plate" class="global-box user-plate">
               <div class="userinfo">
                  <div class="avatar"><img src="<?php echo AVATARIMAGE . $Functions->Me('look'); ?>&head_direction=3&gesture=sml&action=wav"></div>
                  <div class="informations">
                     <span>Hey,</span> <b><?php echo $Functions->Me('username'); ?></b> 
                     <div class="vip"></div>
                  </div>
               </div>
               <div class="wallet">
                  <div class="value infinity"><img src="<?php echo FILES; ?>/assets/img/currency/infinity.png"> 
                     <span><?php echo $Functions->number_format_short($Functions->Me('credits')); ?></span>
                  </div>
                  <div class="value diamond"><img src="<?php echo FILES; ?>/assets/img/currency/diamond.png"> 
                     <span><?php echo $Functions->number_format_short($Functions->Me('points')); ?></span>
                  </div>
                  <div class="value ducket"><img src="<?php echo FILES; ?>/assets/img/currency/ducket.png"> 
                     <span><?php echo $Functions->number_format_short($Functions->Me('pixels')); ?></span>
                  </div>
               </div>
            </div>
         </div>
         <div class="right">
            <div class="global-box friends-online">
               <div class="title">
                  <?php    global $db;
                     $result = $db->query("SELECT * FROM messenger_friendships WHERE user_one_id = '{$Functions->Me('id')}' ");
                     while($data = $result->fetch_array()){
                     if($data['user_one_id'] == $Functions->Me('id')){$friendv = $data['user_two_id'];
                     }elseif($data['user_two_id'] == $Functions->Me('id')){$friendv = $data['user_one_id'];}
                     $result2 = $db->query("SELECT * FROM $users WHERE id = '{$friendv}' ORDER BY online = '1'");
                     while($userinfo = $result2->fetch_array()){
                     
                        $friendOnlineCount = $result->num_rows;
                     
                     
                        }}
                     ?>
                  Mis amigos en linea (<?php echo $friendOnlineCount; ?>)
               </div>
               <div class="content">
                  <div class="arrow left"></div>
                  <div id="friends" class="friendlist">
                     <?php    global $db;
                        $result = $db->query("SELECT * FROM messenger_friendships WHERE user_one_id = '{$Functions->Me('id')}' ");
                        while($data = $result->fetch_array()){
                        if($data['user_one_id'] == $Functions->Me('id')){$friendv = $data['user_two_id'];
                        }elseif($data['user_two_id'] == $Functions->Me('id')){$friendv = $data['user_one_id'];}
                        $result2 = $db->query("SELECT * FROM $users WHERE id = '{$friendv}' ORDER BY online = '1'");
                        while($userinfo = $result2->fetch_array()){
                        ?>
                     <div class="friend">
                        <div class="avatar">
                           <img src="<?php echo AVATARIMAGE . $Functions->User('look', $userinfo['id']); ?>&direction=3&gesture=sml">
                        </div>
                        <div class="username">
                           <?php echo $Functions->User('username', $userinfo['id']); ?>
                        </div>
                     </div>
                     <?php }} ?>
                     <div class="friend unlisted"></div>
                     <div class="friend unlisted"></div>
                     <div class="friend unlisted"></div>
                     <div class="friend unlisted"></div>
                     <div class="friend unlisted"></div>
                     <div class="friend unlisted"></div>
                     <div class="friend unlisted"></div>
                     <div class="friend unlisted"></div>
                     <div class="friend unlisted"></div>
                  </div>
                  <div class="arrow right"></div>
               </div>
            </div>
         </div>
      </div>
      <div class="left">
         <div class="slidernews">
            <div class="cubes">
               <?php 
                  $result     = $db->query("SELECT * FROM cms_news ORDER BY id DESC LIMIT 5");
                  foreach(range(0, $result->num_rows - 1) as $number){
                  $news = $result->fetch_array();
                  ?>
               <div class="cube <?php if ( $number == 0 ) { echo 'active'; } ?>" id="<?php echo $number; ?>"></div>
               <?php } ?>
            </div>
            <?php 
               $result     = $db->query("SELECT * FROM cms_news ORDER BY id DESC LIMIT 5");
               foreach(range(0, $result->num_rows - 1) as $number){
               $nws = $result->fetch_array();
               ?>
            <div class="article article-show <?php if ( $number == 0 ) { echo 'active'; } ?> <?php echo $number; ?>" style="background-image: url('<?php echo $nws['image']; ?>');">
               <span><?php echo utf8_encode(strftime("%b %d, %Y", $nws['time'])); ?></span> 
               <h1><?php echo $Functions->FilterText($nws['title']); ?></h1>
               <p><?php echo $Functions->FilterText($nws['story']); ?></p>
               <a href="/community/news/<?php echo $nws['id']; ?>" class="">
               Leer más
               </a>
            </div>
            <?php } ?>
         </div>
         <div data-v-4d6f5228="" class="social">
            <div data-v-4d6f5228="" class="global-box">
               <div data-v-4d6f5228="" class="content"><a data-v-4d6f5228="" target="_blank" href="<?php echo FACE; ?>" class="btn facebook has-tooltip" data-original-title="null"></a></div>
            </div>
            <div data-v-4d6f5228="" class="global-box">
               <div data-v-4d6f5228="" class="content"><a data-v-4d6f5228="" target="_blank" href="<?php echo LINKTWITTER; ?>" class="btn twitter has-tooltip" data-original-title="null"></a></div>
            </div>
            <div data-v-4d6f5228="" class="global-box">
               <div data-v-4d6f5228="" class="content"><a data-v-4d6f5228="" target="_blank" href="<?php echo LINKINSTAGRAM; ?>" class="btn instagram has-tooltip" data-original-title="null"></a></div>
            </div>
            <div data-v-4d6f5228="" class="global-box">
               <div data-v-4d6f5228="" class="content"><a data-v-4d6f5228="" target="_blank" href="" class="btn snapchat has-tooltip" data-original-title="null"></a></div>
            </div>
            <div data-v-4d6f5228="" class="global-box">
               <div data-v-4d6f5228="" class="content"><a data-v-4d6f5228="" target="_blank" href="" class="btn discord has-tooltip" data-original-title="null"></a></div>
            </div>
            <div data-v-4d6f5228="" class="global-box">
               <div data-v-4d6f5228="" class="content"><a data-v-4d6f5228="" target="_blank" href="" class="btn youtube has-tooltip" data-original-title="null"></a></div>
            </div>
         </div>
         <div class="global-box">
            <div class="title">
               Últimos 5 temas activos
               <span class="btn has-tooltip" data-original-title="null">
               <img src="<?php echo FILES; ?>/assets/img/reload.png"></span>
            </div>
            <div class="content">
               <?php 
                  $result     = $db->query("SELECT * FROM cms_forum ORDER BY id DESC LIMIT 5");
                  while ( $forum = $result->fetch_array() ) {
                  
                  $resultc = $db->query("SELECT * FROM cms_forum_comments WHERE post_id = '{$forum['id']}' ");
                  $comment = $resultc->fetch_array();
                  ?>
               <div class="line">
                  <div class="left">
                     <a href="/community/forum/thread/<?php echo $forum['id']; ?>-<?php echo $Functions->FilterTextLink($forum['title']); ?>" class="">
                     <?php echo $Functions->FilterText($forum['title']); ?>
                     </a> 
                     <span>Tema creado por <?php echo $Functions->User('username', $forum['user_id']); ?></span> 
                     <?php if( $resultc->num_rows > 0 ) { ?> 
                     <span>Última respuesta por <?php echo $Functions->User('username', $comment['user_id']); ?></span>
                     <?php } ?>
                  </div>
                  <div class="right">
                     <a href="/community/forum/thread/<?php echo $forum['id']; ?>-<?php echo $Functions->FilterTextLink($forum['title']); ?>" class="">Ver tema</a>
                  </div>
               </div>
               <?php } ?>
            </div>
         </div>
         <div class="left">
            <div warp="true"></div>
         </div>
         <div class="right">
            <div warp="true"></div>
         </div>
      </div>
      <div class="right">
         <div class="left">
            <div class="global-box box-notifications">
               <div class="title">
                  Mis notificaciones
                  <span class="btn has-tooltip" data-original-title="dfd">
                  <img src="<?php echo FILES; ?>/assets/img/mark-as-read.png">
                  </span> 
                  <span class="btn has-tooltip" data-original-title="null">
                  <img src="<?php echo FILES; ?>/assets/img/reload.png">
                  </span> 
                  <span class="btn has-tooltip" data-original-title="null">
                  <img src="<?php echo FILES; ?>/assets/img/remove.png">
                  </span>
               </div>
               <!----> 
               <div class="content">
                  <div class="box-error error"><img src="<?php echo FILES; ?>/assets/img/error/avatar.png" class="error-avatar"> <span>Sin notificación todavía</span></div>
               </div>
               <!---->
            </div>
            <div class="global-box rooms-opened">
               <div class="title">
                  Salas activas
               </div>
               <div class="content">
                  <?php 
                     $resultr       = $db->query("SELECT * FROM rooms WHERE users > 0 ORDER BY users DESC LIMIT 7");
                     while ( $rooms = $resultr->fetch_array() ) {
                     ?>
                  <div class="room">
                     <div class="image" style="background-image: url('<?php echo FILES; ?>/assets/img/community/rooms/room_icon_2.gif');"></div>
                     <div class="description">
                        <b class="habbofont"><?php echo $Functions->FilterText($rooms['name']); ?></b> 
                        <p class="habbofont">Creada por <?php echo $Functions->User('username', $rooms['owner_id']); ?></p>
                     </div>
                     <div class="view"><b><?php echo $rooms['users']; ?></b> <span>usuarios</span></div>
                  </div>
                  <?php }  if ( $resultr->num_rows == 0 ) { ?>
                  <div class="room unvisited"></div>
                  <div class="room unvisited"></div>
                  <div class="room unvisited"></div>
                  <div class="room unvisited"></div>
                  <div class="room unvisited"></div>
                  <div class="room unvisited"></div>
                  <div class="room unvisited"></div>
                  <?php } else if ( $resultr->num_rows == 1 ) { ?>
                  <div class="room unvisited"></div>
                  <div class="room unvisited"></div>
                  <div class="room unvisited"></div>
                  <div class="room unvisited"></div>
                  <div class="room unvisited"></div>
                  <div class="room unvisited"></div>
                  <?php } else if ( $resultr->num_rows == 2 ) { ?>
                  <div class="room unvisited"></div>
                  <div class="room unvisited"></div>
                  <div class="room unvisited"></div>
                  <div class="room unvisited"></div>
                  <div class="room unvisited"></div>
                  <?php } else if ( $resultr->num_rows == 3 ) { ?>
                  <div class="room unvisited"></div>
                  <div class="room unvisited"></div>
                  <div class="room unvisited"></div>
                  <div class="room unvisited"></div>
                  <?php } else if ( $resultr->num_rows == 4 ) { ?>
                  <div class="room unvisited"></div>
                  <div class="room unvisited"></div>
                  <div class="room unvisited"></div>
                  <?php } else if ( $resultr->num_rows == 5 ) { ?>
                  <div class="room unvisited"></div>
                  <div class="room unvisited"></div>
                  <?php } else if ( $resultr->num_rows == 6 ) { ?>
                  <div class="room unvisited"></div>
                  <?php } ?>
               </div>
            </div>
            <!----> 
            <div warp="true"></div>
         </div>
         <div class="right">
            <?php $TplClass->AddTemplate("others", "users-currency"); ?>
         </div>
      </div>
   </div>
</div>
<?php $TplClass->AddTemplate("others", "footer"); ?>
