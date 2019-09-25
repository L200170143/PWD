<html>
    <head><title>Ganjil Genap</title></head>
    <body>
        <H1>Program Ganjil Genap</H1>
        <form method="POST" action="tugas2.php">
            <p>
                Masukkan Nilai : <input type="text" name="nilai" size="3">
            </p>
            <p>
                <input type="submit" value="submit" name="submit"> 
            </p>
        </form>

        <?php
            error_reporting (E_ALL ^ E_NOTICE);
            $nilai = $_POST["nilai"];
            $submit = $_POST["submit"];

            if($submit){
                if($nilai%2==0){
                    echo "bilangan $nilai adalah Bilangan Genap<br>";
                } else {
                    echo "bilangan $nilai adalah Bilangan Ganjil<br>";
                }
            }
        ?>

    </body>
</html>