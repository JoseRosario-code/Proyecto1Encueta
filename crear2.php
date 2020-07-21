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
                        <h3>Crear encuesta</h3>
                    </div> 
                    <div class="card-body">
                        <form action="">
                            <div class="form-group ">
                             
                                <input type="text" class="form-control" placeholder="Nombre de la encuesta">  
                            </div> 
                            <div class="form-group"> 

                              
                                <textarea class="mt-3 form-control" name="" id="" cols="15" rows="3" placeholder="Descripcion de encuesta"></textarea> 
                            </div>  

                            <div class="form-group ">
                             
                                <input type="text" class="form-control" placeholder="Cuestionante">  
                            </div>   
                            <div class="container text-center mt-2 mb-3">
                                <label> Cantidad de votantes</label> 
                                <input type="number" max="30" min="10">
    
                            </div>




                            

                            <div class="container text-center "> 

                                <Label>Tipo de encuesta</Label>
                               
                                <div class="container mt-1">
                            <div class="row">
                                <div class="d-inline ml-5">
                                    
                            <div class="radio">
                                <label> 
                                    
                                  <input class="ml-5" type="radio" value="">
                                 Publica
                                </label></div> 
                              </div>

                              <div class="d-inline ml-5">
                              <div class="checkbox ">
                                <label>
                                 <input type="radio" value="">
                                  Privada
                                </label></div></div></div>
                              </div> 

                             
                            
                              
                              

                            <div class="form-group"> 
                                
                                    <a class="btn btn-primary text-white btn-block" href="crear3.php">Siguiente</a>
                                
                            </div>
                        </form> 
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="crear2.php">Datos tecnicos</a></li>
                              <li class="breadcrumb-item"><a href="crear3.php">Primera Opcion</a></li>
                              <li class="breadcrumb-item active"><a href="crear4.php">Segunda Opcion</a></li>
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

