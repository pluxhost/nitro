<?php
   ob_start();
    require_once '../global.php';
   
    $Functions->Logged("true");
    $Functions->LoggedHk(MINRANK);
   
    $TplClass->SetParam('home', 'selected');
    $TplClass->SetParam('sub', '<li class="breadcrumb-item"><span>Inicio</span></li>');
   
    $TplClass->AddTemplateHK("templates", "menu");          
    ob_end_flush(); 
   ?>
<div class="content-panel-toggler"><i class="os-icon os-icon-grid-squares-22"></i><span>Sidebar</span></div>
<div class="content-i">
   <div class="content-box">
      <div class="row pt-4">
         <div class="col-sm-12">
            <!--START - Grid of tablo statistics-->
            <div class="element-wrapper">
               <h6 class="element-header">Panel de administración</h6>
               <div class="element-content">
                  <div class="tablo-with-chart">
                     <div class="row">
                        <div class="col-sm-5 col-xxl-4">
                           <div class="tablos">
                              <div class="row mb-xl-2 mb-xxl-3">
                                 <div class="col-sm-6">
                                    <a class="element-box el-tablo centered trend-in-corner padded bold-label">
                                       <div class="value"><?php echo $Functions->GetCount('cms_stats'); ?></div>
                                       <div class="label">Visitantes total</div>
                                    </a>
                                 </div>
                                 <div class="col-sm-6">
                                    <a class="element-box el-tablo centered trend-in-corner padded bold-label">
                                       <div class="value"><?php echo $Functions->GetCount($users); ?></div>
                                       <div class="label">Usuarios registrados</div>
                                    </a>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-sm-6">
                                    <a class="element-box el-tablo centered trend-in-corner padded bold-label">
                                       <div class="value"><?php echo $Functions->GetOns(); ?></div>
                                       <div class="label">Usuarios en línea</div>
                                    </a>
                                 </div>
                                 <div class="col-sm-6">
                                    <a class="element-box el-tablo centered trend-in-corner padded bold-label">
                                       <div class="value"><?php echo $Functions->GetCount('bans'); ?></div>
                                       <div class="label">Usuarios baneados</div>
                                    </a>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-sm-7 col-xxl-8">
                           <!--START - Chart Box-->
                           <div class="element-box pl-xxl-5 pr-xxl-5">
                              <div class="el-tablo bigger highlight bold-label">
                                 <div class="value"><?php echo number_format($Functions->GetCount($users)); ?></div>
                                 <div class="label">Ususarios registrados</div>
                              </div>
                              <div class="el-chart-w">
                                 <div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
                                    <div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                       <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
                                    </div>
                                    <div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                       <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
                                    </div>
                                 </div>
                                 <canvas height="161" id="lineChart" width="569" class="chartjs-render-monitor" style="display: block; width: 569px; height: 161px;"></canvas>
                              </div>
                           </div>
                           <!--END - Chart Box-->
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!--END - Grid of tablo statistics-->
         </div>
      </div>
      <div class="row">
         <div class="d-xxxl-block col-xxxl-3 col-sm-4 d-xxxl-none">
            <!-- d-none d-xxxl-block col-xxxl-3 START - Top Selling Chart-->
            <div class="element-wrapper">
               <h6 class="element-header">Visitas por browseres</h6>
               <div class="element-box">
                  <div class="el-chart-w">
                     <div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
                        <div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                           <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
                        </div>
                        <div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                           <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
                        </div>
                     </div>
                     <canvas height="172" id="donutChart" width="172" class="chartjs-render-monitor" style="display: block; width: 172px; height: 172px;"></canvas>
                     <div class="inside-donut-chart-label"><strong><?php echo $Functions->GetCount('cms_stats'); ?></strong><span>Visitas</span></div>
                  </div>
               </div>
            </div>
            <!--END - Top Selling Chart-->
         </div>
         <div class="col-sm-8 col-xxxl-6">
            <!--START - Questions per Product-->
            <div class="element-wrapper">
               <h6 class="element-header">Visitas por Sistema O.</h6>
               <div class="element-box">
                  <div class="os-progress-bar primary">
                     <div class="bar-labels">
                        <div class="bar-label-left"><span class="bigger">Eyeglasses</span></div>
                        <div class="bar-label-right"><span class="info">25 items / 10 remaining</span></div>
                     </div>
                     <div class="bar-level-1" style="width: 100%">
                        <div class="bar-level-2" style="width: 70%">
                           <div class="bar-level-3" style="width: 40%"></div>
                        </div>
                     </div>
                  </div>
                  <div class="os-progress-bar primary">
                     <div class="bar-labels">
                        <div class="bar-label-left"><span class="bigger">Outwear</span></div>
                        <div class="bar-label-right"><span class="info">18 items / 7 remaining</span></div>
                     </div>
                     <div class="bar-level-1" style="width: 100%">
                        <div class="bar-level-2" style="width: 40%">
                           <div class="bar-level-3" style="width: 20%"></div>
                        </div>
                     </div>
                  </div>

                  <div class="mt-4 border-top pt-3">
                     <div class="element-actions d-none d-sm-block">
                        <form class="form-inline justify-content-sm-end">
                           <select class="form-control form-control-sm form-control-faded">
                              <option selected="true">Este mes</option>
                           </select>
                        </form>
                     </div>
                     <h6 class="element-box-header">Visitas</h6>
                     <div class="el-chart-w">
                        <canvas height="50" id="liteLineChartV3" width="300"></canvas>
                     </div>
                  </div>
               </div>
            </div>
            <!--END - Questions per product                  -->
         </div>
      </div>
      <div class="row">
         <div class="col-sm-12">
            <div class="element-wrapper">
               <h6 class="element-header">Reportes recientes</h6>
               <div class="element-box-tp">
                      <!--------------------
                     START - Table with actions
                     ------------------  -->
                  <div class="table-responsive">
                     <table class="table table-bordered table-lg table-v2 table-striped">
                        <thead>
                           <tr>
                              <th class="text-center"><input class="form-control" type="checkbox"></th>
                              <th>Nombre</th>
                              <th>Título</th>
                              <th>Categoría</th>
                              <th>Prioridad</th>
                              <th>Status</th>
                              <th>Actions</th>
                           </tr>
                        </thead>
                        <tbody>

