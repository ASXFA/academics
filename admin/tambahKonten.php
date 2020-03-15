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
    $data = mysqli_query($conn, "SELECT * FROM type_konten");

    include "includes/header.php";
    include "includes/navbar.php";
?>
<div id="layoutSidenav">
    <?php include "includes/sider.php"; ?>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Dashboard > Konten > Tambah Konten</li>
                </ol>
                <div class="card mb-4">
                    <div class="card-header"><i class="fas fa-plus mr-1"></i>Tambah Data Konten</div>
                    <div class="card-body">
                        <form action="aksiTambahKonten.php" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="type_id" class="form-control-label">Type Konten</label>
                                <select name="type_id" class="form-control" required>
                                    <option disabled selected> -- PILIH --</option>
                                    <?php while($row = mysqli_fetch_assoc($data)){ ?>
                                    <option value="<?php echo $row['id'] ?>"><?php echo $row['nama_type'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
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