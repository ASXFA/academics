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
    $data = mysqli_query($conn,"SELECT * FROM konten ORDER BY tanggal_buat ASC");

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
                    <li class="breadcrumb-item active">Dashboard > konten</li>
                </ol>
                <div class="card mb-4">
                    <div class="card-header"><i class="fas fa-table mr-1"></i>Data Konten</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Type Konten</th>
                                        <th>Judul</th>
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
                                        <?php 
                                            $konten = mysqli_query($conn,"SELECT * FROM type_konten ");
                                            while($rows = mysqli_fetch_assoc($konten)){
                                                if($rows['id'] == $row['type_id']){
                                        ?>
                                        <td width="15%"><?php echo $rows['nama_type'] ?></td>
                                        <?php }} ?>
                                        <td width="55%"><?php echo $row['judul'] ?></td>
                                        <td width="20%">
                                            <a href="detailKonten.php?id=<?php echo $row['id']; ?>" class="btn btn-info btn-sm">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a href="editKonten.php?id=<?php echo $row['id']; ?>" class="btn btn-success btn-sm">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a href="hapusKonten.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Yakin akan menghapus? Data akan hilang permanen ! ')" class="btn btn-danger btn-sm">
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