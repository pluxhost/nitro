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
                                <li class="breadcrumb-item"><span>User Badges</span></li>');

           if(isset($_POST['givebadge'])){
    $check = $db->query("SELECT * FROM $users WHERE username = '".$Functions->FilterText($_POST['name'])."' LIMIT 1");
    $row = $check->fetch_array();

    $repeat = $db->query("SELECT * FROM users_badges WHERE user_id = '". $row['id'] ."' && badge_code = '".$Functions->FilterText($_POST['badge'])."' LIMIT 1");

    if(empty($_POST['name']) || empty($_POST['badge'])){
      $_SESSION['ERROR_RETURN'] = "Has dejado campos vac&iacute;os";
      header("LOCATION: ". HK ."files/users/badges.php");
    }elseif($repeat->num_rows > 0){
      $_SESSION['ERROR_RETURN'] = "El Usuario ya cuenta con la Placa";
      header("LOCATION: ". HK ."files/users/badges.php");
    }else{
      if($check->num_rows > 0){
         $dbStaffLogAdd = array();
                $dbStaffLogAdd['user_id'] = $Functions->Me('id');
                $dbStaffLogAdd['message'] = 'Le ha dado la placa '.$Functions->FilterText($_POST['badge']).' a '.$row['username'].' - (ID: '.$row['id'].')';
                $dbStaffLogAdd['rank'] = $Functions->Me('rank');
                $dbStaffLogAdd['action'] = 'Dar Placa';
                $dbStaffLogAdd['time'] = time();
                $query = $db->insertInto('cms_stafflogs', $dbStaffLogAdd);


                $dbAdd = array();
                $dbAdd['user_id'] = $row['id'];
                $dbAdd['badge_code'] = $Functions->FilterText($_POST['badge']);
                $query = $db->insertInto('users_badges', $dbAdd);

        $_SESSION['GOOD_RETURN'] = "Placa entregada correctamente";
        header("LOCATION: ". HK ."files/users/badges.php");
      }else {
        $_SESSION['ERROR_RETURN'] = "El usuario no ex&iacute;ste";
        header("LOCATION: ". HK ."files/users/badges.php");
      }
    }
  }


  

    if(isset($_POST['nameq'])){ 
    $buscar = $Functions->FilterText($_POST['nameq']);
    $dbStaffLogAdd = array();
                $dbStaffLogAdd['user_id'] = $Functions->Me('id');
                $dbStaffLogAdd['message'] = 'Ha escaneado a '.$buscar;
                $dbStaffLogAdd['rank'] = $Functions->Me('rank');
                $dbStaffLogAdd['action'] = 'Quitar Placas';
                $dbStaffLogAdd['time'] = time();
                $query = $db->insertInto('cms_stafflogs', $dbStaffLogAdd);

    if(empty($buscar)){
      $_SESSION['ERROR_RETURN'] = "Debes insertar un nombre de usuario";
        header("LOCATION: ". HK ."files/users/badges.php");
    }
  }

  $action = $Functions->FilterText($_GET['action']);
  $id = $Functions->FilterText($_GET['id']);

  if($action == "delete" && !empty($id)){
        //$delebadge = $Functions->FilterText($_POST['delebadge']);

        $buscar = $Functions->FilterText($_POST['nameq']);
        $check2 = $db->query("SELECT * FROM $users WHERE username = '".$buscar."' LIMIT 1");
    $row2 = $check2->fetch_array();

    $dbStaffLogAdd = array();
                $dbStaffLogAdd['user_id'] = $Functions->Me('id');
                $dbStaffLogAdd['message'] = 'Le ha retirado la placa '.$delebadge.' a '.$row2['username'].' - (ID: '.$row2['id'].')';
                $dbStaffLogAdd['rank'] = $Functions->Me('rank');
                $dbStaffLogAdd['action'] = 'Quitar Placas';
                $dbStaffLogAdd['time'] = time();
                $query = $db->insertInto('cms_stafflogs', $dbStaffLogAdd);

    $db->query("DELETE FROM users_badges WHERE id = '{$id}' LIMIT 1");
        $_SESSION['GOOD_RETURN'] = "Placa retirada correctamente";
        header("LOCATION: ". HK ."files/users/badges.php");
        
  }



       $TplClass->AddTemplateHK("templates", "menu");          
    ob_end_flush(); 
   
   ?>
