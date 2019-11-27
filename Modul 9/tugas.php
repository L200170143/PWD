<?php
    session_start();
    error_reporting(E_ALL^E_NOTICE^E_DEPRECATED);
    $conn = mysqli_connect('localhost','root','','informatika');

    $username = $_POST['username'];
    $password = $_POST['password'];
    $submit = $_POST['submit'];

    if($submit){
        $sql = "SELECT*FROM user WHERE username='$username' and password='$password'";
        $query = mysqli_query($conn, $sql);
        $row = mysqli_num_rows($query);
    if($row>0){
        $data = mysqli_fetch_assoc($query);
        if($data['status']=="Administrator"){
 
            // buat session login dan username
            $_SESSION['username'] = $username;
            $_SESSION['status'] = "Administrator";
            // alihkan ke halaman dashboard admin
            header("location:halaman_admin.php");
     
        // cek jika user login sebagai pegawai
        }else if($data['status']=="Member"){
            // buat session login dan username
            $_SESSION['username'] = $username;
            $_SESSION['status'] = "Member";
            // alihkan ke halaman dashboard pegawai
            header("location:halaman_member.php");
    
        }else{
     
            // alihkan ke halaman login kembali
            header("location:tugas.php?pesan=gagal");
        }
    }
        
?>
             
<?php 
        }else{
            //gagal login
?>
            
<?php
        }
    
?>
        <form action="tugas.php" method="POST">
            <p align='center'>
                Username : <input type="text" name="username"><br>
                Password : <input type="password" name="password"><br>
                <input type="submit" name='submit'>
            </p>
        </form>

