<?php
require "./partials/config.php";
	
	require "./logica/conexion.php";
	

	if (isset($_GET['s'])) {
		switch ($_GET['s']) {
			case 'successins':
				$mensaje = 'usuario creado correctamente';
				$color = 'success';
				break;
			case 'errorins':
				$mensaje = 'Imposible crear usuario';
				$color = 'danger';
        break;   
        case 'errorpassword':
          $mensaje = 'La contraseña no coincide';
          $color = 'danger';
          break;      
          case 'erroruser':
            $mensaje = 'NO existe usuario';
            $color = 'danger';
            break;        
          
					 
		}
	}  if (!empty($mensaje) and !empty($color)) {
		//echo '<div class="alert alert-'.$color.'" role="alert">'.$mensaje .'</div> ';
		echo '<div class="alert alert-'.$color .' "role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<span>'.$mensaje.'</span>
		</div>';
	}

 
	
	if($_POST){
		
		$usuario = $_POST['usuario'];
		$password = $_POST['password'];
		
		$sql = "SELECT id, password, nombre, tipo_usuario FROM usuarios WHERE usuario='$usuario'";
	//echo $sql;
		$resultado = $mysqli->query($sql);
		$num = $resultado->num_rows;
		
		if($num>0){
			$row = $resultado->fetch_assoc();
			$password_bd = $row['password'];
			
			$pass_c = sha1($password);
			
			if($password_bd == $pass_c){
				
				$_SESSION['id'] = $row['id'];
				$_SESSION['nombre'] = $row['nombre'];
				$_SESSION['tipo_usuario'] = $row['tipo_usuario'];
				
				header("Location: index.php");
				
			} else {
			
        header("Location: login.php?s=errorpassword");
			
			}
			
			
			} else {
        header("Location: login.php?s=erroruser");
		}
		
		
		
	}elseif (isset($_GET['code'])) {
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    $client->setAccessToken($token['access_token']);
     
    // get profile info
  $google_oauth = new Google_Service_Oauth2($client);
  $google_account_info = $google_oauth->userinfo->get();
  $userinfo = [
    'email' => $google_account_info['email'],
    'first_name' => $google_account_info['givenName'],
    'full_name' => $google_account_info['name'],
    'token' => $google_account_info['id'],];
  
  $correo = $userinfo['email'];

	 // checking if user is already exists in database
   $sql = "SELECT * FROM usuarios WHERE correo ='$correo'";
     $result = $mysqli->query($sql);
     $num = $result->num_rows;

   if ($num > 0) {
    //  user is exists
    $row = $result->fetch_assoc();
      $_SESSION['id'] = $row['id'];
      $_SESSION['nombre'] = $row['nombre'];
      $_SESSION['tipo_usuario'] = $row['tipo_usuario']; 
       header("Location: index.php");}else{
     // user is not exists
     $sql = "INSERT INTO `usuarios`( 
      `correo`, 
      `usuario`, 
      `nombre`, 
      `tipo_usuario`) VALUES ('{$userinfo['email']}', '{$userinfo['first_name']}', '{$userinfo['full_name']}','2')";
   
     if ($mysqli->query($sql)) {
      $sql = "SELECT * FROM usuarios WHERE correo ='{$userinfo['email']}'";
      $resultado = $mysqli->query($sql);
      $row = $resultado->fetch_assoc(); 
      $_SESSION['id'] = $row['id'];
      $_SESSION['nombre'] = $row['nombre'];
      $_SESSION['tipo_usuario'] = $row['tipo_usuario']; 
       header("Location: index.php");
    }}}
   
    
      
     
  //    } else {
  //      echo "User is not created";
  //      die();
  //    }
  //  }
  
  if ( isset( $_SESSION['id'] ) ) {
    header("location: index.php");
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
  <meta name="google-signin-client_id" content="1034652970639-pg0erhh7ffh34im55sk5pq2um9801298.apps.googleusercontent.com">

  <title>J&C</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                  </div>
                  <form class="user"method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <div class="form-group">
                      <input type="name" class="form-control form-control-user" id="exampleInputEmail" name="usuario" required="" placeholder="Nombre">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="exampleInputPassword"name="password" required=""  placeholder="Password">
                    </div>
                    <div class="form-group">
                     
                    <button type="submit" class="btn btn-primary btn-user btn-block">Login</button> 
                    
                   <h6 class="text-center mt-1">Or</h6>
                    
                 
                   <a class="text-white" href='<?php echo  $client->createAuthUrl() ?>'> <button type="button" class="btn btn-dark btn-user btn-block"><i class="fab fa-google"></i>  Google Login</a> 
                    </a>
                    
                  </form> 
                  </div>
                  <hr>
                  
                  <div class="text-center">
                    <a class="small" href="#">Forgot Password?</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href="register.php">Create a Account!</a> 
                    
                  </div> 
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  

  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script> 



</body>

</html>
