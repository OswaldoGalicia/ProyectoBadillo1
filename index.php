<?php
    include './utilities/nav.php';
    include './config/conection.php';
    $conn = connect();
?>

        <form 
            action="asientos.php" 
            method="GET" 
            class="w-8/10 mx-auto border-1 border-gray-200 mt-4 rounded-lg p-9"
            >
            <?php 
                $sql = "SELECT * FROM funciones";
                $stmt = $conn -> prepare($sql);
                $stmt -> execute();
                while( $res = $stmt-> fetch() ):
            ?>
                <div class="flex w-9/10 flex-row mx-auto border-1 border-gray-300 rounded-lg p-5 gap-5">
                    <img width="300px" height="auto" src="img/<?php echo $res['imagen'] ?>" alt="Imagen pelicula">
                    <div class="">
                        <input type="text" name="id" value="<?php echo $res['id_pelicula'] ?>" hidden >
                        <p class="text-xl font-bold"><?php echo $res['titulo'] ?></p>
                        <p><?php echo $res['year'] ?></p>
                        <p><?php echo $res['resumen'] ?></p>
                        <div class="flex flex-col gap-3 mt-4">
                            <div class="flex flex-col gap-3">
                                <div class="bg-red-200 text-center rounded-full">Lunes</div>
                                <div class="flex flex-row gap-5 *:p-1.5 *:border-1 *:border-green-600 *:rounded-full">
                                    <button type="submit" name="hora" value="Lunes 11:00 am (Doblada) ">11:00 am (Doblada)</button>
                                    <button type="submit" name="hora" value="Lunes 1:15 pm (Subtitulada) ">1:15 pm (Subtitulada)</button>
                                    <button type="submit" name="hora" value="Lunes 3:30 pm (Doblada) ">3:30 pm (Doblada)</button>
                                    <button type="submit" name="hora" value="Lunes 6:00 pm (Subtitulada) ">6:00 pm (Subtitulada)</button>
                                    <button type="submit" name="hora" value="Lunes 8:30 pm (Doblada) ">8:30 pm (Doblada)</button>
                                </div>
                            </div>
                            <div class="flex flex-col gap-3">
                                <div class="bg-red-200 text-center rounded-full">Miercoles</div>
                                <div class="flex flex-row gap-5 *:p-1.5 *:border-1 *:border-green-600 *:rounded-full">
                                    <button type="submit" name="hora" value="Miercoles 12:00 am (Subtitulada) ">12:00 am (Subtitulada)</button>
                                    <button type="submit" name="hora" value="Miercoles 3:15 pm (Doblada) ">3:15 pm (Doblada)</button>
                                    <button type="submit" name="hora" value="Miercoles 4:30 pm (Doblada) ">4:30 pm (Doblada)</button>
                                    <button type="submit" name="hora" value="Miercoles 7:00 pm (Subtitulada) ">7:00 pm (Subtitulada)</button>
                                    <button type="submit" name="hora" value="Miercoles 8:30 pm (Doblada) ">8:30 pm (Doblada)</button>
                                </div>
                            </div>
                            <div class="flex flex-col gap-3">
                                <div class="bg-red-200 text-center rounded-full">Viernes</div>
                                <div class="flex flex-row gap-5 *:p-1.5 *:border-1 *:border-green-600 *:rounded-full">
                                    <button type="submit" name="hora" value="Viernes 12:00 am (Doblada) ">12:00 am (Doblada)</button>
                                    <button type="submit" name="hora" value="Viernes 3:15 pm (Doblada) ">3:15 pm (Doblada)</button>
                                    <button type="submit" name="hora" value="Viernes 4:30 pm (Doblada) ">4:30 pm (Doblada)</button>
                                    <button type="submit" name="hora" value="Viernes 7:00 pm (Doblada) ">7:00 pm (Doblada)</button>
                                    <button type="submit" name="hora" value="Viernes 8:30 pm (Doblada) ">8:30 pm (Doblada)</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </form>
    </body>
</html>

