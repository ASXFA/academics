<?php 

    $user = $_POST['username'];
    $password = md5($_POST['password']);

    include "koneksi.php";

    $check = mysqli_query($conn, "SELECT * FROM admin WHERE username='$user' AND password='$password' LIMIT 1");

    if (mysqli_num_rows($check) > 0) {
        session_start();
        $_SESSION['akses'] = "Login";
        $_SESSION['username'] = $user;

        header('Location: index.php');
    }else{
        ?>
        <script>
            alert("Data tidak ditemukan !");
            window.location.href="login.php";
        </script>
<?php 
    }

?>