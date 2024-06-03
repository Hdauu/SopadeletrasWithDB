<?php
session_start();
include 'conexion.php';

if (!isset($_SESSION['Usuario'])) {
    header("Location: index.php");
    exit();
}

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['Nombre_Completo']) && isset($_POST['Usuario'])) {
        function validate($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        $Nombre_Completo = validate($_POST['Nombre_Completo']);
        $Usuario = validate($_POST['Usuario']);

        if (empty($Nombre_Completo)) {
            $error = "Por favor complete todos los campos";
        } else if (empty($Usuario)) {
            $error = "El usuario no puede estar vacío";
        } else {
            $sql = "UPDATE usuarios SET Nombre_Completo='$Nombre_Completo', Usuario='$Usuario' WHERE Id='" . $_SESSION['Id'] . "'";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                $_SESSION['Usuario'] = $Usuario;
                $_SESSION['Nombre_Completo'] = $Nombre_Completo;
                $success = "Perfil actualizado exitosamente";
            } else {
                $error = "Ocurrió un error al actualizar tu perfil";
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
    <title>Modificar Perfil</title>
    <link type="image/png" sizes="16x16" rel="icon" href="./img/heart-regular.png">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="js.js"></script>
</head>

<body class="bg-dark">
    <form action="profile.php" method="POST">
        <h1>Modificar Perfil</h1>
        <?php if (!empty($error)) { ?>
            <p class="error"><?php echo $error; ?></p>
        <?php } ?>
        <?php if (!empty($success)) { ?>
            <p class="success"><?php echo $success; ?></p>
        <?php } ?>
        <hr>
        <div class="input-container">
            <i class="fa-solid fa-user"></i>
            <input type="text" name="Usuario" placeholder="Nombre de usuario" value="<?php echo $_SESSION['Usuario']; ?>">
        </div>
        <hr>
        <div class="input-container">
            <i class="fa-solid fa-user"></i>
            <input type="text" name="Nombre_Completo" placeholder="Nombre completo" value="<?php echo $_SESSION['Nombre_Completo']; ?>">
        </div>
        <hr>
        <button type="submit">Actualizar Perfil</button>
        <a href="./SopaDeLetras/sopadeletras.php" style="text-decoration: none; color: #333;">Volver</a>
    </form>
</body>

</html>
