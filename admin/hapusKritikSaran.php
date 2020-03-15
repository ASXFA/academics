<?php 
    session_start();
    if(!isset($_SESSION['akses'])){
        ?>
        <script>
            alert("Login Terlebihdahulu !");
            window.location.href="login.php";
        </script>
<?php
    }
    include 'koneksi.php';
    $id = $_GET['id'];
    $data = mysqli_query($conn, "DELETE FROM kritik_saran WHERE id='$id'");

    if($data){
        ?>
        <script>
            alert('Data berhasil di Hapus');
            window.location.href='konten.php';
        </script>
        <?php
    }else{
        ?>
        <script>
            alert('Data Gagal di Hapus');
            window.location.href='konten.php';
        </script>
        <?php
    }

?>