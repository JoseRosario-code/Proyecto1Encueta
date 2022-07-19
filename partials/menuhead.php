<?php
/*Incluimos la conexion a la base de datos*/
include './logica/conexion.php'; 
include './logica/consultas.php';   
include 'config.php';





    
  
	
	$nombre =  ucfirst($_SESSION['nombre']);
	$tipo_usuario = $_SESSION['tipo_usuario'];
	$usuario=  $_SESSION['id'];
  if (!isset( $_SESSION['id'] ) ) {
    header("location: login.php");
  } 
	
?> 

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>J&C</title>
<!-- Custom fonts for this template-->
<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">




  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body id="page-top">
    
  <!-- Page Wrapper -->
  <div id="wrapper"> 
  

    <!-- Sidebar -->

    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

     <!-- Sidebar - Brand -->
     <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
      <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-vote-yea"></i>
      </div>
      <div class="sidebar-brand-text mx-3">J&C Poll</div> 
      
    </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Principal</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Encuesta
      </div>
        <!-- Nav Item - Crear -->
        <li class="nav-item">
          <a class="nav-link" href="crear2.php">
            <i class="fas fa-poll"></i>
            <span>Crear</span></a>
        </li>
  
        <!-- Nav Item - Buscar -->
        <li class="nav-item">
          <a class="nav-link" href="tables.php">
            <i class="fa fa-search"></i>
            <span>Buscar</span></a>
        </li>

      <!-- Nav Item - Mis encuestas -->
      <li class="nav-item">
        <a class="nav-link" href="misencuestas.php">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Mis encuestas</span></a>
      </li>

     

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block"> 

      

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0 " id="sidebarToggle"></button></div><br><br> <br><br> <br> 
        <hr class="sidebar-divider d-none d-md-block"> 
        <div class="sb-sidenav-footer container bg-primary p-2 mt-4 pb-3" >
                        <div class="text-light">Conectado como: <br> 
                        <div><i class="fa fa-id-card mr-2"> </i><?php echo $nombre; ?> <br>  
                        <div><?php echo 'ID: # '.$usuario?>
                        </div></div>
					
      </div>

    </ul> 
    
    <!-- End of Sidebar -->
    
     <!-- Content Wrapper -->
     <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="text-light fa fa-bars" style="text-color: blue"></i>
          </button>

          
          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

           
          
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
            <ul class="navbar-nav ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-primary" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $nombre; ?><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item text-primary" href="#">Configuración</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item text-primary" href="logout.php">Salir</a>
					</div>
				</li>
			</ul>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->