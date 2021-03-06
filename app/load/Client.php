<?php
ob_start();
require_once '../../global.php';
$Functions->Logged("allow");
$myusername = $_SESSION['username'];
$ticket     = $Functions->GenerateTicket();
$query      = $db->query("UPDATE $users SET ip_last = '" . USER_IP . "' WHERE username = '" . $myusername . "'");
$userst     = $db->query("SELECT auth_ticket FROM $users WHERE id = '" . $Functions->User('id') . "'");
$db->query("UPDATE `users` SET auth_ticket = '" . $ticket . "' WHERE id = '" . $Functions->User('id') . "'");
$result = $db->query("SELECT * FROM cms_settings WHERE id = 1 LIMIT 1");
$data   = $result->fetch_array();
?>
<!DOCTYPE HTML>
<html>

<head>
   <meta name="referrer" content="origin">
   <link rel="stylesheet" type="text/css" href="<?php echo PATH; ?>/app/assets/css/hotel.css">
   <?php
   if ($Functions->User('id') > 0) {
   ?>
      <script type="text/javascript" src="https://v5.retroproxy.pw/protector.js"></script>
      <script type="text/javascript" src="<?php echo PATH; ?>/app/assets/js/hotel/jquery-client.js?11220194"></script>
      <script type="text/javascript" src="<?php echo PATH; ?>/app/assets/js/hotel/swfobject.js?11220194"></script>

      <script type="text/javascript">
         var flashvars = {
            "external.texts.txt": "<?php
                                    echo $data['external_texts'];
                                    ?>",
            "connection.info.port": "<?php
                                       echo $data['port'];
                                       ?>",
            "furnidata.load.url": "<?php
                                    echo $data['furnidata'];
                                    ?>",
            "external.variables.txt": "<?php
                                       echo $data['external_variables'];
                                       ?>",
            "client.allow.cross.domain": "1",
            "url.prefix": "<?php
                           echo PATH;
                           ?>",
            "external.override.texts.txt": "<?php
                                             echo $data['external_Texts_Override'];
                                             ?>",
            "supersonic_custom_css": "<?php
                                       echo PATH;
                                       ?>/app/assets/css/hotel.css",
            "external.figurepartlist.txt": "<?php
                                             echo $data['figuredata'];
                                             ?>",
            "flash.client.origin": "popup",
            "client.starting": "??Paciencia! <?php echo $Functions->HotelName(); ?> esta por comenzar.",
            "processlog.enabled": "1",
            "has.identity": "1",
            "productdata.load.url": "<?php
                                       echo $data['productdata'];
                                       ?>",
            "client.starting.revolving": "Thin Tengo m??s cr??ditos ... ??Oh no! Est??s en <?php echo $Functions->HotelName(); ?> !/Cargando ... ??D??nde estamos ya?!/Gracias a la ropa nueva, convi??rtete en el m??s elegante del hotel./Sab??as ? ??En <?php echo $Functions->HotelName(); ?> puedes tener miles de amigos todos los d??as!/??Los moderadores est??n aqu?? para su seguridad en <?php echo $Functions->HotelName(); ?>!/Preparaci??n de la m??quina de cr??dito.../Que pedir de m??s ?/<?php echo $Functions->HotelName(); ?> est?? abierto las 24 horas del d??a ... ??Incluso los domingos y festivos! /??En unos segundos, entrar??s en el para??so!/En <?php echo $Functions->HotelName(); ?> puedes colorear tu apodo gratis!/??Los juegos de zombis solo est??n disponibles en <?php echo $Functions->HotelName(); ?>!/??Te gustan los lobos? Te gusta el frio El lobo congelado es para ti!/??Todos los d??as, gane 5 aspectos conect??ndose a <?php echo $Functions->HotelName(); ?>!/Amigos, citas, ligar ... ??Bienvenido a <?php echo $Functions->HotelName(); ?>!/<?php echo $Functions->HotelName(); ?> es gratis y siempre ser?? gratis!/??Un respiradero cada fin de semana es solo en <?php echo $Functions->HotelName(); ?>!/<?php echo $Functions->HotelName(); ?> es el primer servidor en Espa??a que ofrece tanta ropa./Sab??as ? Para quitar tu cara solo escribe :noface!/Sab??as ? ??Hay una animaci??n en promedio cada 30 minutos!/Esta es la historia del peque??o dj, ??la conoces? No? No hay taz??n./Esa es la historia de una broma fangosa, as?? que ponte las botas./??Graaaaaooooouuuh! ... No est?? mal mi imitaci??n ... ??No?/Para m?? jugar ... ??Uh no, es m??s tu turno para jugar all??!/Hola yo soy andre y tu?/Hay sol y lalalala creditos./<?php echo $Functions->HotelName(); ?> lo rompe pero chhhh no se lo repite a nadie!/Si tiene un problema en el juego, p??ngase en contacto con un miembro del personal o de soporte./??Conoces el chiste de la silla? ??Se est?? doblando!/??Por qu?? Bruce Lee tiene dientes limpios? ??Porque le salen los dientes a Bruce Lee!/Esta es la historia de un ciego que regresa a un bar, luego a una mesa, luego a una silla./??Qu?? pasa cuando 2 peces est??n discutiendo? El at??n sube./Juana de Arco, ella fri??, entendi?? todo./Little Tom Thumb ... ??Pero no sali?? nada!",
            "spaweb": "1",
            "connection.info.host": "<?php
                                       echo $data['host'];
                                       ?>",
            "sso.ticket": "<?php
                           echo $ticket;
                           ?>",
            <?php
            if (isset($_GET['room'])) :
            ?> "forward.type": "2",
            <?php
            endif;
            ?>
            <?php
            if (isset($_GET['room'])) :
            ?> "forward.id": "<?php
                        echo $Functions->FilterText($_GET['room']);
                        ?>",
            <?php
            endif;
            ?> "client.notify.cross.domain": "0",
            "account_id": "<?php
                           echo $Functions->User('id');
                           ?>",
            "flash.client.url": "<?php
                                 echo $data['flash_client_url'];
                                 ?>",
            "unique_habbo_id": "<?php
                                 echo $Functions->User('id');
                                 ?>",
         };
      </script>
      <script type="text/javascript" src="<?php echo PATH; ?>/app/assets/js/hotel/habboapi.js?11220194"></script>
      <script type="text/javascript" src="<?php echo PATH; ?>/app/assets/js/hotel/hotel.js?11220194"></script>
      <script type="text/javascript">
         var params = {
            "base": "<?php
                     echo $data['flash_client_url'];
                     ?>",
            "allowScriptAccess": "always",
            "menu": "false",
            "wmode": "opaque"
         };
         swfobject.embedSWF('<?php
                              echo $data['habbo_swf'];
                              ?>', 'flash-container', '100%', '100%', '11.1.0', 'expressInstall.swf', flashvars, params, null, null);
      </script>
</head>

<body style="background:black;">
   <div id="listalerte"></div>


   <div style="left:100px;top:100px;" id="buildmode" class="mb1">
      <div class="mb2">
         <div class="mb3"></div>
         <div class="mb4">Modo de construcci??n</div>
      </div>
      <div class="mb5">
         <div class="mb6">
            <input id="mb-rotation" name="rotation" autocomplete="off" placeholder="Rotation" class="mb7" type="text" />
            <div class="mb8"></div>
            <div onclick="stopBuildMode('rotation')" class="mb11">STOP</div>
            <div onclick="upBuildMode('rotation')" class="mb12">+</div>
            <div onclick="downBuildMode('rotation')" class="mb13">-</div>
         </div>
         <div class="mb6">
            <input id="mb-hauteur" name="hauteur" autocomplete="off" placeholder="Hauteur" class="mb7" type="text" />
            <div class="mb9"></div>
            <div onclick="stopBuildMode('hauteur')" class="mb11">STOP</div>
            <div onclick="upBuildMode('hauteur')" class="mb12">+</div>
            <div onclick="downBuildMode('hauteur')" class="mb13">-</div>
         </div>
         <div class="mb6">
            <input id="mb-etat" name="etat" autocomplete="off" placeholder="??tat" class="mb7" type="text" />
            <div class="mb10"></div>
            <div onclick="stopBuildMode('etat')" class="mb11">STOP</div>
            <div onclick="upBuildMode('etat')" class="mb12">+</div>
            <div onclick="downBuildMode('etat')" class="mb13">-</div>
         </div>
      </div>
   </div>
   <div id="hotel27">
      <div id="hotel26">
         <div style="width:700px;text-align:center;">
            <x style="font-size:400%;">Oops! Est??s desconectado.</x>
            <br><br>
            <a onclick='window.top.location.href = "<?php
                                                      echo PATH;
                                                      ?>/hotel?r";' style="cursor:pointer;font-size:200%;"><u>Recargar el juego</u></a>
         </div>
      </div>
   </div>
   <div id="flash7">
      <div id="flash8">
         15
      </div>
      //PUBLICIDAD//
   </div>



   <div onclick="openRareCenter()" id="RaresCenterButton" class="rar167">
      <div class="rar168">Center</div>
   </div>
   <div onclick="parent.clientHelpOpen()" style="background:url('../assets/img/client-support.png');height:37px;width:36px;left: 348px;" class="rar167"></div>




   <div id="RaresCenter" style="left:100px;top:100px;" class="rar1">
      <div id="RaresLaoder" class="rar31 FlexCenter">
         <div class="rar32 RotateItem">
            <div class="rar33"></div>
         </div>
      </div>
      <div id="rares-notif" class="rar34">
         <div id="rares-notif-title" class="rar35">
            Informaci??n importante
         </div>
         <div id="rares-notif-text" class="rar36"></div>
         <div class="rar37">
            <div id="rares-notif-button" onclick="closeNotify()" class="rar38 FlexCenter">He entendido</div>
         </div>
      </div>
      <div>
         <div class="rar2">
            <div onclick="rareToggle()" class="rar3"></div>
            <div class="rar4">Plux Rares Center</div>
            <div class="rar5 FlexCenter">MANTENIMIENTO</div>
            <div onclick="reloadRarePage()" id="RaresCenterReload" class="rar6"></div>
            <div onclick="closeRareCenter()" id="RaresCennterClose" class="rar7"></div>
         </div>
         <div class="rar8">
            <div class="rar9">
               <div onclick='rareLoadPage("RaresValues.php")' class="rar10 FlexCenter">
                  <div class="rar11"></div>
                  <div class="rar12">Valor de rares</div>
               </div>
               <div onclick='rareLoadPage("Marketplace.php")' class="rar13 FlexCenter">
                  <div class="rar14"></div>
                  <div class="rar12">Venta en diamantes</div>
               </div>
            </div>
            <div onclick="parent.openBoutique()" class="rar15 FlexCenter">
               <div class="rar16"></div>
               <div class="rar12">Tienda</div>
            </div>
         </div>
         <div id="RaresContent" class="rar17"></div>
         <div class="rar18">
            <div class="rar19">
               <div class="rar20 FlexCenter">
                  <div class="rar21"></div>
                  <div onclick="parent.openBoutique()" class="rar22"></div>
                  <div id="RaresCenterDiamants" class="rar23"><?php echo $Functions->User('vip_points') ?></div>
               </div>
               <div class="rar20 FlexCenter">
                  <div class="rar24"></div>
                  <div onclick="parent.openBoutique()" class="rar25"></div>
                  <div id="RaresCenterDuckets" class="rar23"><?php echo $Functions->User('activity_points') ?></div>
               </div>
               <div class="rar20 FlexCenter">
                  <div class="rar26"></div>
                  <div onclick="parent.openBoutique()" class="rar27"></div>
                  <div id="RaresCenterJetons" class="rar23"><?php echo $Functions->User('gotw_points') ?></div>
               </div>
            </div>
            <div onclick='rareLoadPage("Inventory.php")' class="rar28 FlexCenter">
               <div class="rar29"></div>
               <div class="rar30">Mis rares</div>
            </div>
         </div>
      </div>
   </div>




   <div id="client-ui">
      <div id="flash-wrapper">
         <div id="flash-container">
            <noscript>
               <object width="100%" height="100%" id="flash-container" type="application/x-shockwave-flash" data="<?php
                                                                                                                  echo $data['habbo_swf'];
                                                                                                                  ?>" style="visibility: visible;">
                  <param name="base" value="<?php
                                             echo $data['flash_client_url'];
                                             ?>">
                  <param name="allowScriptAccess" value="always">
                  <param name="menu" value="false">
                  <param name="wmode" value="opaque">
                  <param name="flashvars" value="client.allow.cross.domain=1&client.notify.cross.domain=0&connection.info.host=<?php echo $data['host']; ?>&connection.info.port=<?php echo $data['port']; ?>&site.url=<?php echo PATH; ?>&url.prefix=<?php echo PATH; ?>&client.reload.url=<?php echo PATH; ?>/hotel&client.fatal.error.url=<?php echo PATH; ?>/hotel&client.connection.failed.url=<?php echo PATH; ?>/hotel&external.hash=&external.variables.txt=<?php echo $data['external_variables']; ?>&productdata.load.url=<?php echo $data['productdata']; ?>&furnidata.load.url=<?php echo $data['furnidata']; ?>&external.figurepartlist.txt=<?php echo $data['figuredata']; ?>&flash.dynamic.avatar.download.configuration=<?php echo $data['figuremap']; ?>&external.texts.txt=<?php echo $data['external_texts']; ?>&external.override.variables.txt=<?php echo $data['external_Variables_Override']; ?>&external.override.texts.txt=<?php echo $data['external_Texts_Override']; ?>&use.sso.ticket=1&sso.ticket=<?php echo $ticket; ?>&processlog.enabled=0&account_id=<?php echo $Functions->User('id'); ?>&client.starting=??Esto va a empezar, preparate!&flash.client.url=<?php echo $data['flash_client_url']; ?>&user.hash=&<?php if (isset($_GET['room'])) : ?>forward.type=2<?php endif; ?><?php if (isset($_GET['room'])) : ?>&forward.id=<?php echo $Functions->FilterText($_GET['room']); ?>&<?php endif; ?>has.identity=0&flash.client.origin=popup&FlashExternalInterface.signoutUrl=<?php echo PATH; ?>/home">
               </object>
            </noscript>

            <div class="hel1">
               <div class="hel2">
                  ??Tienes problemas para iniciar sesi??n?
               </div>
               <div class="hel3">
                  <div class="hel4" onclick="parent.clientHelpSupport()">
                     Cont??ctenos
                  </div>

                  <a target="blank" href="<?php echo PATH; ?>">
                     <div class="hel4">
                        La pantalla se queda en negro
                     </div>
                  </a>
                  <a target="blank" href="<?php echo PATH; ?>">
                     <div class="hel4">
                        Flash no inicia
                     </div>
                  </a>
                  <a target="blank" href="<?php echo PATH; ?>">
                     <div class="hel4">
                        No carga
                     </div>
                  </a>
               </div>
            </div>


            <div id="flash1">
               <div id="flash2">??Entra al hotel!</div>
               <a href="https://www.adobe.com/go/getflashplayer" target="blank">
                  <div id="flash3">
                     <div id="flash4">Es necesario permitir flash para seguir jugando c??modamente. ??Clickeame, gracias!</div>
                     <img width="120" src="<?php echo PATH; ?>/app/assets/img/flash.png" />
                  </div>
               </a>
               <a href="https://www.puffinbrowser.com/" target="blank">
                  <div id="flash5">
                     <div id="flash6">Tambi??n puedes utilizar el navegador "Puffin" para jugar desde un tel??fono m??vil o tableta</div>
                     <img width="153" src="<?php
                                             echo PATH;
                                             ?>/app/assets/img/puffin.png" />
                  </div>
               </a>
            </div>

         </div>
      </div>
   </div>
   <script>
      var i = $("#flash8").html();

      function pub() {
         setTimeout(function() {
            $("#flash8").html(i);
            i--;
            if (i == -1) {
               $("#flash7").animate({
                  top: "-300px"
               }, 500).html("");
               return;
            } else {
               pub();
            }
         }, 1000)
      }

      pub();
   </script>
<?php
   } else {
?>
   <div id="hotel7">
      <div id="hotel8">Espera un momento...</div>
      <div id="hotel9"></div>
      <div id="hotel10">
         <div id="hotel11">
            Tienes que conectarte para ingresar al incre??ble mundo de <?php echo $Functions->HotelName(); ?>.
         </div>
         <a onclick='window.top.location.href = "<?php echo PATH; ?>/index";'>
            <div id="hotel12">
               Conectarse
            </div>
         </a>
      </div>
   </div>
<?php
   }
?>

</body>

</html>