<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>J&F</title>

  <?php require 'partials/menuhead.php'?> 

   <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card w-80 h-100">
                    <div class="card-header bg-gradient-primary text-white text-center">
                        <h3>Opcion / Respuesta 2</h3>
                    </div> 
                    <div class="card-body">
                    <form method="POST" action="logica/guardar.php?accion=INS3" enctype="multipart/form-data" autocomplete="off"> 
                            <div class="form-group ">
                             
                            <input required="" name="opciond" type="text" class=" form-control" placeholder="Ingrese la segunda Opción"> 
                                 
                            </div> 
                            <div class="form-group"> 
                                <div class="input-group mb-3">
                                <div class="custom-file">
    <input type="file" name="imagend" accept="image/png, .jpeg, .jpg, image/gif" class="custom-file-input" required="" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
    <label class="custom-file-label" for="inputGroupFile01">Cargar Imagen</label>
  </div>
                                    </div>
                              
                               
                            </div>  

                            <div class="form-group ">
                             <label>Color para representar</label>
                                <input type="color" name="" id="">
                            </div>   
                  




                        
                             
                            
                              
                              

                             <div class="form-group"> 
                             <button class="btn btn-primary text-white btn-block"  type="submit">  Crear</button>
                            </div>
                        </form> 
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="crear2.php">Datos tecnicos</a></li>
                              <li class="breadcrumb-item"><a href="crear3.php">Primera Opcion</a></li>
                              <li class="breadcrumb-item active">Segunda Opcion</li>
                            </ol>
                          </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
  </body> 
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
 
  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
 
  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>
</html>

