<?php
// Load file koneksi.php
include "../koneksi/koneksi.php";
 session_start();
// Ambil Data yang Dikirim dari Form
$nama_file = $_FILES['gambar']['name'];
$ukuran_file = $_FILES['gambar']['size'];
$tipe_file = $_FILES['gambar']['type'];
$tmp_file = $_FILES['gambar']['tmp_name'];
 
//echo var_dump($_FILES);
//echo $nama_file;
// Set path folder tempat menyimpan gambarnya
$path = "images/".$nama_file;
 
if($tipe_file == "image/jpeg" || $tipe_file == "image/png"){ // Cek apakah tipe file yang diupload adalah JPG / JPEG / PNG
    // Jika tipe file yang diupload JPG / JPEG / PNG, lakukan :
    if($ukuran_file <= 1000000){ // Cek apakah ukuran file yang diupload kurang dari sama dengan 1MB
        // Jika ukuran file kurang dari sama dengan 1MB, lakukan :
        // Proses upload
        $cek = mysqli_query($conn,"SELECT nama from gambar where username = '".$_SESSION['pic']."' ");
         $row_cek = mysqli_fetch_array($cek);
         $qount = mysqli_num_rows($cek);

         if($qount==1){/*mulai cek*/
            $del = mysqli_query($conn,"DELETE from gambar where username = '".$_SESSION['pic']."' ");

            if(move_uploaded_file($tmp_file, $path)){ // Cek apakah gambar berhasil diupload atau tidak
            // Jika gambar berhasil diupload, Lakukan : 
            // Proses simpan ke Database
                $query = mysqli_query($conn,"INSERT INTO gambar(nama,ukuran,tipe,username) VALUES('".$nama_file."','".$ukuran_file."','".$tipe_file."', '".$_SESSION['pic']."')");
                //$sql = mysql_query($query); // Eksekusi/ Jalankan query dari variabel $query
                 


                        if($query){ // Cek jika proses simpan ke database sukses atau tidak
                            // Jika Sukses, Lakukan :
                            ?>
                                <img src="<?php echo $path; ?>" width="500px">
                            <?php
                            //header("location: index.php"); // Redirectke halaman index.php
                        }else{
                            // Jika Gagal, Lakukan :
                            //echo $query;
                            echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
                        }

                }else{
                    // Jika gambar gagal diupload, Lakukan :
                    echo "Maaf, Gambar gagal untuk diupload.";
                }
            
         }else{

                if(move_uploaded_file($tmp_file, $path)){ // Cek apakah gambar berhasil diupload atau tidak
            // Jika gambar berhasil diupload, Lakukan : 
            // Proses simpan ke Database
                $query = mysqli_query($conn,"INSERT INTO gambar(nama,ukuran,tipe,username) VALUES('".$nama_file."','".$ukuran_file."','".$tipe_file."', '".$_SESSION['pic']."')");
                //$sql = mysql_query($query); // Eksekusi/ Jalankan query dari variabel $query
                 


                        if($query){ // Cek jika proses simpan ke database sukses atau tidak
                            // Jika Sukses, Lakukan :
                            ?>
                                <img src="<?php echo $path; ?>" width="500px">
                            <?php
                            //header("location: index.php"); // Redirectke halaman index.php
                        }else{
                            // Jika Gagal, Lakukan :
                            //echo $query;
                            echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
                        }

                }else{
                    // Jika gambar gagal diupload, Lakukan :
                    echo "Maaf, Gambar gagal untuk diupload.";
                }

         }/*akhir else cek*/
         


        
    }else{
        // Jika ukuran file lebih dari 1MB, lakukan :
        echo "Maaf, Ukuran gambar yang diupload tidak boleh lebih dari 1MB";
    }
}else{
    // Jika tipe file yang diupload bukan JPG / JPEG / PNG, lakukan :
    echo "Maaf, Tipe gambar yang diupload harus JPG / JPEG / PNG.";
}
?>