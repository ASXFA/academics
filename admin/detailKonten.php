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
    $data = mysqli_query($conn,"SELECT * FROM konten WHERE id='$id'");

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
                    <li class="breadcrumb-item active">Dashboard > Detail Konten</li>
                </ol>
                <div class="card mb-4">
                        <?php while($row = mysqli_fetch_assoc($data)){ ?>
                    <div class="card-header"></i>Data Konten <?php 
                                            $konten = mysqli_query($conn,"SELECT * FROM type_konten ");
                                            while($rows = mysqli_fetch_assoc($konten)){
                                                if($rows['id'] == $row['type_id']){
                                        echo $rows['nama_type'] ; }} ?></div>
                    <div class="card-body">
                        <h4><?php echo $row['judul'] ?></h4>
                        <br>
                        <img src="assets/img/konten/<?php echo $row['photo'] ?>" width="50%" class="mx-auto d-block mb-4" alt="photo">
                        <h5>Description : </h5>
                        <?php echo $row['deskripsi'] ?>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </main>
<?php include "includes/footer.php" ?>