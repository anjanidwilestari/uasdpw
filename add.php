<?php
    include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>Proyek Web UAS</title>
</head>
<body>
    <div class="w-50 mx-auto border p-3 mt-5">
        <a href="index.php">Kembali ke Halaman Utama</a>
        <form action="add.php" method="post">
            <label for="idpariwisata">ID Pariwisata</label>
            <input type="text" id="idpariwisata" name="idpariwisata" class="form-control" required>

            <label for="kategori">Kategori</label>
            <select name="kategori" id="kategori" class="form-select" required>
                <option >Pilih Kategori</option>
                <option value="pegunungan">Pegunungan</option>
                <option value="wisatakeluarga">Wisata Keluarga</option>
                <option value="wisatapendidikan">Wisata Pendidikan</option>
                <option value="wisataalam">Wisata Alam</option>
                <option value="akomodasi">Akomodasi</option>
            </select>

            <label for="namapariwisata">Nama Pariwisata</label>
            <input type="text" id="namapariwisata" name="namapariwisata" class="form-control" required>

            <label for="alamat">Alamat</label>
            <input type="text" id="alamat" name="alamat" class="form-control" required>

            <input class="btn btn-success mt-3" type="submit" name="tambah" value="Tambah Data">
        </form>
    </div>
    
    <?php
        if(isset($_POST ['tambah'])){
            $idpariwisata=$_POST['idpariwisata'];
            $kategori=$_POST['kategori'];
            $namapariwisata=$_POST['namapariwisata'];
            $alamat=$_POST['alamat'];

            $sqlGet="SELECT * FROM pariwisata WHERE idpariwisata='$idpariwisata'";
            $queryGet = mysqli_query($conn, $sqlGet);
            $cek=mysqli_num_rows($queryGet);

            $sqlInsert = "INSERT INTO pariwisata(idpariwisata, kategori, namapariwisata, alamat)
                            VALUES ('$idpariwisata', '$kategori', '$namapariwisata', '$alamat')";

            $queryInsert = mysqli_query($conn, $sqlInsert);

            if(isset($sqlInsert) && $cek <= 0){
                echo"
                    <div class='alert alert-success'>Data berhasil ditambahakan <a href='index.php'>Lihat data</a></div>
                ";
            }else if ($cek >= 0){
                echo"
                    <div class='alert alert-danger'>Data gagal ditambahakan <a href='index.php'>Lihat data</a></div>
                ";
            }
        }
        
    ?>

</body>
</html>
<!-- date_isodate_set -->