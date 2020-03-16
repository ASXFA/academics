<?php 
    include "../admin/koneksi.php";
    
    $id = $_GET['id'];
    $query = mysqli_query($conn, "SELECT * FROM konten WHERE id='$id' LIMIT 1 ");
?>

<?php include 'include/header.php'; ?>
<?php include 'include/navbar.php'; ?>
    
    <div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url('assets/images/bg_1.jpg')">
        <div class="container">
          <div class="row align-items-end">
            <div class="col-lg-7">
              <h2 class="mb-0">Konten Detail</h2>
            </div>
          </div>
        </div>
      </div> 
    

    <div class="custom-breadcrumns border-bottom">
      <div class="container">
        <a href="index.php">Home</a>
        <span class="mx-3 icon-keyboard_arrow_right"></span>
        <span class="current">Konten Detail</span>
      </div>
    </div>

    <div class="container">
        <div class="card m-4">
            <div class="card-body">
                <?php while($row = mysqli_fetch_array($query)){ ?>
                <h3 class="card-title"><?php echo $row['judul'] ?></h3>
                <img src="../admin/assets/img/konten/<?php echo $row['photo'] ?>" width="70%" alt="photo" class="rounded mx-auto d-block p-3">
                <p class="card-text"><?php echo $row['deskripsi'] ?></p>
                <a href="index.php" class="btn btn-primary float-right"><i class="fa fa-arrow-left"></i> Back to Home </a>
                <?php } ?>
            </div>
        </div>
    </div>

<?php include 'include/footer.php'; ?>