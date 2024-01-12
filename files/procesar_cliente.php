<?php
session_start();
include("php/config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener datos del formulario
    $cedula = $_POST['cedula'];
    $codigo = $_POST['codigo'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $edad = $_POST['edad'];
    $direccion = $_POST['direccion'];
    $sede = $_POST['sede'];

    // Consulta SQL para insertar datos en la tabla 'Clientes'
    $sql = "INSERT INTO Clientes (Cedula, Medico, Nombre, Apellido, email, edad, Direccion, Sede) 
            VALUES ('$cedula', '$codigo', '$nombre', '$apellido', '$email','$edad', '$direccion', '$sede')";

    // Ejecutar consulta y verificar si fue exitosa
    if (mysqli_query($con, $sql)) {
        echo "Nuevo Paciente agregado exitosamente";
        echo "<a href='javascript:self.history.back()'><button class='btn-new'>Regresar</button>";
    } else {
        echo "Error al agregar el Paciente: " . mysqli_error($con);
        echo "<a href='javascript:self.history.back()'><button class='btn-new'>Regresar</button>";
    }

    // Cerrar conexión a la base de datos
    mysqli_close($con);
}
?>
