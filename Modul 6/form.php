<html>
    <head><title>Data Barang</title></head>

    <?php
        $conn = mysqli_connect('localhost', 'root', '', 'informatika');
    ?>

    <body>
        <center>
            <h3>Masukkan Data Barang</h3>
            <table border='0' width='30%'>
                <form method='POST' action='form.php'>
                    <tr>
                        <td width='25%'>kode barang</td>
                        <td width='5%'>:</td>
                        <td width='65%'>
                            <input type='text' name='kode_barang' size='10'/>
                        </td>
                    </tr>
                    <tr>
                        <td width='25%'>Nama Barang</td>
                        <td width='5%'>:</td>
                        <td width='65%'>
                            <input type='text' name='nama_barang' size='30'/>
                        </td>
                    </tr>
                    <tr>
                        <td width='25%'>kode gudang</td>
                        <td width='5%'>:</td>
                        <td width='65%'>
                            <select name='kode_gudang'>
                            <?php
                                $sql = "select * from gudang";
                                $re = mysqli_query($conn,$sql);
                                while($row = mysqli_fetch_array($re)){
                                    echo "<option value = '$row[kode_gudang]'>$row[kode_gudang]</option>";
                                }
                            ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><input type='submit' value='Masukkan' name='submit'/></td>
                    </tr>
                </form>
            </table>

            <?php
                error_reporting(E_ALL^E_NOTICE);
                $kode=$_POST['kode_barang'];
                $nama=$_POST['nama_barang'];
                $gudang=$_POST['kode_gudang'];
                $submit=$_POST['submit'];
                $input="INSERT INTO barang (kode_barang, nama_barang, kode_gudang) VALUES ('$kode', '$nama', '$gudang')";
                if($submit){
                    if($kode==''){
                        echo "</br>NIM tidak boleh kosong!";
                    }
                    elseif($nama==''){
                        echo "</br>Nama tidak boleh kosong!";
                    }
                    elseif($gudang==''){
                        echo "</br>kode gudang tidak boleh kosong!";
                    }
                    else{
                        mysqli_query($conn, $input);
                        echo "</br>Data berhasil dimasukkan!";
                    }
                }
            ?>
            </hr>
            <h3>Data barang</h3>
            <table border='1' width='50%'>
                <tr>
                    <td align='center' width='20%'><b>kode barang</b></td>
                    <td align='center' width='30%'><b>Nama barang</b></td>
                    <td align='center' width='10%'><b>kode gudang</b></td>
                </tr>

                <?php
                    $cari="SELECT * from barang, gudang where barang.kode_gudang = gudang.kode_gudang";
                    $hasil_cari=mysqli_query($conn, $cari);
                    while($data=mysqli_fetch_row($hasil_cari)){
                        echo "
                            <tr>
                                <td width='20%'>$data[0]</td>
                                <td width='30%'>$data[1]</td>
                                <td width='10%'>$data[2]</td>
                            </tr>
                        ";
                    }
                ?>
            </table>
        </center>
    </body>
</html>