<?php
   ob_start();
   require_once '../../global.php';
   ob_end_flush();
   
     $page = $Functions->FilterText($_GET['pag']);
     $category = $Functions->FilterText($_GET['category']);
     $userid = $Functions->FilterText($_GET['userid']);
   
     $CantidadMostrar=10;
     $compag         =(int)(!isset($_GET['pag'])) ? 2 : $_GET['pag'];
   
   if ($category == "home") {
                 $result = $db->query("SELECT * FROM messenger_friendships, cms_timeline 
                    WHERE messenger_friendships.user_one_id = '".$Functions->User('id')."' AND messenger_friendships.user_two_id = cms_timeline.user_id || 
                       cms_timeline.user_id = '".$Functions->User('id')."'
                          GROUP BY cms_timeline.post_id ORDER BY cms_timeline.time DESC LIMIT ".(($compag-1)*$CantidadMostrar)." , ".$CantidadMostrar);
                 if ($result->num_rows > 0) {
                   while($post = $result->fetch_array()){
                    $ru = $db->query("SELECT * FROM $users WHERE id = '".$post['user_id']."'");
                      while($ui = $ru->fetch_array()){ 
                 
                    $rl = $db->query("SELECT * FROM cms_posts_fav WHERE post_id = '".$post['post_id']."'");
                    $fav = $rl->fetch_array();
                 
                    $rl2 = $db->query("SELECT * FROM cms_posts_fav WHERE post_id = '".$post['post_id']."' AND user_id = '".$Functions->User('id')."'");
                 
                    //USER RT
                    $rr = $db->query("SELECT * FROM $users WHERE id = '".$post['user_id']."'");
                    $rtu = $rr->fetch_array(); 
                 
                    //TIMELINE RT
                    $rrp = $db->query("SELECT * FROM cms_timeline WHERE post_id = '".$post['retweet_id']."'");
                    $rtp = $rrp->fetch_array();
                    $rru = $db->query("SELECT * FROM $users WHERE id = '".$rtp['user_id']."'");
                    $rtui = $rru->fetch_array(); 
                 
                    //
                    if ($post['retweet_id'] > 0) {
                     $rt2 = $db->query("SELECT * FROM cms_timeline WHERE retweet_id = '".$rtp['post_id']."'"); 
                     $rt = $db->query("SELECT * FROM cms_timeline WHERE user_id = '".$Functions->User('id')."' AND retweet_id = '".$rtp['post_id']."'");          
                      }else{
                       $rt2 = $db->query("SELECT * FROM cms_timeline WHERE retweet_id = '".$post['post_id']."'");
                       $rt = $db->query("SELECT * FROM cms_timeline WHERE user_id = '".$Functions->User('id')."' AND retweet_id = '".$post['post_id']."'");
                      }

                       $rc2 = $db->query("SELECT * FROM cms_timeline WHERE reply_id = '".$post['post_id']."'");
                 
                    ?>
<div id="head24aaa"></div>
<div class="powerclub_box2" id="com<?php echo $post['post_id']; ?>">
  <?php 
                  $resultp = $db->query("SELECT * FROM cms_timeline WHERE post_id = '{$post['reply_id']}'");
                  $postr = $resultp->fetch_array();

                  $resultu = $db->query("SELECT * FROM $users WHERE id = '{$postr['user_id']}'");
                  $userr = $resultu->fetch_array();


                  if ($resultp->num_rows > 0) { 
                     ?>

                  <ul class="mb0" id="pp9">
                  <li style="width: 100%;">
                                          <div id="pp7" style="
                        background: url(<?php echo AVATARIMAGE . $userr['look']; ?>&size=b&gesture=std) no-repeat;
                        background-color: <?php echo $Functions->UserCustom('colour', $userr['id']); ?>;
                        background-position: center -18px, center right;
                        "></div>
                        <span id="hrvertical" style="right: 30px;top: 36px;"></span>
                     <span style="font-weight: 600;font-size: 18px;">
                     <a place="<?php echo $Functions->FilterText($userr['username']); ?>" id="pp0" href="/profile/<?php echo $Functions->FilterText($userr['username']); ?>">
                     <?php echo $Functions->FilterText($userr['username']); ?>                     </a>
                     </span> 
                     <?php if($userr['rank'] >= MINRANK){ ?><i class="fas fa-badge-check" style="color: #4285f4;"></i><?php } ?> 

                     <?php 
                        $rrp22 = $db->query("SELECT * FROM cms_timeline WHERE post_id = '".$postr['post_id']."' AND type = 'pprofile'");
                        $rtp22 = $rrp22->fetch_array();
                        $rur2 = $db->query("SELECT * FROM $users WHERE id = '".$rtp22['userp_id']."'");
                        $uir2 = $rur2->fetch_array();                         
                         if ($rtp22['type'] == 'pprofile') { ?>
                     <i class="fas fa-caret-right"></i> 
                     <span style="font-weight: 600;font-size: 18px;">
                     <a place="<?php echo $Functions->FilterText($uir2['username']); ?>" id="pp0" href="/profile/<?php echo $Functions->FilterText($uir2['username']); ?>">
                     <?php echo $Functions->FilterText($uir2['username']); ?>
                     </a>
                     </span> <?php if($uir2['rank'] >= MINRANK){ ?><i class="fas fa-badge-check" style="color: #4285f4;"></i><?php } ?> 
                     <?php } ?> 
                     <span style="color: #90949c;">
                        ·
                     <a style="color: #90949c;" href="<?php echo PATH ?>/posts/<?php echo $postr['post_id'] ?>">
                     <?php echo $Functions->GetLastFace($postr['time']); ?>
                     </a>
                     </span>
                      
                                          <div id="pp11" class="mb16">
                         
                        <?php $content = str_replace(array("\r\n", "\n\r", "\r", "\n"), "<br>", $Functions->FilterTextTimeline($postr['content'])); echo $content; ?>                      
                     </div>
                  </li>
               </ul>
            <?php } ?>
   <ul class="mb0" id="pp9">
      <li style="width: 100%;">
         <?php if($post['type'] == 'retweet') { ?>
         <p style="font-size: 12px;position: relative;top: -5px;">
            <i class="fas fa-retweet" style="margin-right: 7px;color: #90949c;"></i><a place="<?php echo $rtu['username']; ?>" href="profile/<?php echo $rtu['username']; ?>" id="pp13"><?php echo $rtu['username']; ?> retwitteó</a>
         </p>
         <?php } ?>
         <div id="pp7" style="
            background: url(<?php if($post['type'] == 'retweet') { echo AVATARIMAGE . $rtui['look']; }else{ echo AVATARIMAGE . $ui['look']; } ?>&size=b&gesture=std) no-repeat;
            background-color: <?php if($post['type'] == 'retweet') { echo $Functions->UserCustom('colour', $rtui['id']); }else{ echo $Functions->UserCustom('colour', $ui['id']); } ?>;
            background-position: center -18px, center right;
            "></div>
         <span style="font-weight: 600;font-size: 18px;">
         <a place="<?php if($post['type'] == 'retweet') { echo $Functions->FilterText($rtui['username']); }else{ echo $Functions->FilterText($ui['username']); } ?>" id="pp0" href="/profile/<?php if($post['type'] == 'retweet') { echo $Functions->FilterText($rtui['username']); }else{ echo $Functions->FilterText($ui['username']); } ?>">
         <?php if($post['type'] == 'retweet') { echo $Functions->FilterText($rtui['username']); }else{ echo $Functions->FilterText($ui['username']); } ?>
         </a>
         </span>  <?php if($ui['rank'] >= MINRANK){ ?><i class="fas fa-badge-check" style="color: #4285f4;"></i><?php } ?> 
         <?php 
                        if ($post['type'] == 'retweet') {
                        $rrp2 = $db->query("SELECT * FROM cms_timeline WHERE post_id = '".$post['retweet_id']."' AND type = 'pprofile'");
                        $rtp2 = $rrp2->fetch_array();
                        $rur = $db->query("SELECT * FROM $users WHERE id = '".$rtp2['userp_id']."'");
                        }else{ 
                        $rur = $db->query("SELECT * FROM $users WHERE id = '".$post['userp_id']."'");
                        }
                        $uir = $rur->fetch_array();                         
                         if ($rtp2['type'] == 'pprofile' || $post['type'] == 'pprofile') { ?>
                     <i class="fas fa-caret-right"></i> 
                     <span style="font-weight: 600;font-size: 18px;">
                     <a place="<?php echo $Functions->FilterText($uir['username']); ?>" id="pp0" href="/profile/<?php echo $Functions->FilterText($uir['username']); ?>">
                     <?php echo $Functions->FilterText($uir['username']); ?>
                     </a>
                     </span> <?php if($uir['rank'] >= MINRANK){ ?><i class="fas fa-badge-check" style="color: #4285f4;"></i><?php } ?> 
                     <?php } ?> · 
         <span style="color: #90949c;">
         <a style="color: #90949c;" href="<?php echo PATH ?>/posts/<?php echo $post['post_id'] ?>">
         <?php if($post['type'] == 'retweet') { echo $Functions->GetLastFace($rtp['time']); }else{ echo $Functions->GetLastFace($post['time']); } ?>
         </a> · 
         </span><i title="Público" class="fa fa-globe" aria-hidden="true" style="font-size: 12px;color: #90949c;"></i>
         <?php global $db; if($ui['username'] == $Functions->User('username') || $Functions->User('rank') >= MERANK){?>
         <div onclick="DeletePost('<?php echo $post['post_id']; ?>');" id="pp12"></div>
         <?php } ?>
         <div class="mb16" id="pp11">
          <?php 
                           $rrp3 = $db->query("SELECT * FROM cms_timeline WHERE post_id = '".$post['retweet_id']."' AND type = 'replying'");
                           $rtp3 = $rrp3->fetch_array();
                           if($post['type'] == 'retweet'){ 
                           $rreply = $db->query("SELECT * FROM cms_timeline WHERE post_id = '".$rtp3['reply_id']."'");
                            }else{
                           $rreply = $db->query("SELECT * FROM cms_timeline WHERE post_id = '".$post['reply_id']."'");
                           }
                           $reply = $rreply->fetch_array();
                           $rreplyu = $db->query("SELECT * FROM $users WHERE id = '".$reply['user_id']."'");
                           $replyu = $rreplyu->fetch_array(); 
                           if ($rtp3['type'] == 'replying' || $post['type'] == 'replying') { ?>
                           <p style="color: #90949c;">
               Respondido a <a place="<?php echo $Functions->FilterText($replyu['username']); ?>" id="pp0" href="/profile/<?php echo $Functions->FilterText($replyu['username']); ?>"><b>@<?php echo $Functions->FilterText($replyu['username']); ?></b></a></p> 
            <?php } ?>
      <?php if($post['type'] == 'retweet') { ?>
      <?php $content = str_replace(array("\r\n", "\n\r", "\r", "\n"), "<br>", $Functions->FilterTextTimeline($rtp['content'])); echo $content; ?>
      <?php }else{ ?> 
      <?php $content = str_replace(array("\r\n", "\n\r", "\r", "\n"), "<br>", $Functions->FilterTextTimeline($post['content'])); echo $content; ?>
      <?php } ?> 
   </div>
      </li>
   </ul>
   <ul style="margin-top: -15px">
      <li>
         <div id="commentp">
            <i class="fal fa-comment"></i>
            <span id="texttt"><?php echo $rc2->num_rows; ?></span>
         </div>
         <div onclick="Retweet<?php if ( $rt->num_rows > 0 ) { ?>Remove<?php } ?>(<?php if ( $rrp->num_rows > 0 ) { echo $rtp['post_id']; }else{ echo $post['post_id']; } ?>);" id="retweetp">
            <div id="rt-<?php echo $post['post_id']; ?>">
               <?php if ( $rt->num_rows > 0 ) { ?>
               <i class="zoom fal fa-retweet" style="color: rgb(23,191,99);"></i> 
               <span style="color: rgb(23,191,99);">
               <span id="texttt"><?php echo $rt2->num_rows; ?></span>
               </span>
               <?php }else{ ?>
               <i class="zoom fal fa-retweet"></i> 
               <span id="texttt"><?php echo $rt2->num_rows; ?></span>
               <?php } ?>
            </div>
         </div>
         <div onclick="tweetAction(<?php echo $post['post_id']; ?>,'like','fil');" id="heartp">
            <div id="fav-<?php echo $post['post_id']; ?>">
               <?php if ( $rl2->num_rows > 0 ) { ?>  
               <i class="fas fa-heart" style="color: rgb(224,36,94);"></i> 
               <span style="color: rgb(224,36,94);">
               <span id="texttt"><?php echo $rl->num_rows; ?></span>
               </span>
               <?php }else{ ?>
               <i class="fal fa-heart"></i> 
               <span id="texttt"><?php echo $rl->num_rows; ?></span>
               <?php } ?>
            </div>
         </div>
         <div onclick="tweetAction(<?php echo $post['post_id']; ?>,'retweet','fil');" id="sharep">
            <i class="zoom far fa-share-square"></i>
         </div>
      </li>
   </ul>
</div>
<?php }}}}elseif ($category == "profile" && !empty($userid)) {
   $perfil = $db->query("SELECT * FROM $users WHERE id = '{$userid}' LIMIT 1");
   $userhome = $perfil->fetch_array(); ?>
<?php global $db;
   $resultn = $db->query("SELECT * FROM cms_timeline WHERE userp_id = '".$userhome['id']."' AND type = 'pprofile' OR user_id = '".$userhome['id']."' ORDER BY post_id DESC LIMIT ".(($compag-1)*$CantidadMostrar)." , ".$CantidadMostrar);
   if ($resultn->num_rows > 0) {
   while($post = $resultn->fetch_array()){ 
      $ru = $db->query("SELECT * FROM $users WHERE id = '".$post['user_id']."'");
        while($ui = $ru->fetch_array()){ 
   
      $rl = $db->query("SELECT * FROM cms_posts_fav WHERE post_id = '".$post['post_id']."'");
      $fav = $rl->fetch_array();
   
      $rl2 = $db->query("SELECT * FROM cms_posts_fav WHERE post_id = '".$post['post_id']."' AND user_id = '".$Functions->User('id')."'");
   
      //USER RT
      $rr = $db->query("SELECT * FROM $users WHERE id = '".$post['user_id']."'");
      $rtu = $rr->fetch_array(); 
   
      //TIMELINE RT
      $rrp = $db->query("SELECT * FROM cms_timeline WHERE post_id = '".$post['retweet_id']."'");
      $rtp = $rrp->fetch_array();
      $rru = $db->query("SELECT * FROM $users WHERE id = '".$rtp['user_id']."'");
      $rtui = $rru->fetch_array(); 
   
      //
      if ($post['retweet_id'] > 0) {
       $rt2 = $db->query("SELECT * FROM cms_timeline WHERE retweet_id = '".$rtp['post_id']."'"); 
       $rt = $db->query("SELECT * FROM cms_timeline WHERE user_id = '".$Functions->User('id')."' AND retweet_id = '".$rtp['post_id']."'");          
        }else{
         $rt2 = $db->query("SELECT * FROM cms_timeline WHERE retweet_id = '".$post['post_id']."'");
         $rt = $db->query("SELECT * FROM cms_timeline WHERE user_id = '".$Functions->User('id')."' AND retweet_id = '".$post['post_id']."'");
        }

         $rc2 = $db->query("SELECT * FROM cms_timeline WHERE reply_id = '".$post['post_id']."'");
      ?>
<div id="head24aaa"></div>
<div class="powerclub_box2" id="com<?php echo $post['post_id']; ?>">
   <ul class="mb0" id="pp9">
      <li style="width: 100%;">
         <?php if($post['type'] == 'retweet') { ?>
         <p style="font-size: 12px;position: relative;top: -5px;">
            <i class="fas fa-retweet" style="margin-right: 7px;color: #90949c;"></i><a place="<?php echo $rtu['username']; ?>" href="profile/<?php echo $rtu['username']; ?>" id="pp13"><?php echo $rtu['username']; ?> retwitteó</a>
         </p>
         <?php } ?>
         <div id="pp7" style="
            background: url(<?php if($post['type'] == 'retweet') { echo AVATARIMAGE . $rtui['look']; }else{ echo AVATARIMAGE . $ui['look']; } ?>&size=b&gesture=std) no-repeat;
            background-color: <?php if($post['type'] == 'retweet') { echo $Functions->UserCustom('colour', $rtui['id']); }else{ echo $Functions->UserCustom('colour', $ui['id']); } ?>;
            background-position: center -18px, center right;
            "></div>
         <span style="font-weight: 600;font-size: 18px;">
         <a place="<?php if($post['type'] == 'retweet') { echo $Functions->FilterText($rtui['username']); }else{ echo $Functions->FilterText($ui['username']); } ?>" id="pp0" href="/profile/<?php if($post['type'] == 'retweet') { echo $Functions->FilterText($rtui['username']); }else{ echo $Functions->FilterText($ui['username']); } ?>">
         <?php if($post['type'] == 'retweet') { echo $Functions->FilterText($rtui['username']); }else{ echo $Functions->FilterText($ui['username']); } ?>
         </a>
         </span> 
         <?php if($ui['rank'] >= MINRANK){ ?>
         <i class="fas fa-badge-check" style="color: #4285f4;"></i>
         <?php } if($userhome['id'] !== $ui['id']){ ?>
         <i class="fas fa-caret-right"></i>
         <span style="font-weight: 600;font-size: 18px;">
         <a place="<?php echo $Functions->FilterText($us['username']); ?>" place="<?php echo $Functions->FilterText($us['username']); ?>" id="pp0" href="/profile/<?php echo $Functions->FilterText($userhome['username']); ?>">
         <?php echo $Functions->FilterText($userhome['username']); ?>
         </a>
         </span> 
         <?php if($userhome['rank'] >= MINRANK){ ?>
         <i class="fas fa-badge-check" style="color: #4285f4;"></i>
         <?php }} ?>  
         · <span style="color: #90949c;">
         <a style="color: #90949c;" href="<?php echo PATH ?>/posts/<?php echo $post['post_id'] ?>">
         <?php if($post['type'] == 'retweet') { echo $Functions->GetLastFace($rtp['time']); }else{ echo $Functions->GetLastFace($post['time']); } ?>
         </a> · 
         </span>
         <i title="Público" class="fa fa-globe" aria-hidden="true" style="font-size: 12px;color: #90949c;"></i>
         <?php global $db; if($userhome['username'] == $Functions->User('username') || $ui['username'] == $Functions->User('username') || $Functions->User('rank') >= MERANK){?>
         <div onclick="DeletePost('<?php echo $post['post_id']; ?>');" id="pp12"></div>
         <?php } ?>
         <div class="mb16" id="pp11">
          <?php if($post['type'] == 'replying'){ 
                           $rreply = $db->query("SELECT * FROM cms_timeline WHERE post_id = '".$post['reply_id']."'");
                           $reply = $rreply->fetch_array();
                           $rreplyu = $db->query("SELECT * FROM $users WHERE id = '".$reply['user_id']."'");
                           $replyu = $rreplyu->fetch_array(); 
                           ?>
                           <p style="color: #90949c;">
               Respondido a <a place="<?php echo $Functions->FilterText($replyu['username']); ?>" id="pp0" href="/profile/<?php echo $Functions->FilterText($replyu['username']); ?>"><b>@<?php echo $Functions->FilterText($replyu['username']); ?></b></a></p> 
            <?php } ?>
      <?php if($post['type'] == 'retweet') { ?>
      <?php $content = str_replace(array("\r\n", "\n\r", "\r", "\n"), "<br>", $Functions->FilterTextTimeline($rtp['content'])); echo $content; ?>
      <?php }else{ ?> 
      <?php $content = str_replace(array("\r\n", "\n\r", "\r", "\n"), "<br>", $Functions->FilterTextTimeline($post['content'])); echo $content; ?>
      <?php } ?> 
   </div>
      </li>
   </ul>
   <ul style="margin-top: -15px">
      <li>
         <div id="commentp">
            <i class="fal fa-comment"></i>
            <span id="texttt"><?php echo $rc2->num_rows; ?></span>
         </div>
         <div onclick="Retweet(<?php if ( $rrp->num_rows > 0 ) { echo $rtp['post_id']; }else{ echo $post['post_id']; } ?>);" id="retweetp">
            <div id="rt-<?php echo $post['post_id']; ?>">
               <?php if ( $rt->num_rows > 0 ) { ?>
               <i class="zoom fal fa-retweet" style="color: rgb(23,191,99);"></i> 
               <span style="color: rgb(23,191,99);">
               <span id="texttt"><?php echo $rt2->num_rows; ?></span>
               </span>
               <?php }else{ ?>
               <i class="zoom fal fa-retweet"></i> 
               <span id="texttt"><?php echo $rt2->num_rows; ?></span>
               <?php } ?>
            </div>
         </div>
         <div onclick="tweetAction(<?php echo $post['post_id']; ?>,'like','fil');" id="heartp">
            <div id="fav-<?php echo $post['post_id']; ?>">
               <?php if ( $rl2->num_rows > 0 ) { ?>  
               <i class="fas fa-heart" style="color: rgb(224,36,94);"></i> 
               <span style="color: rgb(224,36,94);">
               <span id="texttt"><?php echo $rl->num_rows; ?></span>
               </span>
               <?php }else{ ?>
               <i class="fal fa-heart"></i> 
               <span id="texttt"><?php echo $rl->num_rows; ?></span>
               <?php } ?>
            </div>
         </div>
         <div onclick="tweetAction(<?php echo $post['post_id']; ?>,'retweet','fil');" id="sharep">
            <i class="zoom far fa-share-square"></i>
         </div>
      </li>
   </ul>
</div>
<?php }}}} ?>