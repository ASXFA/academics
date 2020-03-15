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
    if (!isset($_GET['id'])) {
        ?>
        <script>
            alert('anda tidak bisa mengakses halaman ini ! ');
            window.location.href='konten.php';
        </script>
    <?php 

    }

    include "koneksi.php";
    $id = $_GET['id'];
    $data = mysqli_query($conn, "SELECT * FROM konten WHERE id='$id'");

    include "includes/header.php";
    include "includes/navbar.php";
?>
<div id="layoutSidenav">
    <?php include "includes/sider.php"; ?>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Dashboard > Konten > Edit Konten</li>
                </ol>
                <div class="card mb-4">
                    <div class="card-header"><i class="fas fa-plus mr-1"></i>Edit Data Konten</div>
                    <div class="card-body">
                        <form action="aksiEditKonten.php" method="post" enctype="multipart/form-data">
                            <?php 
                                while($row = mysqli_fetch_assoc($data)){
                            ?>
                            <input type="text" name="id" value="<?php echo $row['id'] ?>" hidden>
                            <div class="form-group">
                                <select name="type_id" class="form-control" required>
                                    <option disabled selected> -- PILIH --</option>
                                    <?php 
                                    $konten = mysqli_query($conn, "SELECT * FROM type_konten");   
                                    while($rows = mysqli_fetch_assoc($konten)){ 
                                        if ($rows['id'] == $row['type_id']) {
                                    ?>
                                        <option value="<?php echo $rows['id'] ?>" selected><?php echo $rows['nama_type'] ?></option>
                                    <?php 
                                        }else{
                                    ?>
                                        <option value="<?php echo $rows['id'] ?>"><?php echo $rows['nama_type'] ?></option>
                                         
                                    <?php }} ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="judul" class="form-control-label">Judul</label>
                                <input type="text" name="judul" class="form-control" value="<?php echo $row['judul'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="photo" class="form-control-label d-block">Photo</label>
                                <img src="assets/img/konten/<?php echo $row['photo'] ?>" width="50%" alt="" class="mb-2">
                                <input type="text" name="photo" class="form-control" value="<?php echo $row['photo'] ?>" hidden>
                                <input type="file" name="photoNew" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="deskripsi" class="form-control-label">Deskripsi</label>
                                <textarea name="deskripsi" class="editor form-control"> <?php echo $row['deskripsi'] ?></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary float-right">Tambah</button>
                                <?php } ?>
                        </form>
                    </div>
                </div>
            </div>
        </main>
<?php include "includes/footer.php" ?>