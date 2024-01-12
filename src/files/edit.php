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
    <title>Cambiar Perfil</title>
</head>
<body>
    <nav>
        <div class="nav">
            <div class="logo"><h1>Editar Perfil </h1></div>
                <div class="barnav">
                    <div class="logo">
                        <p><a href="home.php"><img src="./CSS/img/AB_Logo.png" width="70px" height="50px" alt="Logo"></a></p>
                    </div>
                <div class="right-links">
                    <a href="index.php">Inicio</a>
                    <a href="#">Cambiar Datos de Perfil</a>
                    <a href="php/logout.php"> <button class="btn-new">Log Out</button></a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="box form-box">
        <?php 
            if(isset($_POST['submit'])){
                $username = $_POST['username'];
                $email = $_POST['email'];
                $age = $_POST['age'];

                $id = $_SESSION['id'];

                $edit_query = mysqli_query($con,"UPDATE user SET Username='$username', Email='$email', Age='$age' WHERE Id=$id ") or die("error occurred");

                if($edit_query){
                    echo "<div class='message'>
                    <p>Profile Updated!</p>
                </div> <br>";
            echo "<a href='home.php'><button class='btn'>Go Home</button>";
                }
            }else{

                $id = $_SESSION['id'];
                $query = mysqli_query($con,"SELECT*FROM user WHERE Id=$id ");

                while($result = mysqli_fetch_assoc($query)){
                    $res_Uname = $result['Username'];
                    $res_Email = $result['Email'];
                    $res_Age = $result['Age'];
                }

            ?>
            <header>Cambiar Perfil</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="username">Nombre</label>
                    <input type="text" name="username" id="username" value="<?php echo $res_Uname;?>" required>
                </div>
    
                <div class="field input">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" value="<?php echo $res_Email;?>"autocomplete="off" required>
                </div>
                
                <div class="field input">
                    <label for="age">Edad</label>
                    <input type="number" name="age" id="age" value="<?php echo $res_Age;?>" autocomplete="off" required>
                </div>
    
                <div class="field ">
                    <input type="submit" class="btn" name="submit" value="Update" required>
                </div>
    
                <div class="links">
                    Regresar al inicio <a href="index.html">Ingresa</a>
                </div>
            </form>
        </div>
        <?php } ?>
        </div>
</body>
</html>