

  <?php require 'partials/menuhead.php';
   $mensaje = '';
   $color = '';

   if (isset($_GET['s'])) {
       switch ($_GET['s']) {
           case 'successins':
               $mensaje = 'Encuesta creada correctamente';
               $color = 'success';
               break;
           case 'errorins':
               $mensaje = 'Imposible crear encuesta';
               $color = 'danger';
               break;    
               case 'successdlt':
                $mensaje = 'Encuesta inhabilitada correctamente';
                $color = 'success';
                break;
            case 'errordlt':
                $mensaje = 'Imposible inhabilitar encuesta';
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
   $sql="SELECT * FROM detallencuesta WHERE id_usuario = '$usuario' and estado = 'A'";
   $result=$mysqli->query($sql); 

if ($result->num_rows >0){
  echo ' 
  <div class="panel panel-default" style="margin-top: 10 px">
    <div class="panel-heading">
        <h1 class="container">Mis Encuestas</h1>
    </div>
    <div class="panel-body">
   
        <br>
        <hr>
  <table class="table table-striped" style="text-align: center;">
  <thead>
      <tr>
          <th>Código</th>
          <th>Nombre</th>
          <th>Votos Maximos</th>
          <th>Privacidad</th>
          <th></th>
          <th></th>
      </tr>
  </thead>
  <tbody>';
  while ($row = $result->fetch_assoc()) { 
    echo" 
    
    <tr>
        <td>#".$row['id_detalle']."</td>
        <td>".$row['nombre']."</td>
        <td>".$row['votosmax']."</td>
        <td>".$row['privacidad']."</td>
        <td> <a data-toggle='tooltip' title='Ver' href='encuesta.php?id=".$row['id_detalle']."' class='btn btn-light'> <img src='img/ojo.png' width=34px /> </a> 
         <a data-toggle='tooltip' title='Borrar' href='logica/guardar.php?accion=DLT&id=".$row['id_detalle']."' class='btn btn-danger'> <img src='img/basura.png' width=34px /> </a></td>
        
";
}}else{
echo'
  
  

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h2 display-6 mb-2 text-gray-800"></h1></h1>
     
          </div>

        
          
          <div class="row">
            <div class="col-md-12 col-sm-4 container fas fa-chart-line" style="color: grey;font-size: 300px; text-align: center;"> 
            <h3 class="col-12 text-center display-6">Aun no tienes encuestas creadas</h6> 
              <h6 class="text-primary">Crea tus primeras encuestas haciendo Click <a href="crear2.php">AQUI</a> </h6>  
            </div></div>';
}
  
            ?>  
            
            <?php require 'partials/menubot.php'?> 
 


           
    