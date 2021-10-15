<?php
   require_once '../../../global.php';   
   $q = $Functions->FilterText($_GET['rarename']);
?>
<div class="rar39">
   <input id="RaresValuesSearch" autocomplete="off" placeholder="Buscar furni por nombre"
      class="rar40"/>
   <div class="rar41"></div>
</div>
<div id="RaresValues" class="rar42">

   <?php if($q){ 

      $re = $db->query("SELECT * FROM cms_economy WHERE name LIKE '%".$q."%' ORDER BY name DESC");
         if ($re->num_rows > 0) {
           while($economy = $re->fetch_array()){

            $rf = $db->query("SELECT * FROM furniture WHERE id = '".$economy['furni_id']."'");
            $furni = $rf->fetch_array();

            $itemc = $db->query("SELECT * FROM items WHERE base_item = '".$economy['furni_id']."'");

      ?>

      <div class="rar43 FlexCenter">
      <div class="rar44">
         <img src="../assets/img/rarescenter/lr.png"/>
      </div>
      <img class="rar45" src="<?php echo SWFICON . $furni['item_name']; ?>_icon.png"/>
      <div class="rar46"><?php echo $economy['name']; ?></div>
      <div class="rar47">
         0 fijo
      </div>
      <div class="rar48">
         <?php echo $itemc->num_rows; ?> copias
      </div>
      <div class="rar49">
         <div class="rar53">
            <div class="rar54"></div>
            <div class="rar55"><?php echo $Functions->number_format_short($economy['price_credit']); ?></div>
         </div>
         <div class="rar56">
            <div class="rar57"></div>
            <div class="rar58"><?php echo $Functions->number_format_short($economy['price_diamond']); ?></div>
         </div>
      </div>
   </div>

   <?php }}else{ echo '<div class="rar82">No hay furnis disponibles con ese nombre. ¡Sin pánico! Los raros se agregan gradualmente en el Centro.</div>'; } }else{ ?>

   
<?php    global $db;
           $re = $db->query("SELECT * FROM cms_economy WHERE type >= 1 AND type <= 2");
           while($economy = $re->fetch_array()){

            $rf = $db->query("SELECT * FROM furniture WHERE id = '".$economy['furni_id']."'");
            $furni = $rf->fetch_array();

            $itemc = $db->query("SELECT * FROM items WHERE base_item = '".$economy['furni_id']."'");
               ?>

   <div class="rar43 FlexCenter">
      <div class="rar44">
         <img src="../assets/img/rarescenter/lr.png"/>
      </div>
      <img class="rar45" src="<?php echo SWFICON . $furni['item_name']; ?>_icon.png"/>
      <div class="rar46"><?php echo $economy['name']; ?></div>
      <div class="rar47">
         0 fijo
      </div>
      <div class="rar48">
         <?php echo $itemc->num_rows; ?> copias
      </div>
      <div class="rar49">
         <div class="rar53">
            <div class="rar54"></div>
            <div class="rar55"><?php echo $Functions->number_format_short($economy['price_credit']); ?></div>
         </div>
         <div class="rar56">
            <div class="rar57"></div>
            <div class="rar58"><?php echo $Functions->number_format_short($economy['price_diamond']); ?></div>
         </div>
      </div>
   </div>

   <?php }} ?>






</div>