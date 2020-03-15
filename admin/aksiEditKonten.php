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
        $ekstensi_diperbolehkan	= array('png','jpg');
        $nama = $_FILES['photoNew']['name'];
        $x = explode('.', $nama);
        $ekstensi = strtolower(end($x));
        $ukuran	= $_FILES['photoNew']['size'];
        $file_tmp = $_FILES['photoNew']['tmp_name'];	

        // input lainnya
        $id = $_POST['id'];
        $type_id = $_POST['type_id'];
        $judul = $_POST['judul'];
        $deskripsi = $_POST['deskripsi'];

        if ($nama == "") {
            $photo = $_POST['photo'];

            $query = mysqli_query($conn, "UPDATE konten SET type_id='$type_id', judul='$judul', deskripsi='$deskripsi', photo='$photo', tanggal_edit = CURRENT_TIME() WHERE id='$id'");
            
            if($query){
                ?>
                <script>
                    alert('Data berhasil di Ubah');
                    window.location.href='konten.php';
                </script>
                <?php
            }else{
                ?>
                <script>
                    alert('Data Gagal di Ubah');
                    window.location.href='konten.php';
                </script>
                <?php
            }
        }else{
            if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
                if($ukuran < 10044070){			
                    move_uploaded_file($file_tmp, 'assets/img/konten/'.$nama);
                    $query = mysqli_query($conn,"UPDATE konten SET type_id='$type_id', judul='$judul', deskripsi='$deskripsi', photo='$nama', tanggal_edit   = CURRENT_TIME() WHERE id='$id'");
                    if($query){
                        ?>
                        <script>
                            alert('Data berhasil di Ubah');
                            window.location.href='konten.php';
                        </script>
                        <?php
                    }else{
                        ?>
                        <script>
                            alert('Data Gagal di Ubah');
                            window.location.href='konten.php';
                        </script>
                        <?php
                    }
                }else{
                    ?>
                        <script>
                            alert('Ukuran File Terlalu Besar');
                            window.location.href='konten.php';
                        </script>
                        <?php
                }
            }else{
                ?>
                    <script>
                        alert('Ekstensi photo tidak di perbolehkan');
                        window.location.href='konten.php';
                    </script>
                    <?php
            }
        }
?>