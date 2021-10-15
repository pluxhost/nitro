<?php
   ob_start();
   require_once '../../global.php';
   
   
      $userid = $Functions->FilterText($_GET['userid']);
   
      $ruser = $db->query("SELECT * FROM users WHERE id = '".$userid."'");
      $userinfo = $ruser->fetch_array();
   
   $resultview = $db->query("SELECT * FROM cms_stories ORDER BY id DESC LIMIT 1");
                 
                    $view = $resultview->fetch_array();
           
           $result2 = $db->query("SELECT * FROM cms_stories WHERE user_id = '".$userid."'");
   
   ?>
<div onclick="fghjk()" id="stories7"></div>
<script>
   var currentIndex = 0;
   var ePanes = $('.vistoriecontent'),
     time = 5000,
     bar = $('.progress_bar');
   
   $('.storieviewlist li').click(function (ev) {
     bar.stop();
     run();
     var currentIndex = $(this).index();
     showPane($(this).index());
   });
   $('.previous').click(function () {
     bar.stop();
     run();
     showPane(currentIndex - 1);
     showPane(currentIndex - 1);
   });
   $('.next').click(function () {
     bar.stop();
     run();
   });
   showPane(-1);
   
   run();
</script>
<?php if($result2->num_rows > 0){ ?>
<div id="stories8">
   <div id="str1">
      <div id="str2">
         <img id="str3"
            src="<?php echo AVATARIMAGE . $userinfo['look']; ?>&action=std&gesture=std&direction=2&head_direction=3&size=n&headonly=1"/>
      </div>
      <div id="str4">
         <?php echo $userinfo['username']; ?> 
      </div>
   </div>
   <div onmouseover="StopStory()" id="viewstorie">
      <div id="contentbar">
         <div id="progress_bar" class="progress_bar"></div>
      </div>
      <div class="wrap">
         <?php   global $db;
            $result = $db->query("SELECT * FROM cms_stories WHERE user_id = '".$userid."'");
            if($result->num_rows > 0){
            while($data = $result->fetch_array()){
            
            $result22 = $db->query("SELECT * FROM items_camera WHERE id = '".$data['photo']."'");
                $data22 = $result22->fetch_array();
            
             $resultlikes = $db->query("SELECT * FROM cms_stories_likes WHERE photo_id = '".$data['id']."' AND user_id = '".$Functions->User('id')."'");
             $resultlikes2 = $db->query("SELECT * FROM cms_stories_likes WHERE photo_id = '".$data['id']."'");
             $likes = $resultlikes->fetch_array();
            
                 if($resultlikes->num_rows > 0){
                     $likecheck = '<div class="df'.$data['id'].'" style="opacity: 0.5;" onclick="LikeStories('.$data['id'].')" id="stories26"><div id="stories27"></div></div>';
               }else{
                       $likecheck = '<div class="df'.$data['id'].'" style="opacity: 1;" onclick="LikeStories('.$data['id'].')" id="stories26"><div id="stories27"></div></div>';
            
            
            }
            
            $rstoriesv = $db->query("SELECT * FROM cms_stories_views WHERE user_id = '".$Functions->User('id')."' AND photo_id = '".$data['id']."'");
            
            $viewssto = $db->query("SELECT * FROM cms_stories_views WHERE photo_id = '".$data['id']."'");
            if($Functions->User('id') > 0){ 
            if($rstoriesv->num_rows > 0){
             }else{
                $dbRegister = array();
               $dbRegister['user_id'] = $Functions->User('id');
               $dbRegister['photo_id'] = $data['id'];
               $dbRegister['time'] = time();
               $query = $db->insertInto('cms_stories_views', $dbRegister);}
            }
            ?>
         <div class="vistoriecontent">
            <div id="str5">
               <div id="str6">
                  <?php echo $Functions->GetLastFace($data['time']); ?> 
                  <div id="str7"></div>
               </div>
               <?php if($data['user_id'] == $Functions->User('id')){?>
               <div id="str6">
                  <?php echo $Functions->number_format_short($viewssto->num_rows); ?> 
                  <div id="str8"></div>
               </div>
               <?php } ?>
            </div>
            <div id="str9" style="background:url(<?php echo PATH ?>/newfoto/camera/<?php echo $data22['id']; ?>.png);">
               <?php if($data22['text'] !== ''){ ?>
               <div style="top:<?php echo $data22['top']; ?>px;" id="str23"><?php echo $data22['text']; ?></div>
            </div>
            <?php } ?>
            <div id="stories24">
               <div id="str10"></div>
               <div id="stories29">
                  <div id="stories28"
                     class="dx<?php echo $data['id']; ?>"><?php echo $resultlikes2->num_rows; ?></div>
                  Likes
                  <div id="str11">
                     <div id="str12"></div>
                     <?php if($resultlikes2->num_rows > 0){
                        while($likesinfo = $resultlikes2->fetch_array()){ 
                        $uinfo = $db->query("SELECT * FROM users WHERE id = '".$likesinfo['user_id']."'");
                        $likesuserinfo = $uinfo->fetch_array(); ?>
                     <div id="str13"><?php echo $likesuserinfo['username']; ?></div>
                     <?php }}else{ ?>
                     <div id="str13">No hay likes</div>
                     <?php } ?>
                  </div>
               </div>
            </div>
            <?php echo $likecheck; ?>
         </div>
         <?php }} ?>
      </div>
   </div>
   <div id="stories10" class="previous"></div>
   <div id="stories11" class="next"></div>
</div>
<?php }else{ ?>
<div id="strload2">
   <div id="strload3"></div>
   <br><?php if ( $data['id'] == $Functions->User('id') ){  ?>Aún no tienes una historia<?php }else{ ?>No hay historia<?php } ?>
</div>
<?php } ?>