<?php
   $resultticket = $db->query("SELECT * FROM cms_tickets WHERE type = 'ticket' ORDER BY id DESC LIMIT 15");
     while($ticket = $resultticket->fetch_array()){
   
      $ru = $db->query("SELECT * FROM $users WHERE username = '{$ticket['username']}'");
      $ui = $ru->fetch_array();

      if($ticket['category'] == 1 ){ $category = 'Problema técnico'; }elseif($ticket['category']==2){ $category = 'Problema en la tienda'; }elseif($ticket['category']==3){ $category = 'Problema de moderación'; }elseif($ticket['category']==4){ $category = 'Problema de animación'; }elseif($ticket['category']==5){ $category = 'Problema con los furnis'; }elseif($ticket['category']==6){ $category = 'Problema con el foro'; }elseif($ticket['category']==7){ $category = 'Los furnis faltantes'; }

      if($ticket['priority']==1){ $priority = 'No es urgente'; }elseif($ticket['priority']==2){ $priority = 'Poco urgente'; }elseif($ticket['priority']==3){ $priority = 'Bastante urgente'; }elseif($ticket['priority']==4){ $priority = 'Urgente'; }elseif($ticket['priority']==5){ $priority = 'Muy urgente'; }
   
   ?>
                           <tr>
                              <td class="text-center"><input class="form-control" type="checkbox"></td>
                              <td><?php echo $ui['username']; ?></td>
                              <td><?php echo $Functions->FilterText($ticket['title']); ?></td>
                              <td class="text-right"><?php echo $category; ?></td>
                              <td><?php echo $priority; ?></td>
                              <td class="text-center">
                                 <div class="status-pill <?php if($ticket['cerrado'] == 1){ echo 'red'; }elseif($ticket['abierto'] == 0){ echo 'yellow'; }elseif($ticket['abierto'] == 1){ echo 'green'; } ?>" data-title="<?php if($ticket['cerrado'] == 1){ echo 'Cerrado'; }elseif($ticket['abierto'] == 0){ echo 'Pendiente'; }elseif($ticket['abierto'] == 1){ echo 'En curso'; } ?>" data-toggle="tooltip"></div>
                              </td>
                              <td class="row-actions">

                                <a href="#"><i class="os-icon os-icon-ui-49"></i></a>
                                <a href="#"><i class="os-icon os-icon-grid-10"></i></a>
                                <a class="danger" href="#"><i class="os-icon os-icon-ui-15"></i></a>

                              </td>
                           </tr>
<?php } ?>

                        </tbody>
                     </table>
                  </div>
                  <!--------------------
                     END - Table with actions
                     --------------------><!--------------------
                     START - Controls below table
                     ------------------  -->
                  <div class="controls-below-table">
                     <div class="table-records-info">Showing records 1 - 5</div>
                     <div class="table-records-pages">
                        <ul>
                           <li><a href="#">Previous</a></li>
                           <li><a class="current" href="#">1</a></li>
                           <li><a href="#">2</a></li>
                           <li><a href="#">Next</a></li>
                        </ul>
                     </div>
                  </div>
                  <!--------------------
                     END - Controls below table
                     -------------------->
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
         <h6 class="element-header">Enlaces rápidos</h6>
         <div class="element-box-tp">
            <div class="el-buttons-list full-width">

                <a class="btn btn-white btn-sm" href="<?php echo HK; ?>/news.php">
                    <i class="os-icon os-icon-delivery-box-2"></i>
                    <span>Crear nueva noticia</span>
                </a>

                <a class="btn btn-white btn-sm" href="#">
                    <i class="os-icon os-icon-window-content"></i>
                    <span>Crear nuevo evento</span>
                </a>

                <a class="btn btn-white btn-sm" href="<?php echo HK; ?>files/upload/badge.php">
                    <i class="os-icon os-icon-wallet-loaded"></i>
                    <span>Subir placa</span>
                </a>

                </div>
         </div>
      </div>
