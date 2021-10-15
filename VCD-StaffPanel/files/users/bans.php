<?php
   ob_start();
    require_once '../../../global.php';
   
    $Functions->Logged("true");
    $Functions->LoggedHk(MAXRANK);
      
    $TplClass->SetParam('users', 'selected');
    $TplClass->SetParam('sub', '<li class="breadcrumb-item"><a href="'.HK.'files/users/edit.php">Users</a></li>
                                <li class="breadcrumb-item"><span>User Bans</span></li>');
   

    //FUN BANS

    $action = $Functions->FilterText($_GET['action']);
    $id = $Functions->FilterText($_GET['id']);
    
   
       if( $_SESSION['ERROR_RETURN'] ){
    $TplClass->SetParam('error', ' <div class="alert alert-danger alert-dismissible fade show" role="alert"><button aria-label="Close" class="close" data-dismiss="alert" type="button"><span aria-hidden="true"> ×</span></button><strong>¡Error! </strong>'.$_SESSION['ERROR_RETURN'].'</div>');
    unset($_SESSION['ERROR_RETURN']);
  }
  if( $_SESSION['GOOD_RETURN'] ){
    $TplClass->SetParam('error', '<div class="alert alert-success alert-dismissible fade show" role="alert"><button aria-label="Close" class="close" data-dismiss="alert" type="button"><span aria-hidden="true"> ×</span></button><strong>¡Bien! </strong>'.$_SESSION['GOOD_RETURN'].'</div>');
    unset($_SESSION['GOOD_RETURN']);
    }

       
    if(isset($_POST['addban'])){
      $check = $db->query("SELECT * FROM $users WHERE username = '".$Functions->FilterText($_POST['user'])."' LIMIT 1");
      $row = $check->fetch_array();
      $checkb = $db->query("SELECT * FROM bans WHERE user_id = '".$Functions->FilterText($row['id'])."' LIMIT 1");
      $actv = $checkb->fetch_array();
           
      if(isset($_POST['user']) && isset($_POST['time']) && isset($_POST['type']) && isset($_POST['reason'])){
        $time = $Functions->FilterText($_POST['time']);
               $reason = $Functions->FilterText($_POST['reason']);
               

          if($actv['expire'] > time()){
            $_SESSION['ERROR_RETURN'] = "El usuario ya se encuentra Baneado";
            header("LOCATION: ". HK ."files/users/bans.php");
          }else{
            if($check->num_rows > 0){
              //$db->query("DELETE FROM bans WHERE data = '".$Functions->FilterText($_POST['user'])."' || '".$Functions->FilterText($row['last_ip'])."' LIMIT 1");
              if($row['rank'] >= $Functions->Get('rank')){
                $_SESSION['ERROR_RETURN'] = "No puedes banear a un superior o a ti mismo";
                header("LOCATION: ". HK ."files/users/bans.php");
              }else{

                $dbStaffLogAdd = array();
                $dbStaffLogAdd['user_id'] = $Functions->Me('id');
                $dbStaffLogAdd['message'] = 'Baneo a '. $row['username'].' - (ID: '.$row['username'].')';
                $dbStaffLogAdd['rank'] = $Functions->Me('rank');
                $dbStaffLogAdd['action'] = 'Baneos';
                $dbStaffLogAdd['time'] = time();
                $query = $db->insertInto('cms_stafflogs', $dbStaffLogAdd);

                if($_POST['type'] == "2"){
                  $banuuu = $row['id'];
                  $banuuuu = $row['ip_current'];
                  $baneee = "machine";
                }else{
                  $banuuu = $row['id'];
                  $baneee = "account";
                } 
                $dbAdd= array();
                $dbAdd['user_id'] = $banuuu;
                if($_POST['type'] == "2"){$dbAdd['ip'] = $banuuuu;}
                $dbAdd['user_staff_id'] = $Functions->Me('id');
                $dbAdd['timestamp'] = time();
                $dbAdd['ban_expire'] = time() + $time;
                $dbAdd['ban_reason'] = $reason;
                $dbAdd['type'] = $baneee;
                $query = $db->insertInto('bans', $dbAdd);
                $_SESSION['GOOD_RETURN'] = "Usuario Baneado correctamente";
                header("LOCATION: ". HK ."files/users/bans.php");    
              }
            }else{
              $_SESSION['ERROR_RETURN'] = "No puedes banear a este usuario";
              header("LOCATION: ". HK ."files/users/bans.php");  
            
            }
          }
        }
           }




       if($action == "dele" && !empty($id)){
    $dbStaffLogAdd = array();
                $dbStaffLogAdd['user_id'] = $Functions->Me('id');
                $dbStaffLogAdd['message'] = 'Ha desbaneado a el usuario/ip '.$deleban;
                $dbStaffLogAdd['rank'] = $Functions->Me('rank');
                $dbStaffLogAdd['action'] = 'Desbaneos';
                $dbStaffLogAdd['time'] = time();
                $query = $db->insertInto('cms_stafflogs', $dbStaffLogAdd);

    $db->query("DELETE FROM bans WHERE id = '{$id}' LIMIT 1");
       $_SESSION['GOOD_RETURN'] = "Baneo borrado correctamente, ahora pon :reload bans";
           header("LOCATION: ". HK ."files/users/bans.php");
       
}


    //END FUN BANS
       

       $TplClass->AddTemplateHK("templates", "menu");          
    ob_end_flush(); 
   
   ?>
<div class="content-w">
   <div class="content-i">
      <div class="content-box">

         <div class="element-wrapper compact pt-4">
            <h6 class="element-header">Usuarios baneados</h6>
         </div>

         <div class="row">
            <div class="col-lg-7 col-xxl-6">
               <!--START - CHART-->
               <div class="element-wrapper">
                  <div class="element-box">
                     <h5 class="element-box-header">Historia de los usuarios baneados</h5>
                     <div class="el-chart-w">

                        <canvas height="170" id="liteLineChartV2" width="569" class="chartjs-render-monitor" style="display: block; width: 569px; height: 170px;"></canvas>
                     </div>
                  </div>
               </div>
               <!--END - CHART-->
            </div>
            <div class="col-lg-5 col-xxl-6">
               <!--START - Money Withdraw Form-->
               <div class="element-wrapper">
                  <div class="element-box">
                    <?php $TplClass->AddTemplateHK("templates", "error"); ?>
                     <form action="" method="post">
                        <h5 class="element-box-header">Banear a un usuario</h5>
                        <div class="row">
                           <div class="col-sm-6">
                              <div class="form-group">
                                 <label class="lighter" for="">Usuario</label>
                                 <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                    <input class="form-control" placeholder="Usuario" type="text" name="user">
                                 </div>
                              </div>
                           </div>
                           <div class="col-sm-6">
                              <div class="form-group">
                                 <label class="lighter" for="">Duración</label>
                                 <select class="form-control" name="time">
                                <option value="" disabled selected>Tiempo</option>
                                <option value="3600">1 hora</option>
                                <option value="7200">2 horas</option>
                                <option value="10800">3 horas</option>
                                <option value="14400">4 horas</option>
                                <option value="43200">12 horas</option>
                                <option value="86400">1 dia</option>
                                <option value="259200">3 dias</option>
                                <option value="604800">1 semana</option>
                                <option value="1209600">2 semanas</option>
                                <option value="2592000">1 mes</option>
                                <option value="7776000">3 meses</option>
                                <option value="1314000">1 a&ntilde;o</option>
                                <option value="2628000">2 a&ntilde;os</option>
                                <option value="360000000"> 10 a&ntilde;os</option>
                                 </select>
                              </div>
                           </div>

                           <div class="col-sm-6">
                              <div class="form-group">
                                 <label class="lighter" for="">Ban tipo</label>
                                 <select class="form-control" name="type">
                                <option value="" disabled selected>Banear por IP o User</option>
                                <option value="1">Banear por nombre</option>
                                <option value="2">Banear tambi&eacute;n por IP</option>
                                 </select>
                              </div>
                           </div>

                           <div class="col-sm-6">
                              <div class="form-group">
                                 <label class="lighter" for="">Razón</label>
                                 <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                    <input class="form-control" placeholder="Raz&oacute;n del Baneo" type="text" name="reason">
                                 </div>
                              </div>
                           </div>

                        </div>

                        <button name="addban" type="submit" class="text-right btn btn-primary text-right" href="#"><span>Banear</span><i class="os-icon os-icon-ui-22"></i></button>


                       
                     </form>
                  </div>
               </div>
               <!--END - Money Withdraw Form-->
            </div>
         </div>
         <!--START - Transactions Table-->
         <div class="element-wrapper">
            <h6 class="element-header">Baneados recientemente</h6>
            <div class="element-box-tp">
               <div class="table-responsive">
                  <table class="table table-padded">
                     <thead>
                        <tr>
                           <th>Nombre/IP</th>
                           <th>Estado</th>
                           <th>Razón</th>
                           <th>Baneado por</th>
                           <th>IP</th>
                           <th>Hasta</th>
                           <th>Borrar</th>
                        </tr>
                     </thead>
                     <tbody>

                      <?php global $db; 
                    $get_bans = $db->query("SELECT * FROM bans ORDER BY id DESC");
                    if($get_bans->num_rows > 0){
                      while($row = $get_bans->fetch_array()){
                        if($row['type'] == 'account'){
                          $userdata = $db->query("SELECT * FROM $users WHERE id = '".$row['user_id']."'");
                          $user = $userdata->fetch_array();
                          $last_ip = $user['ip_current'];
                          $ip = 'No';
                        }else{
                          $last_ip = $row['ip'];
                          $ip = 'S&iacute;';
                        }
                        $minuten = $row['ban_expire'] - time();
                        if(time() >= $row['ban_expire']){
                          $stat = "Expirado";
                          $color="green";
                        }elseif(time() + 3600 >= $row['ban_expire']){
                          if(date('i', $minuten) > 0){
                            $stat = "(Le restan ".date('i', $minuten)." minutos)";
                            $color="red";
                          }else{
                            $stat = "(Le restan ".date('s', $minuten)." segundos)";
                            $color="red";
                          } 
                        }else{
                          $stat = "Activo";
                          $color="red";
                        } 
                        
                        $userdata2 = $db->query("SELECT * FROM $users WHERE id = '".$row['user_id']."'");
                          $u= $userdata2->fetch_array();

                          $ud = $db->query("SELECT * FROM $users WHERE id = '".$row['user_staff_id']."'");
                          $uad= $ud->fetch_array(); ?>
                        <tr>
                           <td><span><?php echo $u['username']; ?></span></td>
                           <td><span><b style="color:<?php echo $color; ?>"><?php echo $stat; ?></b></span></td>
                           <td><span><?php echo $row['ban_reason']; ?></span></td>
                           <td><span><?php echo $uad['username']; ?></span></td>
                           <td><span><?php echo $row['ip']; ?></span></td>
                           <td><span><?php setlocale(LC_TIME,"spanish"); echo utf8_encode(strftime("%A %d de %B del %Y", $row['ban_expire'])); ?></span></td>
                           <td><a style="font-size: 200%" href="<?php echo HK ?>files/users/bans.php?action=dele&id=<?php echo $row['id']; ?>">
                         <i class="os-icon os-icon-ui-15"></i>
                      </a> </td>
                        </tr>

                        <?php } } ?>
                        
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
         <!--END - Transactions Table-->
      </div>
   </div>
</div>


<?php
   $TplClass->AddTemplateHK("templates", "footer");          
   ?>

</body>
</html>
<?php 
$resultbans = $db->query("SELECT * FROM bans");
if ($resultbans->num_rows > 0 AND $resultbans->num_rows < 3) {
  $countbans = $resultbans->num_rows - 1;

}elseif ($resultbans->num_rows > 3 AND $resultbans->num_rows < 6) {
  $countbans = $resultbans->num_rows - 3;

}elseif ($resultbans->num_rows > 6 AND $resultbans->num_rows < 9) {
  $countbans = $resultbans->num_rows - 6;

}elseif ($resultbans->num_rows > 9 AND $resultbans->num_rows < 12) {
  $countbans = $resultbans->num_rows - 9;

}elseif ($resultbans->num_rows > 12 AND $resultbans->num_rows < 15) {
  $countbans = $resultbans->num_rows - 12;

}elseif ($resultbans->num_rows > 15 AND $resultbans->num_rows < 18) {
  $countbans = $resultbans->num_rows - 15;

}elseif ($resultbans->num_rows > 18 AND $resultbans->num_rows < 21) {
  $countbans = $resultbans->num_rows - 18;

}elseif ($resultbans->num_rows > 21 AND $resultbans->num_rows < 24) {
  $countbans = $resultbans->num_rows - 21;

}elseif ($resultbans->num_rows > 24 AND $resultbans->num_rows < 27) {
  $countbans = $resultbans->num_rows - 24;

}elseif ($resultbans->num_rows > 27) {
  $countbans = $resultbans->num_rows - 27;

}else{
  $countbans = 0;
}
?>

<script>
      if ($("#liteLineChartV2").length) {
      var liteLineChartV2 = $("#liteLineChartV2");

      var liteLineGradientV2 = liteLineChartV2[0].getContext('2d').createLinearGradient(0, 0, 0, 100);
      liteLineGradientV2.addColorStop(0, 'rgba(40,97,245,0.1)');
      liteLineGradientV2.addColorStop(1, 'rgba(40,97,245,0)');

      var chartDataV2 = [<?php echo $countbans; ?>, <?php echo $countbans; ?>, <?php echo $countbans; ?>, <?php echo $countbans; ?>, <?php echo $countbans; ?>, <?php echo $countbans; ?>, <?php echo $countbans; ?>, <?php echo $countbans; ?>, <?php echo $countbans; ?>, <?php echo $countbans; ?>];

      if (liteLineChartV2.data('chart-data')) chartDataV2 = liteLineChartV2.data('chart-data').split(',');

      // line chart data
      var liteLineDataV2 = {
        labels: ["1", "3", "6", "9", "12", "15", "18", "21", "24", "27"],
        datasets: [{
          label: "Balance",
          fill: true,
          lineTension: 0.35,
          backgroundColor: liteLineGradientV2,
          borderColor: "#2861f5",
          borderCapStyle: 'butt',
          borderDash: [],
          borderDashOffset: 0.0,
          borderJoinStyle: 'miter',
          pointBorderColor: "#2861f5",
          pointBackgroundColor: "#fff",
          pointBorderWidth: 2,
          pointHoverRadius: 3,
          pointHoverBackgroundColor: "#FC2055",
          pointHoverBorderColor: "#fff",
          pointHoverBorderWidth: 2,
          pointRadius: 3,
          pointHitRadius: 10,
          data: chartDataV2,
          spanGaps: false
        }]
      };

      // line chart init
      var myLiteLineChartV2 = new Chart(liteLineChartV2, {
        type: 'line',
        data: liteLineDataV2,
        options: {
          legend: {
            display: false
          },
          scales: {
            xAxes: [{
              ticks: {
                fontSize: '10',
                fontColor: '#969da5'
              },
              gridLines: {
                color: 'rgba(0,0,0,0.0)',
                zeroLineColor: 'rgba(0,0,0,0.0)'
              }
            }],
            yAxes: [{
              display: false,
              ticks: {
                beginAtZero: true,
                max: 55
              }
            }]
          }
        }
      });
    }
</script>