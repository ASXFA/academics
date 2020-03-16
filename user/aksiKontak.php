<?php 

    include '../admin/koneksi.php';

    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $judul = $_POST['judul'];
    $isi = $_POST['isi'];

    $query = mysqli_query($conn, "INSERT INTO kritik_Saran (id,nama,email,judul,isi,tanggal) VALUES (NULL,'$nama','$email','$judul','$isi',CURRENT_TIME())");

    if($query){
        ?>
        <script>
            alert('Terimakasih telah menghubungi kami ');
            window.location.href='kontak.php';
        </script>
        <?php
    }else{
        ?>
        <script>
            alert('Masukan anda Salah, Silahkan ulangi kembali ');
            window.location.href='kontak.php';
        </script>
        <?php
    }

?>