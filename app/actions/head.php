<?php
    if(!isset($_GET["figure"]) || empty($_GET["figure"])) {
        echo "No fig request";
        exit;
    }
 
   $get = $_GET;
			   
	 if($_GET["direction"] == 1)
	   {$head_direction = '3';}elseif($_GET["direction"] == 2){$head_direction = '4';}elseif($_GET["direction"] == 3){$head_direction = '2';}
header('Content-Type: image/png');

    $ch = curl_init("https://habbo.es/habbo-imaging/avatarimage?figure=" . $get['figure'] . "&headonly=1&gesture=sml&fond=" . $get['size'] . "&head_direction=" . $head_direction . "&direction=" . $head_direction . "");
 
    curl_setopt_array($ch, array(
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HEADER         => false,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_ENCODING       => "",
        CURLOPT_USERAGENT      => "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.75 Safari/537.36",
        CURLOPT_AUTOREFERER    => true,
        CURLOPT_SSL_VERIFYPEER => false
    ));
 
    $content = curl_exec($ch);
    $type = curl_getinfo($ch, CURLINFO_CONTENT_TYPE);
 
    curl_close($ch);
 
    if(!isset($content) || empty($content) || strpos($content, 'Not Found') !== false) {
        echo "Not found!";
        exit;
    }
     
    header("Content-Type: {$type}");
 
    echo $content;
?>