<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.html');
    exit();
}

$servername = "localhost";
$username = "usuario";
$password = "contraseña";
$dbname = "nombre_base_datos";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$sql = "SELECT nombre, email FROM usuarios";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pacientes Registrados</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Pacientes Registrados</h1>
        <a href="monitor.php">Volver</a>
    </header>
    <main>
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Correo Electrónico</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr><td>" . $row["nombre"]. "</td><td>" . $row["email"]. "</td></tr>";
                    }
                } else {
                    echo "<tr><td colspan='2'>No hay pacientes registrados</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </main>
    <footer>
        <p>Proyecto de Monitoreo de Salud</p>
    </footer>
</body>
</html>

<?php
$conn->close();
?>
