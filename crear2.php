

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
                                <input required="" name="nombre" type="text" class="form-control" placeholder="Ingrese el nombre de la encuesta">  
                            </div>  
                            <div class="form-group"> 

                            <label for="descripcion">Descripción <span style="color:red">*</span> </label>
                            <textarea  name="descripcion" class=" form-control"   cols="15" rows="3" placeholder="Ingrese la descripción de encuesta"></textarea> 
                            </div>  
                            
                            <div class="form-group ">
                            <label for="cuestionante">Cuestionante <span style="color:red">*</span></label>
                                <input required=""  name="cuestionante" type="text" class="form-control" placeholder="Ingrese la cuestionante que planea responder la encuesta">  
                            </div>   
                            <div class="container text-center mt-2 mb-3">
                                <label> Cantidad de votantes </label> 
                                <input required="" name="votantes" type="number" value="1" max="30" min="1" > <span style="color:red">*</span>
    
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
                            
                              
        <div class="row">
            <div class="col-md-12 offset-md-0 mt-3">
                <div class="card w-100 h-100">
                    <div class="card-header bg-gradient-primary text-white text-center">
                        <h3>Opción / Respuesta 1</h3>
                    </div> </div> </div> </div> 

                    <div class="form-group ">
                    
                    <label class="mt-3" for="opcion">Primera Opcion <span style="color:red">*</span></label>
                             <input required="" name="opcion" type="text" class=" form-control" placeholder="Ingrese la primera Opción">  
                        
                           
                            

                         
                            <div class="row">
            <div class="col-md-12 offset-md-0 mt-5">
                <div class="card w-100 h-100">
                    <div class="card-header bg-gradient-primary text-white text-center">
                        <h3>Opción / Respuesta 2</h3>
                    </div> </div> </div> </div></div>   
                  
                    <div class="form-group ">
                    <label class="mt-3" for="opciond">Segunda Opcion <span style="color:red">*</span></label>
                             <input required="" name="opciond" type="text" class="form-control" placeholder="Ingrese la segunda Opcion">  
                         </div> </div> </div> 
                              

                            <div class="form-group"> 
                                
                                    <button class="btn btn-primary text-white btn-block"  type="submit">  Crear</button>
                                
                            </div>
                        </form> 
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
   
    <?php require 'partials/menubot.php'?> 

