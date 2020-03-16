<?php include 'include/header.php'; ?>
<?php include 'include/navbar.php'; ?>
    
    <div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url('assets/images/bg_1.jpg')">
        <div class="container">
          <div class="row align-items-end">
            <div class="col-lg-7">
              <h2 class="mb-0">Kontak Kami / Kritik & Saran</h2>
            </div>
          </div>
        </div>
      </div> 
    

    <div class="custom-breadcrumns border-bottom">
      <div class="container">
        <a href="index.php">Home</a>
        <span class="mx-3 icon-keyboard_arrow_right"></span>
        <span class="current">Kontak</span>
      </div>
    </div>

    <div class="container">
      <div class="row">
        <div class="container">
          <div class="row">
            <div class="col-6 p-5">
              <img src="assets/images/inf.png" alt="" class="rounded mx-auto d-block p-5">
            </div>
            <div class="col-6 p-5">
              <form action="aksiKontak.php" method="post">
                <h5>Kontak Kami / Kritik & Saran</h5>
                <div class="form-group">
                  <lable class="form-control-label">Nama</lable>
                  <input type="text" name="nama" class="form-control" required>
                </div>
                <div class="form-group">
                  <lable class="form-control-label">Email</lable>
                  <input type="email" name="email" class="form-control" required>
                </div>
                <div class="form-group">
                  <lable class="form-control-label">Judul</lable>
                  <input type="text" name="judul" class="form-control" required>
                </div>
                <div class="form-group">
                  <lable class="form-control-label">Isi</lable>
                  <textarea name="isi" class="form-control" rows="5" requirec></textarea>
                </div>
                <button class="btn btn-success text-white float-right" type="submit"> Kirim </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

<?php include 'include/footer.php'; ?>