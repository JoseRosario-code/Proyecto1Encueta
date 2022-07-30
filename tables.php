<?php require 'partials/menuhead.php'  ; 

$mensaje = '';
$color = '';

if (isset($_GET['s'])) {
	switch ($_GET['s']) {   
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

$sql="SELECT * FROM `detallencuesta` WHERE estado = 'a'";
   $result=$mysqli->query($sql);   


   
  ?>

    <script src="./TABLA/js/jquery-3.5.1.min.js"></script>
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>


    

<!-- Botones -->



 <script type= "text/javascript">
    $(document).ready( function () {
    $('#example').DataTable({
        "iDisplayLength": 10 
    });
    } );
    </script>
</head>

<body>  

<?php 

if ($result->num_rows >0){
  echo '
    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th escope="row">ID</th>
				<th>Nombre</th> 
                <th>Cuestionante</th>
                <th>Votos Maximos</th>
				<th>Privacidad</th>  
				<th></th>';
				
				echo"
            </tr>
        </thead>
		<tbody>";
		while ($row = $result->fetch_assoc()) {  
		
   
			echo" 
            <tr>
			<td>#".$row['id_detalle']."</td>
			<td>".$row['nombre']."</td> 
			<td>".$row['cuestionante']."</td>
			<td>".$row['votosmax']."</td>
			<td>".$row['privacidad']."</td> 
			"; 
			
			
		      if($row['privacidad'] == 'si'){
				echo "<td> <a data-toggle='modal' data-target='#exampleModalCenter' title='Contrasena' href='encuesta.php?id=".$row['id_detalle']."&password=1' class='btn btn-success'> <img src='img/ojo.png' width=34px /> </a> 
				" ;
			  }else{
			echo "<td> <a data-toggle='tooltip' title='Ver' href='encuesta.php?id=".$row['id_detalle']."' class='btn btn-success'> <img src='img/ojo.png' width=34px /> </a> ";};
			if ($tipo_usuario == 1){
				echo"
				 <a data-toggle='tooltip' title='Borrar' href='logica/guardar.php?accion=DLT2&id=".$row['id_detalle']."' class='btn btn-danger'> <img src='img/basura.png' width=34px /> </a></td>";
			}
            ;} ?>
            </tr>
        </tbody>
        <tfoot>
            <tr>
			<th>ID</th>
				<th>Nombre</th> 
                <th>Cuestionante</th>
                <th>Votos Maximos</th>
				<th>Privacidad</th>  
				<th></th>
		<th></th><?php }else{
			echo'
			<div class="row">
        <div class="col-md-12 col-xl-12 col-sm-4  container fas fa-sad-tear" style="color: grey;font-size: 300px; text-align: center;"> 
        <h3 class="display-4">Aun no hay encuestas</h6></div>
      </div>';
			
			}?>
            </tr>
        </tfoot>
    </table>
	<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
</body> 

 
</html>