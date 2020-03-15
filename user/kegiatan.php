<?php include 'include/header.php'; ?>
<?php include 'include/navbar.php'; ?>
    
    <div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url('assets/images/bg_1.jpg')">
        <div class="container">
          <div class="row align-items-end">
            <div class="col-lg-7">
              <h2 class="mb-0">KEGIATAN INFORMATIKA</h2>
              <p>UNLA</p>
            </div>
          </div>
        </div>
      </div> 
    

    <div class="custom-breadcrumns border-bottom">
      <div class="container">
        <a href="index.php">Home</a>
        <span class="mx-3 icon-keyboard_arrow_right"></span>
        <span class="current">Kegiatan</span>
      </div>
    </div>

    <div class="container">
      <h4 class="text-center mt-3">Kegiatan Informatika UNLA</h4>
      <div class="row">
        <?php 
          include '../admin/koneksi.php';
          $data = mysqli_query($conn, "SELECT * FROM konten WHERE type_id=3");
          while($row = mysqli_fetch_assoc($data)){
        ?>
        <div class="col-4 mt-3">
          <div class="card mb-3">
            <img class="card-img-top" src="../admin/assets/img/konten/<?php echo $row['photo'] ?>" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title"><?php echo $row['judul'] ?></h5>
              <p class="card-text"><?php echo substr($row['deskripsi'],0,150); ?></p>
              <button class="card-text btn btn-primary float-right" type="submit"><i class="fa fa-arrow-right"></i></button>
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
                  }else if(($tahun == 0 )&&($hari == 0)){
                    echo "Terakhir Update Pada ".$jam." Jam ".$menit." Menit"; 
                  }else if($tahun == 0){
                    echo "Terakhir Update Pada ".$hari." hari ".$jam." Jam ".$menit." Menit"; 
                  }else if(($tahun == 0 )&&($hari == 0) && ($jam == 0)){
                    echo "Terakhir Update Pada ".$menit." Menit"; 
                  }
                ?>
              </small></p>
            </div>
          </div>
        </div>
        <?php } ?>
      </div>
    </div>

<?php include 'include/footer.php'; ?>