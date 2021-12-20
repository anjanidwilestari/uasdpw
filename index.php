<?php
    include 'koneksi.php'
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
    <!-- Awal Tabel Pariwisata -->
    <div class="container mt-3">
        <a href="add.php" class="btn btn-primary btn-md mb-3">Tambah Data</a>


        <table class="table table-striped table-hover table-bordered ">
            <thead class="table-dark">
                <th>ID Pariwisata</th>
                <th>Kategori</th>
                <th>Nama Pariwisata</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </thead>

            <?php
                $sqlGet="SELECT * FROM pariwisata";
                $query = mysqli_query($conn, $sqlGet);

                while($data=mysqli_fetch_array($query)){
                    echo "
                        <tbody>
                            <tr>
                                <td>$data[idpariwisata]</td>
                                <td>$data[kategori]</td>
                                <td>$data[namapariwisata]</td>
                                <td>$data[alamat]</td>
                                <td>
                                    <div class='row'>
                                        <div class='col d-flex justify-content-center'>
                                            <a href='update.php?idpariwisata=$data[idpariwisata]' class='btn btn-sm btn-warning'>Update</a>
                                        </div>
                                        <div class='col d-flex justify-content-center'>
                                            <a href='delete.php?idpariwisata=$data[idpariwisata]' class='btn btn-sm btn-danger'>Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    ";
                }
            ?>

            
        </table>

    </div>
    <!-- Akhir Tabel Pariwisata -->


    

</body>
</html>