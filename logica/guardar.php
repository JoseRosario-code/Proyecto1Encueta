<?php
include('conexion.php'); 
session_start(); 

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
    $msj = '';
    $nombre         = $_POST['nombre'];
    $descripcion      = $_POST['descripcion'];
    $cuestionante     = $_POST['cuestionante'];
    $votantes        = $_POST['votantes'];
    $privacidad   = $_POST['privacidad'];  
    $opcion  = $_POST['opcion']; 
    $opciond  = $_POST['opciond'];  
    $colorp  = $_POST['colorp']; 
    $colord  = $_POST['colord'];  
    $imagenp = addslashes(file_get_contents($_FILES['imagenp']['tmp_name'])); 
    $imagend = addslashes(file_get_contents($_FILES['imagend']['tmp_name']));
    $contra  = $_POST['contraseña'];
  
$sql="INSERT INTO `detallencuesta`
(`nombre`, 
`id_usuario`, 
`descripcion`, 
`cuestionante`, 
`votosmax`, 
`privacidad`,
`primeraopcion`,
`colorp`,
`imagenp`,
`segundaopcion`,
`colord`,
`imagend`,
`estado`,
`contraseña`) VALUES 
('$nombre', 
'$usuario',
'$descripcion',
'$cuestionante',
'$votantes',
'$privacidad',
'$opcion',
'$colorp',
'$imagenp',
'$opciond',
'$colord',
'$imagend',
'A',
'$contra')"; }
    
if ($mysqli->query($sql)) {
     $msj ='successins';
} else {
    $msj ='errorins';
}
    //echo("Descripcion de Error: " .mysqli_error($mysqli));
    header("Location: ../misencuestas.php?s=".$msj);  



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