<div class="content-i">
   <div class="content-box">
       <div class="element-wrapper compact pt-4">
            <h6 class="element-header">Gestionar placas</h6>
         </div>

           <?php $TplClass->AddTemplateHK("templates", "error"); ?>

      <div class="pipelines-w">
         <div class="row">
            <div class="col-lg-4 col-xxl-3">
               <!--------------------
                  START - Pipeline
                  -------------------->
               <div class="pipeline white lined-primary">
                  <div class="pipeline-header">
                     <h5 class="pipeline-name">Quitar placas</h5>
                  </div>

                  <div class="col-sm-12">
                      <div class="form-group">
                        <form action="" method="post" > 
                        <input name="nameq" class="form-control" placeholder="Usuario" type="text">
                      </form>
                      </div>
                    </div>


               </div>
               <!--------------------
                  END - Pipeline
                  -------------------->
            </div>
            <div class="col-lg-4 col-xxl-3" >
               <!--------------------
                  START - Pipeline
                  -------------------->
               <div class="pipeline white lined-danger">
                  <div class="pipeline-header">
                     <h5 class="pipeline-name">Placas</h5>
                  </div>
                     
                     <?php  if(isset($_POST['nameq'])){ 
                    $buscar = $Functions->FilterText($_POST['nameq']);
                    $busc = $db->query("SELECT * FROM $users WHERE username = '".$buscar."'");
                    if($busc->num_rows > 0){
                      if($Functions->Me('rank') >= MERANK){
                                                
                                                
                                                while($inf = $busc->fetch_array()){
                                                    $find = $db->query("SELECT * FROM users_badges WHERE user_id = '$inf[id]' ORDER BY id DESC");
                                                    while($us = $find->fetch_array()){
                                                        if($us['slot_id'] == 0){
                                                            $slot = 'No';
                                                        }else{
                                                        $slot = 'Sí';}
                                                        ?>

                     <div class="pipeline-item">
                        <div class="pi-controls">
                           <div class="pi-settings os-dropdown-trigger">
                            <form action="" method="post">

                             <a href="?action=delete&id=<?php echo $us['id']; ?>"> <i class="os-icon os-icon-ui-15"></i> </a>

                            </form>

                           </div>

                        </div>
                        <div class="pi-body">
                           <div class="avatar"><img alt="" src="<?php echo BADGEURL . $us['badge_code']; ?>.gif"></div>
                           <div class="pi-info">
                              <div class="h6 pi-name"><?php echo $us['badge_code']; ?></div>
                              <div class="pi-sub"><?php echo $inf['username']; ?></div>
                           </div>
                        </div>
                           <div class="pi-foot">
                           <div class="tags"><a class="tag" href="#">Puesta: <?php echo $slot; ?></a></div>
                           
                        </div>
                     </div>
                     <?php }}}}else{ echo '<br><b style="color:red">No se encontraron resultados para <i style="color:black;">'.$buscar.'</i></b><br>';  }} ?>



               </div>
               <!--------------------
                  END - Pipeline
                  -------------------->
            </div>
            <div class="col-lg-4 col-xxl-3">
               <!--------------------
                  START - Pipeline
                  -------------------->
               <div class="pipeline white lined-success">
                  <div class="pipeline-header">
                     <h5 class="pipeline-name">Dar placa</h5>
                  </div>

                  <form action="" method="post">
                     
                     <div class="col-sm-12">
                      <div class="form-group">
                        <input name="name" class="form-control" placeholder="Usuario" type="text">
                      </div>
                    </div>

                    <hr>


                    <div class="col-sm-12">
                      <div class="form-group">
                        <input name="badge" class="form-control" placeholder="Código" type="text">
                      </div>
                    </div>

                    <hr>

                    <center><button name="givebadge" type="submit" class="btn btn-primary" href="#"><span>Dar placa</span><i class="os-icon os-icon-ui-22"></i></button></center>

                  </form>



               </div>
               <!--------------------
                  END - Pipeline
                  -------------------->
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
