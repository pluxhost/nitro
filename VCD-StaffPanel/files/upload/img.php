<?php
   ob_start();
    require_once '../../../global.php';
   
    $Functions->Logged("true");
    $Functions->LoggedHk(MINRANK);
      
    $TplClass->SetParam('up', 'selected');
    $TplClass->SetParam('sub', '<li class="breadcrumb-item"><a href="'.HK.'users">Users</a></li>
                                <li class="breadcrumb-item"><span>Users edit</span></li>');
   
    $TplClass->AddTemplateHK("templates", "menu");          
    ob_end_flush(); 
       
   
   ?>







<?php
   $TplClass->AddTemplateHK("templates", "footer");          
   ?>

</body>
</html>
