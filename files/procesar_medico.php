    <?php
    session_start();
    include("php/config.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtener datos del formulario
        $cedula = $_POST['cedula'];
        $codigo = $_POST['codigo'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $cargo = $_POST['cargo'];
        $departamento = $_POST['departamento'];
        $sede = $_POST['sede'];

        // Consulta SQL para insertar datos en la tabla 'medicos'
        $sql = "INSERT INTO medicos (Cedula, Codigo_de_medico, Nombre, Apellido, Cargo, Departamento, Sede) 
                VALUES ('$cedula', '$codigo', '$nombre', '$apellido', '$cargo', '$departamento', '$sede')";

        // Ejecutar consulta y verificar si fue exitosa
        if (mysqli_query($con, $sql)) {
            echo "Nuevo médico agregado exitosamente";
            echo "<a href='javascript:self.history.back()'><button class='btn-new'>Regresar</button>";
        } else {
            echo "Error al agregar el médico: " . mysqli_error($con);
            echo "<a href='javascript:self.history.back()'><button class='btn-new'>Regresar</button>";
        }

        // Cerrar conexión a la base de datos
        mysqli_close($con);
    }
    ?>
