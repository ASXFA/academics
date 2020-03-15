<?php 
  include '../admin/koneksi.php';   
?>
<?php include 'include/header.php'; ?>
<?php include 'include/navbar.php'; ?>

  <div class="container">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="d-block w-100" src="assets/images/slide-1.jpg" alt="First slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="assets/images/slide-2.jpg" alt="Second slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="assets/images/slide-3.jpg" alt="Third slide">
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>

  <div class="news-updates">
    <div class="container">
      <div class="row">
        <div class="col-lg-9">
          <div class="section-heading">
            <h2 class="text-black">Berita Terbaru <a href="berita.php" style="font-size:22px;">Lihat Semua <i class="fa fa-arrow-circle-right"></i></a></h2>
          </div>
          <?php 
            $data = mysqli_query($conn, "SELECT * FROM konten WHERE type_id=1 LIMIT 3");
            while($row = mysqli_fetch_assoc($data)){
          ?>
          <div class="card mb-3">
            <img class="card-img-top" src="../admin/assets/img/konten/<?php echo $row['photo'] ?>" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title"><?php echo $row['judul'] ?></h5>
              <p class="card-text"><?php echo substr($row['deskripsi'],0,100) ?></p>
              <a href="detailBerita.php?id=<?php echo $row['id'] ?>" class="float-right">Infromasi Lebih <i class="fa fa-arrow-right"></i></a>
              <br>
              <p class="card-text"><small class="text-muted">
                <?php 
                  if ($row['tanggal_edit']!=NULL) {
                    $awal = strtotime($row['tanggal_edit']);
                  }else{
                    $awal = strtotime($row['tanggal_buat']);
                  }
                  $akhir = strtotime(date('Y-m-d H:m:s'));
                  $diff = $akhir - $awal;
                  $tahun = floor($diff / (60 * 60 * 24 * 365));
                  $hari = floor($diff / (60 * 60 * 24));
                  $jam = floor($diff/(60*60));
                  $menit = $diff-$jam*(60*60);
                  $menit = floor($menit/60);

                  if ($menit > 60) {
                    $jam = $jam + 1;
                  }

                  if ($tahun > 0 ) {
                    echo "Terakhir Update Pada ".$tahun." tahun ".$hari." hari ".$jam." Jam ".$menit." Menit"; 
                  }else if($tahun == 0){
                    echo "Terakhir Update Pada ".$hari." hari ".$jam." Jam ".$menit." Menit"; 
                  }else if(($tahun == 0 )&&($hari == 0)){
                    echo "Terakhir Update Pada ".$jam." Jam ".$menit." Menit"; 
                  }else if(($tahun == 0 )&&($hari == 0) && ($jam == 0)){
                    echo "Terakhir Update Pada ".$menit." Menit"; 
                  }
                ?>
              </small></p>
            </div>
          </div>
            <?php } ?>
        </div>
        <div class="col-lg-3">
          <div class="section-heading">
            <h4 class="text-black">Lowongan Kerja <a href="loker.php" style="font-size:16px;"> Lihat Semua <i class="fa fa-arrow-circle-right"></i></a></h4>
          </div>
          <?php 
            $data = mysqli_query($conn, "SELECT * FROM konten WHERE type_id=2 LIMIT 3");
            if (mysqli_num_rows($data) == 0 ) {
          ?>
          <div class="card" style="width: 15rem;">
            <div class="card-body">
              <p class="card-text">Tidak Ada Lowongan Kerja yang tersedia ...</p>
            </div>
          </div>
          <?php 
            }else{
            while($row = mysqli_fetch_assoc($data)){
          ?>
          <div class="card" style="width: 15rem;">
            <img class="card-img-top" src="../admin/assets/images/<?php echo $row['photo'] ?>" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title"><?php echo $row['judul']; ?></h5>
              <p class="card-text"><?php echo subsstr($row['deskripsi'],0,50); ?></p>
              <p class="card-text"><a href="detailLoker.php?id=<?php echo $row['id'] ?>" class="float-right">Lihat <i class="fa fa-arrow-right"></i></a></p>
            </div>
          </div>
          <?php }} ?>
        </div>
      </div>
    </div>
  </div>


<?php include 'include/footer.php'; ?>