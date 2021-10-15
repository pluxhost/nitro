<?php
    require_once '../global.php';
   
    $Functions->Logged("true");
    $Functions->LoggedHk(MAXRANK);
     
    $TplClass->SetParam('home', 'selected');
    $TplClass->SetParam('sub', '<li class="breadcrumb-item"><a href="'.HK.'/index.php">Inicio</a></li>
                                <li class="breadcrumb-item"><span>Config</span></li>');
   
    $TplClass->AddTemplateHK("templates", "menu");          
      
    if( $Functions->WebSettings('mantenimiento') == 1 ){ $smant = 'selected'; }
    if( $Functions->WebSettings('registros') == 1 ){ $sreg = 'selected'; }
   

   
   ?>
<div class="content-i">
   <div class="content-box">
      <div class="row">
         <div class="col-sm-12">
            <div class="element-wrapper">
               <div class="element-box">
                  <h5 class="form-header">Configuración del Hotel</h5>
                  <div class="form-desc">En este apartado podrás configurar algunas configuraciones del Hotel.</div>
                  <div id="alert"></div>
                  <form id="formValidate">
                  <div class="row">
                     <div class="col-sm-6">
                        <div class="form-group">
                           <label for=""> Nombre del Hotel</label>
                           <input class="form-control" placeholder="Nombre del Hotel" value="<?php echo $Functions->WebSettings('hotelname'); ?>" required="required" id="Hotelname" type="text">
                           <div class="help-block form-text with-errors form-control-feedback"></div>
                        </div>
                     </div>
                     <div class="col-sm-6">
                        <div class="form-group">
                           <label for=""> Registros con la misma ip</label>
                           <input class="form-control" placeholder="Registros con la misma ip" value="<?php echo $Functions->WebSettings('reg_ip_users'); ?>" required="required" id="RegUserIP" type="number">
                           <div class="help-block form-text with-errors form-control-feedback"></div>
                        </div>
                     </div>
                     <div class="col-sm-6">
                        <div class="form-group">
                           <label for=""> Mantenimiento</label>
                           <select class="form-control" id="mant">
                              <option value="0">No</option>
                              <option value="1" <?php echo $smant; ?>>Sí</option>
                           </select>
                        </div>
                     </div>
                     <div class="col-sm-6">
                        <div class="form-group">
                           <label for=""> Registros</label>
                           <select class="form-control" id="reg">
                              <option value="0">Activados</option>
                              <option value="1" <?php echo $sreg; ?>>Desactivados</option>
                           </select>
                        </div>
                     </div>
                  </div>
                  <fieldset class="form-group">
                     <legend><span>Acciones del Client</span></legend>
                     <div class="row">
                        <div class="col-sm-6">
                           <div class="form-group">
                              <label for=""> Host</label>
                              <input class="form-control" placeholder="Host" required="required" value="<?php echo $Functions->WebSettings('host'); ?>" id="host" type="text">
                              <div class="help-block form-text with-errors form-control-feedback"></div>
                           </div>
                        </div>
                        <div class="col-sm-6">
                           <div class="form-group">
                              <label for=""> Port</label>
                              <input class="form-control" placeholder="Port" required="required" value="<?php echo $Functions->WebSettings('port'); ?>" id="port" type="text">
                              <div class="help-block form-text with-errors form-control-feedback"></div>
                           </div>
                        </div>
                        <div class="col-sm-6">
                           <div class="form-group">
                              <label for="">Caché Productdata</label>
                              <input class="form-control" placeholder="Productdata" required="required" value="<?php echo $Functions->WebSettings('productdata'); ?>" id="productdata" type="text">
                              <div class="help-block form-text with-errors form-control-feedback"></div>
                           </div>
                        </div>
                        <div class="col-sm-6">
                           <div class="form-group">
                              <label for="">Caché Furnidata</label>
                              <input class="form-control" placeholder="Furnidata" required="required" value="<?php echo $Functions->WebSettings('furnidata'); ?>" id="furnidata" type="text">
                              <div class="help-block form-text with-errors form-control-feedback"></div>
                           </div>
                        </div>
                        <div class="col-sm-6">
                           <div class="form-group">
                              <label for="">Caché Figuremap</label>
                              <input class="form-control" placeholder="Figuremap" required="required" value="<?php echo $Functions->WebSettings('figuremap'); ?>" id="figuremap" type="text">
                              <div class="help-block form-text with-errors form-control-feedback"></div>
                           </div>
                        </div>
                        <div class="col-sm-6">
                           <div class="form-group">
                              <label for="">Caché Figuredata</label>
                              <input class="form-control" placeholder="Figuredata" required="required" value="<?php echo $Functions->WebSettings('figuredata'); ?>" id="figuredata" type="text">
                              <div class="help-block form-text with-errors form-control-feedback"></div>
                           </div>
                        </div>
                        <div class="col-sm-6">
                           <div class="form-group">
                              <label for="">Caché External Texts</label>
                              <input class="form-control" placeholder="External Texts" required="required" value="<?php echo $Functions->WebSettings('external_texts'); ?>" id="externaltexts" type="text">
                              <div class="help-block form-text with-errors form-control-feedback"></div>
                           </div>
                        </div>
                        <div class="col-sm-6">
                           <div class="form-group">
                              <label for="">Caché External variables</label>
                              <input class="form-control" placeholder="External variables" required="required" value="<?php echo $Functions->WebSettings('external_variables'); ?>" id="externalvariables" type="text">
                              <div class="help-block form-text with-errors form-control-feedback"></div>
                           </div>
                        </div>
                        <div class="col-sm-6">
                           <div class="form-group">
                              <label for="">Caché External Override Texts</label>
                              <input class="form-control" placeholder="External Override Texts" required="required" value="<?php echo $Functions->WebSettings('external_Texts_Override'); ?>" id="externalTextsOverride" type="text">
                              <div class="help-block form-text with-errors form-control-feedback"></div>
                           </div>
                        </div>
                        <div class="col-sm-6">
                           <div class="form-group">
                              <label for="">Caché External Override Variables</label>
                              <input class="form-control" placeholder="External Override Variables" required="required" value="<?php echo $Functions->WebSettings('external_Variables_Override'); ?>" id="externalVariablesOverride" type="text">
                              <div class="help-block form-text with-errors form-control-feedback"></div>
                           </div>
                        </div>
                        <div class="col-sm-6">
                           <div class="form-group">
                              <label for="">Caché Flash Client Url</label>
                              <input class="form-control" placeholder="Flash Client Url" required="required" value="<?php echo $Functions->WebSettings('flash_client_url'); ?>" id="flashclienturl" type="text">
                              <div class="help-block form-text with-errors form-control-feedback"></div>
                           </div>
                        </div>
                        <div class="col-sm-6">
                           <div class="form-group">
                              <label for="">Caché Habbo.swf</label>
                              <input class="form-control" placeholder="Habbo.swf" required="required" value="<?php echo $Functions->WebSettings('habbo_swf'); ?>" id="habboswf" type="text">
                              <div class="help-block form-text with-errors form-control-feedback"></div>
                           </div>
                        </div>
                     </div>
                  </fieldset>
                  <fieldset class="form-group">
                     <legend><span>Cámara (No editable solo lectura)</span></legend>
                     <div class="row">
                        <div class="col-sm-6">
                           <div class="form-group">
                           <label for=""> URL</label>  <input class="form-control"  id="camera" placeholder="camera url" required="required" value="<?php echo $Functions->CameraSettings('camera.url'); ?>"   type="text">
                              <div class="help-block form-text with-errors form-control-feedback"></div>
                           </div>
                        </div>
       
                  </fieldset>
                  <fieldset class="form-group">
                     <legend><span>Acciones internas</span></legend>
                     <div class="row">
                        <div class="col-sm-6">
                           <div class="form-group">
                              <label for=""> Logo</label><input class="form-control" placeholder="First Name" required="required" type="text" value="<?php echo LOGO; ?>">
                              <div class="help-block form-text with-errors form-control-feedback"></div>
                           </div>
                        </div>
                        <div class="col-sm-6">
                           <div class="form-group">
                              <label for=""> Link de Facebook</label><input class="form-control" placeholder="Last Name" required="required" value="<?php echo FACE; ?>" type="text">
                              <div class="help-block form-text with-errors form-control-feedback"></div>
                           </div>
                        </div>
                        <div class="col-sm-6">
                           <div class="form-group">
                              <label for=""> ID de Facebook</label><input class="form-control" placeholder="Last Name" required="required" value="<?php echo IDFACE; ?>" type="text">
                              <div class="help-block form-text with-errors form-control-feedback"></div>
                           </div>
                        </div>
                        <div class="col-sm-6">
                           <div class="form-group">
                              <label for=""> Link de Twitter</label><input class="form-control" placeholder="Last Name" required="required" value="<?php echo LINKTWITTER; ?>" type="text">
                              <div class="help-block form-text with-errors form-control-feedback"></div>
                           </div>
                        </div>
                     </div>
                  </fieldset>
                  </form>
                  <div class="form-buttons-w">
                     <button class="btn btn-primary" id="act" onclick="Config()"> Actualizar</button>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!--------------------
      START - Sidebar
      -------------------->
   <div class="content-panel">
      <div class="content-panel-close"><i class="os-icon os-icon-close"></i></div>
      <div class="element-wrapper">
         <h6 class="element-header">Especificaciones</h6>
         <div class="element-box">
            <h5 class="form-header">Configuración del Hotel</h5>
            <div class="form-desc">En este apartado podrás configurar algunas acciones del Hotel.<br><br>
               Este mismo se divide en 3 partes:<br><br>
               <b>1era Parte</b>: La configuración general del Hotel (Podrás editar algunas acciones básica para el hotel, como por el ejemplo, el nombre del Hotel).<br>
               <b>2da Parte</b>: La configuración del Client, aquí podrás editar todos los links para el client.<br>
               <b>3era Parte</b>: Acciones internas. Aquí, podrás editar únicamente en las configuraciones que se encuentra dentro del Hotel.<br><br><br>
               Estas acciones solo son válidas para los dueños del hotel:
            </div>
            <div class="controls-above-table">
            </div>
            <div class="table-responsive">
               <table class="table table-lightborder">
                  <thead>
                     <tr>
                        <th>Name</th>
                        <th class="text-center">Status</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php   global $db;
                        $search = $db->query("SELECT * FROM $users WHERE rank >= '".MAXRANK."' ORDER BY rank DESC");
                            while($inform = $search->fetch_array()){
                        
                        
                                ?>
                     <tr>
                        <td><?php echo $inform['username']; ?></td>
                        <td class="text-center">
                           <div class="status-pill <?php if($inform['online'] == 1){ echo 'green'; }else{ echo 'red'; } ?>" data-title="<?php if($inform['online'] == 1){ echo 'Online'; }else{ echo 'Offline'; } ?>" data-toggle="tooltip" data-original-title="" title=""></div>
                        </td>
                     </tr>
                     <?php }  ?>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
   <!--------------------
      END - Sidebar
      -------------------->
</div>
<?php
   $TplClass->AddTemplateHK("templates", "footer");          
?>
<script src="<?php echo HK; ?>/app/assets/js/vicode.js"></script>
</body>
</html>