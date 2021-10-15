<?php
   ob_start();
    require_once '../../../global.php';
   
    $Functions->Logged("true");
    $Functions->LoggedHk(MINRANK);
      
    $TplClass->SetParam('up', 'selected');
    $TplClass->SetParam('sub', '<li class="breadcrumb-item"><a href="'.HK.'upload/badges">Upload</a></li>
                                <li class="breadcrumb-item"><span>Background</span></li>');
   
    $TplClass->AddTemplateHK("templates", "menu");          
    ob_end_flush(); 
       
   
   ?>
<div class="content-i">

<div class="content-box">


<div class="element-wrapper">
   <h6 class="element-header">File Uploads</h6>
   <div class="element-box">
      <h5 class="form-header">Up. Background</h5>
      <div class="form-desc">Sube el background que quieras, siempre y cuando respete las normas. RECUERDA: solo se subirán imágenes .PNG </div>
      <form action="up.php?type=bg" class="dropzone dz-clickable" id="my-awesome-dropzone">
         <div class="dz-message">
            <div>
               <h4>Arrastra los archivos aquí o haga clic para subir.</h4>
               <div class="text-muted">(Todos los archivos que aparezcan aquí, se subirán automáticamente a tu servidor.)</div>
            </div>
         </div>
      </form>

           <br><hr>
      <div class="chat-info-section">
        <div class="ci-header">
          <i class="os-icon os-icon-documents-07"></i>
          <span>Background subidos por mi</span>
        </div>
        <div class="ci-content">
          <div class="ci-photos-list">
            <?php   global $db;
          $rbg = $db->query("SELECT * FROM cms_logs_upbadges WHERE user_id = '". $Functions->Me('id') ."' AND type = 'bg'");
           while($bg = $rbg->fetch_array()){
               ?>
            <a href="<?php echo PATH; ?>/swf/up/<?php echo $bg['data']; ?>.png" target="_blank"><img src="<?php echo PATH; ?>/swf/up/<?php echo $bg['data']; ?>.png" style="width: 320px"></a>
            <?php } ?>

          </div>
        </div>
      </div>


   </div>
</div>





   </div>


</div>



<?php
   $TplClass->AddTemplateHK("templates", "footer");          
   ?>

</body>
</html>
