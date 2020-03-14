<?php 

    include "koneksi.php";
    $id = $_GET['id'];
    $data = mysqli_query($conn,"SELECT * FROM berita WHERE id='$id'");

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
                    <li class="breadcrumb-item active">Dashboard > Detail Berita</li>
                </ol>
                <div class="card mb-4">
                    <div class="card-header"></i>Data Berita</div>
                    <div class="card-body">
                        <?php while($row = mysqli_fetch_assoc($data)){ ?>
                        <h4><?php echo $row['judul'] ?></h4>
                        <br>
                        <img src="assets/img/berita/<?php echo $row['photo'] ?>" width="70%" class="mx-auto d-block" alt="photo">
                        <h5>Description : </h5>
                        <?php echo $row['deskripsi'] ?>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </main>
<?php include "includes/footer.php" ?>