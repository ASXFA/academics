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
        <span class="current">Berita</span>
      </div>
    </div>

    <div class="container">
      <h4 class="text-center mt-3">Berita Informatika UNLA</h4>
      <div class="row">
        <?php 
          include '../admin/koneksi.php';
          $data = mysqli_query($conn, "SELECT * FROM konten WHERE type_id=1");
          while($row = mysqli_fetch_assoc($data)){
        ?>
        <div class="col-4 mt-3">
          <div class="card mb-3">
            <img class="card-img-top" src="../admin/assets/img/konten/<?php echo $row['photo'] ?>" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title"><?php echo $row['judul'] ?></h5>
              <p class="card-text"><?php echo substr($row['deskripsi'],0,150); ?></p>
              <a href="detailKonten.php?id=<?php echo $row['id'] ?>" class="card-text btn btn-primary float-right"><i class="fa fa-arrow-right"></i></a>
              <p class="card-text"><small class="text-muted">
                <?php 
                  if ($row['tanggal_edit']!=NULL) {
                    $awal = date_create($row['tanggal_edit']);;
                  }else{
                    $awal = date_create($row['tanggal_buat']);
                  }
                  $akhir = date_create();
                  $diff = date_diff($awal,$akhir);

                  if ($diff->y > 0 ) {
                    echo "Terakhir Update Pada ".$diff->y." tahun ".$diff->m." Bulan".$diff->d." hari ".$jam." Jam ".$menit." Menit"; 
                  }else if(($diff->y == 0 )&&($diff->m > 0)){
                    echo "Terakhir Update Pada ".$diff->m." Bulan ".$diff->d." Hari ".$diff->h." Jam ".$diff->i." Menit"; 
                  }else if(($diff->y == 0 )&&($diff->m == 0)&&($diff->d > 0)){
                    echo "Terakhir Update Pada ".$diff->d." Hari ".$diff->h." Jam ".$diff->i." Menit"; 
                  }else if(($diff->y == 0 )&&($diff->m == 0)&&($diff->d == 0)&&($diff->h > 0)){
                    echo "Terakhir Update Pada ".$diff->h." Jam ".$diff->i." Menit"; 
                  }else if(($diff->y == 0 )&&($diff->m == 0)&&($diff->d == 0)&&($diff->h == 0)){
                    echo "Terakhir Update Pada ".$diff->i." Menit"; 
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