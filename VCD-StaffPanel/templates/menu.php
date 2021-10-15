   <!DOCTYPE html>
   <?php global $db;
      $ranks = $db->query("SELECT * FROM permissions WHERE id = '{$RANK}'");
      $rankname = $ranks->fetch_array();
      ?>
<html>
   <head>
      <title>Cactus Panel</title>
      <meta charset="utf-8">
      <meta content="ie=edge" http-equiv="x-ua-compatible">
      <meta content="template language" name="keywords">
      <meta content="Tamerlan Soziev" name="author">
      <meta content="Admin dashboard html template" name="description">
      <meta content="width=device-width, initial-scale=1" name="viewport">
      <link href="<?php echo HK; ?>/app/assets/img/favicon.png" rel="shortcut icon">
      <link href="<?php echo HK; ?>/app/assets/img/apple-touch-icon.png" rel="apple-touch-icon">


      <link href="<?php echo HK; ?>/app/assets/css/select2.min.css" rel="stylesheet">
      <link href="<?php echo HK; ?>/app/assets/css/daterangepicker.css" rel="stylesheet">
      <link href="<?php echo HK; ?>/app/assets/css/dropzone.css" rel="stylesheet">
      <link href="<?php echo HK; ?>/app/assets/css/dataTables.bootstrap.min.css" rel="stylesheet">
      <link href="<?php echo HK; ?>/app/assets/css/fullcalendar.min.css" rel="stylesheet">
      <link href="<?php echo HK; ?>/app/assets/css/perfect-scrollbar.min.css" rel="stylesheet">
      <link href="<?php echo HK; ?>/app/assets/css/slick.css" rel="stylesheet">


      <link href="<?php echo HK; ?>/app/assets/css/main.css" rel="stylesheet">

   </head>

   <body class="with-content-panel full-screen menu-position-top color-scheme-dark" style="">
      <div class="all-wrapper with-side-panel solid-bg-all">
         <div class="search-with-suggestions-w">
            <div class="search-with-suggestions-modal">
               <div class="element-search">
                  <input class="search-suggest-input" placeholder="Start typing to search..." type="text">
                  <div class="close-search-suggestions"><i class="os-icon os-icon-x"></i></div>
               </div>
               <div class="search-suggestions-group">
                  <div class="ssg-header">
                     <div class="ssg-icon">
                        <div class="os-icon os-icon-box"></div>
                     </div>
                     <div class="ssg-name">Projects</div>
                     <div class="ssg-info">24 Total</div>
                  </div>
                  <div class="ssg-content">
                     <div class="ssg-items ssg-items-boxed">
                        <a class="ssg-item" href="users_profile_big.html">
                           <div class="item-media" style="background-image: url(img/company6.png)"></div>
                           <div class="item-name">Integ<span>ration</span> with API</div>
                        </a>
                        <a class="ssg-item" href="users_profile_big.html">
                           <div class="item-media" style="background-image: url(img/company7.png)"></div>
                           <div class="item-name">Deve<span>lopm</span>ent Project</div>
                        </a>
                     </div>
                  </div>
               </div>
               <div class="search-suggestions-group">
                  <div class="ssg-header">
                     <div class="ssg-icon">
                        <div class="os-icon os-icon-users"></div>
                     </div>
                     <div class="ssg-name">Customers</div>
                     <div class="ssg-info">12 Total</div>
                  </div>
                  <div class="ssg-content">
                     <div class="ssg-items ssg-items-list">
                        <a class="ssg-item" href="users_profile_big.html">
                           <div class="item-media" style="background-image: url(img/avatar1.jpg)"></div>
                           <div class="item-name">John Ma<span>yer</span>s</div>
                        </a>
                        <a class="ssg-item" href="users_profile_big.html">
                           <div class="item-media" style="background-image: url(img/avatar2.jpg)"></div>
                           <div class="item-name">Th<span>omas</span> Mullier</div>
                        </a>
                        <a class="ssg-item" href="users_profile_big.html">
                           <div class="item-media" style="background-image: url(img/avatar3.jpg)"></div>
                           <div class="item-name">Kim C<span>olli</span>ns</div>
                        </a>
                     </div>
                  </div>
               </div>
               <div class="search-suggestions-group">
                  <div class="ssg-header">
                     <div class="ssg-icon">
                        <div class="os-icon os-icon-folder"></div>
                     </div>
                     <div class="ssg-name">Files</div>
                     <div class="ssg-info">17 Total</div>
                  </div>
                  <div class="ssg-content">
                     <div class="ssg-items ssg-items-blocks">
                        <a class="ssg-item" href="#">
                           <div class="item-icon"><i class="os-icon os-icon-file-text"></i></div>
                           <div class="item-name">Work<span>Not</span>e.txt</div>
                        </a>
                        <a class="ssg-item" href="#">
                           <div class="item-icon"><i class="os-icon os-icon-film"></i></div>
                           <div class="item-name">V<span>ideo</span>.avi</div>
                        </a>
                        <a class="ssg-item" href="#">
                           <div class="item-icon"><i class="os-icon os-icon-database"></i></div>
                           <div class="item-name">User<span>Tabl</span>e.sql</div>
                        </a>
                        <a class="ssg-item" href="#">
                           <div class="item-icon"><i class="os-icon os-icon-image"></i></div>
                           <div class="item-name">wed<span>din</span>g.jpg</div>
                        </a>
                     </div>
                     <div class="ssg-nothing-found">
                        <div class="icon-w"><i class="os-icon os-icon-eye-off"></i></div>
                        <span>No files were found. Try changing your query...</span>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="layout-w">










            <!--------------------
               START - Mobile Menu
               -------------------->
            <div class="menu-mobile menu-activated-on-click color-scheme-dark">
               <div class="mm-logo-buttons-w">
                  <a class="mm-logo" href="<?php echo HK ?>"><img src="app/assets/img/logo.png"><span>Clean Admin</span></a>
                  <div class="mm-buttons">
                     <div class="content-panel-open">
                        <div class="os-icon os-icon-grid-circles"></div>
                     </div>
                     <div class="mobile-menu-trigger">
                        <div class="os-icon os-icon-hamburger-menu-1"></div>
                     </div>
                  </div>
               </div>
               <div class="menu-and-user" style="display: none;">
                  <div class="logged-user-w">
                     <div class="avatar-w"><img alt="" src="<?php echo AVATARIMAGE . $LOOK; ?>&action=std&gesture=std&direction=2&head_direction=2&size=n&headonly=1"></div>
                     <div class="logged-user-info-w">
                        <div class="logged-user-name"><?php echo $USERNAME; ?></div>
                        <div class="logged-user-role"><?php echo $rankname['rank_name']; ?></div>
                     </div>
                  </div>


                    <!--------------------
                     START - Mobile Menu List
                     -------------------->

                     <!--------------------
                     END - Mobile Menu List
                     -------------------->


               </div>
            </div>
            <!--------------------
               END - Mobile Menu
               -------------------->










               <!--------------------
               START - Main Menu
               -------------------->
            <div class="menu-w menu-activated-on-hover menu-has-selected-link sub-menu-color-bright menu-position-top menu-layout-mini sub-menu-style-over color-scheme-dark color-style-transparent selected-menu-color-bright">
               <div class="logo-w">
                  <a class="logo" href="<?php echo HK; ?>index.php">
                     <div class="logo-element"></div>
                     <div class="logo-label">Cactus Admin</div>
                  </a>
               </div>
               <div class="logged-user-w avatar-inline">
                  <div class="logged-user-i">
                     <div style="height: 20px;position: relative;top:-10px;"><img alt="" src="<?php echo AVATARIMAGE . $LOOK; ?>&action=std&gesture=std&direction=2&head_direction=2&size=n&headonly=1"></div>
                     <div class="logged-user-info-w">
                        <div class="logged-user-name"><?php echo $USERNAME; ?></div>
                        <div class="logged-user-role"><?php echo $rankname['rank_name']; ?></div>
                     </div>
                     <div class="logged-user-toggler-arrow">
                        <div class="os-icon os-icon-chevron-down"></div>
                     </div>
                     <div class="logged-user-menu color-style-bright">
                        <div class="logged-user-avatar-info">
                          <div style="height: 20px;position: relative;top:-25px;"><img alt="" src="<?php echo AVATARIMAGE . $LOOK; ?>&action=std&gesture=std&direction=2&head_direction=2&size=n&headonly=1"></div>
                           <div class="logged-user-info-w">
                              <div class="logged-user-name"><?php echo $USERNAME; ?></div>
                              <div class="logged-user-role"><?php echo $rankname['rank_name']; ?></div>
                           </div>
                        </div>
                        <div class="bg-icon"><i class="os-icon os-icon-wallet-loaded"></i></div>
                        <ul>
                  
                           <li><a href="<?php echo PATH; ?>/home"><i class="os-icon os-icon-signs-11"></i><span>Volver</span></a></li>
                        </ul>
                     </div>
                  </div>
               </div>
               <div class="menu-actions">
                  <!--------------------
                     START - Messages Link in secondary top menu
                     -------------------->
          
                  <!--------------------
                     END - Messages Link in secondary top menu
                     --------------------><!--------------------
                     START - Settings Link in secondary top menu
                     -------------------->
                  <div class="top-icon top-settings os-dropdown-trigger os-dropdown-position-left">
                  <a href="<?php echo HK; ?>/config.php"  > <i class="os-icon os-icon-ui-46"></i></a>
                     
                  </div>
                  <!--------------------
                     END - Settings Link in secondary top menu
                     --------------------><!--------------------
                     START - Messages Link in secondary top menu
                     -------------------->
              
                  <!--------------------
                     END - Messages Link in secondary top menu
                     -------------------->
               </div>
               

               <h1 class="menu-page-header">Inicio</h1>
               <ul class="main-menu">


                   <li class="sub-header"><span>Inicio</span></li>
                  <li class="<?php echo $home; ?> has-sub-menu">
                     <a href="#">
                        <div class="icon-w">
                           <div class="os-icon os-icon-layout"></div>
                        </div>
                        <span>Inicio</span>
                     </a>
                     <div class="sub-menu-w">
                        <div class="sub-menu-header">Inicio</div>
                        <div class="sub-menu-icon"><i class="os-icon os-icon-layout"></i></div>
                        <div class="sub-menu-i">
                           <ul class="sub-menu">
                              <li><a href="<?php echo HK; ?>index.php">Inicio</a></li>
                              <li><a href="<?php echo HK; ?>config.php">Configuración del Hotel <strong class="badge badge-danger">IMPORTANTE</strong></a></li>
                              <?php global $db; $consulta = $db->query("SELECT * FROM cms_tickets WHERE type = 'ticket' AND abierto = '0'"); ?>
                             <!-- <li><a href="<?php echo HK; ?>reports.php">Reportes <?php if($consulta->num_rows > 0){ ?><strong class="badge badge-danger"><?php echo $consulta->num_rows; ?></strong><?php } ?></a></li> -->
                           </ul>
                        </div>
                     </div>
                  </li>


                  <li class="sub-header"><span>Users</span></li>
                  <li class="<?php echo $users; ?> has-sub-menu">
                     <a href="#">
                        <div class="icon-w">
                           <div class="os-icon os-icon-users"></div>
                        </div>
                        <span>Users</span>
                     </a>
                     <div class="sub-menu-w">
                        <div class="sub-menu-header">Users</div>
                        <div class="sub-menu-icon"><i class="os-icon os-icon-users"></i></div>
                        <div class="sub-menu-i">

                           <ul class="sub-menu">
                              <li><a href="<?php echo HK; ?>files/users/edit.php">Gestionar</a></li>
                              <li><a href="<?php echo HK; ?>files/users/bans.php">Bans</a></li>
                              <li><a href="<?php echo HK; ?>files/users/clones.php">Clones</a></li>
                              </ul>

                              <ul class="sub-menu">
                              <li><a href="<?php echo HK; ?>files/users/ranks.php">Rangos</a></li>
                              <li><a href="<?php echo HK; ?>files/users/badges.php">Placas</a></li>
                           </ul>

                        </div>
                     </div>
                  </li>


                  <li class="sub-header"><span>Crear/Editar</span></li>
                  <li class="<?php echo $add; ?> has-sub-menu">
                     <a href="#">
                        <div class="icon-w">
                           <div class="os-icon os-icon-edit-32"></div>
                        </div>
                        <span>Crear/Editar</span>
                     </a>
                     <div class="sub-menu-w">
                        <div class="sub-menu-header">Crear/Editar</div>
                        <div class="sub-menu-icon"><i class="os-icon os-icon-edit-32"></i></div>
                        <div class="sub-menu-i">
                           <ul class="sub-menu">
                              <li><a href="<?php echo HK; ?>news.php">Noticias</a></li>
                              
                           </ul>
                        </div>
                     </div>
                  </li>



                  <li class="sub-header"><span>Subir</span></li>
                  <li class="<?php echo $up; ?> has-sub-menu">
                     <a href="#">
                        <div class="icon-w">
                           <div class="os-icon os-icon-upload"></div>
                        </div>
                        <span>Subir</span>
                     </a>
                     <div class="sub-menu-w">
                        <div class="sub-menu-header">Subir</div>
                        <div class="sub-menu-icon"><i class="os-icon os-icon-upload"></i></div>
                        <div class="sub-menu-i">
                           <ul class="sub-menu">
                              <li><a href="<?php echo HK; ?>files/upload/badge.php">Placas <strong class="badge badge-danger">NUEVO </strong></a></li>
                              <!--<li><a href="<?php echo HK; ?>files/upload/bg.php">Background <strong class="badge badge-danger">Hot</strong></a></li> -->
                              <!--<li><a href="<?php echo HK; ?>files/upload/img.php">Imágenes <strong class="badge badge-danger">Hot</strong></a></li>-->
                              
                           </ul>
                        </div>
                     </div>
                  </li>

                  <li class="<?php echo $shop; ?> has-sub-menu">
   <a href="#">
      <div class="icon-w">
         <div class="os-icon os-icon-zap"></div>
      </div>
      <span>Tienda</span>
   </a>
   <div class="sub-menu-w">
      <div class="sub-menu-header">Tienda</div>
      <div class="sub-menu-icon"><i class="os-icon os-icon-zap"></i></div>
      <div class="sub-menu-i">
         <ul class="sub-menu">
            <li><a href="<?php echo HK; ?>/files/shop/badges.php">Placas</a></li>
         </ul>

      </div>
   </div>
</li>





               </ul>

            </div>
            <!--------------------
               END - Main Menu
               -------------------->

               <!--------------------
                  START - Breadcrumbs
                  -------------------->
               <ul class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Cactus Panel</a></li>
                  <?php echo $sub; ?>
               </ul>
               <!--------------------
                  END - Breadcrumbs
                  -------------------->