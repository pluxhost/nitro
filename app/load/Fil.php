<?php
   ob_start();
   require_once '../../global.php';
   ob_end_flush();  
      
   $type = $Functions->FilterText($_GET['type']);
   
   if($Functions->User('id') > 0){
   ?>
<div id="fil2">
   <div id="fil3"></div>
   <div id="fil4"><?php echo $Functions->HotelName(); ?></div>
   <div onclick="CloseStream()" id="fil5"></div>
   <div onclick="OpenStream()" id="fil6"></div>
   <div id="fil33">
      <div onclick="OpenStream('x')" id="fil35">
         <?php if($type == "all" || $type == "ntf"){ ?>
         <div id="fil36"></div>
         <?php } ?>
         Notificaciones
      </div>
      <div onclick="OpenStream('n')"
         style="position:relative;height:100%;width:158px;cursor:pointer;transition:0.1s;background:rgb(47,213,121);float:left;font-size:120%;margin-right:4px;float:left;display:flex;justify-content: center;align-items: center;color:white;">
         <?php if($type == "news"){ ?>
         <div id="fil36"></div>
         <?php } ?>
         Noticias
      </div>
   </div>
</div>
<?php if($type == "news"){ ?>










<div id="fil7">
   <div id="fil44">


<?php global $db;
      $result = $db->query("SELECT * FROM cms_events ORDER BY id DESC");
   ?>

      <div id="fil69">
         <div id="fil70">
            <div id="fil71"></div>
            <div id="fil72">Oh! Una sorpresa...</div>
         </div>
         <div id="fil73">
            Próximamente
         </div>
         <div onclick="loadRewards('3aZYepO4MS2c6Qd');" id="fil74">
            Ver los regalos
         </div>
      </div>
   <?php while($data = $result->fetch_array()){  
         $resultn = $db->query("SELECT * FROM users WHERE id = '{$data['user_id']}'");
         $userinfo = $resultn->fetch_array(); ?>





      <div id="fil58">
         <div id="fil59"></div>
         <div id="fil60">
            Información de <?php echo $userinfo['username']; ?>
         </div>
         <div id="fil61">
            <div id="fil62"
               style="background:url(<?php echo AVATARIMAGE . $userinfo['look']; ?>);"></div>
            <div id="fil63">
               <div id="fil64"></div>
               <?php echo $Functions->FilterText($data['desc']); ?>
            </div>
         </div>
         <div id="fil65">
            <div id="fil66">
               <div id="fil67"><?php echo $Functions->GetLast3($data['time']); ?></div>
               <div id="fil68"></div>
            </div>
         </div>
      </div>

   <?php } ?>




   </div>
</div>







<?php }elseif( $type == "all" || $type == "ntf"){ ?>
<div id="fil7">
   <?php   global $db;
      $result = $db->query("SELECT * FROM cms_notifications WHERE user_two_id = '".$Functions->User('id')."' ORDER BY id DESC LIMIT 15");
      while($data = $result->fetch_array()){
      
          $resultu = $db->query("SELECT * FROM $users WHERE id = '".$data['user_id']."'");
          $userinfo = $resultu->fetch_array();

          $rtimeline = $db->query("SELECT * FROM cms_timeline WHERE post_id = '".$data['publi_id']."'");
          $tline = $rtimeline->fetch_array();
      
          if ($data['category'] == 'request') {      
      ?>
   <div class="notification-<?php echo $Functions->User('id'); ?><?php echo $userinfo['id']; ?>" id="fil8">
      <div id="fil9">
         <div style="background:<?php echo $Functions->UserCustom('colour', $userinfo['id']); ?>;border:3px solid <?php echo $Functions->UserCustom('colour', $userinfo['id']); ?>" id="fil10">
            <div style="width: 60px;height: 60px;background: url(<?php echo AVATARIMAGE . $userinfo['look']; ?>) no-repeat;background-position: center -20px, center right;position:relative;right: 7px;"></div>
         </div>
         <div id="fil12">
            <a href="profile/<?php echo $userinfo['username']; ?>"><div style="color:rgb(0,162,232)" id="fil13"><?php echo $userinfo['username']; ?></div></a>
            <div id="fil14"><?php echo $Functions->GetLast($data['time']); ?></div>
            <div id="fil15">
               Te ha enviado una solicitud de amistad. 
            </div>
            <div id="fil16">
               <div onclick="Peti('<?php echo $Functions->User('id'); ?>', '<?php echo $userinfo['id']; ?>', 'confirm')" id="fil22">
                  <div id="fil23"></div>
               </div>
               <div onclick="Peti('<?php echo $Functions->User('id'); ?>', '<?php echo $userinfo['id']; ?>', 'delete')" id="fil22c">
                  <div id="fil23c"></div>
               </div>
            </div>
         </div>
      </div>
   </div>
<?php }elseif ($data['category'] == 'mention') {  ?>

<?php if ( $data['user_id'] == $Functions->User('id') AND $data['user_two_id'] == $Functions->User('id') ) {}else{  ?>
   <div class="notification-<?php echo $data['id']; ?>" id="fil8">
<div id="fil9">
<div style="background:rgb(0,162,232);border:3px solid rgb(0,162,232)" id="fil10">
<div><b style="font-size: 230%;color: #fff;position: relative;left: 7px">@</b></div>
</div>
<div id="fil12">
<div style="color:rgb(0,162,232)" id="fil13"><?php echo $userinfo['username']; ?></div>
            <div id="fil14"><?php echo $Functions->GetLast($data['time']); ?> </div>
<div id="fil15">
<a place='<?php echo $Functions->HotelName(); ?>: <?php echo $userinfo['username']; ?>' style='color:rgb(0,148,208);' href='profile/<?php echo $userinfo['username']; ?>'><u><?php echo $userinfo['username']; ?></u></a> te mencionó en la siguiente publicación: <i> <?php echo $Functions->FilterTextTimeline($data['content']); ?> </i> </div>
<div onclick="deleteNotification('<?php echo $data['id']; ?>')" id="fil16">
<div id="fil22c">
<div id="fil23c"></div>
</div>
</div>
</div>
</div>
</div>
<?php }  ?>

   <?php }elseif ($data['category'] == 'post-fav') {  ?>

      <div class="notification-<?php echo $data['id']; ?>" id="fil8">
      <div id="fil9">
         <div style="background:rgb(0,162,232);border:3px solid rgb(0,162,232)" id="fil10">
            <i class="far fa-heart" style="font-size: 40px; color: #fff; position: relative; top: 5px; left: 3px"></i>
         </div>
         <div id="fil12">
            <div style="color:rgb(0,162,232)" id="fil13"><?php echo $userinfo['username']; ?></div>
            <div id="fil14"><?php echo $Functions->GetLast($data['time']); ?> </div>
            <div id="fil15">
               El usuario <a place='<?php echo $Functions->HotelName(); ?>: <?php echo $userinfo['username']; ?>' style='color:rgb(0,148,208);' href='profile/<?php echo $userinfo['username']; ?>'><u><?php echo $userinfo['username']; ?></u></a>, ha añadido a favorito tu publicación: <a place='<?php echo $Functions->HotelName(); ?>: <?php echo $Functions->FilterTextTimeline($tline['content']); ?>' style='color:rgb(0,148,208);' href='posts/<?php echo $tline['post_id']; ?>'><i> <?php echo $Functions->FilterTextTimeline($tline['content']); ?> </i></a>
            </div>
            <div onclick="deleteNotification('<?php echo $data['id']; ?>')" id="fil16">
               <div id="fil22c">
                  <div id="fil23c"></div>
               </div>
            </div>
         </div>
      </div>
   </div>

<?php }elseif ($data['category'] == 'post-rt') {  
   $rrp = $db->query("SELECT * FROM cms_timeline WHERE retweet_id = '".$tline['post_id']."'");
   $rtp = $rrp->fetch_array(); ?>

      <div class="notification-<?php echo $data['id']; ?>" id="fil8">
      <div id="fil9">
         <div style="background:rgb(0,162,232);border:3px solid rgb(0,162,232)" id="fil10">
            <i class="fas fa-retweet" style="font-size: 33px; color: #fff; position: relative; top: 7px; left: 2px"></i>
         </div>
         <div id="fil12">
            <div style="color:rgb(0,162,232)"
               id="fil13"><?php echo $userinfo['username']; ?></div>
            <div id="fil14"><?php echo $Functions->GetLast($data['time']); ?> </div>
            <div id="fil15">
               El usuario <a place='<?php echo $Functions->HotelName(); ?>: <?php echo $userinfo['username']; ?>' style='color:rgb(0,148,208);' href='profile/<?php echo $userinfo['username']; ?>'><u><?php echo $userinfo['username']; ?></u></a>, retwitteó tu publicación: <a place='<?php echo $Functions->HotelName(); ?>: <?php echo $Functions->FilterTextTimeline($tline['content']); ?>' style='color:rgb(0,148,208);' href='posts/<?php echo $rtp['post_id']; ?>'><i> <?php echo $Functions->FilterTextTimeline($tline['content']); ?> </i></a>
            </div>
            <div onclick="deleteNotification('<?php echo $data['id']; ?>')" id="fil16">
               <div id="fil22c">
                  <div id="fil23c"></div>
               </div>
            </div>
         </div>
      </div>
   </div>

    <?php }}  ?>
</div>
<?php } }  ?>