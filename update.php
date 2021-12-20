<?php
    include 'koneksi.php';

    $idpariwisata=$_GET['idpariwisata'];
    $sqlGet="SELECT * FROM pariwisata WHERE idpariwisata='$idpariwisata'";
    $queryGet= mysqli_query($conn, $sqlGet);
    $data= mysqli_fetch_array($queryGet);
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
        <form action="update.php" method="post">
            <label for="idpariwisata">ID Pariwisata</label>
            <input type="text" id="idpariwisata" name="idpariwisata" value="<?php echo "$data[idpariwisata]";?>" class="form-control" readonly>

            <label for="kategori">Kategori</label>
            <select name="kategori" id="kategori" class="form-select" required>
                <option ><?php echo "$data[kategori]";?></option>
                <option value="pegunungan">Pegunungan</option>
                <option value="wisatakeluarga">Wisata Keluarga</option>
                <option value="wisatapendidikan">Wisata Pendidikan</option>
                <option value="wisataalam">Wisata Alam</option>
                <option value="akomodasi">Akomodasi</option>
            </select>

            <label for="namapariwisata">Nama Pariwisata</label>
            <input type="text" id="namapariwisata" name="namapariwisata" value="<?php echo "$data[namapariwisata]";?>" class="form-control" required>

            <label for="alamat">Alamat</label>
            <input type="text" id="alamat" name="alamat" value="<?php echo "$data[alamat]";?>" class="form-control" required>

            <input class="btn btn-warning mt-3" type="submit" name="tambah" value="Update Data">
        </form>
    </div>
    
    <?php
        if(isset($_POST ['tambah'])){
            $idpariwisata=$_POST['idpariwisata'];
            $kategori=$_POST['kategori'];
            $namapariwisata=$_POST['namapariwisata'];
            $alamat=$_POST['alamat'];

            
            $sqlUpdate="UPDATE pariwisata 
                        SET kategori='$kategori', namapariwisata='$namapariwisata', alamat='$alamat'
                        WHERE idpariwisata='$idpariwisata'";

            $queryUpdate=mysqli_query($conn,$sqlUpdate);

            header("location:index.php");
        }
    ?>
</body>
</html>