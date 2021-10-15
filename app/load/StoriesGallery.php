<?php
   ob_start();
   require_once '../../global.php';
   ?>
<div id="str54"></div>
<div id="str24">
   <div onclick="storiesPreviousPanel()" id="storiegonext"></div>
   <div onclick="storiesNextPanel()" id="storiegoprevious"></div>
   <div id="str24x">
      <div id="str25">
         <div onclick="fghjkX()"
            id="str26">
            <div id="str27"></div>
            <div id="str28"></div>
         </div>
         <div onclick="hsgSQGyhd444('<?php echo $Functions->User('id'); ?>')" id="str29">
            <div id="str30"></div>
            <div id="str31">Ver mi historia</div>
         </div>
         <div id="str32"></div>
         <div id="str33">Photos</div>
      </div>
      <div id="str56">
         <div onclick="cartoucheEditionTop()" id="str57"></div>
         <div onclick="cartoucheEditionBottom()" id="str58"></div>
      </div>
      <div id="storiesfetch">
         <div id="str55"></div>
         <div id="storiepanelloader"></div>
         <div id="storiepanelloadertwo"></div>
      </div>
      <div id="storieslist">
         <?php    global $db;
            $result = $db->query("SELECT * FROM items_camera WHERE creator_id = '".$Functions->User('id')."' ORDER BY time2 DESC");
            if($result->num_rows > 0){
            foreach(range(0, $result->num_rows - 1) as $numero){
            $data = $result->fetch_array();
               
            $room = $db->query("SELECT * FROM rooms WHERE id = '".$data['room_id']."'");
            $roominfo = $room->fetch_array();
            
            $rstories = $db->query("SELECT * FROM cms_stories WHERE photo = '".$data['id']."'");
            $storiesinfo = $rstories->fetch_array();
            
            
            ?>
         <div id="xbH-<?php echo $numero; ?>" class="storieelement">
            <img src="<?php echo PATH ?>/newfoto/camera/<?php echo $data['id']; ?>.png"/>
            <?php if($data['text'] !== ''){ ?>
            <div class="old" style="top:<?php echo $data['top']; ?>px" id="str46"><?php echo $data['text']; ?></div>
            <?php } ?>
            <?php if($rstories->num_rows > 0){ ?>
            <div id="str43">
               <div id="str44"></div>
               <div onclick="deleteStory()" id="str45"></div>
            </div>
            <?php } ?>
            <div id="xBHid" style="display:none;"><?php echo $data['id']; ?></div>
            <div id="str42">
               <?php echo $Functions->GetLastFace($data['time2']); ?> 
            </div>
         </div>
         <?php } ?>
      </div>
      <div id="str34">
         <div id="str35"></div>
         <div id="str36">
            <div onclick="startStorieEdition()" id="str37">
               <div id="str38"></div>
            </div>
            <div id="str39"></div>
            <div onclick="createStory()" id="str40">
               <div id="str41"></div>
               <div id="str59">
                  <div id="str60"></div>
               </div>
            </div>
         </div>
         <div id="str49">
            <div id="str50">
               <div onclick="validateEdition();" style="background:rgb(86,183,254);" id="str48">
                  <div id="str51"></div>
               </div>
               <div onclick="closeStorieEdition();" style="background:rgb(255,164,102);" id="str48">
                  <div id="str52"></div>
               </div>
            </div>
         </div>
      </div>
       <?php }else{ ?>
       <div class="str47" id="xbH-0">No tienes fotos.</div>
         <?php } ?>
   </div>
</div>