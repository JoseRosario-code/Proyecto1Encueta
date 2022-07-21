

  <?php require 'partials/menuhead.php'?>

   <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card w-80 h-100">
                    <div class="card-header bg-gradient-primary text-white text-center">
                        <h3>Crear encuesta</h3>
                    </div> 
                    <div class="card-body">

                        <form method="POST" action="logica/guardar.php?accion=INS" autocomplete="off"> 
                       
                            <div class="form-group ">
                            <label for="nombre">Nombre <span style="color:red">*</span> </label>
                                <input required="" name="nombre" type="text" class="form-control" <?php if (isset($_SESSION['nombreEnc'])
                                ){ echo " value= '".$_SESSION['nombreEnc']."'";};?> placeholder="Ingrese el nombre de la encuesta">  
                            </div>  
                            <div class="form-group"> 

                            <label for="descripcion">Descripción <span style="color:red">*</span> </label>
                            <textarea  name="descripcion" class=" form-control"   cols="15" rows="3" placeholder="Ingrese la descripción de encuesta"><?php if (isset($_SESSION['descripcionEnc'])
                                ){ echo $_SESSION['descripcionEnc'];}?></textarea> 
                            </div>  
                             
                           
                            <div class="form-group ">
                            <label for="cuestionante">Cuestionante <span style="color:red">*</span></label>
                                <input required=""   name="cuestionante"  <?php if (isset($_SESSION['cuestionanteEnc'])
                                ){ echo " value= '".$_SESSION['cuestionanteEnc']."'";};?> type="text" class="form-control" placeholder="Ingrese la cuestionante que planea responder la encuesta">  
                            </div>   
                            <div class="container text-center mt-2 mb-3">
                                <label> Cantidad de votantes </label> 
                                <input required="" name="votantes" type="number" <?php if (isset($_SESSION['cuestionanteEnc'])
                                ){ echo " value= '".$_SESSION['votantesEnc']."'";}else{
                                    echo 'value= "1"';
                                };?> max="30" min="1" > <span style="color:red">*</span>
    
                            </div>



<style type="text/css">
    #contraseña{
        display: none;
    }
</style>
                            

                            <div class="container text-center "> 

                                <Label>Tipo de encuesta <span style="color:red">*</span></Label> 
                                
                               
                                <div class="container mt-1">
                            <div class="row">
                                <div class="d-inline ml-5">
                                    
                            <div class="radio">
                                <label> 
                                    
                                  <input required="" name="privacidad" class="ml-5" type="radio" value="no" onClick="pass(1)">
                                 Pública
                                </label></div> 
                              </div>

                              <div class="d-inline ml-5">
                              <div class="checkbox ">
                                <label>
                                 <input required="" name="privacidad" type="radio" value="si" onClick="pass(0)">
                                  Privada
                                </label></div></div> 

                                <div class="row"> 
<div class="col-12"><div class="container text-center "> 
                              <div class="form-group container ml-4 mt-3" id="contraseña">
                            <label for="Contraseña">Contraseña<span style="color:red">*</span> </label>
                                <input  name="contraseña"  type="text" class="form-control" placeholder="Contraseña que tendra la encuesta">  
                            </div>  </div> </div>
                              </div>  </div></div>

                              <script>
                                  function pass(x){
                                      if (x==0){
                                          document.getElementById("contraseña").style.display='block';
                                      }else{
                                        document.getElementById("contraseña").style.display='none';
                                      }
                                      return;
                                  }
                              </script>
                            
                              
       
                            <div class="form-group"> 
                                
                                    <button class="btn btn-primary text-white btn-block"  type="submit">  Crear</button>
                                
                            </div>
                        </form> 
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                              <li class="breadcrumb-item active"aria-current="page">Datos tecnicos</li>
                              <li class="breadcrumb-item"><a href="crear3.php">Primera Opcion</a></li>
                              <li class="breadcrumb-item"><a href="crear4.php">Segunda Opcion</a></li>
                            </ol>
                          </nav>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
   
    <?php require 'partials/menubot.php'?> 

