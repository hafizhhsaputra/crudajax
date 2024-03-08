<!DOCTYPE html>
<html>
<head>
    <title>Form Pendaftaran Peserta</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <?php
    //Include file koneksi, untuk koneksikan ke database
    include "koneksi.php";

    //Fungsi untuk mencegah inputan karakter yang tidak sesuai
    function input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    //Cek apakah ada kiriman form dari method post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $nim=input($_POST["nim"]);
        $name=input($_POST["name"]);
        $alamat=input($_POST["alamat"]);
        $kodeProdi=input($_POST["kode_prodi"]);
        $jurusan=input($_POST["jurusan"]);
        $namaDosen=input($_POST["namadosen"]);

        //Query input menginput data kedalam tabel anggota
        $hasil = "UPDATE crud
        SET nim='$nim', alamat='$alamat', kode_prodi='$kodeProdi', jurusan='$jurusan', namadosen='$namaDosen'
        WHERE nim='$nim'";

        //Mengeksekusi/menjalankan query diatas
        $hasil=mysqli_query($con,$sql);

        //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
        if ($hasil) {
            header("Location:index.php");
        }
        else {
            echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";

        }

    }
    ?>
    <h2>Input Data</h2>


    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
        <div class="form-group">
            <label>Nim:</label>
            <input type="text" name="nim" class="form-control" placeholder="Masukan NIM" required />
        </div>
        <div class="form-group">
            <label>Nama:</label>
            <input type="text" name="name" class="form-control" placeholder="Masukan Nama" required/>
        </div>
       <div class="form-group">
            <label>Alamat :</label>
            <input type="text" name="alamat" class="form-control" placeholder="Masukan Alamat" required/>
        </div>
        <div class="form-group">
            <label>Kode Prodi :</label>
            <input type="text" name="kode_prodi" class="form-control" placeholder="Kode Prodi" required/>
        </div>
                </p>
        <div class="form-group">
            <label>jurusan :</label>
            <input type="text" name="jurusan" class="form-control" placeholder="Masukan Jurusan" required/>
        </div>
        <div class="form-group">
            <label>Nama Dosen:</label>
            <textarea name="namadosen" class="form-control" rows="5"placeholder="Masukan Nama Dosen" required></textarea>
        </div>       

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>