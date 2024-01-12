<?php
session_start();
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
        <div class="logo"><h1>Absolut Developers  </h1>
            <div class="barnav">
                <div><a href="index.html">Inicio</a></div>
                <div><a href="DSIV.html">Proyectos</a></div>
                <div><a href="DSIV.html">Laboratorios</a></div>
                <div><a href="DSIV.html">Sign in</a></div>
            </div>
        </div>
    </nav>

    <div class="container">
    <div class="box form-box">
    <?php 
                
                include("php/config.php");
                if(isset($_POST['submit'])){
                $email = mysqli_real_escape_string($con,$_POST['email']);
                $password = mysqli_real_escape_string($con,$_POST['password']);

                $result = mysqli_query($con,"SELECT * FROM user WHERE Email='$email' AND Password='$password' ") or die("Select Error");
                $row = mysqli_fetch_assoc($result);

                if(is_array($row) && !empty($row)){
                    $_SESSION['valid'] = $row['Email'];
                    $_SESSION['username'] = $row['Username'];
                    $_SESSION['age'] = $row['Age'];
                    $_SESSION['id'] = $row['Id'];
                }else{
                    echo "<div class='message'>
                        <p>Wrong Username or Password</p>
                        </div> <br>";
                    echo "<a href='index.php'><button class='btn'>Go Back</button>";
            
                }
                if(isset($_SESSION['valid'])){
                    header("Location: home.php");
                }
                }else{
            ?>
            <div style="display:flex;
            justify-content:center;">
            <p><a href="home.php"><img style="width: 125px;height: 60px;object-fit: cover;border-radius:10px;
            margin-top:10px;
           "src="./CSS/img/AB_Logo.png" alt="Logo"></a></p></div>
         <header>Ingresar</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" autocomplete="off" required>
                </div>

                <div class="field">
                    
                    <input type="submit" class="btn" name="submit" value="Login" required>
                </div>
                <div class="links">
                    No tienes cuenta? <a href="register.php">Inscribete ahora!</a>
                </div>
            </form>
        </div>
        <?php } ?>
      </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>