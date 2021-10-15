<?php
   ob_start();
   require_once '../../global.php';
   ob_end_flush();	
   ?>
<div id="ai2">
   <div id="ai3">
      <div id="ai4"></div>
      <div id="ai5">Centro de ayuda</div>
      <div onclick="helpClose();" id="ai6">
         <div id="ai7"></div>
         <div id="ai8"></div>
      </div>
      <?php if($Functions->User('id') > 0){ ?>
      <div onclick="helpPage('ticket');" id="ai9">
         <div id="ai10"></div>
         Mis tickets
      </div>
      <?php } ?>
   </div>
   <div id="helpload"></div>
</div>