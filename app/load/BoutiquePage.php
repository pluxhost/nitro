<?php
   require_once '../../global.php';
      
   $page = $Functions->FilterText($_GET['page']);
   $type = $Functions->FilterText($_GET['type']);
   $id = $Functions->FilterText($_GET['id']);
   
   
   ?>
<?php if($page == "inventaire"){ ?>
<div style="background-image:linear-gradient(0deg,rgb(48,29,58) , rgb(24,51,119));opacity:1;" id="b74"></div>
<div onclick="BoutiquePageClose();" style="top:75px;z-index:999;right:30px;" id="fermeture"></div>
<div id="b97">
   <div id="b98">
      <div id="b99">
         <div id="b100"></div>
      </div>
      <input id="b101" placeholder="Buscar..."></input>
      <div style="background:rgba(255,255,255,0.3)" id="hgsmobis" onclick="BoutiqueInventairePage('mobis');" class="b102">
         Mis furnis
      </div>
      <div id="hgsbadges" onclick="BoutiqueInventairePage('badges');" class="b102">
         Mis placas
      </div>
      <div id="hgshistorique" onclick="BoutiqueInventairePage('historique');" class="b102">
         Mis compras
      </div>
      <div id="hgsapparts" onclick="BoutiqueInventairePage('apparts');" class="b102">
Mis salas
</div>
   </div>
</div>
<div id="b103">
   <script>BoutiqueInventairePage('<?php echo $type; ?>');</script>
</div>



<div id="b106">
   <div onclick="BoutiqueInventaireClose();" style="top:75px;right:105px;" id="fermetureretour"></div>
   <div id="b107">
      <div id="b108">
         <img id="b109" src=""/>
      </div>
      <div id="b110">
         <div id="b110nom"></div>
         <div onclick=""
            style="position:absolute;bottom:-95px;font-size:50%;border-bottom:4px solid rgb(40,30,33);background:rgb(194,48,40);right:0%;;"
            id="b62">
            <div class="b63"></div>
            Borrar
         </div>
         <div id="b230">
            <div id="b230er"></div>
            <div style="position:relative;float:left;" id="b230vente">
               <div id="b231">
                  <input class="b231c" placeholder="0 pluscash" id="b232"/>
                  <div id="b234"></div>
               </div>
               <div id="b231">
                  <input class="b231d" placeholder="0 diamantes" id="b232"/>
                  <div id="b233"></div>
               </div>
            </div>
            <div onclick="" id="b235">
               <div class="b63"></div>
              Vender en el mercado
            </div>
         </div>
      </div>
      <div class="end"></div>
   </div>
</div>
<?php }elseif($page == "badge" && !empty($id)){ 
   $result = $db->query("SELECT * FROM cms_buy_badge WHERE id = '".$id."'");
   $data = $result->fetch_array(); ?>
<div id="b74"></div>
<div onclick="BoutiquePageClose();" style="top:75px;z-index:999;" id="fermeture"></div>
<div id="b76">
   <div style="position:relative;max-width:700px;">
      <div id="b77">
         <div id="b78">
            <x id="badgeHYrest"><?php echo $data['dispo']; ?></x>
            <br> restante
         </div>
      </div>
      <div id="b79">
         <img pos="0" class="buybdg" id="b80" alt="<?php echo $data['code']; ?>" draggable="false" oncontextmenu="return false" src="<?php echo BADGEURL . $data['code']; ?>.gif"/>
      </div>
      <?php if($data['code2'] == NULL){}else{?>
      <div id="b79">
         <img pos="0" class="buybdg" id="b80" alt="<?php echo $data['code2']; ?>" draggable="false" oncontextmenu="return false" src="<?php echo BADGEURL . $data['code2']; ?>.gif"/>
      </div>
      <?php } ?>
      <?php if($data['code3'] == NULL){}else{?>
      <div id="b79">
         <img pos="0" class="buybdg" id="b80" alt="<?php echo $data['code3']; ?>" draggable="false" oncontextmenu="return false" src="<?php echo BADGEURL . $data['code3']; ?>.gif"/>
      </div>
      <?php } ?>
      <?php if($data['code4'] == NULL){}else{?>
      <div id="b79">
         <img pos="0" class="buybdg" id="b80" alt="<?php echo $data['code4']; ?>" draggable="false" oncontextmenu="return false" src="<?php echo BADGEURL . $data['code4']; ?>.gif"/>
      </div>
      <?php } ?>
      <?php if($data['code5'] == NULL){}else{?>
      <div id="b79">
         <img pos="0" class="buybdg" id="b80" alt="<?php echo $data['code5']; ?>" draggable="false" oncontextmenu="return false" src="<?php echo BADGEURL . $data['code5']; ?>.gif"/>
      </div>
      <?php } ?>
      <?php if($data['dispo'] > 0){ ?>
      <div onclick="BoutiqueAchatBadge('<?php echo $data['id']; ?>');" style="position:absolute;bottom:-150px;right:0px;border-bottom:4px solid rgb(60,60,50);min-width:290px;" id="b62">
         <div id="b63"></div>
         Comprar a <?php echo $data['price']; ?>
         <div id="bdiamants"></div>
      </div>
      <?php }elseif($data['dispo'] == 0){ ?>
      <div id="b62rupture">
         Agotado
      </div>
      <?php } ?>
   </div>
</div>
<?php }elseif($page == "vip"){ ?>
<div id="b44"></div>
<div onclick="BoutiquePageClose();" style="top:75px;" id="fermeture"></div>
<div id="b45">
   <div id="b46">
      <div id="b47"></div>
   </div>
   <div id="b48">
      Al ser miembro del VIPClub, podrá beneficiarse de pedidos exclusivos, como, furnis adicionales en su catálogo, emoticones a su burbuja de chat y muchas cosas más...
   </div>
   <div id="b50">
      <div id="b51">
         <img style="width:192px;" draggable="false" oncontextmenu="return false" src="<?php echo AVATARIMAGE . $Functions->User('figure'); ?>"/>
      </div>
      <div id="b52">La suscripción del VIPClub</div>
      <div id="b53">
         <div style="background:url(<?php echo PATH ?>/app/assets/img/pageboutique1.png) -390px 0px;top:10px;left:-10px;" id="b16"></div>
         <div id="b54">Este paquete incluye un mes de suscripción</div>
      </div>
   </div>
   <div id="b55">
      <div id="b56">
         <div id="b57"></div>
         <div id="b58">Mi suscripción VIP</div>
         <div id="b58" style="top:60px;font-size:130%;">Tiempo restante como VIP</div>
         <div style="top:87px;left:10px;" id="b10"></div>
         <div class="hsnx47" id="b59"><?php if($Functions->User('rank') == 2){?>
            <?php echo $resultado; ?>
            <?php }elseif($Functions->User('rank') > 2){  ?>
            VIP Ilimitado
            <?php }else{  ?>
            No eres VIP
            <?php } ?>
         </div>
         <div id="b60"></div>
         <div id="b61"></div>
      </div>
   </div>
</div>
<!--<div onclick="BoutiqueAchatVip()" style="left:calc(15% + 5px);" id="b62">-->
<div style="left:calc(15% + 5px);" id="b62">
   <div id="b63"></div>
   1 mes: 100
   <div id="bdiamants"></div>
</div>
<div onclick="BoutiqueVIPOpen()" style="right:calc(25% + 25px);background:rgb(62,121,169);" id="b62">
   <div id="b63"></div>
   Mira los beneficios
</div>
<div id="b69">
   <div onclick="BoutiqueVIPClose();" style="top:75px;" id="fermeture"></div>
   <div id="b70">
      <x style="font-size:170%;">¿Qué privilegios te ofrece el VIPClub? </x>
      <br><br>
      <div id="b71">
         • 10 MagicBox* VIP entregado directamente a su inventario<br>
         • El comando <b>:supertiron, spull</b> - Tire a otro usuario hacia usted, sin límites!<br>
         • El comando <b>:superempujada, spush</b> - Empuje a otro usuario. (Lo empuja 3 casillas de distancia).<br>
         • El comando <b>:sincara, faceless</b> - Le permite ir sin rostro!<br>
         • El comando <b>:cambiarnombre, flagme</b> - Cambia tu nombre de usuario.<br>
         • El comando <b>:sizenombre</b> - Cambia el tamaño de tu nombre<br>
         • El comando <b>:emoji</b> - Manda un emoji.<br>
         • El comando <b>:disparar</b> - Disparale a un usuario.<br>
         • El comando <b>:pedo</b> - Tirar pedo en la cara del usuario.<br>
         • El comando <b>:patearculo</b> - Golpee el culo de otro usuario.<br>
         • El comando <b>:rko</b> - Rko a otro usuario.<br>
         • El comando <b>:cortar</b> - Cortale la cabeza a un usuario.<br>
         • El comando <b>:quemar</b> - Quema a un usuario.<br>
         <br>
         <disco/secouer>
         • 2 súper placa del miembro VIP + 20 increíbles placas:<br>
         <div id="b72">
            <div id="b73">
               <img draggable="false" oncontextmenu="return false" src="<?php echo BADGEURL; ?>DVIP.gif"/>
            </div>
            <div id="b73">
               <img draggable="false" oncontextmenu="return false" src="<?php echo BADGEURL; ?>ACH_VipClub12.gif"/>
            </div>
            <div id="b73">
               <img draggable="false" oncontextmenu="return false" src="<?php echo BADGEURL; ?>ES28A.gif"/>
            </div>
            <div id="b73">
               <img draggable="false" oncontextmenu="return false" src="<?php echo BADGEURL; ?>ES551.gif"/>
            </div>
            <div id="b73">
               <img draggable="false" oncontextmenu="return false" src="<?php echo BADGEURL; ?>BR967.gif"/>
            </div>
            <div id="b73">
               <img draggable="false" oncontextmenu="return false" src="<?php echo BADGEURL; ?>DE720.gif"/>
            </div>
            <div id="b73">
               <img draggable="false" oncontextmenu="return false" src="<?php echo BADGEURL; ?>BR415.gif"/>
            </div>
            <div id="b73">
               <img draggable="false" oncontextmenu="return false" src="<?php echo BADGEURL; ?>PT054.gif"/>
            </div>
         </div>
         • La categoría <b>Zona VIP</b> con al menos de 15 categorías de Furnis.<br>
         • Obtenga 500 puntos más por cada mes que se una al VIPClub.<br>
         • Gane 1 extra raro por cada mes que se una al VIPClub.<br>
         • Ahora puedes entrar a las salas llenas.<br>
         • Cree hasta 250 salas en lugar de 150 salas en su cuenta.<br>
         • Obtenga 10 diamantes todos los días.<br>
         • Obtenga 15 puntos todos los días.<br>
         • Obtenga 5 respetos todos los días.<br>
         • Obtenga 5 respetos para mascotas todos los días.<br>
         <br>
      </div>
   </div>
</div>
<?php }elseif($page == "top"){ ?>
<?php   global $db; 
   $result = $db->query("SELECT * FROM cms_shop_news WHERE id = '".$id."'");
   $data = $result->fetch_array();
   ?>
<div id="b74"></div>
<div onclick="BoutiquePageClose();" style="top:75px;z-index:999;" id="fermeture"></div>
<div id="b75">
   <?php echo $data['title']; ?><br><br>
   <img draggable="false" oncontextmenu="return false" src="<?php echo $data['image_info']; ?>"/>
</div>
<?php if($data['link'] == NULL || $data['link'] == '0'){}else{?>
<a href="<?php echo PATH ?>/shop/<?php echo $data['link']; ?>">
   <div style="position:fixed;float:right;bottom:100px;right:100px;border-bottom:4px solid rgb(60,60,50);" id="b62">
      <div id="b63"></div>
      Más información
   </div>
</a>
<?php } } ?>