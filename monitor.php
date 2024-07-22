<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.html');
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monitor de Salud</title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <header>
        <h1>Bienvenido, <?php echo $_SESSION['user_name']; ?></h1>
        <a href="logout.php">Cerrar Sesión</a>
        <a href="pacientes.php">Ver Pacientes Registrados</a>
    </header>
    <main>
        <section id="temperatureSection">
            <h2>Control de Temperatura</h2>
            <div class="card">
                <h3>Temperatura Corporal</h3>
                <p id="tempValue">Cargando...</p>
            </div>
        </section>

        <section id="pulseSection">
            <h2>Ritmo Cardíaco</h2>
            <div class="card">
                <h3>Ritmo Cardíaco Actual</h3>
                <p id="pulseValue">Cargando...</p>
            </div>
            <div class="card">
                <h3>Gráfico de Ritmo Cardíaco</h3>
                <canvas id="pulseChart" width="400" height="200"></canvas>
            </div>
        </section>
    </main>
    <footer>
        <p>Proyecto de Monitoreo de Salud</p>
    </footer>
    <script src="script.js"></script>
</body>
</html>
