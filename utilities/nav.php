<?php
    session_start();
    if(!isset($_SESSION['user']) || empty($_SESSION['user'])) {
        $_SESSION['user'] = 'guest';
    }

?>
<!doctype html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
        <link rel="icon" href="../img/logo.webp">
        <title>Cine OLA</title>
    </head>
    <body>
        <header class="bg-blue-800 py-5 text-white font-bold text-xl">
            <div class="w-8/10 mx-auto flex flex-row justify-between">
                <a class="flex flex-row items-center gap-5" >
                    <img width="75px" height="75px" src="img/logo.webp" alt="Logo">
                    <h1>Cine OLA</h1>
                </a>
                <nav class="flex flex-row justify-between gap-5 *:hover:bg-yellow-500 *:py-2.5 *:px-5 *:hover:rounded-full items-center">
                    <a href="/">Ver cartelera</a>
                    <?php if($_SESSION['user'] === 'guest' && !empty($_SESSION['user'])){
                        echo '  <a href="./loggin.php">Iniciar Sesion</a>
                                <a href="./register.php">Registrarse</a>';
                    }else{
                        echo '  <a href="./reservas.php">Reservas</a>';
                        echo '  <a href="./session/closeSession.php">Cerrar sesion</a>';
                    }
                    ?>
                </nav>
            </div>
        </header>
