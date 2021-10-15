<?php
ob_start();
require_once '../../../global.php';

$Functions->Logged("true");
$Functions->LoggedHk(MINRANK);

$TplClass->SetParam('up', 'selected');
$TplClass->SetParam('sub', '<li class="breadcrumb-item"><a href="' . HK . 'files/upload/badge.php">Upload</a></li>
                                <li class="breadcrumb-item"><span>Badges</span></li>');

$TplClass->AddTemplateHK("templates", "menu");
ob_end_flush();


$nombre_img = $_FILES['imagen']['name'];
$tipo = $_FILES['imagen']['type'];
$tamano = $_FILES['imagen']['size'];

$cadena = $nombre_img;
$tutorial = explode('.gif', $cadena);


if (($nombre_img == !NULL) && ($_FILES['imagen']['size'] <= 500000)) {
   if (($_FILES["imagen"]["type"] == "image/gif")) {
      $directorio = $_SERVER['DOCUMENT_ROOT'] . '/swf/c_images/album1584/';
      move_uploaded_file($_FILES['imagen']['tmp_name'], $directorio . $nombre_img);
      header("LOCATION: " . HK . "files/upload/badge.php");
   }
} else {
   if ($nombre_img == !NULL) $_SESSION['ERROR_RETURN'] = "La imagen es demasiado grande ";
}


if (isset($_POST['up-bad'])) {
   $titulo = $Functions->FilterText($_POST['titulo']);
   $des = $Functions->FilterText($_POST['des']);
   $repeat = $db->query("SELECT * FROM client_external_badge_texts WHERE badge_code = '" . $tutorial[0] . "'");

   if ($repeat->num_rows > 0) {
      $error = '<div class="alert alert-danger" role="alert"><button aria-label="Close" class="close" data-dismiss="alert" type="button"><span aria-hidden="true"> ×</span></button>Ya existe una placa con el mismo C&oacute;digo</div>';
      header("LOCATION: " . HK . "files/upload/badge.php");
   } else {

      $dbQuery                = array();
      $dbQuery['badge_code']  = $tutorial[0];
      $dbQuery['badge_title'] = $titulo;
      $dbQuery['badge_desc']  = $des;
      $query                  = $db->insertInto('client_external_badge_texts', $dbQuery);
      $dbQuery                = array();
      //////////////////////////////////////////////////////////////////////////
      $dbQuery['user_id'] = $Functions->Me('id');
      $dbQuery['data']    = $tutorial[0];
      $dbQuery['type']    = 'badge';
      $dbQuery['time']    = time();
      $query              = $db->insertInto('cms_logs_upbadges', $dbQuery);
      /////////////////////////////////////////////////////////////////
      $dbStaffLogAdd = array();
      $dbStaffLogAdd['user_id'] = $Functions->Me('id');
      $dbStaffLogAdd['message'] = 'Ha subido una placa al hotel (' . $tutorial[0] . ').';
      $dbStaffLogAdd['rank']    = $Functions->Me('rank');
      $dbStaffLogAdd['action']  = 'Ha subido una placa al hotel.';
      $dbStaffLogAdd['time']    = time();
      $query                    = $db->insertInto('cms_stafflogs', $dbStaffLogAdd);
      
      $myFile = "../../../swf/gamedata/external_flash_texts.txt";
      $fh = fopen($myFile, 'a') or die("File not found.");
      $strings = "badge_name_" . $titulo . "=" . $titulo . "";
      $string = "badge_desc_" . $des . "=" . $des . "";
      fwrite($fh, "\r" . nl2br($strings) . "\r\n" . nl2br($string));
      fclose($fh);





      $error = '<div class="alert alert-success" role="alert"><button aria-label="Close" class="close" data-dismiss="alert" type="button"><span aria-hidden="true"> ×</span></button>Placa subida</div>';
      header("LOCATION: " . HK . "files/upload/badge.php");
   }
}



?>
<div class="content-i">
   <div class="content-box">

      <div class="row">
         <div class="col-lg-6">
            <div class="element-wrapper">
               <h6 class="element-header">Subir placa</h6>
               <div class="element-box">
                  <?php echo $error; ?>
                  <h5 class="form-header">File Upload</h5>
                  <div class="form-desc">Aquí subirás la placa, con solo hacer clic abajo. Recuerda, solo puedes subir una placa. <b>Recuerda que el código de la placa, se lo tienes que poner a la imagen antes de subirla</b>.<br> <font color="red">Recuerda vaciar caché para visualizar bien los textos de la placa</font ></div>
                  <form method="post" enctype="multipart/form-data" class="dropzone">
                     <input type="file" name="imagen" accept="image/gif" id="file">
                     <div class="dz-message" id="preview">

                     </div>

               </div>
            </div>
         </div>

         <div class="col-lg-6">
            <div class="element-wrapper">
               <h6 class="element-header">Información de la placa</h6>
               <div class="element-box">
                  <h5 class="form-header">Datos</h5>
                  <div class="form-desc">Aquí podrás editar todos los datos de la placa como, por ejemplo, el nombre; su descripción; y todo lo relacionado a ella. </div>
                  <div class="form-group row">
                     <label class="col-form-label col-sm-4" for=""> Título</label>
                     <div class="col-sm-8">
                        <input class="form-control" name="titulo" placeholder="Título" type="Text">
                     </div>
                  </div>
                  <div class="form-group row">
                     <label class="col-form-label col-sm-4" for=""> Descripción</label>
                     <div class="col-sm-8">
                        <input class="form-control" name="des" placeholder="Descripción" type="Text">
                     </div>
                  </div>


                  <div class="form-buttons-w"><button class="btn btn-primary" name="up-bad" type="submit"> Submit</button></div>
                  </form>


                  <br>
                  <hr>
                  <div class="chat-info-section">
                     <div class="ci-header">
                        <i class="os-icon os-icon-documents-07"></i>
                        <span>Badge subidos por mi</span>
                     </div>
                     <div class="ci-content">
                        <div class="ci-photos-list">
                           <?php global $db;
                           $rbg = $db->query("SELECT * FROM cms_logs_upbadges WHERE user_id = '" . $Functions->Me('id') . "' AND type = 'badge'");
                           while ($bg = $rbg->fetch_array()) {
                           ?>
                              <a href="<?php echo BADGEURL . $bg['data']; ?>.gif" target="_blank"><img src="<?php echo BADGEURL . $bg['data']; ?>.gif"></a>
                           <?php } ?>

                        </div>
                     </div>
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

<script>
   document.getElementById("file").onchange = function(e) {
      // Creamos el objeto de la clase FileReader
      let reader = new FileReader();

      // Leemos el archivo subido y se lo pasamos a nuestro fileReader
      reader.readAsDataURL(e.target.files[0]);

      // Le decimos que cuando este listo ejecute el código interno
      reader.onload = function() {
         let preview = document.getElementById('preview'),
            image = document.createElement('img');

         image.src = reader.result;

         preview.innerHTML = '<div class="dz-preview dz-processing dz-image-preview dz-complete"><div class="dz-image"><center><img data-dz-thumbnail="" src="' + image.src + '" ></center> </div><div class="dz-details"></div></div><div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress="" style="width: 100%;"></span></div>';


      };
   }
</script>
</body>

</html>