<?php
include('conexion.php'); 
session_start(); 

    // rest of your code...

$usuario=  $_SESSION['id'];

// INS | UDT | DLT

$i = '';
if (isset($_GET['accion'])) {
    $i = $_GET['accion'];
}

if (isset($_GET['id'])) {
    $codigo = $_GET['id'];

}

if ($i == 'INS') {

$_SESSION['nombreEnc'] = $_POST['nombre']; 
$_SESSION['descripcionEnc']     = $_POST['descripcion'];
$_SESSION['cuestionanteEnc']     = $_POST['cuestionante'];
$_SESSION['votantesEnc']     = $_POST['votantes']; 
$_SESSION['privacidadEnc']     = $_POST['privacidad'];

    $_SESSION['contrasena']     = $_POST['contraseña']; 



if (isset($_SESSION['nombreEnc']) && isset($_SESSION['descripcionEnc']) && isset($_SESSION['cuestionanteEnc']) && isset($_SESSION['votantesEnc']) && isset($_SESSION['privacidadEnc'])  ){
header("location: ../crear3.php");

return;
}}
if ($i == 'INS2') {
$_SESSION['opcionEnc']     = $_POST['opcion'];

$_SESSION['tipoarchivo']=$_FILES['imagenp']['type'];
$_SESSION['nombrearchivo']=$_FILES['imagenp']['name'];
$tamanoarchivo=$_FILES['imagenp']['size']; 
$imagenp=fopen($_FILES['imagenp']['tmp_name'],'r'); 
$binariosimagen=fread($imagenp,$tamanoarchivo); 
$_SESSION['binarios']=mysqli_escape_string($mysqli, $binariosimagen);


if (isset($_SESSION['nombreEnc']) && isset($_SESSION['descripcionEnc']) && isset($_SESSION['cuestionanteEnc']) 
&& isset($_SESSION['votantesEnc']) && isset($_SESSION['privacidadEnc']) && isset($_SESSION['opcionEnc'])  ){
    
    header("location: ../crear4.php"); }

}
if ($i == 'INS3') {
    $_SESSION['opciondEnc']     = $_POST['opciond'];

    $_SESSION['tipoarchivod']=$_FILES['imagend']['type'];
$_SESSION['nombrearchivod']=$_FILES['imagend']['name'];
$tamanoarchivo=$_FILES['imagend']['size']; 
$imagend=fopen($_FILES['imagend']['tmp_name'],'r'); 
$binariosd=fread($imagend,$tamanoarchivo); 
$_SESSION['binariosd']=mysqli_escape_string($mysqli, $binariosd);
    
    if (isset($_SESSION['nombreEnc']) && isset($_SESSION['descripcionEnc']) && isset($_SESSION['cuestionanteEnc']) 
    && isset($_SESSION['votantesEnc']) && isset($_SESSION['privacidadEnc']) && isset($_SESSION['opcionEnc']) && isset($_SESSION['opciondEnc'])  ){
       
       $msj = '';
       $nombre         = $_SESSION['nombreEnc'];
       $descripcion      = $_SESSION['descripcionEnc'];
       $cuestionante     = $_SESSION['cuestionanteEnc'];
       $votantes        = $_SESSION['votantesEnc'];
       $privacidad   = $_SESSION['privacidadEnc'];  
       $tipoimagenp = $_SESSION['tipoarchivo']   ;
       $imagenp = $_SESSION['binarios'];
       $opcion  = $_SESSION['opcionEnc']; 
       $opciond  = $_SESSION['opciondEnc'];
       $imagend = $_SESSION['binariosd']   ;  
       $tipoimagend = $_SESSION['tipoarchivod']   ;
       $contrasena = $_SESSION['contrasena']   ;
         
    //    $imagenp = addslashes(file_get_contents($_FILES['imagenp']['tmp_name'])); 
    //    $imagend = addslashes(file_get_contents($_FILES['imagend']['tmp_name']));
    //    $contra  = $_SESSION['contraseñaEnc'];
     
   $sql="INSERT INTO `detallencuesta`
   (`nombre`, 
   `id_usuario`, 
   `descripcion`, 
   `cuestionante`, 
   `votosmax`, 
   `privacidad`,
   `primeraopcion`,
   `imagenp`,
   `tipoimagenp`,
   `imagend`,
   `tipoimagend`,
   `segundaopcion`,
   `estado`, 
   `contrasenaenc`) VALUES 
   ('$nombre', 
   '$usuario',
   '$descripcion',
   '$cuestionante',
   '$votantes',
   '$privacidad',
   '$opcion',
   '$imagenp',
   '$tipoimagenp',
   '$imagend',
   '$tipoimagend',
   '$opciond',
   'A',
   SHA1('$contrasena'))"; 
       
   if ($mysqli->query($sql)) {
        $msj ='successins'; 


   } else {
       $msj ='errorins';
   }
       echo("Descripcion de Error: " .mysqli_error($mysqli)); 
       unset ($_SESSION['nombreEnc']) ; 
unset($_SESSION['descripcionEnc'] )   ;
unset($_SESSION['cuestionanteEnc']   )  ;
unset($_SESSION['votantesEnc'] )  ; 
unset($_SESSION['privacidadEnc'] )   ;
unset($_SESSION['opcionEnc'] )    ;
unset($_SESSION['opciondEnc'] )   ; 

       header("Location: ../misencuestas.php?s=".$msj);  
   
}
}
// if (isset($_SESSION['nombreEnc']) && isset($_SESSION['descripcionEnc']) && isset($_SESSION['cuestionanteEnc']) && isset($_SESSION['votantesEnc']) && isset($_SESSION['privacidadEnc'])){
//     header("location: ../crear4.php");
// }else{
//     echo "error";
// }