<!--------------------
         START - Recent Activity
         -------------------->
      <div class="element-wrapper">
         <h6 class="element-header">Actividad reciente</h6>
         <div class="element-box-tp">
            <div class="activity-boxes-w">

<?php   global $db;
                                $search = $db->query("SELECT * FROM cms_stafflogs ORDER BY time DESC LIMIT 5");
                                    while($inform = $search->fetch_array()){

                                       $searchu = $db->query("SELECT * FROM $users WHERE id = '{$inform['user_id']}'");
                                       $infou = $searchu->fetch_array();

                                        ?>

               <div class="activity-box-w">
                  <div class="activity-time"><?php echo $Functions->GetLastFace($inform['time']); ?></div>
                  <div class="activity-box">
                     <div class="activity-avatar"><img alt="" src="<?php echo AVATARIMAGE . $Functions->User('look', $infou['id']); ?>&action=std&gesture=std&direction=2&head_direction=2&size=l&headonly=1"></div>
                     <div class="activity-info">
                        <div class="activity-role"><?php echo $infou['username']; ?></div>
                        <strong class="activity-title"><?php echo $inform['message']; ?></strong>
                     </div>
                  </div>
               </div>
<?php }   ?>


            </div>
         </div>
      </div>
      <!--------------------
         END - Recent Activity
         --------------------><!--------------------
         START - Team Members
         -------------------->
      <div class="element-wrapper">
         <h6 class="element-header">Team Members</h6>
         <div class="element-box-tp">
            <div class="users-list-w">

                <?php   global $db;
                                $search = $db->query("SELECT * FROM $users WHERE rank >= 3 ORDER BY rank DESC");
                                if($search->num_rows > 0){
                                    while($inform = $search->fetch_array()){
                                       $searchr = $db->query("SELECT * FROM permissions WHERE id = '{$inform['rank']}'");
                                       $infor = $searchr->fetch_array();

                                       if($inform['username'] !== $Functions->Me('username')){

                                        ?>

               <div class="user-w with-status status-<?php if($inform['online'] == 1){ echo 'green'; }else{ echo 'red'; } ?>">
                  <div class="user-avatar-w">
                     <div class="user-avatar"><img alt="" src="<?php echo AVATARIMAGE . $Functions->User('look', $infou['id']); ?>&action=std&gesture=std&direction=2&head_direction=2&size=l&headonly=1"></div>
                  </div>
                  <div class="user-name">
                     <h6 class="user-title"><?php echo $inform['username']; ?></h6>
                     <div class="user-role"><?php echo $infor['rank_name']; ?></div>
                  </div>
               </div>

               <?php } } }else{ echo '<i>No Usuarios con rango</i>'; } ?>

            </div>
         </div>
      </div>
      <!--------------------
         END - Team Members
         -------------------->
   </div>
   <!--------------------
      END - Sidebar
      -------------------->
