<?php 

include "koneksi.php";

$ekstensi_diperbolehkan	= array('png','jpg');
$nama = $_FILES['photo']['name'];
$x = explode('.', $nama);
$ekstensi = strtolower(end($x));
$ukuran	= $_FILES['photo']['size'];
$file_tmp = $_FILES['photo']['tmp_name'];	

// input lainnya
$judul = $_POST['judul'];
$deskripsi = $_POST['deskripsi'];

if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
    if($ukuran < 10044070){			
        move_uploaded_file($file_tmp, 'assets/img/berita/'.$nama);
        $query = mysqli_query($conn,"INSERT INTO berita (judul,deskripsi,photo) VALUES('$judul','$deskripsi','$nama')");
        if($query){
            echo 'Data Behasil di Tambah';
        }else{
            echo 'Data Gagal di Tambahkan';
        }
    }else{
        echo 'UKURAN FILE TERLALU BESAR';
    }
}else{
    echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
}

?>