if ($i == 'pass') {
    $codigo = $_POST['codigo'];
    $contrasena = $_POST['password'];
    $sql= "SELECT * FROM `detallencuesta` WHERE id_detalle = $codigo";
    $result=$mysqli->query($sql); 
    $row = $result->fetch_assoc(); 
    $contrabd=$row['contrasenaenc'];
    $pass_c = sha1($contrasena);
    if ($pass_c == $contrabd){
        header("Location: ../encuesta.php?id=".$codigo);
    }else{
        header("Location: ../encuesta.php?id=".$codigo."&password=2");
 }}


if ($i == 'VOTE') { 
    $encuesta =$_POST['codigo'];
    if (isset($_POST['opcion'])) {  
        $op= $_POST['opcion']; 
        $encuesta =$_POST['codigo'];
        
        if ($op == 'po') {
            $opcion="UPDATE encuesta SET opcion=opcion+1,votos=opcion+opcion2 WHERE id_encuesta = '$encuesta'";
       $result=$mysqli->query($opcion);  
         $sql="INSERT INTO `votantes`(`encuesta`, `id`, `voto`) VALUES ('$encuesta','$usuario', '1')"; 
         $result=$mysqli->query($sql); 
      
    
       header("Location: ../encuesta.php?id=".$encuesta."&VOTE=1");
      
            
       }else{
            $opcion="UPDATE encuesta SET opcion2=opcion2+1,votos=opcion+opcion2 WHERE id_encuesta = '$encuesta'";
       $result=$mysqli->query($opcion);  
       $sql="INSERT INTO `votantes`(`encuesta`, `id`, `voto`) VALUES ('$encuesta','$usuario', '2')"; 
         $result=$mysqli->query($sql); 
       header("Location: ../encuesta.php?id=".$encuesta."&VOTE=2");
        }
    } 
   
} 
if ($i == 'DLT') {    
    $sql="
    UPDATE `detallencuesta` SET
    `estado` = 'I'
    WHERE `id_detalle` = '$codigo'
    ";

    if ($mysqli->query($sql)) {
        $msj ='successdlt';
    } else {
        $msj ='errordlt';
    }
    // echo("Descripcion de Error: " .mysqli_error($mysqli));
    header("Location: ../misencuestas.php?s=".$msj);
}
 
if ($i == 'DLT2') {    
    $sql="
    UPDATE `detallencuesta` SET
    `estado` = 'I'
    WHERE `id_detalle` = '$codigo'
    ";

    if ($mysqli->query($sql)) {
        $msj ='successdlt';
    } else {
        $msj ='errordlt';
    }
    // echo("Descripcion de Error: " .mysqli_error($mysqli));
    header("Location: ../tables.php?s=".$msj);
}


?>