<?php
    include 'config/conection.php';
    $conn = connect();
?>
<!doctype html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
        <title>Cine</title>
    </head>
    <body>
        <header class="bg-blue-800 py-5 text-white font-bold text-xl">
            <div class="w-8/10 mx-auto flex flex-row justify-between">
                <a class="flex flex-row items-center gap-5" >
                    <img width="75px" height="75px" src="img/logo.webp" alt="Logo">
                    <h1>CineTesci</h1>
                </a>
                <nav class="flex flex-row justify-between gap-5 *:hover:bg-yellow-500 *:py-2.5 *:px-5 *:hover:rounded-full items-center">
                    <a href="#">Ver cartelera</a>
                    <a href="#">Iniciar Sesion</a>
                    <a href="#">Registrarse</a>
                </nav>
            </div>
        </header>

        <section class="w-8/10 mx-auto border-1 border-gray-200 mt-4 rounded-lg p-9">
            <div class="flex w-9/10 flex-row mx-auto border-1 border-gray-300 rounded-lg p-5 gap-5">
                <img width="300px" height="auto" src="img/spider.jpg" alt="Spiderman">
                <div class="">
                    <p class="text-xl font-bold">Spiderman 2</p>
                    <p>2004</p>
                    <p>Peter Parker enfrenta a Dr. Octopus mientras equilibra su vida personal y como héroe.</p>
                    <div class="flex flex-col gap-3 mt-4">
                        <div class="flex flex-col gap-3">
                            <div class="bg-red-200 text-center rounded-full">Lunes</div>
                            <div class="flex flex-row gap-5 *:p-1.5 *:border-1 *:border-green-600 *:rounded-full">
                                <a href="#">11:00 am (Español)</a>
                                <a href="#">1:15 pm (Subtitulada)</a>
                                <a href="#">3:30 pm (Español)</a>
                                <a href="#">6:00 pm (Subtitulada)</a>
                                <a href="#">8:30 pm (Español)</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </body>
</html>

