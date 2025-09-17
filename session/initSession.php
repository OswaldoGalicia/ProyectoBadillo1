<?php
    session_start();
    include '../config/conection.php';
    $conn = connect();
    $error = [];

    ( !isset($_POST['user']) || empty($_POST['user']) ) ? $error[] = "Debe llenar todos los campos" : $user = $_POST['user'];
    ( !isset($_POST['pwd']) || empty($_POST['pwd']) ) ? $error[] = "Debe llenar todos los campos" : $pwd = $_POST['pwd'];

    if( !empty($error) ){
        $_SESSION['errores'] = $error;
        header("Location: ../loggin.php");
        exit;
    }

    $sql = "SELECT * FROM usuarios WHERE pwd = :pwd AND usuario = :user OR email = :email";

    $stmt = $conn -> prepare($sql);
    $stmt -> execute([
        'user' => $user,
        'email' => $user,
        'pwd' => $pwd
    ]);
    $row = $stmt -> fetch();

    if( !$row ){
        $error[] = "El usuario, correo o contraseña no coincide";
        $_SESSION['errores'] = $error;
        header("Location: ../loggin.php");
        exit;
    }else{
        $_SESSION['user'] = $row['id'];
        header("Location: /");
        exit;
    }
