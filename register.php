<?php
	

	
	
  
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
					 
		}
    } 
    if (!empty($mensaje) and !empty($color)) {
        //echo '<div class="alert alert-'.$color.'" role="alert">'.$mensaje .'</div> ';
        echo '<div class="alert alert-'.$color .' "role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <span>'.$mensaje.'</span>
        </div>';
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

  <title>J&F</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
              </div>


              <form class="user" method="POST" action="registrar.php">
                <div class="form-group row">
                  <div class="col-sm-12 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" name="name"required="" placeholder=" Name">
                  </div>
                 
                </div>
                <div class="form-group">
                  <input type="email" class="form-control form-control-user" name="email" aria-describedby="emailHelp" placeholder="Email Address">
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user" required=""  name="password" id="password" placeholder="Password">
                  </div>
                  <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user" required=""  name="cpassword" id="cpassword" placeholder="Repeat Password">
                    <span class="container" id="message"> </span>
                  </div>  
                  
                  <script> 
            $('#password, #cpassword').on('keyup', function () {
  if ($('#password').val() == $('#cpassword').val()) {
    $('#message').html('Coinciden').css('color', 'green');
  } else 
    $('#message').html('No Coinciden').css('color', 'red');
});</script>
                </div>
                <button type="submit"class="btn btn-primary btn-user btn-block">Register Account</button>
                  
                </a>
                
              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="#">Forgot Password?</a>
              </div>
              <div class="text-center">
                <a class="small" href="login.php">Already have an account? Login!</a>
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
