<?php
   ob_start();
   require_once '../../global.php';
   ob_end_flush();
   
     $type = $Functions->FilterText($_GET['type']);
   
   
   if ($type == 1) {

    global $db;
          $re = $db->query("SELECT * FROM cms_economy WHERE type = 1");
           while($economy = $re->fetch_array()){

            $rf = $db->query("SELECT * FROM furniture WHERE id = '".$economy['furni_id']."'");
            $furni = $rf->fetch_array();
               ?>


         <div id="b124">
            <div id="b125x">
               <img alt="Icono rare shop" src="<?php echo PATH; ?>/app/assets/img/Shop/rare_lr.png?5g5g"/> 
            </div>
            <div id="b126"><?php echo $economy['name']; ?></div>
            <img id="b127" src="<?php echo SWFICON . $furni['item_name']; ?>_icon.png"/>
            <div id="b311"></div>
            <div id="b129"><?php echo $Functions->number_format_short($economy['price_credit']); ?></div>
            <div id="b307"></div>
            <div id="b308">
               <?php echo $Functions->number_format_short($economy['price_diamond']); ?>
            </div>
            <div style="position: absolute;height: 25px;border-radius: 0 0 10px 10px;left: 5px;width: calc(100% - 10px);bottom: 5px;">
               <div style="position: absolute;height: 25px;border-radius: 0 0 0px 10px;width: calc(50% - 4px);background: rgb(222,222,222);display:flex;justify-content: center;align-items: center;">
                  0 en circulación
               </div>
               <div style="position: absolute;color:rgb(45,192,255);right:0px;height: 25px;border-radius: 0 0 10px 0px;width: calc(50% - 4px);background: rgb(208,241,255);display:flex;justify-content: center;align-items: center;">
                  0 fijos
               </div>
            </div>
         </div>
         <?php }




  }elseif ($type == 2) {

    global $db;
          $re = $db->query("SELECT * FROM cms_economy WHERE type = 2");
           while($economy = $re->fetch_array()){

            $rf = $db->query("SELECT * FROM furniture WHERE id = '".$economy['furni_id']."'");
            $furni = $rf->fetch_array();
               ?>


         <div id="b124">
            <div id="b125x">
               <img alt="Icono rare shop" src="<?php echo PATH; ?>/app/assets/img/Shop/rare_lr.png?5g5g"/> 
            </div>
            <div id="b126"><?php echo $economy['name']; ?></div>
            <img id="b127" src="<?php echo SWFICON . $furni['item_name']; ?>_icon.png"/>
            <div id="b311"></div>
            <div id="b129"><?php echo $Functions->number_format_short($economy['price_credit']); ?></div>
            <div id="b307"></div>
            <div id="b308">
               <?php echo $Functions->number_format_short($economy['price_diamond']); ?>
            </div>
            <div style="position: absolute;height: 25px;border-radius: 0 0 10px 10px;left: 5px;width: calc(100% - 10px);bottom: 5px;">
               <div style="position: absolute;height: 25px;border-radius: 0 0 0px 10px;width: calc(50% - 4px);background: rgb(222,222,222);display:flex;justify-content: center;align-items: center;">
                  0 en circulación
               </div>
               <div style="position: absolute;color:rgb(45,192,255);right:0px;height: 25px;border-radius: 0 0 10px 0px;width: calc(50% - 4px);background: rgb(208,241,255);display:flex;justify-content: center;align-items: center;">
                  0 fijos
               </div>
            </div>
         </div>
         <?php }




  }elseif ($type == 3) {

    global $db;
          $re = $db->query("SELECT * FROM cms_economy WHERE type = 3");
           while($economy = $re->fetch_array()){

            $rf = $db->query("SELECT * FROM furniture WHERE id = '".$economy['furni_id']."'");
            $furni = $rf->fetch_array();
               ?>


         <div id="b124">
            <div id="b125x">
               <img alt="Icono rare shop" src="<?php echo PATH; ?>/app/assets/img/Shop/rare_lr.png?5g5g"/> 
            </div>
            <div id="b126"><?php echo $economy['name']; ?></div>
            <img id="b127" src="<?php echo SWFICON . $furni['item_name']; ?>_icon.png"/>
            <div id="b311"></div>
            <div id="b129"><?php echo $Functions->number_format_short($economy['price_credit']); ?></div>
            <div id="b307"></div>
            <div id="b308">
               <?php echo $Functions->number_format_short($economy['price_diamond']); ?>
            </div>
            <div style="position: absolute;height: 25px;border-radius: 0 0 10px 10px;left: 5px;width: calc(100% - 10px);bottom: 5px;">
               <div style="position: absolute;height: 25px;border-radius: 0 0 0px 10px;width: calc(50% - 4px);background: rgb(222,222,222);display:flex;justify-content: center;align-items: center;">
                  0 en circulación
               </div>
               <div style="position: absolute;color:rgb(45,192,255);right:0px;height: 25px;border-radius: 0 0 10px 0px;width: calc(50% - 4px);background: rgb(208,241,255);display:flex;justify-content: center;align-items: center;">
                  0 fijos
               </div>
            </div>
         </div>
         <?php }




  }elseif ($type == 4) {

    global $db;
          $re = $db->query("SELECT * FROM cms_economy WHERE type = 4");
           while($economy = $re->fetch_array()){

            $rf = $db->query("SELECT * FROM furniture WHERE id = '".$economy['furni_id']."'");
            $furni = $rf->fetch_array();
               ?>


         <div id="b124">
            <div id="b125x">
               <img alt="Icono rare shop" src="<?php echo PATH; ?>/app/assets/img/Shop/rare_lr.png?5g5g"/> 
            </div>
            <div id="b126"><?php echo $economy['name']; ?></div>
            <img id="b127" src="<?php echo SWFICON . $furni['item_name']; ?>_icon.png"/>
            <div id="b311"></div>
            <div id="b129"><?php echo $Functions->number_format_short($economy['price_credit']); ?></div>
            <div id="b307"></div>
            <div id="b308">
               <?php echo $Functions->number_format_short($economy['price_diamond']); ?>
            </div>
            <div style="position: absolute;height: 25px;border-radius: 0 0 10px 10px;left: 5px;width: calc(100% - 10px);bottom: 5px;">
               <div style="position: absolute;height: 25px;border-radius: 0 0 0px 10px;width: calc(50% - 4px);background: rgb(222,222,222);display:flex;justify-content: center;align-items: center;">
                  0 en circulación
               </div>
               <div style="position: absolute;color:rgb(45,192,255);right:0px;height: 25px;border-radius: 0 0 10px 0px;width: calc(50% - 4px);background: rgb(208,241,255);display:flex;justify-content: center;align-items: center;">
                  0 fijos
               </div>
            </div>
         </div>
         <?php }




  }elseif ($type == 5) {

    global $db;
          $re = $db->query("SELECT * FROM cms_economy WHERE type = 5");
           while($economy = $re->fetch_array()){

            $rf = $db->query("SELECT * FROM furniture WHERE id = '".$economy['furni_id']."'");
            $furni = $rf->fetch_array();
               ?>


         <div id="b124">
            <div id="b125x">
               <img alt="Icono rare shop" src="<?php echo PATH; ?>/app/assets/img/Shop/rare_lr.png?5g5g"/> 
            </div>
            <div id="b126"><?php echo $economy['name']; ?></div>
            <img id="b127" src="<?php echo SWFICON . $furni['item_name']; ?>_icon.png"/>
            <div id="b311"></div>
            <div id="b129"><?php echo $Functions->number_format_short($economy['price_credit']); ?></div>
            <div id="b307"></div>
            <div id="b308">
               <?php echo $Functions->number_format_short($economy['price_diamond']); ?>
            </div>
            <div style="position: absolute;height: 25px;border-radius: 0 0 10px 10px;left: 5px;width: calc(100% - 10px);bottom: 5px;">
               <div style="position: absolute;height: 25px;border-radius: 0 0 0px 10px;width: calc(50% - 4px);background: rgb(222,222,222);display:flex;justify-content: center;align-items: center;">
                  0 en circulación
               </div>
               <div style="position: absolute;color:rgb(45,192,255);right:0px;height: 25px;border-radius: 0 0 10px 0px;width: calc(50% - 4px);background: rgb(208,241,255);display:flex;justify-content: center;align-items: center;">
                  0 fijos
               </div>
            </div>
         </div>
         <?php }




  }elseif ($type == 6) {

    global $db;
          $re = $db->query("SELECT * FROM cms_economy WHERE type = 6");
           while($economy = $re->fetch_array()){

            $rf = $db->query("SELECT * FROM furniture WHERE id = '".$economy['furni_id']."'");
            $furni = $rf->fetch_array();
               ?>


         <div id="b124">
            <div id="b125x">
               <img alt="Icono rare shop" src="<?php echo PATH; ?>/app/assets/img/Shop/rare_lr.png?5g5g"/> 
            </div>
            <div id="b126"><?php echo $economy['name']; ?></div>
            <img id="b127" src="<?php echo SWFICON . $furni['item_name']; ?>_icon.png"/>
            <div id="b311"></div>
            <div id="b129"><?php echo $Functions->number_format_short($economy['price_credit']); ?></div>
            <div id="b307"></div>
            <div id="b308">
               <?php echo $Functions->number_format_short($economy['price_diamond']); ?>
            </div>
            <div style="position: absolute;height: 25px;border-radius: 0 0 10px 10px;left: 5px;width: calc(100% - 10px);bottom: 5px;">
               <div style="position: absolute;height: 25px;border-radius: 0 0 0px 10px;width: calc(50% - 4px);background: rgb(222,222,222);display:flex;justify-content: center;align-items: center;">
                  0 en circulación
               </div>
               <div style="position: absolute;color:rgb(45,192,255);right:0px;height: 25px;border-radius: 0 0 10px 0px;width: calc(50% - 4px);background: rgb(208,241,255);display:flex;justify-content: center;align-items: center;">
                  0 fijos
               </div>
            </div>
         </div>
         <?php }




  }elseif ($type == 7) {

    global $db;
          $re = $db->query("SELECT * FROM cms_economy WHERE type = 7");
           while($economy = $re->fetch_array()){

            $rf = $db->query("SELECT * FROM furniture WHERE id = '".$economy['furni_id']."'");
            $furni = $rf->fetch_array();
               ?>


         <div id="b124">
            <div id="b125x">
               <img alt="Icono rare shop" src="<?php echo PATH; ?>/app/assets/img/Shop/rare_lr.png?5g5g"/> 
            </div>
            <div id="b126"><?php echo $economy['name']; ?></div>
            <img id="b127" src="<?php echo SWFICON . $furni['item_name']; ?>_icon.png"/>
            <div id="b311"></div>
            <div id="b129"><?php echo $Functions->number_format_short($economy['price_credit']); ?></div>
            <div id="b307"></div>
            <div id="b308">
               <?php echo $Functions->number_format_short($economy['price_diamond']); ?>
            </div>
            <div style="position: absolute;height: 25px;border-radius: 0 0 10px 10px;left: 5px;width: calc(100% - 10px);bottom: 5px;">
               <div style="position: absolute;height: 25px;border-radius: 0 0 0px 10px;width: calc(50% - 4px);background: rgb(222,222,222);display:flex;justify-content: center;align-items: center;">
                  0 en circulación
               </div>
               <div style="position: absolute;color:rgb(45,192,255);right:0px;height: 25px;border-radius: 0 0 10px 0px;width: calc(50% - 4px);background: rgb(208,241,255);display:flex;justify-content: center;align-items: center;">
                  0 fijos
               </div>
            </div>
         </div>
         <?php }




  }


?>