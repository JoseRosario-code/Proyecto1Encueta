<?php
include 'partials/menuhead.php';   
error_reporting(0);

$query = encuesta($_GET['id']);
$row = $query->fetch_assoc();

$encuesta = $_GET['id'];


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
               
  }
} 
 
if (isset($_GET['VOTE'])) {
  switch ($_GET['VOTE']) {
      case '1':
        $mensaje = 'Su voto fue emitido con exito';
        $color = 'success';
          break;
      case '2':
          $mensaje = 'Su voto fue emitido con exito';
          $color = 'success';
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



 <!-- estilos del grafico -->
    <link rel="stylesheet" href="/grafico/css/anychart-font.css">
    <link rel="stylesheet" href="/grafico/css/anychart-ui.min.css">
 
    <!-- script de los graficos -->
    <script src="./grafico/js/anychart-base.min.js"></script>
    <script src="./grafico/js/anychart-ui.min.js"></script>
    <script src="./grafico/js/anychart-exports.min.js"></script>
 
    


<?php 

$sql="SELECT * FROM encuesta WHERE id_encuesta = '$encuesta'";
   $result=$mysqli->query($sql);  

   $row2 = $result->fetch_assoc(); 

if (isset($row2['id_encuesta'])){
   if ($row2['id_encuesta'] !=$encuesta){ 
    
        $sql="INSERT INTO `encuesta`(`id_encuesta`,`id_detalle`,`opcion`,`opcion2`) VALUES ('$encuesta','$encuesta','1','1')";
       $result=$mysqli->query($sql); 
    }
}else{
    $sql="INSERT INTO `encuesta`(`id_encuesta`,`id_detalle`) VALUES ('$encuesta','$encuesta')";
       $result=$mysqli->query($sql); 
} 



$restante= $row['votosmax'] - $row2['votos']; 
$privacidad= $row['privacidad']; 


if (isset($_GET['id']) and isset($_GET['password'])){
    
    echo'  
    <form action="logica/guardar.php?accion=pass" method="POST"> 
    <label class="container control-label">Código de encuesta</label>
    <div class="row">
    <div class="col-1">
                           <input type="text" name="codigo" id="codigo" require="" readonly="" class="ml-5 form-control" value="'.$encuesta.'">
                           <br> </div></div>
    <div class="row">
    <div class="col-7 offset-md-2">
   <div class="card w-100 h-100">
   <div class="card-header">'.$row['nombre'].'
   
   </div>
   <div class="card-body">
   <h5 class="card-title success">No tan rapido !! </h5>
   <h6 class="card-text ">Esta encuesta es privada, por lo tanto solo podras ingresar si el creador te lo ha facilitado !</h5>
   <div class="card-body">
   <div class="container">
   <div class="col-12"><div class="container text-center "> 
   <div class="form-group container ml-4 mt-3" id="contraseña">
   <label for="Contraseña">Contraseña<span style="color:red">*</span> </label>
     <input  name="password" required=""  type="password" class="form-control container col-6" placeholder="Contraseña que tendra la encuesta">  
     </div></div>

     <div class="row">
<button  class="container col-6 btn btn-success" type="submit">Solicitar</button></form>







</div></div></div>
   ';
} else{

if (isset($_GET['id'])) {

    $sql="SELECT * FROM votantes WHERE encuesta ='$encuesta' and id='$usuario'";
    $result=$mysqli->query($sql);  


$row0 = $result->fetch_assoc();   

if ($restante == 0 and $row0 ==NULL){
    echo '<h4 class="font-weight-light text-justify container display-5">La encuesta ha terminado, no se encuentra entre los votantes asi que no puede ver sus resultados.</h6>';
}else {
if ($restante == 0 and $row0 !=NULL){
    echo '<h4 class="font-weight-light text-justify container display-5">La encuesta ha terminado, compruebe los resultados haciendo click <a href="encuesta.php?id='.$row['id_detalle'].'&VOTE='.$row0['voto'].'">AQUI</a></h6>';
}else{

if($row0==NULL){


 echo  '<form action="logica/guardar.php?accion=VOTE" method="POST"> 
 <label class="container control-label">Código de encuesta</label>
 <div class="row">
 <div class="col-1">
                        <input type="text" name="codigo" id="codigo" require="" readonly="" class="ml-5 form-control" value="'.$encuesta.'">
                        <br> </div></div>
 <div class="row">
 <div class="col-7 offset-md-2">
<div class="card w-100 h-100">
<div class="card-header">'.$row['nombre'].'

</div>
<div class="card-body">
<h5 class="card-title">Cuestionante</h5>
<h6 class="card-text ">'.$row['cuestionante'].'</h6>
<div class="card-body">
<div class="container">
 

<div class="row"> 

<div class="col-5">
<div class="card  mb-1" style="max-width: 30rem;">

<div class="card">
<h4 class="card-title container mt-2 ml-8">'.$row['primeraopcion'].'</h4></div>
<div class="card-body">
<img class="container" width="250" height="215" src="data:'.$row['tipoimagen'].';base64,'.base64_encode($row['imagenp']).'">
<br>
</div><input class="mb-3" type="radio" name="opcion" value = "po"></div></div>


<div class="col-5">
<div class="card  mb-1" style="max-width: 30rem;">

<div class="card">
<h4 class="card-title container mt-2 ml-8">'.$row['segundaopcion'].'</h4></div>
<div class="card-body">
<img class="container" width="250" height="215" src="data:'.$row['tipoimagend'].';base64,'.base64_encode($row['imagend']).'">
<br>
</div><input class="mb-3" type="radio" name="opcion" value = "op"></div>

</div>
</div>
</div> 


<button  class="container btn btn-success" type="submit">Votar</button></form>






</div></div>
</div></div></div>
 
'; 
}elseif(isset($_GET['VOTE']) == FALSE) { 
   
    echo '<h4 class="font-weight-light text-justify container display-5">Usted ya a realizado su voto en esta encuesta, compruebe los resultados haciendo click <a href="encuesta.php?id='.$row['id_detalle'].'&VOTE='.$row0['voto'].'">AQUI</a></h6>';
}
}}


if(isset($_GET['id']) and isset($_GET['VOTE']) ){ 

if($_GET['VOTE']==1){
    echo'<h3 class="text-light border border-dark bg-primary w-50 py-2 display-5 text-center container">Tu voto fue por '.$row['primeraopcion'].'</h3>';
}elseif($_GET['VOTE']==2){
    echo'<h3 class="text-light border border-primary bg-success w-50 py-2 display-5 text-center container">Tu voto fue por '.$row['segundaopcion'].'</h3>';
}
 echo'   <style> #container2{
        width: 100%;
        height: 80%;
        margin: 0;
        padding: 0;
    }
    </style>
 

<body>
    
 
    <div id="container2"></div> ';
    ?>  
    
    <?php 

// AQUI SACO LOS VALORES DE SQL QUE QUIERO INGRESAR EN EL GRAFICO Y LOS CONVIERTO EN ARREGLOS
    $opcion1[]=$row['primeraopcion'];
    $opcion2[]=$row['segundaopcion'];
    $voto1[]=$row2['opcion'];
    $voto2[]=$row2['opcion2']; 
    $cuestionante[]=$row['cuestionante']; 

// AQUI CONVIERTO LOS ARREGLOS DE LOS VALORES QUE SAQUE DE SQL EN FORMATO JSON
    $opcioni=json_encode($opcion1) ;
    $opcionii=json_encode($opcion2);
    $votoi=json_encode($voto1);
    $votoii=json_encode($voto2);
    $cuest=json_encode($cuestionante);
 ?>

<!-- AQUI ABRO UNA ETIQUETA SCRIPT Y CREO UNA FUNCION QUE RECORRE LOS ARREGLOS 
Y CONVIERTE TODO LO QUE SEA FORMATO JSON A CODIGO JAVASCRIPT --> 

<script type="text/javascript"> 

// FUNCION
function crearCadenaLineal(json){
    var parsed = JSON.parse(json); 
    var arr= [];
    for(var x in parsed){
        arr.push(parsed[x]);
    } 
    return arr;

}
</script>


<!-- ABRO SCRIPT PARA EMPEZAR A CONVERTIR LOS DATOS -->
<script>  

// UTILIZO LA FUNCION PARA EMPEZAR A CONVERTIR LOS VALORES QUE ESTAN EN FORMATO JSON
// (OJO QUE EN VEZ DE SIMPLEMENTE PASARLE LOS DATOS COMO VARIABLES ABRO LA ETIQUETA PHP 
// Y LOS MANDO A IMPRIMIR Y LUEGO LA CIERRO)

opcion=crearCadenaLineal('<?php echo $opcioni ?>');
opcion2=crearCadenaLineal('<?php echo $opcionii ?>');
voto=crearCadenaLineal('<?php echo $votoi ?>');
voto2=crearCadenaLineal('<?php echo $votoii ?>');
cuestionante=crearCadenaLineal('<?php echo $cuest ?>'); 
 cuestionante=cuestionante.toString(); //ESTO ES PARA CONVERTIR UN ARREGLO DE JAVASCRIPT A TEXTO

anychart.onDocumentReady(function() {
    // crear el grafico
    var chart = anychart.pie();
    // verificar data
    chart.data([
        [opcion, voto],
        [opcion2, voto2]
        
    ]); 
    
 
    // configurar titulo
    chart.title(cuestionante);
    
    // set container id for the chart
    chart.container("container2");
 
    // initiate chart drawing
    chart.draw();
}); 
</script>




<!-- <script src="./grafico/js/data2.js"></script>  -->

<?php 
}}};
include 'partials/menubot.php';

?> 



