<?php
   ob_start();
   require_once 'global.php';
   $Functions->Logged("true");
   $ticket     = $Functions->GenerateTicket();
   $query      = $db->query("UPDATE $users SET ip_current = '{$Functions->getRealIP()}' WHERE id = '{$Functions->Me('id')}'");
   $userst     = $db->query("SELECT auth_ticket FROM $users WHERE id = '{$Functions->Me('id')}'");
   $db->query("UPDATE $users SET auth_ticket = '{$ticket}' WHERE id = '{$Functions->Me('id')}'");
   $result = $db->query("SELECT * FROM cms_settings WHERE id = 1 LIMIT 1");
$data   = $result->fetch_array();
?>
<html>
</body>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title></title>
<link rel="shortcut icon" type="image/x-icon" href="vcd-files/favicon.png"/>
<script src="vcd-files/assets/client/jquery-latest.js" type="text/javascript"></script>
<script src="vcd-files/assets/client/jquery-ui.js" type="text/javascript"></script>
<script src="vcd-files/assets/client/flashclient.js"></script>
<script src="vcd-files/assets/client/flash_detect_min.js"></script>
<script src="vcd-files/assets/client/client.js" type="text/javascript"></script>
</head>
<body>

<div class="client__buttons" style="left: 50px;">
<button ngsf-toggle-fullscreen="" class="client__fullscreen" onclick="resizeClient()"><b><i class="fa fa-snowflake-o " aria-hidden="true"></i> </b></button>
</div>

<div id="client-ui" onclick="resizeClient()" ngsf-toggle-fullscreen="">
			<div id="client" style='position:absolute; left:0; right:0; top:0; bottom:0; overflow:hidden; height:100%; width:100%;'></div>
		</div>
		<script>
var Client = new SWFObject("https://nitro.pluxnetworks.com/swf/gordon/PRODUCTION-202006192205-424220153/Habbo.swf", "client", "100%", "100%", "10.0.0");
Client.addVariable("client.allow.cross.domain", "0"); 
Client.addVariable("client.notify.cross.domain", "1");
Client.addVariable("connection.info.host", "<?php echo $data['host']; ?>");
Client.addVariable("connection.info.port", "<?php echo $data['port']; ?>");
Client.addVariable("site.url", "<?php echo PATH; ?>");
Client.addVariable("url.prefix", "<?php echo PATH; ?>"); 
Client.addVariable("client.reload.url", "<?php echo PATH; ?>/me");
Client.addVariable("client.fatal.error.url", "<?php echo PATH; ?>/me");
Client.addVariable("client.connection.failed.url", "<?php echo PATH; ?>/me");
Client.addVariable("external.override.texts.txt", "https://nitro.pluxnetworks.com/swf/gamedata/override/external_flash_override_texts.txt?<?php echo $data['external_Texts_Override']; ?>"); 
Client.addVariable("external.override.variables.txt", "https://nitro.pluxnetworks.com/swf/gamedata/override/external_override_variables.txt?<?php echo $data['external_Variables_Override']; ?>"); 	
Client.addVariable("external.variables.txt", "https://nitro.pluxnetworks.com/swf/gamedata/external_variables.txt?<?php echo $data['external_variables']; ?>");
Client.addVariable("external.texts.txt", "https://nitro.pluxnetworks.com/swf/gamedata/external_flash_texts.txt?<?php echo $data['external_texts']; ?>"); 
Client.addVariable("external.figurepartlist.txt", "https://nitro.pluxnetworks.com/swf/gamedata/figuredata.xml"); 
Client.addVariable("flash.dynamic.avatar.download.configuration", "https://nitro.pluxnetworks.com/swf/gamedata/figuremap.xml");
Client.addVariable("productdata.load.url", "https://nitro.pluxnetworks.com/swf/gamedata/productdata.txt?<?php echo $data['productdata']; ?>"); 
Client.addVariable("furnidata.load.url", "https://nitro.pluxnetworks.com/swf/gamedata/furnidata.xml?<?php echo $data['furnidata']; ?>");
Client.addVariable("use.sso.ticket", "1"); 
Client.addVariable("sso.ticket", "<?php echo $ticket; ?>");
Client.addVariable("processlog.enabled", "0");
Client.addVariable("client.starting", "¡Esto va a empezar, preparate!");
Client.addVariable("flash.client.url", "https://nitro.pluxnetworks.com/swf/gordon/PRODUCTION-202006192205-424220153/"); 
Client.addVariable("flash.client.origin", "popup");
Client.addVariable("nux.lobbies.enabled", "true");
Client.addVariable("country_code", "NL");
Client.addParam('base', 'https://nitro.pluxnetworks.com/swf/gordon/PRODUCTION-202006192205-424220153/');
Client.addParam('allowScriptAccess', 'always');
Client.addParam('menu', false);
Client.addParam('wmode', "opaque");
Client.write('client');

			
FlashExternalInterface.signoutUrl = "/logout";
		</script>
	
