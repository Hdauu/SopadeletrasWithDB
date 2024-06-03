<?php
session_start();
include 'conexion.php';

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['Nombre_Completo']) && isset($_POST['Usuario']) && isset($_POST['Clave']) && isset($_POST['ConfirmarClave'])) {
        function validate($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        $Nombre_Completo = validate($_POST['Nombre_Completo']);
        $Usuario = validate($_POST['Usuario']);
        $Clave = validate($_POST['Clave']);
        $ConfirmarClave = validate($_POST['ConfirmarClave']);

        if (empty($Nombre_Completo)) {
            $error = "Por favor complete todos los campo";
        } else if (empty($Usuario)) {
            $error = "El usuario no puede estar vacío";
        } else if (empty($Clave)) {
            $error = "La contraseña no puede estar vacía";
        } else if ($Clave !== $ConfirmarClave) {
            $error = "Las contraseñas no coinciden";
        } else {
            $hashed_password = password_hash($Clave, PASSWORD_DEFAULT);
            $sql = "SELECT * FROM usuarios WHERE Usuario='$Usuario'";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                $error = "El usuario ya existe";
            } else {
                $sql2 = "INSERT INTO usuarios(Nombre_Completo, Usuario, Clave) VALUES('$Nombre_Completo', '$Usuario', '$hashed_password')";
                $result2 = mysqli_query($conn, $sql2);
                if ($result2) {
                    $success = "Tu cuenta ha sido creada exitosamente";
                } else {
                    $error = "Ocurrió un error al crear tu cuenta";
                }
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
    <title>Registro</title>
    <link type="image/png" sizes="16x16" rel="icon" href="./img/heart-regular.png">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="js.js"></script>
</head>

<body class="bg-dark">
    <form action="register.php" method="POST">
        <h1>Registrate</h1>
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
        <div class="input-container">
            <i class="fa-solid fa-user"></i>
            <input type="text" name="Nombre_Completo" placeholder="Nombre completo">
        </div>
        <hr>
        <div class="input-container" id="is-relative">
            <i class="fa-solid fa-lock"></i>
            <input type="password" name="Clave" placeholder="Digite su contraseña">
            <span id="icon">
                <i class=" fa-solid fa-eye" aria-hidden="true"></i>
            </span>
        </div>
        <hr>
        <div class="input-container" id="is-relative">
            <i class="fa-solid fa-lock"></i>
            <input type="password" name="ConfirmarClave" placeholder="Confirme su contraseña">
            <span id="icon">
                <i class=" fa-solid fa-eye" aria-hidden="true"></i>
            </span>
        </div>
        <hr>
        <button type="submit">Registrarse</button>
        <a href="index.php" style="text-decoration: none; color: #333;">Iniciar Sesion</a>
    </form>
</body>

</html>