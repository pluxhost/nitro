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

  if(isset($_POST['addshopbadge'])){

    if(empty($_POST['title']) || empty($_POST['badge']) ){
      $_SESSION['ERROR_RETURN'] = "Has dejado campos vac&iacute;os";
      header("LOCATION: ". HK ."files/shop/badges.php");
    }else{
         $dbStaffLogAdd = array();
         $dbStaffLogAdd['user_id'] = $Functions->Me('id');
         $dbStaffLogAdd['message'] = 'Ha agregado una placa';
         $dbStaffLogAdd['rank']    = $Functions->Me('rank');
         $dbStaffLogAdd['action']  = 'Agregró placa a la tienda';
         $dbStaffLogAdd['time']    = time();
         $query                    = $db->insertInto('cms_stafflogs', $dbStaffLogAdd);

         $dbAdd = array();
         $dbAdd['user_id']   = $Functions->Me('id');
         if ( !empty($_POST['badge2']) || !empty($_POST['badge3']) || !empty($_POST['badge4']) || !empty($_POST['badge5']) || !empty($_POST['badge6']) ) { 
         $dbAdd['type']      = '1'; 
         } else {
         $dbAdd['type']      = '0';
         }
         $dbAdd['title']     = $Functions->FilterText($_POST['title']);
         $dbAdd['available'] = $Functions->FilterText($_POST['available']);
         $dbAdd['price']     = $Functions->FilterText($_POST['price']);
         if ( !empty($_POST['badge2']) ) {
         $dbAdd['code']      = $Functions->FilterText($_POST['badge']).','.$Functions->FilterText($_POST['badge2']);
         } else if ( !empty($_POST['badge3']) ) {
         $dbAdd['code']      = $Functions->FilterText($_POST['badge']).','.$Functions->FilterText($_POST['badge2']).','.$Functions->FilterText($_POST['badge3']);
         } else if ( !empty($_POST['badge4']) ) {
         $dbAdd['code']      = $Functions->FilterText($_POST['badge']).','.$Functions->FilterText($_POST['badge2']).','.$Functions->FilterText($_POST['badge3']).','.$Functions->FilterText($_POST['badge4']);
         } else if ( !empty($_POST['badge5']) ) {
         $dbAdd['code']      = $Functions->FilterText($_POST['badge']).','.$Functions->FilterText($_POST['badge2']).','.$Functions->FilterText($_POST['badge3']).','.$Functions->FilterText($_POST['badge4']).','.$Functions->FilterText($_POST['badge5']);
         } else if ( !empty($_POST['badge6']) ) {
         $dbAdd['code']      = $Functions->FilterText($_POST['badge']).','.$Functions->FilterText($_POST['badge2']).','.$Functions->FilterText($_POST['badge3']).','.$Functions->FilterText($_POST['badge4']).','.$Functions->FilterText($_POST['badge5']).','.$Functions->FilterText($_POST['badge6']);
         } else {
         $dbAdd['code']      = $Functions->FilterText($_POST['badge']);
         }
         $dbAdd['time']      = time();
         $query = $db->insertInto('cms_shop_badges', $dbAdd);

        $_SESSION['GOOD_RETURN'] = "Placa entregada correctamente";
        header("LOCATION: ". HK ."files/shop/badges.php");
      
    }
  }

  $action = $Functions->FilterText($_GET['action']);
  $id = $Functions->FilterText($_GET['id']);

  if($action == "delete" && !empty($id)){


    $check2 = $db->query("SELECT * FROM cms_shop_badges WHERE id = '{$id}' LIMIT 1");

    $row2 = $check2->fetch_array();


    $dbStaffLogAdd = array();
    $dbStaffLogAdd['user_id'] = $Functions->Me('id');
    $dbStaffLogAdd['message'] = 'Ha borrado la placa '.$row2['code'].' - (ID: '.$row2['id'].')';
    $dbStaffLogAdd['rank'] = $Functions->Me('rank');
    $dbStaffLogAdd['action'] = 'Ha borrado la placa de la tienda.';
    $dbStaffLogAdd['time'] = time();
    $query = $db->insertInto('cms_stafflogs', $dbStaffLogAdd);

    $db->query("DELETE FROM cms_shop_badges WHERE id = '{$id}' LIMIT 1");
    $_SESSION['GOOD_RETURN'] = "Placa borrada correctamente";
    header("LOCATION: ". HK ."files/shop/badges.php");
 
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
                     <h5 class="pipeline-name">Placas</h5>
                  </div>

                  <div class="col-sm-12">
                      <div class="form-group">
                        




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
                     <h5 class="pipeline-name">Placas en tienda</h5>
                  </div>
                     <?php
                        $rbadges = $db->query("SELECT * FROM cms_shop_badges ORDER BY id DESC");
                        if ( $rbadges->num_rows > 0 ) {
                        while($badges = $rbadges->fetch_array()){
                        $badCodes = explode(',', $badges['code']);
                      ?>
                     <div class="pipeline-item">
                        <div class="pi-controls">
                           <div class="pi-settings os-dropdown-trigger">
                            <form action="" method="post">
                              <a href="?action=delete&id=<?php echo $badges['id']; ?>"> <i class="os-icon os-icon-ui-15"></i> </a>
                            </form>
                           </div>
                        </div>
                        <div class="pi-body">
                            <?php if ( $badges['type'] == '0' ) { ?>
                              <div class="avatar"><img alt="" src="<?php echo BADGEURL . $badges['code']; ?>.gif"></div>
                            <?php } else if ( $badges['type'] == '1' ) { ?>
                              <?php if ( !empty($badCodes[0]) ) { ?>
                              <div class="avatar" style="float: left;"><img src="<?php echo BADGEURL . $badCodes[0]; ?>.gif"></div>
                              <?php } if ( !empty($badCodes[1]) ) { ?>
                              <div class="avatar" style="float: left;"><img src="<?php echo BADGEURL . $badCodes[1]; ?>.gif"></div>
                              <?php } if ( !empty($badCodes[2]) ) { ?>
                              <div class="avatar" style="float: left;"><img src="<?php echo BADGEURL . $badCodes[2]; ?>.gif"></div>
                              <?php } if ( !empty($badCodes[3]) ) { ?>
                              <div class="avatar" style="float: left;"><img src="<?php echo BADGEURL . $badCodes[3]; ?>.gif"></div>
                              <?php } if ( !empty($badCodes[4]) ) { ?>
                              <div class="avatar" style="float: left;"><img src="<?php echo BADGEURL . $badCodes[4]; ?>.gif"></div>
                              <?php } if ( !empty($badCodes[5]) ) { ?>
                              <div class="avatar" style="float: left;"><img src="<?php echo BADGEURL . $badCodes[5]; ?>.gif"></div>
                              <?php } ?>
                            <?php } ?>
                        </div>

                        <div class="pi-foot">
                           <div class="tags">
                              <a class="tag" href="#"><?php echo $Functions->FilterText($badges['title']); ?></a>
                           </div>

                           <div class="tags">
                              <a class="tag" href="#"><?php echo $badges['price'];?> diamantes</a>
                           </div>

                           <div class="tags">
                              <a class="tag" href="#"><?php echo $badges['available']; ?> restante</a>
                           </div>
                        </div>

                     </div>
                     <?php } } else { echo '<br><b style="color:red">No hay placas en la tienda.</b><br>'; } ?>



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
                     <h5 class="pipeline-name">Agregar placa</h5>
                  </div>

                  <form action="" method="post">
                     
                    <div class="col-sm-12">
                      <div class="form-group">
                        <input name="title" class="form-control" placeholder="Título" type="text">
                      </div>
                    </div>

                    <div class="col-sm-12">
                      <div class="form-group">
                        <input name="price" class="form-control" placeholder="Precio" type="number">
                      </div>
                    </div>

                    <div class="col-sm-12">
                      <div class="form-group">
                        <input name="available" class="form-control" placeholder="Restante" type="number">
                      </div>
                    </div>

                    <hr>


                    <div class="col-sm-12">
                      <div class="form-group">
                        <input name="badge" class="form-control" placeholder="Placa" type="text">
                      </div>
                    </div>


                     <hr>


                    <div class="col-sm-12">
                      <div class="form-group">
                        <input name="badge2" class="form-control" placeholder="Placa 2" type="text">
                      </div>
                    </div>


                    <div class="col-sm-12">
                      <div class="form-group">
                        <input name="badge3" class="form-control" placeholder="Placa 3" type="text">
                      </div>
                    </div>


                    <div class="col-sm-12">
                      <div class="form-group">
                        <input name="badge4" class="form-control" placeholder="Placa 4" type="text">
                      </div>
                    </div>


                    <div class="col-sm-12">
                      <div class="form-group">
                        <input name="badge5" class="form-control" placeholder="Placa 5" type="text">
                      </div>
                    </div>


                    <div class="col-sm-12">
                      <div class="form-group">
                        <input name="badge6" class="form-control" placeholder="Placa 6" type="text">
                      </div>
                    </div>

                    <hr>

                    <center><button name="addshopbadge" type="submit" class="btn btn-primary" href="#"><span>Dar placa</span><i class="os-icon os-icon-ui-22"></i></button></center>

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
