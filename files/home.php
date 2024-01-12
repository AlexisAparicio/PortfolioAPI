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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/Semestral/CSS/sign.css">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <title> Home AD</title>
</head>
<body>
    
    <nav>
        <div class="nav">
            <div class="logo"><h1>Pantalla Principal </h1></div>
                <div class="barnav">
                    <div class="logo">
                    <p><a href="home.php"><img style="width: 125px;height: 60px;object-fit: cover;border-radius:10px;margin-top:10px;"src="./CSS/img/AB_Logo.png" alt="Logo"></a></p>
                    </div>
                <div class="right-links">

                    <?php
                    $id=$_SESSION['id'];
                    $query=mysqli_query($con,"SELECT * FROM user WHERE id='$id'");
                    while($result=mysqli_fetch_assoc($query)){
                        $res_Uname=$result['Username'];
                        $res_Email=$result['Email'];
                        $res_Cargo=$result['Cargo'];
                        $res_id=$result['Id'];
                        
                    }
                    echo "<a href='edit.php? ID=$res_id'>Change Profiles</a>"
                    ?>
                    <a href="home.php">Inicio</a>
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
            <div class="top">
                <div class="box">
                    <p>Hola <b><?php echo $res_Uname ?></b>, Bienvenido</p>
                </div>


                <div class="box">
                    <p>Su cuenta es <b><?php echo $res_Email ?></b>, Bienvenido</p>
                </div>
            </div>
            <div class="bottom">
                <div class="box">
                    <p>Cargo <b><?php echo $res_Cargo ?></b></p>
                </div>
            </div>
        </div>
    </main>




</body>
<!-- Scripts JavaScript (Bootstrap y otros) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</html>