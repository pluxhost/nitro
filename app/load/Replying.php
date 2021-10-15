<?php
   require_once '../../global.php';
      
      $id = $Functions->FilterText($_GET['id']);
   
      $r = $db->query("SELECT * FROM cms_timeline WHERE post_id = '".$id."'");
      $info = $r->fetch_array();
   
      $ru = $db->query("SELECT * FROM $users WHERE id = '".$info['user_id']."'");
      $userinfo = $ru->fetch_array();


      if ($Functions->User('id') > 0) {   
   ?>
<div style="width: 90%">
   <div id="fil7" style="left: 88px;margin-top: 5px;width: 86.2%">
      <div class="powerclub_box23" id="com<?php echo $post['post_id']; ?>">
         <ul class="mb0" id="pp9">
            <li style="width: 100%;">
               <div id="pp7" style="
                  background: url(<?php echo  AVATARIMAGE . $userinfo['look']; ?>&amp;size=b&amp;gesture=std) no-repeat;
                  background-color: <?php echo $Functions->UserCustom('colour', $userinfo['id']); ?>;
                  background-position: center -18px, center right;
                  "></div>
               <span id="hrvertical" style="right: 30px;top: 36px;"></span>
               <span style="font-weight: 600;font-size: 18px;">
               <a place="<?php echo $Functions->FilterText($userinfo['username']); ?>" id="pp0" href="/profile/<?php echo $Functions->FilterText($userinfo['username']); ?>">
               <?php echo $Functions->FilterText($userinfo['username']); ?>                    </a>
               </span> 
               <?php if($userinfo['rank'] >= MINRANK){ ?>
               <i class="fas fa-badge-check" style="color: #4285f4;"></i>
               <?php } ?> 
               · 
               <span style="color: #90949c;">
               <?php echo $Functions->GetLastFace($info['time']); ?>
               </span>
               <div class="mb16" id="pp11">
                  <?php $content = str_replace(array("\r\n", "\n\r", "\r", "\n"), "<br>", $Functions->FilterTextTimeline($info['content'])); echo $content; ?>        
               </div>

               <span style="color: #90949c;margin-left: 15px;">
               Respondiendo a <a place="<?php echo $Functions->FilterText($userinfo['username']); ?>" id="pp0" href="/profile/<?php echo $Functions->FilterText($userinfo['username']); ?>"><b>@<?php echo $Functions->FilterText($userinfo['username']); ?></b></a>
               </span>
            </li>
         </ul>
         <div id="pp7" style="
            background: url(<?php echo AVATARIMAGE . $Functions->User('look'); ?>) no-repeat;
            background-color: <?php echo $Functions->UserCustom('colour', $Functions->User('id')); ?>;
            background-position: center -18px, center right;
            left: 40px;position: relative;
            top: 20px
            "></div>
         <textarea id="fil255" placeholder="Publica tu respuesta" require="" maxlength="1000" style="width: 80%;left: 35px;background:#fff;top: 3px"></textarea>
         <div onclick="StreamSend('replying')" id="fil26" class="ja" postid="<?php echo $info['post_id']; ?>">
            <div id="fli27"></div>
         </div>
      </div>
   </div>
</div>
<div class="end"></div>
<?php } ?>