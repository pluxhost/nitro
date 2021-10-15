
<?php
   ob_start();
   require_once 'global.php';
   $Functions->Logged("true");
   $ticket     = $Functions->GenerateTicket();
   $query      = $db->query("UPDATE $users SET ip_current = '{$Functions->getRealIP()}' WHERE id = '{$Functions->Me('id')}'");
   $userst     = $db->query("SELECT auth_ticket FROM $users WHERE id = '{$Functions->Me('id')}'");
   $db->query("UPDATE $users SET auth_ticket = '{$ticket}' WHERE id = '{$Functions->Me('id')}'");
?>



<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Tabbo: Hotel</title>
    <link rel="stylesheet" type="text/css" href="/vcd/client/css/styles.d6043d1b7d8e83d2e15f.css">
     
      <link rel="stylesheet" type="text/css" href="/vcd/client/css/habboflashclient2.css?111">
      <link rel="stylesheet" type="text/css" href="/vcd/client/css/hotel.css?111">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <script src="/vcd/client/js/flashclient.js"></script>
      <script src="/vcd/client/js/flash_detect_min.js"></script>
      <script src="/vcd/client/js/swfobject.js"></script>
      <script src="/vcd/client/js/fullscreen.js"></script>
</head>

  <body style="margin:0px;padding:0px;overflow:hidden">
    <iframe src="<?php echo PATH; ?>/app/load/Client.php" frameborder="0" style="overflow:hidden;overflow-x:hidden;overflow-y:hidden;height:100%;width:100%;position:absolute;top:0px;left:0px;right:0px;bottom:0px" height="100%" width="100%"></iframe>

