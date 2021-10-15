<?php
   ob_start();
    require_once '../../../global.php';
   
    $Functions->Logged("true");
    $Functions->LoggedHk(MAXRANK);
   
       if( $_SESSION['ERROR_RETURN'] ){
    $TplClass->SetParam('error', ' <div class="alert alert-danger alert-dismissible fade show" role="alert"><button aria-label="Close" class="close" data-dismiss="alert" type="button"><span aria-hidden="true"> ×</span></button><strong>¡Error! </strong>'.$_SESSION['ERROR_RETURN'].'</div>');
    unset($_SESSION['ERROR_RETURN']);
  }
  if( $_SESSION['GOOD_RETURN'] ){
    $TplClass->SetParam('error', '<div class="alert alert-success alert-dismissible fade show" role="alert"><button aria-label="Close" class="close" data-dismiss="alert" type="button"><span aria-hidden="true"> ×</span></button><strong>¡Bien! </strong>'.$_SESSION['GOOD_RETURN'].'</div>');
    unset($_SESSION['GOOD_RETURN']);
    }
   
    $TplClass->SetParam('users', 'selected');
    $TplClass->SetParam('sub', '<li class="breadcrumb-item"><a href="'.HK.'files/users/edit.php">Users</a></li>
                                <li class="breadcrumb-item"><span>User Clones</span></li>');
   

    if(isset($_POST['buscador'])){
    $buscar = $Functions->FilterText($_POST['palabra']);

    $dbStaffLogAdd = array();
                $dbStaffLogAdd['user_id'] = $Functions->Me('id');
                $dbStaffLogAdd['message'] = 'Ha escaneado a '.$buscar;
                $dbStaffLogAdd['rank'] = $Functions->Me('rank');
                $dbStaffLogAdd['action'] = 'Clones';
                $dbStaffLogAdd['time'] = time();
                $query = $db->insertInto('cms_stafflogs', $dbStaffLogAdd);  
    if(empty($buscar)){
      $_SESSION['ERROR_RETURN'] = "Debes insertar un nombre de usuario";
      header("LOCATION: ". HK ."management-clones");  
    } 
  } 

       
       $TplClass->AddTemplateHK("templates", "menu");          
    ob_end_flush(); 
   
   ?>
<div class="content-i">
   <div class="content-box">
      <div class="element-wrapper">
         <h6 class="element-header">Escanear usuarios</h6>
         <div class="element-box">
            <h5 class="form-header">Revisa los clones de X usuario</h5>
            <div class="form-desc">En este apartado buscaras los clones de X usuario, con tan solo poner el nombre completo del usuario, EJ: “Forbi”. Y te saldrán los resultados con un poco más de información.</div>
            <!--------------------
               START - Controls Above Table
               -------------------->
            <div class="controls-above-table">
               <div class="row">
                  <div class="col-sm-6">
                     <form action="" method="post" class="form-inline justify-content-sm-end" style="float: left;">
                        <input name="palabra" class="form-control form-control-sm rounded bright" placeholder="Buscar" type="text">
                        <button name="buscador" class="btn btn-sm btn-primary"><i class="os-icon os-icon-search"></i>  </button>
                     </form>
                  </div>
               </div>
            </div>
            <!--------------------
               END - Controls Above Table
               -------------------->
            <div class="table-responsive">
               <!--------------------
                  START - Basic Table
                  -------------------->
               <table class="table table-lightborder">
                  <thead>
                     <tr>
                        <th>Estado</th>
                        <th>Usuario</th>
                        <th>Email</th>
                        <th class="text-center">Misión</th>
                        <th class="text-right">IP</th>
                     </tr>
                  </thead>
                  <tbody>

                    <?php if(isset($_POST['buscador'])){ 
                    $buscar = $Functions->FilterText($_POST['palabra']);
                    $busc = $db->query("SELECT * FROM $users WHERE username = '$buscar'");
                    if($busc->num_rows > 0){
                      while($inf = $busc->fetch_array()){
                        $find = $db->query("SELECT * FROM $users WHERE ip_current = '$inf[ip_current]'");
                        while($us = $find->fetch_array()){  ?>
                     
                     <tr>
                        <td><div class="status-pill <?php if($us['online'] == 1){ echo 'green'; }else{ echo 'red'; } ?>" data-title="<?php if($us['online'] == 1){ echo 'Online'; }else{ echo 'Offline'; } ?>" data-toggle="tooltip" data-original-title="" title=""></div></td>
                        <td><b><?php echo $Functions->FilterText($us['username']); ?></b></td>
                        <td><?php echo $us['mail']; ?></td>
                        <td class="text-center"><i><span style="font-family:'Habbfont','Roboto',sans-serif;"><?php echo $Functions->FilterText($us['motto']); ?></span></i></td>
                        <td class="text-right">
                           <?php echo $us['ip_current']; ?>
                        </td>
                     </tr>

                     <?php }}}else{ echo '<br><b style="color:red">No se encontraron resultados para <i style="color:black;">'.$buscar.'</i></b><br>';  }} ?>



                  </tbody>
               </table>
               <!--------------------
                  END - Basic Table
                  -------------------->
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
         <h6 class="element-header">Información</h6>
         <div class="element-box">
            <h5 class="form-header">Staffs conectados</h5>


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

</body>
</html>
