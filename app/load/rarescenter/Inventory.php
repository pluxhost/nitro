<?php
   require_once '../../../global.php';   
?>
   <div class="rar39">
   <input style="width: 419px;border-right: 1px solid rgb(195,195,195);" id="RaresInventorySearch" autocomplete="off"
      placeholder="Buscar furni por nombre" class="rar40"/>
   <div style="left: 50px;" class="rar41"></div>
   <div onclick='rareRichesse()' class="rar83 FlexCenter">
      <div class="rar133"></div>
      <div style="color:rgb(111,176,214);" class="rar85">Sigue mi riqueza</div>
   </div>
   <div onclick='rareLoadPage("MySells.php")'
      style="right: 230px;width: 200px;border-right: 1px solid rgb(195,195,195);" class="rar83 FlexCenter">
      <div class="rar85">Mis ventas</div>
   </div>
</div>
<div id="RaresInventory" class="rar42">

<!--
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

   <?php } ?>
  -->

   <div class="rar82">
      No tienes ningun rare en este momento. Puedes comprarlos en la tienda o ganarlos gratis en los eventos de Staff.
   </div>


   <div id="InventorySellItem" class="rar89"></div>
</div>