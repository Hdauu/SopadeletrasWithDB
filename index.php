<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesion</title>
    <link type="image/png" sizes="16x16" rel="icon" href="./img/heart-solid.png">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="js.js"></script>
</head>
<body class="bg-dark">
    <form action="login.php" method="POST">
        <h1>Iniciar Sesion</h1>
        <?php if (isset($_GET['error'])) { ?>
            <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>
        <hr>
        <div class="input-container">
            <i class="fa-solid fa-user"></i>
            <input type="text" name="Usuario" placeholder="Nombre de usuario">
        </div>
        <hr>
        <div class="input-container" id="is-relative">
            <i class="fa-solid fa-lock"></i>
            <input type="password" name="Clave" placeholder="Digite su contraseña">
            <span id="icon">
                <i class="fa-solid fa-eye" aria-hidden="true"></i>
            </span>
        </div>
        <a href="reset_password.php" style="text-decoration: none; color: #333;">Cambiar Contraseña</a>
        <hr>
        <button type="submit">Iniciar Sesion</button>
        <a href="register.php" style="text-decoration: none; color: #333;">Registrarse</a>
    </form>
</body>
</html>