<script>
	//Usuário sem Adobe Flash Player
	if(!FlashDetect.installed){
		window.location.href = "/noflash"; 	
	}
</script>
</head>
<script type="text/javascript">
function toggleFullScreen() {
  if ((document.fullScreenElement && document.fullScreenElement !== null) ||    
   (!document.mozFullScreen && !document.webkitIsFullScreen)) {
    if (document.documentElement.requestFullScreen) {  
      document.documentElement.requestFullScreen();  
    } else if (document.documentElement.mozRequestFullScreen) {  
      document.documentElement.mozRequestFullScreen();  
    } else if (document.documentElement.webkitRequestFullScreen) {  
      document.documentElement.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);  
    }  
  } else {  
    if (document.cancelFullScreen) {  
      document.cancelFullScreen();  
    } else if (document.mozCancelFullScreen) {  
      document.mozCancelFullScreen();  
    } else if (document.webkitCancelFullScreen) {  
      document.webkitCancelFullScreen();  
    }  
  }  
}
</script>
<script type="text/javascript">
   function resizeClient(){
    var theClient = document.getElementById('client');
    var theWidth = theClient.clientWidth;
    theClient.style.width = "10px";
    theClient.style.width = theWidth + "px";
   }
  </script>
   <style>
.client__buttons {
    left: 12px;
    position: absolute;
    top: -3px;
    z-index: 630;
    border-radius: 5px;
}
.client__buttons button {
    box-shadow: 0 3px 0 1px rgba(0,0,0,.3);
    background-color: #292929;
    border-color: #41403d;
    padding: 9px 2px;
    width: 200px;
    display: block;
    border-radius: 5px;
    float: left;
    padding-left: 6px;
    padding-right: 6px;
    line-height: 1.2;
    color: #b9b9b9;
    font-size: 12px;
    border-style: solid;
    margin-bottom: 4px;
    text-align: center;
    outline: none;
}
.client__buttons button:hover{
	-webkit-animation-name:shakeit;
	-webkit-animation-duration:1s;
	-webkit-animation-timing-function:linear;
	-webkit-animation-iteration-count:infinite;
	animation-name:shakeit;
	animation-duration:1s;
	animation-timing-function:linear;
	animation-iteration-count:infinite;}
	@keyframes shakeit{0%{transform:rotate(0deg) translate(2px,1px);}
		10%{transform:rotate(10deg) translate(1px,2px);}
		20%{transform:rotate(-10deg) translate(3px,0px);}
		30%{transform:rotate(0deg) translate(0px,-2px);}
		40%{transform:rotate(-10deg) translate(-1px,1px);}
		50%{transform:rotate(10deg) translate(1px,-2px);}
		60%{transform:rotate(0deg) translate(3px,-1px);}
		70%{transform:rotate(10deg) translate(-2px,-1px);}
		80%{transform:rotate(-10deg) translate(1px,1px);}
		90%{transform:rotate(0deg) translate(-2px,-2px);}
		100%{transform:rotate(10deg) translate(-1px,2px);}
		}	</style>

   <script>
   EntrerHotel(<?php echo $Functions->FilterText($_GET['room']); ?>);
</script>