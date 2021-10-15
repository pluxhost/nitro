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
                                <li class="breadcrumb-item"><span>User Ranks</span></li>');
   

    $action = $Functions->FilterText($_GET['action']);
    $id = $Functions->FilterText($_GET['id']);


           if(isset($_POST['giverank'])){
   $check = $db->query("SELECT * FROM $users WHERE username = '".$Functions->FilterText($_POST['name'])."' LIMIT 1");
   $row = $check->fetch_array();
   
   if(empty($_POST['name']) || empty($_POST['rankid']) || empty($_POST['role'])){
   $_SESSION['ERROR_RETURN'] = "Has dejado campos vac&iacute;os";
   header("LOCATION: ". HK ."files/users/ranks.php");
   }else{
   if($check->num_rows > 0){
    $result22 = $db->query("SELECT * FROM permissions WHERE id = '".$Functions->FilterText($_POST['rankid'])."'");
    $rankinfo = $result22->fetch_array();
    $db->query("UPDATE $users SET rank = '{$Functions->FilterText($_POST['rankid'])}' WHERE id = '{$row['id']}'");
	  $db->query("UPDATE cms_users SET cms_role = '{$Functions->FilterText($_POST['role'])}', cms_staffocult = '{$Functions->FilterText($_POST['ocult'])}' WHERE id = '{$row['id']}'");

    $dbStaffLogAdd = array();
                $dbStaffLogAdd['user_id'] = $Functions->Me('id');
                $dbStaffLogAdd['message'] = 'Le ha dado rango '.$_POST['rankid'].' a '.$_POST['name'];
                $dbStaffLogAdd['rank'] = $Functions->Me('rank');
                $dbStaffLogAdd['action'] = 'Dar Rango';
                $dbStaffLogAdd['time'] = time();
                $query = $db->insertInto('cms_stafflogs', $dbStaffLogAdd);

    
    $_SESSION['GOOD_RETURN'] = "Rango editado correctamente";
    header("LOCATION: ". HK ."files/users/ranks.php");
   }else {
    $_SESSION['ERROR_RETURN'] = "El usuario no ex&iacute;ste";
    header("LOCATION: ". HK ."files/users/ranks.php");
   }
   }
   }


   if($action == "dele" && !empty($id)){
    $dbStaffLogAdd = array();
                $dbStaffLogAdd['user_id'] = $Functions->Me('id');
                $dbStaffLogAdd['message'] = 'Le ha quitado el rango a el ususario con id: '.$id;
                $dbStaffLogAdd['rank'] = $Functions->Me('rank');
                $dbStaffLogAdd['action'] = 'Quitar rango';
                $dbStaffLogAdd['time'] = time();
                $query = $db->insertInto('cms_stafflogs', $dbStaffLogAdd);

    $db->query("UPDATE $users SET `rank` = '1' WHERE id = '{$id}'");
    $db->query("UPDATE cms_users SET cms_role = '' WHERE id = '{$id}'");

       $_SESSION['GOOD_RETURN'] = "Le ha quitado rank a el ususario con id: ".$id." correctamente";
           header("LOCATION: ". HK ."files/users/ranks.php");
       
}

       
       $TplClass->AddTemplateHK("templates", "menu");          
    ob_end_flush(); 
   
   ?>
<div class="content-i">
   <div class="content-box col-sm-10">
      <div class="element-wrapper">
         <h6 class="element-header">Usuarios con rango</h6>
      </div>



