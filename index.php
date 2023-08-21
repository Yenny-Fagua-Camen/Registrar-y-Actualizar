<?php
include("connection.php");
$con = connection();


$sql = "SELECT * FROM usuarios";
$query = mysqli_query($con, $sql); 


?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UNIDAD</title>
    <link rel="stylesheet" href="CSS/Estilo.css">
</head>
<body>

    <div class="users-form">
        <h1>crear usuario</h1>
        <form action="insert_user.php" method="POST">
            <input type="text" name="name" placeholder="Nombre">
            <input type="text" name="lastname" placeholder="Apellidos"> 
            <input type="text" name="username" placeholder="username">
            <input type="password" name="password" placeholder="Contraseña">
            <input type="email" name="email" placeholder="Email">

            <input type="submit" value="Agregar"> 
        </form>
    </div>
    

    <div class="users-table">
    <h2>Usuarios Registrados</h2>
    <table>
    <thead>
       <tr>
          <th>ID</th>
          <th>Nombre</th>
          <th>Apellido</th>
          <th>username</th>
          <th>Password</th>
          <th>email</th>
         
        </tr>
    </thead>
    <tbody>

    <?php
        $consulta = "SELECT * FROM users";
        $resultado = mysqli_query($con, $consulta);
        if (!$resultado) {
            die("Error en la consulta: " . mysqli_error($con));
        }
        while ($row = mysqli_fetch_assoc($resultado)) {
            echo "<tr>";
            echo "<td>{$row['id']}</td>";
            echo "<td>{$row['name']}</td>";
            echo "<td>{$row['lastname']}</td>";
            echo "<td>{$row['username']}</td>";
            echo "<td>{$row['password']}</td>";
            echo "<td>{$row['email']}</td>";
           
            
            echo "<td class='users-table--actions'>
            <a href='update.php?id={$row['id']}'><button class='editar-button'>Editar</button></a>
            <a href='delete_user.php?id={$row['id']}'><button class='eliminar-button'>Eliminar</button></a>
          </td>";
    
            
        }
        ?>
        <tr>
       
        
        </tr>
    </tbody>
</table>

</tr>
</div>

</body>
</html>

