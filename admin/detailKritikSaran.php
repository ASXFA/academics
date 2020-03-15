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
    $id = $_GET['id'];
    $data = mysqli_query($conn,"SELECT * FROM kritik_Saran WHERE id='$id'");

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
                    <li class="breadcrumb-item active">Dashboard > Detail Kritik & Saran</li>
                </ol>
                <div class="card mb-4">
                    <div class="card-header">Data Kritik & Saran</div>
                    <div class="card-body">
                    <?php while($row = mysqli_fetch_assoc($data)){ ?>
                        <h4><?php echo $row['judul'] ?></h4>
                        <h5>Dari : <i><?php echo $row['nama'] ?> </i></h5>
                        <br>
                        <h5>Isi : </h5>
                        <p class="text-justify"><?php echo $row['isi'] ?></p>
                        <?php } ?>
                    </div>
                    <div class="card-footer">
                        <a href="kritikSaran.php" class="btn btn-primary float-right">Kembali</a>
                    </div>
                </div>
            </div>
        </main>
<?php include "includes/footer.php" ?>