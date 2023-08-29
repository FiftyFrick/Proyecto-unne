<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $asignatura = $_POST["asignatura"];
    $documento = file_get_contents($_FILES["documento"]["tmp_name"]);

    // Conexión a la base de datos (reemplaza con tus datos)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "UNNE_Programas";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Insertar los datos en la base de datos
    $sql = "INSERT INTO Programas (asignatura, documento) VALUES ('$asignatura', '$documento')";

    if ($conn->query($sql) === TRUE) {
        echo "Archivo subido y almacenado correctamente.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
