<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/Style.css">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="/Semestral/CSS/sign.css">
    <title> Register AD</title>
</head>
<body>
    <nav>
        <div class="logo"><h1>Absolut Developer  </h1></div>
    </nav>

    <div class="container">
    <div class="box form-box">

    <?php
    include("php/config.php");
    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $age = $_POST['age'];
        $cargo = $_POST['cargo'];

        $verify_query=mysqli_query($con,"SELECT Email FROM user WHERE email='$email'");
        if(mysqli_num_rows($verify_query)>0){
            echo "<div class='message'>
                        <p> Correo en uso, intente otro correo</p>
                    </div><br>";
                    echo "<a href='javascript:self.history.back()'><button class='btn-new'>Regresar</button>";
        }
        else{
            mysqli_query($con,"INSERT INTO user (username,email,password,age,cargo) 
            VALUES ('$username','$email','$password','$age','$cargo')")or die("No se pudo registrar el usuario");
            echo "<div class='message'>
                        <p> Cuenta registrada exitosamente</p>
                    </div><br>";
                    echo "<a href='index.php'><button class='btn-new'>Iniciar sesion</button>";
        }
    } else{
    ?>
    
        <header>Sign Up</header>
        <form action="" method="post">
            <div class="field input">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" required>
            </div>

            <div class="field input">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" autocomplete="off" required>
            </div>

            <div class="field input">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" autocomplete="off" required>
            </div>
            
            <div class="field input">
                <label for="age">Age</label>
                <input type="number" name="age" id="age" autocomplete="off" required>
            </div>

            <div class="field input">
                <label for="cargo">Cargo</label>
                <input type="text" name="cargo" id="cargo" autocomplete="off" required>
            </div>

            <div class="field ">
                <input type="submit" class="btn" name="submit" value="register" required>
            </div>

            <div class="links">
                Already a member? <a href="index.php">Sign In</a>
            </div>
        </form>
    </div>
    <?php
    }
    ?>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>