<?php $result = $db->query("SELECT * FROM $users WHERE rank >= 3 AND rank <= '".MERANK."' ORDER BY rank DESC");
                                                 while($data = $result->fetch_array()){
                        
                                                        $result2 = $db->query("SELECT * FROM permissions WHERE id = '".$data['rank']."'");
                                                        $data2 = $result2->fetch_array(); 

                                                        $rb = $db->query("SELECT * FROM bans WHERE user_staff_id = '".$data['id']."'");
                                                        $bans = $rb->fetch_array(); 

                                                        ?>

      <div class="profile-tile" style="float: left;margin-right: 30px">
               <a class="profile-tile-box" href="<?php echo HK ?>files/users/ranks.php?id=<?php echo $data['id']; ?>">
                  <div class="pt-avatar-w"><img alt="" src="<?php echo AVATARIMAGE . $Functions->User('look', $data['id']); ?>&amp;gesture=sml&headonly=1"></div>
                  <div class="pt-user-name"><?php echo $Functions->User('username', $data['id']); ?></div>
               </a>
               <div class="profile-tile-meta" style="margin-left: -20px">
                  <ul>
                     <li>ÚLTIMO ACCESO:<strong><?php echo $Functions->GetLastFace($data['last_online']); ?></strong></li>
                     <li>Bans:<strong><?php echo $rb->num_rows; ?></strong></li>
                     <li>Rank:<strong><?php echo $data2['rank_name']; ?> (ID: <?php echo $data2['id']; ?>)</strong></li>
                     <li>IP:<strong><?php echo $data['ip_current']; ?></strong></li>
                     <li>
                      <a style="font-size: 200%" href="<?php echo HK ?>files/users/ranks.php?action=dele&id=<?php echo $data['id']; ?>">
                         <i class="os-icon os-icon-ui-15"></i>
                      </a> 

                     <a style="font-size: 200%" href="<?php echo PATH ?>/profile/<?php echo $data['username']; ?>" target="_blank">
                      <i class="os-icon os-icon-user-male-circle2"></i>
                     </a>

                     <a style="font-size: 200%" href="<?php echo HK ?>files/users/ranks.php?id=<?php echo $data['id']; ?>">
                       <i class="os-icon os-icon-edit-1"></i>
                     </a>
                   </li>
                  </ul>
                  
               </div>
            </div>

<?php } ?> 

             




            








   </div>
   <!--------------------
      START - Sidebar
      -------------------->
   <div class="content-panel " style="position:relative;left: -18%">
      <div class="content-panel-close"><i class="os-icon os-icon-close"></i></div>
      <div class="element-wrapper" style="width: 330%">
         <h6 class="element-header">Dar rango</h6>
         <div class="element-box" style="width: 38%">
          <?php $TplClass->AddTemplateHK("templates", "error"); ?>
            <div class="form-desc">En este apartado podrás editar/dar rango, a cualquier usuario. Todas las especificaciones son claras, se encuentran abajo. </div>


            <?php 
            $que2 = $db->query("SELECT * FROM $users WHERE id = '".$id."'"); 
            $info = $que2->fetch_array();
                ?>


                <form action="" method="post">


            <div class="col-sm-12">
              <div class="form-group">
                <label for=""> Usuario</label>
                <input name="name" class="form-control" placeholder="Usuario" value="<?php echo $info['username']; ?>" type="text">
              </div>
            </div>

            <div class="col-sm-12">
              <div class="form-group">
                <label for=""> Rangos</label>
                <select name="rankid" class="form-control">
                 <option value="<?php echo $info['rank']; ?>" disabled selected>Rango</option>
                     <?php $que = $db->query("SELECT * FROM permissions WHERE id < '" . $Functions->Me('rank') . "' ORDER BY id DESC"); while($qued = $que->fetch_array()){
                         if($qued['id'] == $info['rank']){
                             $skere = 'selected';
                            }else{
                             $skere = '';}
                             ?>
                     <option value="<?php echo $qued['id']; ?>" <?php echo $skere; ?>><?php echo $qued['rank_name']; ?></option>
                     <?php } ?>
                   </select>
              </div>
            </div>

            <div class="col-sm-12">
              <div class="form-group">
                <label for=""> Trabajo a realizar</label>
                <input name="role" class="form-control" placeholder="Trabajo a realizar" value="<?php echo $Functions->UserCustom('cms_role', $info['id']); ?>" type="text">
              </div>
            </div>

            <div class="col-sm-12">
              <div class="form-group">
                <label for=""> Rango Oculto</label>
                <select name="ocult" class="form-control">
                  <?php if($info['cms_staffocult'] == 0){
                             $oculto = 'selected';
                            }else{
                                $oculto = '';}

                                if($info['cms_staffocult'] == 1){
                                    $oculto1 = 'selected';
                                   }else{
                                    $oculto1 = '';}
 
                             ?>
                     <option value="0" disabled selected>Rango Oculto</option>
                     <option value="0" <?php echo $oculto; ?>>No</option>
                     <option value="1" <?php echo $oculto1; ?>>S&iacute;</option>
                </select>
              </div>
            </div>
            <hr>


            <center><button name="giverank" type="submit" class="btn btn-primary" href="#"><span>Agregar</span><i class="os-icon os-icon-ui-22"></i></button></center>





          </form>
            

         </div>
      </div>
   </div>
   <!--------------------
      END - Sidebar
      -------------------->


         <div class="content-box col-sm-2" style="position:relative;left: -13%">
      <div class="element-wrapper">
         <h6 class="element-header">Alto rango</h6>
      </div>


<?php $result = $db->query("SELECT * FROM $users WHERE rank = '".MAXRANK."' ORDER BY id DESC");
                                                 while($data = $result->fetch_array()){
                        
                                                        $result2 = $db->query("SELECT * FROM permissions WHERE id = '".$data['rank']."'");
                                                        $data2 = $result2->fetch_array(); 

                                                        $rb = $db->query("SELECT * FROM bans WHERE user_staff_id = '".$data['id']."'");
                                                        $bans = $rb->fetch_array(); 

                                                        ?>


      <div class="profile-tile" style="width: 160%">
               <a class="profile-tile-box" href="<?php echo HK ?>files/users/ranks.php?id=<?php echo $data['id']; ?>">
                  <div class="pt-avatar-w"><img alt="" src="<?php echo AVATARIMAGE . $Functions->User('look', $data['id']); ?>&amp;gesture=sml&headonly=1"></div>
                  <div class="pt-user-name"><?php echo $data['username']; ?></div>
               </a>
               <div class="profile-tile-meta">
                  <ul>
                     <li>ÚLTIMO ACCESO:<strong><?php echo $Functions->GetLast2($data['last_online']); ?></strong></li>
                     <li>Bans:<strong><?php echo $rb->num_rows; ?></strong></li>
                     <li>Rank:<strong><?php echo $data2['rank_name']; ?> (ID: <?php echo $data2['id']; ?>)</strong></li>
                     <li>Response Time:<strong>2 hours</strong></li>
                  </ul>
                  
               </div>
            </div>

            <?php } ?>    


             




            








   </div>
</div>
<?php
   $TplClass->AddTemplateHK("templates", "footer");          
   ?>

</body>
</html>
