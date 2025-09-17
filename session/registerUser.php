<?php
    session_start();
    include '../config/conection.php';
    $conn = connect();
    $error = [];
    ( !isset($_POST['user']) || empty($_POST['user']) ) ? $error[] = "El usuario es requerido." : $user = $_POST['user'];
    ( !isset($_POST['email']) || empty($_POST['email']) ) ? $error[] = "El correo es necesario" : $email = $_POST['email'];
    ( !isset($_POST['pwd']) || empty($_POST['pwd']) ) ? $error[] = "Debes introducir una contraseña" : $pwd = $_POST['pwd'];
    ( !isset($_POST['repPwd']) || empty($_POST['repPwd']) ) ? $error[] = "Debes repetir la contraseña" : $repPwd = $_POST['repPwd'];

    ( $pwd !== $repPwd ) ? $error[] = "Las contraseñas no coinciden " : null;

    $sql = "SELECT * FROM usuarios WHERE usuario = :user OR email = :email";

    $stmt = $conn -> prepare($sql);
    $stmt -> execute(['user' => $user, 'email' => $email]);

    $row = $stmt -> fetch();

    if( $row > 0){
        $error[] = "El usuario/correo ya existe";
    }

    if(!empty($error)){
        $_SESSION['errores'] = $error;
        header("Location: ../register.php");
        exit;
    }

    $sql_regist = "INSERT INTO usuarios ( usuario, email, pwd ) VALUES (:user, :email, :pwd)";

    $stmt = $conn -> prepare($sql_regist);
    $stmt -> execute([
        'user' => $user,
        'email' => $email,
        'pwd' => $pwd
    ]);
    

    $sql_session = "SELECT id FROM usuarios WHERE usuario = :user";

    $stmt = $conn -> prepare($sql_session);
    $stmt -> execute(['user' => $user]);
    $row = $stmt -> fetch();

    if( !$row ){
        $error[] = "Hubo un problema al iniciar sesion, intente iniciar sesion mas tarde.";
        $_SESSION['errores'] = $error;
        header("Location: ../register.php");
        exit;
    }else{
        $_SESSION['user'] = $row['id'];
        header("Location: /");
        exit;
    }