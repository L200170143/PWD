<html>
    <head><title>Penjumlahan</title></head>
    <body>
        <H1>Program Penjumlahan</H1>
        <form method="POST" action="tugas1.php">
            <p>
                Nilai A adalah : <input type="text" name="nilaiA" size="3">
            </p>
            <p>
                Nilai B adalah : <input type="text" name="nilaiB" size="3">
            </p>
            <p>
                <input type="submit" value="Jumlahkan" name="submit"> 
            </p>
        </form>

        <?php
            error_reporting (E_ALL ^ E_NOTICE);
            $nilaiA = $_POST["nilaiA"];
            $nilaiB = $_POST["nilaiB"];
            $submit = $_POST["submit"];

            if($submit){
                echo "Nilai A adalah $nilaiA</br>";
                echo "Nilai B adalah $nilaiB</br>";
                echo "Jadi nilai A ditambah nilai B adalah ";
                echo $nilaiA+$nilaiB;
            }
        ?>
    </body>
</html>