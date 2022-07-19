<?php
   function encuesta($id){		
    include('conexion.php');	
    $sql="SELECT * FROM detallencuesta WHERE id_detalle = '$id'";
    return $result=$mysqli->query($sql); 
}
?>