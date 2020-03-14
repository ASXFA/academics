<?php 

    include "koneksi.php";
    $data = mysqli_query($conn,"SELECT * FROM berita ORDER BY tanggal_buat DESC");

?>
<?php 
    include "includes/header.php";
    include "includes/navbar.php";
?>
<div id="layoutSidenav">
    <?php include "includes/sider.php"; ?>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Dashboard > Berita > Tambah Berita</li>
                </ol>
                <div class="card mb-4">
                    <div class="card-header"><i class="fas fa-plus mr-1"></i>Tambah Data Berita</div>
                    <div class="card-body">
                        <form action="aksiTambahBerita.php" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="judul" class="form-control-label">Judul</label>
                                <input type="text" name="judul" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="photo" class="form-control-label">Photo</label>
                                <input type="file" name="photo" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="deskripsi" class="form-control-label">Deskripsi</label>
                                <textarea name="deskripsi" class="editor form-control"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary float-right">Tambah</button>
                        </form>
                    </div>
                </div>
            </div>
        </main>
<?php include "includes/footer.php" ?>