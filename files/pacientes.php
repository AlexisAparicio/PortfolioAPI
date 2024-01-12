<?php
session_start();
include("php/config.php");
if(!isset($_SESSION['valid'])){
    header("location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/Style.css">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="/Semestral/CSS/sign.css">
    <title> Home AD</title>
</head>
<body>
    <nav>
        <div class="nav">
            <div class="logo"><h1>PACIENTES </h1></div>
                <div class="barnav">
                    <div class="logo">
                    <p><a href="home.php"><img src="./CSS/img/AB_Logo.png" width="70px" height="50px" alt="Logo"></a></p>
                    </div>
                <div class="right-links">

                    <?php
                    $id=$_SESSION['id'];
                    $query=mysqli_query($con,"SELECT * FROM user WHERE id='$id'");
                    while($result=mysqli_fetch_assoc($query)){
                        $res_Uname=$result['Username'];
                        $res_Email=$result['Email'];
                        $res_Age=$result['Age'];
                        $res_id=$result['Id'];
                        
                    }
                    echo "<a href='edit.php? ID=$res_id'>Change Profiles</a>"
                    ?>
                    <a href="index.php">Inicio</a>
                    <a href="php/logout.php"> <button class="btn">Log Out</button></a>
                </div>
            </div>
        </div>
    </nav>

    <div class="d-flex" style="height: 100vh;">
    <!-- Barra lateral colapsable -->
    <div class="bg-dark text-white p-4" style="width: 250px;">
      <h2>Menu</h2>
      <button class="btn btn-dark d-block d-lg-none mb-3" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
        Mostrar/ocultar
      </button>
      <div class="collapse d-lg-block" id="collapseExample">
        <ul class="list-unstyled">
          <li><a href="home.php" class="text-white">Inicio</a></li>
          <li><a href="medicos.php" class="text-white">Medicos</a></li>
          <li><a href="pacientes.php" class="text-white">Clientes</a></li>
          <li><a href="Citas.php" class="text-white">Registrar Citas</a></li>
          
        </ul>
      </div>
    </div>

    <main>
    <div class="main-box">
        
        <div class="bottom">
            
                <!-- Botones para ver y agregar clientes -->
                <button onclick="mostrarClientes()">Ver Clientes</button>
                <button onclick="mostrarFormulario()">Agregar Cliente</button>
                <div id="resultado"></div>
        </div>
    </div>
</main>



<script>
    function mostrarClientes() {
        // Realizar una petición AJAX para obtener los clientes de la base de datos y mostrarlos en una tabla
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("resultado").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "mostrar_cliente.php", true);
        xmlhttp.send();
    }

    function mostrarFormulario() {
        
        document.getElementById("resultado").innerHTML = `
        <form action="procesar_cliente.php" method="post">
                    <label for="cedula">Cédula:</label>
                    <input type="text" name="cedula" id="cedula" required><br>

                    <label for="codigo">Código de Médico:</label>
                    <input type="text" name="codigo" id="codigo" required><br>

                    <label for="nombre">Nombre:</label>
                    <input type="text" name="nombre" id="nombre" required><br>

                    <label for="apellido">Apellido:</label>
                    <input type="text" name="apellido" id="apellido" required><br>

                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" required><br>

                    <label for="edadd">edad:</label>
                    <input type="age" name="edad" id="edad" required><br>

                    <label for="Direccion">Direccion:</label>
                    <input type="text" name="direccion" id="direccion" required><br>

                    <label for="sede">Sede:</label>
                    <input type="text" name="sede" id="sede" required><br>

                    <input type="submit" value="Agregar Paciente">
                </form>

        `;
    }
</script>
</body>
<!-- Scripts JavaScript (Bootstrap y otros) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</html>