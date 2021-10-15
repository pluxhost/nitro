<?php
   require_once '../../global.php';
      
      $id = $Functions->FilterText($_GET['id']);
   
      $r = $db->query("SELECT * FROM cms_timeline WHERE post_id = '".$id."'");
      $info = $r->fetch_array();
   
      $ru = $db->query("SELECT * FROM $users WHERE id = '".$info['user_id']."'");
      $userinfo = $ru->fetch_array();
   
    if ($Functions->User('id') > 0) {
   ?>
<div class="dhsjd44" id="lecture42">
   <div id="lecture43"></div>
   <div class="4dsSs" id="lecture44"></div>
</div>
<!--
   <div class="messediteur" id="editeur" style="width:calc(100% - 20px);left:0px;height:auto;min-height:120px;background:rgb(206,206,206);font-size:120%;" contenteditable="true"></div>
   <div id="indexformsepare"></div>
   -->
<div id="forum39" style="width: 100%">
   <div id="pp6" style="background: url(<?php echo AVATARIMAGE . $userinfo['look']; ?>) no-repeat;
      background-color: <?php echo $Functions->UserCustom('colour', $userinfo['id']); ?>;
      background-position: center -15px, center right; left: 10px; top: 18px; position: relative;
      "></div>
   <blockquote id="pp11" style="position: relative;"> <?php echo $Functions->FilterTextTimeline($info['content']); ?></blockquote>
</div>
<div id="forum39">
   <div id="forum40"
      style="background:url(<?php echo AVATARIMAGE . $Functions->User('look'); ?>&action=std&gesture=std&direction=2&head_direction=2&size=l&headonly=1&img_format=png);"></div>
   <div id="forum41">Retwittear como <?php echo $Functions->User('username'); ?></div>
</div>
<button class="editf24" id="forum42" onclick="RetweetSucces('<?php echo $id; ?>')" type="submit">Retwittear
</button>
<div class="end"></div>
<?php } ?>