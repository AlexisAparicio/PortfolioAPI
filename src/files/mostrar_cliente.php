<?php
include("php/config.php");


$sql = "CALL obtenerClientes()";
$result = mysqli_query($con, $sql);

if ($result) {
    if (mysqli_num_rows($result) > 0) {
        
        echo "<table class='styled-table'>";
        echo "<thead><tr><th>Cédula</th><th>Código de Médico</th><th>Nombre</th><th>Apellido</th><th>Email</th><th>Edad</th><th>Dirección</th><th>Sede</th></tr></thead><tbody>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['Cedula'] . "</td>";
            echo "<td>" . $row['Codigo_de_medico'] . "</td>";
            echo "<td>" . $row['Nombre'] . "</td>";
            echo "<td>" . $row['Apellido'] . "</td>";
            echo "<td>" . $row['Email'] . "</td>";
            echo "<td>" . $row['Edad'] . "</td>";
            echo "<td>" . $row['Direccion'] . "</td>";
            echo "<td>" . $row['Sede'] . "</td>";
            echo "</tr>";
        }
        echo "</tbody></table>";
    } else {
        echo "No hay Pacientes registrados";
    }
    mysqli_free_result($result);
} else {
    echo "Error al ejecutar el procedimiento almacenado: " . mysqli_error($con);
}

mysqli_close($con);
?>
