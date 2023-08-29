<?php
// Conexión a la base de datos (reemplaza con tus datos)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "UNNE_Programas";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta para obtener los datos de la tabla Programas
$sql = "SELECT id_programa, asignatura, id_carrera, id_plan, cuatrimestre, Responsable, Resolucion_CD, fecha_resolucion, documento FROM Programas";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Programas</title>
</head>
<body>
    <h1>Programas</h1>
    <table border="1">
        <tr>
            <th>ID Programa</th>
            <th>Asignatura</th>
            <th>ID Carrera</th>
            <th>ID Plan</th>
            <th>Cuatrimestre</th>
            <th>Responsable</th>
            <th>Resolución CD</th>
            <th>Fecha Resolución</th>
            <th>Documento</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) : ?>
            <tr>
                <td><?php echo $row["id_programa"]; ?></td>
                <td><?php echo $row["asignatura"]; ?></td>
                <td><?php echo $row["id_carrera"]; ?></td>
                <td><?php echo $row["id_plan"]; ?></td>
                <td><?php echo $row["cuatrimestre"]; ?></td>
                <td><?php echo $row["Responsable"]; ?></td>
                <td><?php echo $row["Resolucion_CD"]; ?></td>
                <td><?php echo $row["fecha_resolucion"]; ?></td>
                <td><?php echo $row["documento"]; ?> <a href="pdf_viewer.html">ver documento</a></td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>

<?php
$conn->close();
?>
