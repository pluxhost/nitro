<?php
   require_once '../../../global.php';   
?>
<div class="rar39">
   <input style="width: 599px;border-right: 1px solid rgb(195,195,195);" id="RaresMarkerSearch" autocomplete="off"
      placeholder="Buscar furni por nombre" class="rar40"/>
   <div style="left: 140px;" class="rar41"></div>
   <div onclick='rareLoadPage("Inventory.php")' class="rar83 FlexCenter">
      <div class="rar84"></div>
      <div class="rar85">Vender mis rares</div>
   </div>
</div>
<div id="RaresMarket" class="rar42">


   <!--<div onclick="rareOpenConfirm(27065);" class="rar63 FlexCenter">
      <div class="rar44">
         <img src="../assets/img/rarescenter/ur.png"/>
      </div>
      <img class="rar64"
         src="https://swf.habbocity.me/dcr/hof_furni/icons2/dragon_geant_aryan_noir_icon.png"/>
      <div class="rar65">Dragon Géant d'Aryan</div>
      <div class="rar66">
         ?
         <div class="rar159">
            <div class="rar160 FlexCenter">
               Valor estimado
            </div>
            <div class="rar161">
               <div style="background:rgb(183,94,183);" class="rar76 FlexCenter">
                  <div class="rar78">Cantidad en venta</div>
               </div>
               <div style="background:rgb(82,222,124);" class="rar79 FlexCenter">
                  <div class="rar81">Precio del vend...</div>
               </div>
            </div>
            <div class="rar162 FlexCenter">
               Precio medio de venta en el mercado
            </div>
         </div>
      </div>
      <div class="rar67">
         <div class="rar50">
            <div class="rar51"></div>
            <div class="rar52">-</div>
         </div>
         <div class="rar56">
            <div class="rar57"></div>
            <div class="rar58">150K</div>
         </div>
      </div>
      <div class="rar68">
         <div class="rar69 FlexCenter">
            <div class="rar72">250000</div>
            <div class="rar73"></div>
         </div>
         <div class="rar74 FlexCenter">
            x1 
         </div>
      </div>
      <div class="rar75">
         <div class="rar76 FlexCenter">
            <div class="rar77"></div>
            <div class="rar78">
               Moy: 16.3K
            </div>
         </div>
         <div class="rar79 FlexCenter">
            <div class="rar80"></div>
            <div class="rar81">
               Moy: 2
            </div>
         </div>
      </div>
   </div>-->


   </div>


<div id="RaresBuyConfirm" class="rar163 FlexCenter">
   <div class="rar164">
      ¿Desea finalizar la transacción y comprar el artículo?
   </div>
   <div style="position:absolute;">
      <div id="RaresBuyConfirmText" onclick="marketBuyItem()" class="rar165 OpacityHover">
         Aceptar
      </div>
      <div onclick="rareCloseConfirm()" class="rar166 OpacityHover">
         Cancelar
      </div>
   </div>
</div>