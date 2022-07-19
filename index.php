

  <?php require 'partials/menuhead.php'?> 

        <!-- Begin Page Content -->
        <div class="container-fluid">
<?php if($tipo_usuario ==1){ 
  $sql="SELECT * FROM usuarios";
  $result=$mysqli->query($sql); 

  echo '<table class="table table-striped">
  <thead class="thead-dark">
  <caption>Lista de usuarios</caption>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nombre </th>
      <th scope="col">Correo</th>
      <th scope="col">Privilegios de Usuario</th>
    </tr>
  </thead>
  <tbody>';
  while ($row = $result->fetch_assoc()) { 
    echo" 
    
    <tr>
        <td escope='row'>".$row['id']."</td>
        <td>".$row['usuario']."</td>
        <td>".$row['correo']."</td>
        <td>".$row['tipo_usuario']."</td>
    </tr>
  </tbody>";
}}  

if($tipo_usuario ==2){
  echo"
  <div class='container'>
  <h6 class='display-1 '>Hola de nuevo ".$nombre."!!</h6></div>";
 }?> 

       

        
  
            
      <?php require 'partials/menubot.php'?> 