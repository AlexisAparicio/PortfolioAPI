<?php
session_start();
include("php/config.php");
if(!isset($_SESSION['valid'])){
    header("location: index.php");
}
?>
<?php
// Si se hace clic en el botón "Ver Citas"
if(isset($_POST['ver_citas'])) {
    // Realiza la consulta para obtener todas las citas
    $sql = "SELECT * FROM Citas";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "<h2>Todas las Citas</h2>";

    } else {
        echo "<p>No hay citas registradas</p>";
    }
}

// Si se hace clic en el botón "Agregar Cita"
if(isset($_POST['agregar_cita'])) {

}

// Si se hace clic en el botón "Buscar Citas"
if(isset($_POST['buscar_citas'])) {
    
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
            <div class="logo"><h1>REGISTROS </h1></div>
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
            
        </div>

        <!-- Botones para ver/agregar/buscar citas -->
        <div class="btn-group">
            <form method="post">
                <button type="submit" class="btn btn-primary" name="ver_citas">Ver Citas</button>
                <button type="submit" class="btn btn-success" name="agregar_cita">Agregar Cita</button>
                <button type="submit" class="btn btn-info" name="buscar_citas">Buscar Citas</button>
            </form>
        </div>
    </main>

</body>
<!-- Scripts JavaScript (Bootstrap y otros) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</html>