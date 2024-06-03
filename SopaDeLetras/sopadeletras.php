<?php
session_start();

if (!isset($_SESSION['Usuario'])) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sopa de Letras</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link type="image/png" sizes="16x16" rel="icon" href="./img/icons8-controlador-xbox-16.png">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div style="display: flex; align-items: center; ">
            <div style="margin-right: 10px;">
                <a href="../profile.php"><i class="fa-solid fa-2x fa-address-card" style="color: white;"></i></a>
            </div>
            <h1 style="margin-right: 10px;">Bienvenido <?php echo $_SESSION['Nombre_Completo']; ?></h1>
            <a class="btn btn-agregar a" style="text-decoration: none; border: none;" href="../logout.php" role="button">Cerrar sesión</a>
        </div>
        <div id="palabraDiv">
            <input class="input" type="text" id="entradaPalabra" placeholder="Ingrese una palabra">
            <button class="btn btn-agregar" onclick="agregarPalabra()">Agregar Palabra</button>
            <button class="btn btn-iniciar" onclick="iniciarJuego()">Iniciar Juego</button>
        </div>
        <div id="gameContainer">
            <div id="listaPalabrasContainer">
                <div id="listaPalabras"></div>
            </div>
            <div id="sopaDeLetras"></div>
        </div>
    </nav>
    <script src="js.js"></script>
</body>

</html>