<?php
   ob_start();
    require_once '../../../global.php';
   
    $Functions->Logged("true");
    $Functions->LoggedHk(MAXRANK);
      
    $TplClass->SetParam('users', 'selected');
    $TplClass->SetParam('sub', '<li class="breadcrumb-item"><a href="'.HK.'files/users/edit.php">Users</a></li>
                                <li class="breadcrumb-item"><span>User Edit</span></li>');

    if( $_SESSION['ERROR_RETURN'] ){
    $TplClass->SetParam('error', ' <div class="alert alert-danger alert-dismissible fade show" role="alert"><button aria-label="Close" class="close" data-dismiss="alert" type="button"><span aria-hidden="true"> ×</span></button><strong>¡Error! </strong>'.$_SESSION['ERROR_RETURN'].'</div>');
    unset($_SESSION['ERROR_RETURN']);
  }
  if( $_SESSION['GOOD_RETURN'] ){
    $TplClass->SetParam('error', '<div class="alert alert-success alert-dismissible fade show" role="alert"><button aria-label="Close" class="close" data-dismiss="alert" type="button"><span aria-hidden="true"> ×</span></button><strong>¡Bien! </strong>'.$_SESSION['GOOD_RETURN'].'</div>');
    unset($_SESSION['GOOD_RETURN']);
    }


    $action = $Functions->FilterText($_GET['action']);
    $id = $Functions->FilterText($_GET['id']);
    $bbadge = $Functions->FilterText($_GET['badge']);






    if($action == "delete" && !empty($id)){

    $rrb = $db->query("SELECT * FROM users_badges WHERE id = '". $id ."'");
    $badgeinfo = $rrb->fetch_array();

      $dbStaffLogAdd = array();
                $dbStaffLogAdd['user_id'] = $Functions->Me('id');
                $dbStaffLogAdd['message'] = 'Ha retirado una placa a el ususario con id '.$id;
                $dbStaffLogAdd['rank'] = $Functions->Me('rank');
                $dbStaffLogAdd['action'] = 'Quitar Placa (Perfil)';
                $dbStaffLogAdd['time'] = time();
                $query = $db->insertInto('cms_stafflogs', $dbStaffLogAdd);

    $db->query("DELETE FROM users_badges WHERE id = '{$id}' LIMIT 1");
    $_SESSION['GOOD_RETURN'] = "Placa retirada correctamente";
    header("LOCATION: ". HK ."files/users/edit.php?action=users&id=".$badgeinfo['user_id']."");


    }







   
    $TplClass->AddTemplateHK("templates", "menu");          
    ob_end_flush(); 
       
   
   ?>
   <div class="content-i">
   <div class="content-box">
    <div class="row">
   <?php if ($action == "users" && !empty($id)) { 

        if(isset($_POST['save'])){
    
      $db->query("UPDATE $users SET motto = '{$Functions->FilterText($_POST['motto'])}', mail = '{$Functions->FilterText($_POST['email'])}', credits = '{$Functions->FilterText($_POST['credits'])}', rank = '{$Functions->FilterText($_POST['rankid'])}'  WHERE id = ".$id."");

      $db->query("UPDATE cms_users SET background = '{$Functions->FilterText($_POST['background'])}', colour = '{$_POST['colour']}', cms_role = '{$Functions->FilterText($_POST['cms_role'])}'  WHERE id = ".$id."");
      
      $db->query("UPDATE users_currency SET amount = '{$Functions->FilterText($_POST['points'])}'  WHERE user_id = ".$id." AND type = '5'");
      $db->query("UPDATE users_currency SET amount = '{$Functions->FilterText($_POST['duckets'])}'  WHERE user_id = ".$id." AND type = '0'");

$dbStaffLogAdd = array();
                $dbStaffLogAdd['user_id'] = $Functions->Me('id');
                $dbStaffLogAdd['message'] = 'Ha editado el usuario con id '.$id;
                $dbStaffLogAdd['rank'] = $Functions->Me('rank');
                $dbStaffLogAdd['action'] = 'Editar usuario';
                $dbStaffLogAdd['time'] = time();
                $query = $db->insertInto('cms_stafflogs', $dbStaffLogAdd);


      $_SESSION['GOOD_RETURN'] = "Usuario editado correctamente";
      header("LOCATION: ". HK ."files/users/edit.php?action=users&id=".$id."");
    

    }

    $ru = $db->query("SELECT * FROM $users WHERE id = '". $id ."'");
    $user = $ru->fetch_array(); 

    $rr = $db->query("SELECT * FROM permissions WHERE id = '". $h_edit['rank'] ."'");
    $rankinfo = $rr->fetch_array();
    ?>


             <div class="col-sm-5">
            <div class="user-profile compact">
               <div class="up-head-w" style="background-image:url(<?php echo $Functions->UserCustom('background', $user['id']); ?>)"><img style="float: left;" src="<?php echo AVATARIMAGE . $Functions->User('look', $user['id']); ?>">
                  <div class="up-social"><a href="#"><i class="os-icon os-icon-twitter"></i></a><a href="#"><i class="os-icon os-icon-facebook"></i></a>
                  </div>
                  <div class="up-main-info">
                     <h2 class="up-header"><?php echo $Functions->FilterText($Functions->User('username', $user['id'])); ?></h2>
                     <h6 class="up-sub-header"><?php echo $Functions->FilterText($Functions->User('motto', $user['id'])); ?></h6>
                  </div>
                  <svg class="decor" width="842px" height="219px" viewBox="0 0 842 219" preserveAspectRatio="xMaxYMax meet" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                     <g transform="translate(-381.000000, -362.000000)" fill="#FFFFFF">
                        <path class="decor-path" d="M1223,362 L1223,581 L381,581 C868.912802,575.666667 1149.57947,502.666667 1223,362 Z"></path>
                     </g>
                  </svg>
               </div>
               <div class="up-controls">
                  <div class="row">
                     <div class="col-sm-6">
                        <div class="value-pair">
                           <div class="label">Status:</div>
                           <div class="value badge badge-pill badge-success"><?php if($Functions->User('online', $user['id']) == "1"){
                     echo "Online";
                     }else{
                     echo "Offline";
                     } ?></div>
                        </div>
                     </div>
                     <div class="col-sm-6 text-right"><div class="col-sm-6">
                        <div class="value-pair">
                           <div class="label">Forbi crack</div>
                           
                        </div>
                     </div></div>
                  </div>
               </div>
               <div class="up-contents">
                  <div class="m-b">
                     <div class="row m-b">
                        <div class="col-sm-6 b-r b-b">
                           <div class="el-tablo centered padded-v">
                              <div class="value"><?php $e = $db->query("SELECT * FROM cms_timeline WHERE user_id = '".$user['id']."'"); echo $Functions->number_format_short($e->num_rows); ?></div>
                              <div class="label">Posts</div>
                           </div>
                        </div>
                        <div class="col-sm-6 b-b">
                           <div class="el-tablo centered padded-v">
                              <div class="value"><?php $f = $db->query("SELECT * FROM messenger_friendships WHERE user_one_id = '".$user['id']."'"); echo $Functions->number_format_short($f->num_rows); ?></div>
                              <div class="label">Amigos</div>
                           </div>
                        </div>
                     </div>
                     <!--<div class="padded">
                        <div class="os-progress-bar primary">
                           <div class="bar-labels">
                              <div class="bar-label-left"><span>Profile Completion</span><span class="positive">+10</span></div>
                              <div class="bar-label-right"><span class="info">72/100</span></div>
                           </div>
                           <div class="bar-level-1" style="width: 100%">
                              <div class="bar-level-2" style="width: 80%">
                                 <div class="bar-level-3" style="width: 30%"></div>
                              </div>
                           </div>
                        </div>
                        <div class="os-progress-bar primary">
                           <div class="bar-labels">
                              <div class="bar-label-left"><span>Status Unlocked</span><span class="positive">+5</span></div>
                              <div class="bar-label-right"><span class="info">45/100</span></div>
                           </div>
                           <div class="bar-level-1" style="width: 100%">
                              <div class="bar-level-2" style="width: 30%">
                                 <div class="bar-level-3" style="width: 10%"></div>
                              </div>
                           </div>
                        </div>
                        <div class="os-progress-bar primary">
                           <div class="bar-labels">
                              <div class="bar-label-left"><span>Followers</span><span class="negative">-12</span></div>
                              <div class="bar-label-right"><span class="info">74/100</span></div>
                           </div>
                           <div class="bar-level-1" style="width: 100%">
                              <div class="bar-level-2" style="width: 80%">
                                 <div class="bar-level-3" style="width: 60%"></div>
                              </div>
                           </div>
                        </div>
                     </div>-->
                  </div>
               </div>
            </div>
            <div class="element-wrapper">
               <div class="element-box">
                  <h6 class="element-header">User Activity</h6>
                  <div class="timed-activities compact">


                     <!--<div class="timed-activity">
                        <div class="ta-date"><span>21st Jan, 2017</span></div>
                        <div class="ta-record-w">
                           <div class="ta-record">
                              <div class="ta-timestamp"><strong>11:55</strong> am</div>
                              <div class="ta-activity">Created a post called <a href="#">Register new symbol</a> in Rogue</div>
                           </div>
                           <div class="ta-record">
                              <div class="ta-timestamp"><strong>2:34</strong> pm</div>
                              <div class="ta-activity">Commented on story <a href="#">How to be a leader</a> in <a href="#">Financial</a> category</div>
                           </div>
                           <div class="ta-record">
                              <div class="ta-timestamp"><strong>7:12</strong> pm</div>
                              <div class="ta-activity">Added <a href="#">John Silver</a> as a friend</div>
                           </div>
                        </div>
                     </div>-->


                  </div>
               </div>
            </div>

            <div class="element-wrapper">
               <div class="element-box">
                  <h6 class="element-header">Placas</h6>
                  <div class="timed-activities compact">


                     <div class="table-responsive" style="overflow-y:auto; min-height:60px; max-height: 300px;">
   <table class="table table-bordered table-lg table-v2 table-striped" >
      <thead>
         <tr>
            <th>Placa</th>
            <th>Acciones</th>
         </tr>
      </thead>
      <tbody>
        <?php $find = $db->query("SELECT * FROM users_badges WHERE user_id = '".$id."'");
                                                    while($us = $find->fetch_array()){
                                                        if($us['slot_id'] == 0){
                                                            $slot = 'No';
                                                        }else{
                                                        $slot = 'Sí';}
                                                        ?>

         <tr>
            <td><img alt="" src="<?php echo BADGEURL . $us['badge_code']; ?>.gif"> <?php echo $us['badge_code']; ?></td>
            <td class="row-actions"><a class="danger" href="?action=delete&id=<?php echo $us['id']; ?>"><i class="os-icon os-icon-ui-15"></i></a></td>
         </tr>

         <?php } ?>
         

      </tbody>
   </table>
</div>


                  </div>
               </div>
            </div>

         </div>


                  <div class="col-sm-7">
            <div class="element-wrapper">
               <div class="element-box">
                  <form action="" method="post">
                     <div class="element-info">
                        <div class="element-info-with-icon">
                           <div class="element-info-icon">
                              <div class="os-icon os-icon-wallet-loaded"></div>
                           </div>
                           <div class="element-info-text">
                              <h5 class="element-inner-header">Editar usuario - <span class="text-muted"><?php echo $Functions->User('username', $user['id']); ?> (<?php echo $user['id']; ?>)</span></h5>
                              <div class="element-inner-desc">Validation of the form is made possible using powerful validator plugin for bootstrap. <a href="http://1000hz.github.io/bootstrap-validator/" target="_blank">Learn more about Bootstrap Validator</a></div>
                           </div>
                        </div>
                     </div>
                     <?php $TplClass->AddTemplateHK("templates", "error"); ?>

                      <fieldset class="form-group">
                        <legend><span>Información personal</span></legend>

                     <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for=""> Nombre de usuario</label>
                          <input class="form-control" type="text" value="<?php echo $Functions->User('username', $user['id']); ?>" disabled>
                        </div>
                      </div>


                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="">Misión</label>
                          <input class="form-control" value="<?php echo $Functions->FilterText($Functions->User('motto', $user['id'])); ?>" name="motto" type="text">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-6">

                    <div class="form-group">
                          <label for="">Email</label>
                          <input class="form-control" value="<?php echo $Functions->User('mail', $user['id']); ?>" name="email" type="text">
                        </div>
                        </div>

<div class="col-sm-6">
              <div class="form-group">
                <label for=""> Rangos</label>
                <select name="rankid" class="form-control">
                 <option value="<?php echo $Functions->User('rank', $user['id']); ?>" disabled selected>Rango</option>
                     <?php $que = $db->query("SELECT * FROM permissions ORDER BY id ASC"); while($qued = $que->fetch_array()){
                         if($qued['id'] == $Functions->User('rank', $user['id'])){
                             $skere = 'selected';
                            }else{
                             $skere = '';}
                             ?>
                     <option value="<?php echo $qued['id']; ?>" <?php echo $skere; ?>><?php echo $qued['rank_name']; ?></option>
                     <?php } ?>
                   </select>
              </div>
            </div>
          </div>

              <div class="form-group">
                <label for=""> Trabajo a realizar</label>
                <input name="cms_role" class="form-control" placeholder="Trabajo a realizar" value="<?php echo $Functions->UserCustom('cms_role', $user['id']); ?>" type="text">
              </div>

                     </fieldset>


                                         <fieldset class="form-group">
                                          <legend><span>Economía</span></legend>

                                          <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for=""> Créditos</label>
                          <input class="form-control" type="number" min="-0" max="99999999" name="credits" maxlength="8" value="<?php echo $Functions->User('credits', $user['id']); ?>">
                        </div>
                      </div>


                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="">Duckets</label>
                          <input class="form-control" type="number" min="-0" max="99999999" name="duckets" maxlength="8" value="<?php echo $Functions->User('pixels', $user['id']); ?>">
                        </div>
                      </div>

                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="">Diamantes</label>
                          <input class="form-control" type="number" min="-0" max="99999999" name="points" maxlength="8" value="<?php echo $Functions->User('points', $user['id']); ?>">
                        </div>
                      </div>

                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="">Seasonal (Opcional - No funciona)</label>
                          <input class="form-control" type="number" min="-0" max="99999999" name="seasonal" maxlength="8" value="">
                        </div>
                      </div>


                    </div>





                     </fieldset>



                     <fieldset class="form-group">
                                          <legend><span>Perfil</span></legend>


                                          <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for=""> Fondo</label>
                          <input class="form-control" type="text" value="<?php echo $Functions->UserCustom('background', $user['id']); ?>" name="background">
                        </div>
                      </div>


                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="">Foto de perfil</label>
                          <input class="form-control" value="<?php echo $Functions->UserCustom('photo', $user['id']); ?>" name="photo" type="text">
                        </div>
                      </div>


                    <div class="col-sm-6">
                        <div class="form-group">
                          <label for="">Color</label>
                          <input class="form-control" value="<?php echo $Functions->UserCustom('colour', $user['id']); ?>" name="colour" type="text">
                        </div>
                      </div>

                      


                    </div></fieldset>

<center><button name="save" type="submit" class="btn btn-primary" href="#"><span>Editar</span></button></center>




                  </form>
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
         <h6 class="element-header">Amigos</h6>
         <div class="element-box-tp" style="overflow-y:auto; min-height:60px; max-height: 300px;">
            <div class="users-list-w">

              <?php    global $db;
                     $result = $db->query("SELECT * FROM messenger_friendships WHERE user_one_id = '".$user['id']."'");
                     while($data = $result->fetch_array()){
                     if($data['user_one_id'] == $user['id']){$friendv = $data['user_two_id'];
                     }elseif($data['user_two_id'] == $user['id']){$friendv = $data['user_one_id'];}
                     $result2 = $db->query("SELECT * FROM $users WHERE id = '".$friendv."' ORDER BY id ASC");
                     while($userinfo = $result2->fetch_array()){

                      if ($userinfo['online'] == 0) {
                $status = 'red';
              }elseif ($userinfo['online'] == 1) {
                $status = 'green';
              }
                     
                     ?>



               <div class="user-w with-status status-<?php echo $status; ?>">
                  <div class="user-avatar-w">
                     <img alt="" src="<?php echo AVATARIMAGE . $Functions->User('look', $userinfo['id']); ?>&amp;headonly=1&amp;gesture=sml">
                  </div>
                  <div class="user-name">
                     <a href="?action=users&id=<?php echo $userinfo['id']; ?>"><h6 class="user-title"><?php echo $Functions->FilterText($Functions->User('look', $userinfo['id'])); ?></h6></a>
                     <div class="user-role"><?php echo $Functions->FilterText($Functions->User('look', $userinfo['motto'])); ?></div>
                  </div>
               </div>
               <?php }}  ?>


            </div>
         </div>
      </div>      





      <div class="element-wrapper">
         <h6 class="element-header">Salas</h6>
         <div class="element-box-tp" style="overflow-y:auto; min-height:60px; max-height: 300px;">
            <div class="users-list-w">

             <?php  $find = $db->query("SELECT * FROM rooms WHERE owner_id = '".$id."'");
                                                    while($us = $find->fetch_array()){

                                                        ?>



               <div class="user-w">
                  <div class="user-avatar-w">
                     <img alt="" src="<?php echo FILES; ?>/assets/img/community/rooms/room_icon_2.gif">
                  </div>
                  <div class="user-name">
                     <a target="_blank" href="/room/<?php echo $us['id']; ?>"><h6 class="user-title"><?php echo $Functions->FilterText($us['name']); ?></h6></a>
                     <div class="user-role"><img alt="" src="<?php echo FILES; ?>/assets/img/community/rooms/visitors.gif"> <b><?php echo $us['users']; ?></b> / <?php echo $us['users_max']; ?></div>
                  </div>
               </div>
               <?php }  ?>


            </div>
         </div>
      </div>


   </div>



   <!--------------------
      END - Sidebar
      -------------------->




    <?php }else{ ?>
         <div class="col-sm-5">
            <div class="user-profile compact">
               <div class="up-head-w" style="background-image:url(<?php echo $Functions->UserCustom('background', $Functions->Me('id')); ?>)"><img style="float: left;" src="<?php echo AVATARIMAGE . $Functions->Me('look'); ?>">
                  <div class="up-social"><a href="#"><i class="os-icon os-icon-twitter"></i></a><a href="#"><i class="os-icon os-icon-facebook"></i></a>
                  </div>
                  <div class="up-main-info">
                     <h2 class="up-header"><?php echo $Functions->Me('username'); ?></h2>
                     <h6 class="up-sub-header"><?php echo $Functions->FilterText($Functions->Me('motto')); ?></h6>
                  </div>
                  <svg class="decor" width="842px" height="219px" viewBox="0 0 842 219" preserveAspectRatio="xMaxYMax meet" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                     <g transform="translate(-381.000000, -362.000000)" fill="#FFFFFF">
                        <path class="decor-path" d="M1223,362 L1223,581 L381,581 C868.912802,575.666667 1149.57947,502.666667 1223,362 Z"></path>
                     </g>
                  </svg>
               </div>
               <div class="up-controls">
                  <div class="row">
                     <div class="col-sm-6">
                        <div class="value-pair">
                           <div class="label">Status:</div>
                           <div class="value badge badge-pill badge-success"><?php if($Functions->Me('online') == "1"){
                     echo "Online";
                     }else{
                     echo "Offline";
                     } ?></div>
                        </div>
                     </div>
                     <div class="col-sm-6 text-right"><div class="col-sm-6">
                        <div class="value-pair">
                           <div class="label">Forbi crack</div>
                           
                        </div>
                     </div></div>
                  </div>
               </div>
               <div class="up-contents">
                  <div class="m-b">
                     <div class="row m-b">
                        <div class="col-sm-6 b-r b-b">
                           <div class="el-tablo centered padded-v">
                              <div class="value"><?php $e = $db->query("SELECT * FROM cms_timeline WHERE user_id = '".$Functions->Me('id')."'"); echo $Functions->number_format_short($e->num_rows); ?></div>
                              <div class="label">Posts</div>
                           </div>
                        </div>
                        <div class="col-sm-6 b-b">
                           <div class="el-tablo centered padded-v">
                              <div class="value"><?php $f = $db->query("SELECT * FROM messenger_friendships WHERE user_one_id = '".$Functions->Me('id')."'"); echo $Functions->number_format_short($f->num_rows); ?></div>
                              <div class="label">Amigos</div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="element-wrapper">
               <div class="element-box">
                  <h6 class="element-header">User Activity</h6>
                  <div class="timed-activities compact">


                     <!--<div class="timed-activity">
                        <div class="ta-date"><span>21st Jan, 2017</span></div>
                        <div class="ta-record-w">
                           <div class="ta-record">
                              <div class="ta-timestamp"><strong>11:55</strong> am</div>
                              <div class="ta-activity">Created a post called <a href="#">Register new symbol</a> in Rogue</div>
                           </div>
                           <div class="ta-record">
                              <div class="ta-timestamp"><strong>2:34</strong> pm</div>
                              <div class="ta-activity">Commented on story <a href="#">How to be a leader</a> in <a href="#">Financial</a> category</div>
                           </div>
                           <div class="ta-record">
                              <div class="ta-timestamp"><strong>7:12</strong> pm</div>
                              <div class="ta-activity">Added <a href="#">John Silver</a> as a friend</div>
                           </div>
                        </div>
                     </div>-->


                  </div>
               </div>
            </div>
         </div>
         <div class="col-sm-7">
            <div class="element-wrapper">
               <div class="element-box">
                  <form id="formValidate" novalidate="true">
                     <div class="element-info">
                        <div class="element-info-with-icon">
                           <div class="element-info-icon">
                              <div class="os-icon os-icon-search"></div>
                              <!--<div class="os-icon os-icon-wallet-loaded"></div>-->
                           </div>
                           <div class="element-info-text">
                              <h5 class="element-inner-header">Buscar usuario</h5>
                              <div class="element-inner-desc">Buscador de usuario en tiempo real</a></div>
                           </div>
                        </div>
                     </div>
                     <div class="form-group">
                        <label for=""> Buscar usuarios</label><input class="form-control"  placeholder="Usuario" required="required" type="text" id="buscar" onkeyup="buscador()">
                     </div>

                                         <fieldset class="form-group">

                                          <div id ="resultado" ></div>





                     </fieldset>

                  </form>
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
         <h6 class="element-header">Equipo</h6>
         <div class="element-box-tp">
            <div class="users-list-w">

              <?php $que = $db->query("SELECT * FROM $users WHERE rank > '2' ORDER BY rank DESC"); 
              while($qued = $que->fetch_array()){ 

              $rrank = $db->query("SELECT * FROM permissions WHERE id = '{$qued['rank']}'"); 
              $rankinfo = $rrank->fetch_array();
              if ($qued['online'] == 0) {
                $status = 'red';
              }elseif ($qued['online'] == 1) {
                $status = 'green';
              }
                ?>


               <div class="user-w with-status status-<?php echo $status; ?>">
                  <div class="user-avatar-w">
                     <img alt="" src="<?php echo AVATARIMAGE . $Functions->User('look', $qued['id']); ?>&action=std&gesture=std&direction=2&head_direction=2&size=n&headonly=1">
                  </div>
                  <div class="user-name">
                     <a href="?action=users&id=<?php echo $qued['id']; ?>"><h6 class="user-title"><?php echo $Functions->FilterText($Functions->User('username', $qued['id'])); ?></h6></a>
                     <div class="user-role"><?php echo $rankinfo['rank_name']; ?> (<?php echo $Functions->User('rank', $qued['id']); ?>)</div>
                  </div>
               </div>

             <?php } ?>

            </div>
         </div>
      </div>
   </div>
   <!--------------------
      END - Sidebar
      -------------------->

 <?php } ?>

   

</div>



<?php
   $TplClass->AddTemplateHK("templates", "footer");          
   ?>
<script src="<?php echo HK; ?>/app/assets/js/vicode.js"></script>
</body>
</html>
