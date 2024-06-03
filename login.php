<?php
session_start();
include 'conexion.php';

if (isset($_POST['Usuario']) && isset($_POST['Clave'])) {
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $Usuario = validate($_POST['Usuario']);
    $Clave = validate($_POST['Clave']);

    if (empty($Usuario)) {
        header("Location: index.php?error=El usuario no puede estar vacío");
        exit();
    } else if (empty($Clave)) {
        header("Location: index.php?error=La contraseña no puede estar vacía");
        exit();
    } else {
        $stmt = $conn->prepare("SELECT Id, Usuario, Nombre_Completo, Clave FROM usuarios WHERE Usuario = ?");
        $stmt->bind_param("s", $Usuario);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();
            if (password_verify($Clave, $row['Clave'])) {
                $_SESSION['Usuario'] = $row['Usuario'];
                $_SESSION['Nombre_Completo'] = $row['Nombre_Completo'];
                $_SESSION['Id'] = $row['Id'];
                header("Location: SopaDeLetras/sopadeletras.php");

                exit();
            } else {
                header("Location: index.php?error=El usuario o la contraseña son incorrectos");
                exit();
            }
        } else {
            header("Location: index.php?error=El usuario o la contraseña son incorrectos");
            exit();
        }
    }
} else {
    header("Location: index.php");
    exit();
}
