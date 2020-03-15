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

    $konten = mysqli_query($conn, "SELECT * FROM konten");
    $kritikSaran = mysqli_query($conn, "SELECT * FROM kritik_Saran");

    include "includes/header.php";
    include "includes/navbar.php";
?>
<div id="layoutSidenav">
    <?php include "includes/sider.php"; ?>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Dashboard</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
                <div class="row">
                    <div class="col-xl-6 col-md-6">
                        <div class="card text-center bg-primary text-white mb-4">
                            <div class="card-body">
                                <h4 class="mr-5"><i class="fa fa-book-open"></i> 
                                    <span class="ml-3">Terdapat       
                                    <?php echo mysqli_num_rows($konten); ?> Konten
                                    </span>
                                </h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-6">
                        <div class="card text-center bg-warning text-white mb-4">
                            <div class="card-body">
                                <h4 class="mr-5"><i class="fa fa-comment"></i> 
                                    <span class="ml-3">Terdapat      
                                    <?php echo mysqli_num_rows($kritikSaran); ?> Kritik & Saran
                                    </span>
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header"><i class="fas fa-comment mr-1"></i>5 Data Kritik Dan Saran</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" width="100%">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Judul</th>
                                        <th>Tanggal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $no = 1;
                                        $kritikSaranindex = mysqli_query($conn, "SELECT * FROM kritik_Saran ORDER BY tanggal DESC LIMIT 5");
                                        while($row=mysqli_fetch_assoc($kritikSaranindex)){
                                    ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $row['nama'] ?></td>
                                        <td><?php echo $row['email'] ?></td>
                                        <td><?php echo $row['judul'] ?></td>
                                        <td><?php echo $row['tanggal'] ?></td>
                                    </tr>
                                    <?php $no++;} ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header"><i class="fas fa-comment mr-1"></i>5 Data Kritik Dan Saran</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" width="100%">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Judul</th>
                                        <th>Tanggal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $no = 1;
                                        $kontenindex = mysqli_query($conn, "SELECT * FROM konten ORDER BY tanggal_buat DESC LIMIT 5");
                                        while($row=mysqli_fetch_assoc($kontenindex)){
                                    ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <?php 
                                            $konten = mysqli_query($conn,"SELECT * FROM type_konten ");
                                            while($rows = mysqli_fetch_assoc($konten)){
                                                if($rows['id'] == $row['type_id']){
                                        ?>
                                        <td width="15%"><?php echo $rows['nama_type'] ?></td>
                                        <?php }} ?>
                                        <td><?php echo $row['judul'] ?></td>
                                        <td><?php echo substr($row['deskripsi'],0,50) ?></td>
                                        <td><?php echo $row['tanggal_buat'] ?></td>
                                    </tr>
                                    <?php $no++;} ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </main>
<?php include "includes/footer.php" ?>