</div>
</div>
</div>
<div class="display-type"></div>
</div>
<?php
   $TplClass->AddTemplateHK("templates", "footer");          
   ?>
<?php
   $hoyMax = time();
   $hoyMin = time() - 86400;
   
   $ayerMax = time() - 86400;
   $ayerMin = time() - 172800;
   
   $thissMax = time() - 172800;
   $thissMin = time() - 604800;
   
   $seanMax = time() - 604800;
   $seanMin = time() - 1209600;
   
   $mesMax = time() - 1209600;
   $mesMin = time() - 2592000;
   
   $result = $db->query("SELECT * FROM $users WHERE account_created >= '{$hoyMin}' AND account_created <= '{$hoyMax}' ORDER BY account_created");
   $result2 = $db->query("SELECT * FROM $users WHERE account_created >= '{$ayerMin}' AND account_created <= '{$ayerMax}' ORDER BY account_created");
   $result3 = $db->query("SELECT * FROM $users WHERE account_created >= '{$thissMin}' AND account_created <= '{$thissMax}' ORDER BY account_created");
   $result4 = $db->query("SELECT * FROM $users WHERE account_created >= '{$seanMin}' AND account_created <= '{$seanMax}' ORDER BY account_created");
   $result5 = $db->query("SELECT * FROM $users WHERE account_created >= '{$mesMin}' AND account_created <= '{$mesMax}' ORDER BY account_created");


   $resultv = $db->query("SELECT * FROM cms_stats WHERE time >= '{$hoyMin}' AND time <= '{$hoyMax}' ORDER BY time");
   $resultv2 = $db->query("SELECT * FROM cms_stats WHERE time >= '{$ayerMin}' AND time <= '{$ayerMax}' ORDER BY time");
   $resultv3 = $db->query("SELECT * FROM cms_stats WHERE time >= '{$thissMin}' AND time <= '{$thissMax}' ORDER BY time");
   $resultv4 = $db->query("SELECT * FROM cms_stats WHERE time >= '{$seanMin}' AND time <= '{$seanMax}' ORDER BY time");
   $resultv5 = $db->query("SELECT * FROM cms_stats WHERE time >= '{$mesMin}' AND time <= '{$mesMax}' ORDER BY time");
   
   ?>
