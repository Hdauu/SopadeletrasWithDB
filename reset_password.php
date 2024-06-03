<?php
session_start();
include 'conexion.php';

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['Usuario']) && isset($_POST['NuevaClave']) && isset($_POST['ConfirmarClave'])) {
        function validate($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        $Usuario = validate($_POST['Usuario']);
        $NuevaClave = validate($_POST['NuevaClave']);
        $ConfirmarClave = validate($_POST['ConfirmarClave']);

        if (empty($Usuario)) {
            $error = "El usuario no puede estar vacío";
        } else if (empty($NuevaClave)) {
            $error = "La nueva contraseña no puede estar vacía";
        } else if ($NuevaClave !== $ConfirmarClave) {
            $error = "Las contraseñas no coinciden";
        } else {
            $sql = "SELECT * FROM usuarios WHERE Usuario='$Usuario'";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                $hashed_password = password_hash($NuevaClave, PASSWORD_DEFAULT);
                $sql2 = "UPDATE usuarios SET Clave='$hashed_password' WHERE Usuario='$Usuario'";
                $result2 = mysqli_query($conn, $sql2);

                if ($result2) {
                    $success = "Tu contraseña ha sido cambiada exitosamente";
                } else {
                    $error = "Ocurrió un error al cambiar tu contraseña";
                }
            } else {
                $error = "El usuario no existe";
            }
        }
    } else {
        $error = "Por favor complete todos los campos";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cambiar Contraseña</title>
    <link type="image/png" sizes="16x16" rel="icon" href="./img/heart-regular.png">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="js.js"></script>
</head>
<body class="bg-dark">
    <form action="reset_password.php" method="POST">
        <h1>Cambiar Contraseña</h1>
        <?php if (!empty($error)) { ?>
            <p class="error"><?php echo $error; ?></p>
        <?php } ?>
        <?php if (!empty($success)) { ?>
            <p class="success"><?php echo $success; ?></p>
        <?php } ?>
        <hr>
        <div class="input-container">
            <i class="fa-solid fa-user"></i>
            <input type="text" name="Usuario" placeholder="Nombre de usuario">
        </div>
        <hr>
        <div class="input-container" id="is-relative">
            <i class="fa-solid fa-lock"></i>
            <input type="password" name="NuevaClave" placeholder="Nueva contraseña">
            <span id="icon">
                <i class="fa-solid fa-eye" aria-hidden="true"></i>
            </span>
        </div>
        <hr>
        <div class="input-container" id="is-relative">
            <i class="fa-solid fa-lock"></i>
            <input type="password" name="ConfirmarClave" placeholder="Confirme su nueva contraseña">
            <span id="icon">
                <i class="fa-solid fa-eye" aria-hidden="true"></i>
            </span>
        </div>
        <hr>
        <button type="submit">Cambiar Contraseña</button>
        <a href="index.php" style="text-decoration: none; color: #333;">Iniciar Sesion</a>
    </form>
</body>
</html>
