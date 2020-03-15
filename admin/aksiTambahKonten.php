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

include "koneksi.php";

$ekstensi_diperbolehkan	= array('png','jpg');
$nama = $_FILES['photo']['name'];
$x = explode('.', $nama);
$ekstensi = strtolower(end($x));
$ukuran	= $_FILES['photo']['size'];
$file_tmp = $_FILES['photo']['tmp_name'];	

// input lainnya
$judul = $_POST['judul'];
$type_id = $_POST['type_id'];
$deskripsi = $_POST['deskripsi'];

if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
    if($ukuran < 10044070){			
        move_uploaded_file($file_tmp, 'assets/img/konten/'.$nama);
        $query = mysqli_query($conn,"INSERT INTO konten (id, type_id, judul, deskripsi, photo, tanggal_buat, tanggal_edit) VALUES (NULL, '$type_id', '$judul', '$deskripsi', '$nama', CURRENT_TIME(),NULL)");
        if($query){
            ?>
            <script>
                alert('Data berhasil di tambahkan');
                window.location.href='konten.php';
            </script>
            <?php
        }else{
            ?>
            <script>
                alert('Data Gagal di tambahkan');
                window.location.href='konten.php';
            </script>
            <?php
        }
    }else{
        ?>
            <script>
                alert('Ukuran File Terlalu Besar');
                window.location.href='tambahKonten.php';
            </script>
            <?php
    }
}else{
    ?>
        <script>
            alert('Ekstensi photo tidak di perbolehkan');
            window.location.href='tambahKonten.php';
        </script>
        <?php
}

?>