<script>    
   // line chart data
   var lineData = {
   labels: ["Hoy", "Ayer", "Esta semana", "Semana anterior", "Este mes"],
   datasets: [{
     label: "Ususarios registrados",
     fill: false,
     lineTension: 0.3,
     backgroundColor: "#fff",
     borderColor: "#047bf8",
     borderCapStyle: 'butt',
     borderDash: [],
     borderDashOffset: 0.0,
     borderJoinStyle: 'miter',
     pointBorderColor: "#fff",
     pointBackgroundColor: "#141E41",
     pointBorderWidth: 3,
     pointHoverRadius: 10,
     pointHoverBackgroundColor: "#FC2055",
     pointHoverBorderColor: "#fff",
     pointHoverBorderWidth: 3,
     pointRadius: 5,
     pointHitRadius: 10,
     data: [<?php echo $result->num_rows; ?>, <?php echo $result2->num_rows; ?>, <?php echo $result3->num_rows; ?>, <?php echo $result4->num_rows; ?>, <?php echo $result5->num_rows; ?>],
     spanGaps: false
   }]
   };
</script>
<script>
   // -----------------
   // init donut chart if element exists
   // -----------------
   if ($("#donutChart").length) {
   var donutChart = $("#donutChart");
   
   // donut chart data
   var data = {
   labels: ["Internet Explorer", "Opera", "Mozilla Firefox", "Safari", "Chrome", "Other"],
   datasets: [{
     data: [<?php echo $Functions->GetCount('cms_stats'.' WHERE browser = \'ie\''); ?>, <?php echo $Functions->GetCount('cms_stats'.' WHERE browser = \'OPERA\''); ?>, <?php echo $Functions->GetCount('cms_stats'.' WHERE browser = \'MOZILLA\' OR browser = \'FIREFOX\''); ?>, <?php echo $Functions->GetCount('cms_stats'.' WHERE browser = \'SAFARI\''); ?>, <?php echo $Functions->GetCount('cms_stats'.' WHERE browser = \'CHROME\''); ?>, <?php echo $Functions->GetCount('cms_stats'.' WHERE browser = \'OTHER\''); ?>],
     backgroundColor: ["#5797fc", "#7e6fff", "#4ecc48", "#ffcc29", "#f37070"],
     hoverBackgroundColor: ["#5797fc", "#7e6fff", "#4ecc48", "#ffcc29", "#f37070"],
     borderWidth: 0
   }]
   };
   
   // -----------------
   // init donut chart
   // -----------------
   new Chart(donutChart, {
   type: 'doughnut',
   data: data,
   options: {
     legend: {
       display: false
     },
     animation: {
       animateScale: true
     },
     cutoutPercentage: 80
   }
   });
   }
   </script>
<script>


    if ($("#liteLineChartV3").length) {
      var liteLineChartV3 = $("#liteLineChartV3");

      var liteLineGradientV3 = liteLineChartV3[0].getContext('2d').createLinearGradient(0, 0, 0, 70);
      liteLineGradientV3.addColorStop(0, 'rgba(40,97,245,0.2)');
      liteLineGradientV3.addColorStop(1, 'rgba(40,97,245,0)');

      var chartDataV3 = ["", <?php echo $resultv->num_rows; ?>, "", <?php echo $resultv2->num_rows; ?>, "", <?php echo $resultv3->num_rows; ?>, "", <?php echo $resultv4->num_rows; ?>, "", <?php echo $resultv5->num_rows; ?>, ""];

      if (liteLineChartV3.data('chart-data')) chartDataV3 = liteLineChartV3.data('chart-data').split(',');

      // line chart data
      var liteLineDataV3 = {
        labels: ["", "Hoy", "", "Ayer", "", "Esta semana", "", "Semana A.", "", "Este mes", ""],
        datasets: [{
          label: "Visitas",
          fill: true,
          lineTension: 0.15,
          backgroundColor: liteLineGradientV3,
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
          pointHoverBorderWidth: 0,
          pointRadius: 0,
          pointHitRadius: 10,
          data: chartDataV3,
          spanGaps: false
        }]
      };

      // line chart init
      var myLiteLineChartV3 = new Chart(liteLineChartV3, {
        type: 'line',
        data: liteLineDataV3,
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
<script>(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
   (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
   m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
   })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
   
   ga('create', 'UA-42863888-9', 'auto');
   ga('send', 'pageview');
</script>
<?php
   $TplClass->AddTemplateHK("templates", "footer");          
?>
</body>
</html>