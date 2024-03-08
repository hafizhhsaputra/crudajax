<!DOCTYPE html>
<html>
<head>
    <title>Form Pendaftaran Anggota</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <?php
    include "koneksi.php";

    function input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if (isset($_GET['nim'])) {
        $nim = input($_GET["nim"]);

        $sql = "SELECT * FROM crud WHERE nim=$nim";
        $hasil = mysqli_query($con, $sql);
        $data = mysqli_fetch_assoc($hasil);
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
        $nim=input($_POST["nim"]);
        $name=input($_POST["name"]);
        $alamat=input($_POST["alamat"]);
        $kodeProdi=input($_POST["kode_prodi"]);
        $jurusan=input($_POST["jurusan"]);
        $namaDosen=input($_POST["namadosen"]);

        $sql="update crud set
        nama='$nama',
        sekolah='$sekolah',
        jurusan='$jurusan',
        no_hp='$no_hp',
        alamat='$alamat'
        where crud=$nim";

    //Mengeksekusi atau menjalankan query diatas
         $hasil=mysqli_query($con,$sql);

        //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
        if ($hasil) {
            header("Location:index.php");
        }
        else {
            echo "<div class='alert alert-danger'> Data Gagal diupdate.</div>";

        }

    }
    ?>
    <h2>Update Data</h2>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <div class="form-group">
            <label>Nim:</label>
            <input type="text" name="nim" class="form-control" placeholder="Masukkan Nim" required />

        </div>
        <div class="form-group">
            <label>Nama:</label>
            <input type="text" name="name" class="form-control" placeholder="Masukkan Nama" required/>
        </div>
        <div class="form-group">
            <label>Alamat :</label>
            <input type="text" name="alamat" class="form-control" placeholder="Masukkan Alamat" required/>
        </div>
        <div class="form-group">
            <label>Kode Prodi:</label>
            <input type="text" name="kode_prodi" class="form-control" placeholder="Masukkan Kode Prodi" required/>
        </div>
        <div class="form-group">
            <label>Jurusan:</label>
            <textarea name="jurusan" class="form-control" rows="5"placeholder="Masukkan Jurusan" required></textarea>
        </div>
        <div class="form-group">
            <label>Nama Dosen:</label>
            <textarea name="namadosen" class="form-control" rows="5"placeholder="Masukkan Nama Dosen" required></textarea>
        </div>

        <input type="hidden" name="crud" value="<?php echo $crud['crud']; ?>" />

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>
