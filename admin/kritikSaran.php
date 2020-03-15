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
    $data = mysqli_query($conn,"SELECT * FROM kritik_saran ORDER BY tanggal DESC");

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
                    <li class="breadcrumb-item active">Dashboard > Kritik & Saran</li>
                </ol>
                <div class="card mb-4">
                    <div class="card-header"><i class="fas fa-table mr-1"></i>Data Masuk</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Judul</th>
                                        <th>Tanggal</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $no = 1;
                                        while($row = mysqli_fetch_assoc($data)){
                                    ?>
                                    <tr>
                                        <td width="10%"><?php echo $no ?></td>
                                        <td width="15%"><?php echo $row['nama'] ?></td>
                                        <td width="15%"><?php echo $row['email'] ?></td>
                                        <td width="37%"><?php echo $row['judul'] ?></td>
                                        <td width="13%"><?php echo $row['tanggal'] ?></td>
                                        <td width="10%">
                                            <a href="detailKritikSaran.php?id=<?php echo $row['id']; ?>" class="btn btn-info btn-sm">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a href="hapusKritikSaran.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Yakin akan menghapus? Data akan hilang permanen ! ')" class="btn btn-danger btn-sm">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php $no++; } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </main>
<?php include "includes/footer.php" ?>