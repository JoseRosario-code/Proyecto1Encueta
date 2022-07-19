<?php  
require "./logica/conexion.php";
$name=$_POST['name']; 
$un=$_POST['name'];
$email=$_POST['email'];
$password=$_POST['password'];
$cpassword=$_POST['cpassword']; 

if($name and $email and $password and $cpassword) {
    if($password == $cpassword){
        $sql="INSERT INTO `usuarios`( 
        `usuario`, 
        `correo`, 
        `password`, 
        `nombre`, 
        `tipo_usuario`) VALUES 
        ('$name',
        '$email',
        SHA1('$password'),
        '$un',
        '2')";
    }
if ($mysqli->query($sql)) {
    $msj ='successins'; 
    header("Location: login.php?s=".$msj); 
} else {
   $msj ='errorins'; 
   header("Location:  register.php?s=".$msj); 
}}else{$msj ='errorins'; 
header("Location:  register.php?s=".$msj);}
   //echo("Descripcion de Error: " .mysqli_error($mysqli));
   



?>