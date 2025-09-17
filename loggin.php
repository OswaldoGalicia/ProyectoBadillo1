<?php
    include "./utilities/nav.php";
    if(isset($_SESSION['errores']) || !empty($_SESSION['errores'])){
        $errores = $_SESSION['errores'];
        $_SESSION['errores'] = '';
    }
?>
    <section class="w-5/10 mt-10 m-auto border-2 border-gray-400 rounded-lg p-5">
        <h1 class="text-gray-600 text-xl text-center">Inicio de sesion</h1>
        <?php foreach($errores as $error){ ?> 
            <p class="border border-red-600 bg-red-200 text-red-600 text-center py-2 w-full m-2"><?php echo $error ?></p>
        <?php } ?>
        <div class="m-4">
            <form action="session/initSession.php" method="POST">
                <fieldset class="m-2 p-0 border border-blue-500 rounded-full px-2">
                    <legend>Usuario:</legend>
                    <input class="w-full" name="user" type="text" placeholder="Nombre de usuario..." required>
                </fieldset>
                <fieldset class="m-2 p-0 border border-blue-500 rounded-full px-2">
                    <legend>Contraseña:</legend>
                    <input class="w-full" name="pwd" type="password" placeholder="Contraseña..." required>
                </fieldset>

                <button type="submit" class="bg-blue-800 text-white font-bold py-2 rounded-full w-full hover:bg-yellow-500 duration-100 ease-in ">Inicias Sesion</button>
            </form>
        </div>
    </section>
</body>
</html>