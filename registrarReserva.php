<?php 
    session_start();
    include './config/conection.php';
    $error = [];
    $conn = connect();

    (!isset($_GET['asiento']) || empty($_GET['asiento'])) ? $error[] = "Debe seleccionar minimo un asiento." : $asientos = implode(',', $_GET['asiento']);
    
    if(!empty($error)){
        header("Location: /");
        exit;
    }

    $sql = "INSERT INTO funciones_usuario (id_usuario, id_pelicula, horario, asientos) VALUES (:idUser, :idPeli, :horario, :asientos)";
    
    $stmt = $conn -> prepare($sql);
    $stmt -> execute([
        'idUser' => $_SESSION['user'],
        'idPeli' => $_GET['id'],
        'horario' => $_GET['hora'],
        'asientos' => $asientos
    ]);
    $row = $stmt -> fetch();

    if( !$row ){
        header("Location: /");
        exit;
    }else{
        header("Location ./reservas.php");
        exit;
    }