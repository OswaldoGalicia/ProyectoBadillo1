<?php  
    session_start();
    if($_SESSION['user'] === 'guest'){
        header("Location: ./loggin.php");
        exit;
    }

    include './utilities/nav.php';
    include './config/conection.php';

    $conn = connect(); 

    $sql = "SELECT * FROM funciones WHERE id_pelicula = :id";

    $stmt = $conn -> prepare($sql);
    $stmt -> execute(['id' => $_GET['id']]);
    $row = $stmt -> fetch();

    if( !$row ){
        header("Location: /");
        exit;
    }
?>

    <section class=" flex flex-row w-8/10 mx-auto mt-10 border border-gray-300 rounded-md p-4">
        <div class="w-1/2">
            <div class="bg-gray-400 text-white border-4 border-gray-400 rounded-full  m-3 text-center font-bold">PANTALLA</div>
            <form id="asientos-form" class=" flex flex-wrap gap-1" action="registrarReserva.php" method="GET">
                <input type="text" value="<?php echo $_GET['id'] ?>" name="id" hidden required>
                <input type="text" value="<?php echo $_GET['hora'] ?>" name="hora" hidden required>
                <?php for($i = 1 ; $i <= 100 ; $i++ ){ ?>
                    <label class="flex-shrink-0 m-2">
                        <input
                            type="checkbox"
                            class="hidden peer"
                            id="<?php echo $i ?>"
                            value="<?php echo $i ?>"
                            name="asiento[]"
                        />
                        <span
                            class="px-1 py-1 rounded-full cursor-pointer border transition-colors border-blue-500 peer-checked:bg-blue-500 peer-checked:text-white"
                        >
                            <?php echo $i ?>
                        </span>
                    </label>
                <?php }?>
            </form>
        </div>
        <div class="w-1/2">
            <img class="w-1/2 mx-auto rounded-md" height="300px" src="./img/<?php echo $row['imagen'] ?>" alt="Imagen de pelicula">
            <div>
                <p><?php echo $row['titulo'] ?></p>
                <p><?php echo $_GET['hora'] ?></p>
                <p>Precio por boleto: <span>$80.00 MXN</span></p>
                <button type="submit" form="asientos-form"  class="bg-blue-500 text-white rounded-full w-full font-bold text-center py-1">Reservar</button>
            </div>
        </div>
    </section>
</body>
</html>
