<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<title>
    Kab Pesawaran</title>
<body>
    <nav class="navbar navbar-dark bg-dark">
            <span class="navbar-brand mb-0 h1">Hafizh Saputra 2157301034</span>
        </div>
    </nav>
<div class="container">
    <br>
    <h4><center>DAFTAR Mahasiswa & Pembimbing</center></h4>
<?php

    include "koneksi.php";

    //Cek apakah ada kiriman form dari method post
    if (isset($_GET['crud'])) {
        $id_peserta=htmlspecialchars($_GET["crud"]);

        $sql="delete from crud where crud='$nim' ";
        $hasil=mysqli_query($con,$sql);

        //Kondisi apakah berhasil atau tidak
            if ($hasil) {
                header("Location:index.php");

            }
            else {
                echo "<div class='alert alert-danger'> Data Gagal dihapus.</div>";

            }
        }
?>


     <tr class="table-danger">
            <br>
        <thead>
        <tr>
       <table class="my-3 table table-bordered">
            <tr class="table-primary">           
            <th>No</th>
            <th>Nim</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Kode Prodi</th>
            <th>Jurusan</th>
            <th>Nama Dosen</th>
            <th colspan='2'>Aksi</th>

        </tr>
        </thead>

        <?php
        include "koneksi.php";
        $sql="select * from crud order by nim desc";

        $hasil=mysqli_query($con,$sql);
        $no=0;
        while ($data = mysqli_fetch_array($hasil)) {
            $no++;

            ?>
            <tbody>
            <tr>
                <td><?php echo $no;?></td>
                <td><?php echo $data["nim"]; ?></td>
                <td><?php echo $data["name"];   ?></td>
                <td><?php echo $data["alamat"];   ?></td>
                <td><?php echo $data["kode_prodi"];   ?></td>
                <td><?php echo $data["jurusan"];   ?></td>
                <td><?php echo $data["namadosen"];   ?></td>
                <td>

                <a href="update.php?id=' . $row['crud'] . '" class="btn btn-primary" role="button">Update</a>
                <a href="delete.php?id=' . $row['crud'] . '" class="btn btn-danger" role="button">Delete</a>
                
                </td>
            </tr>
            </tbody>
            <?php
        }
        ?>
    </table>
    <a href="create.php" class="btn btn-primary" role="button">Tambah Data</a>
</div>
</body>
</html>
