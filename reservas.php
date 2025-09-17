<?php  
    session_start();
    if($_SESSION['user'] === 'guest'){
        header("Location: ./loggin.php");
        exit;
    }

    include './utilities/nav.php';
    include './config/conection.php';

    $conn = connect(); 

    $sql = "SELECT 
                r.id_usuario, 
                r.id_pelicula,
                r.horario,
                r.asientos,
                f.titulo,
                f.imagen
            FROM funciones_usuario r 
            INNER JOIN funciones f
            ON r.id_pelicula = f.id_pelicula
            WHERE r.id_usuario = :user";

    $stmt = $conn -> prepare($sql);
    $stmt -> execute([ 'user' => $_SESSION['user'] ]);
    

?>

    <section class="w-8/10 mx-auto border border-gray-300 rounded-lg p-4">
        <h2 class="text-xl text-center font-bold">Reservaciones</h2>

        <?php while( $row = $stmt -> fetch() ){?>
            <?php if( !$row ){ 
                echo "<p class='text-xl text-center font-bold'>Aun no hay reservaciones :c</p>";
            }?>
            <div class="w-1/2 mx-auto border border-gray-300 rounded-lg p-4">
                <img class="w-1/2 mx-auto rounded-md" src="./img/<?php echo $row['imagen'] ?>" alt="">
                <p class="text-center"><span class="font-bold">Pelicula: </span> <?php echo $row['titulo'] ?></p>
                <p class="text-center"><span class="font-bold">Horario: </span><?php echo $row['horario'] ?></p>
                <p class="text-center"><span class="font-bold">Asientos: </span><?php echo $row['asientos'] ?></p>
                <p class="text-center"><span class="font-bold">Precio p/asiento: $80.00 MXN </span></p>
                <!-- <p class="text-center"><span class="font-bold">total</span></p> -->
            </div>
        <?php }?>

    </section>
</body>
</html>