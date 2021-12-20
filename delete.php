<?php
    include 'koneksi.php';

    $idpariwisata=$_GET['idpariwisata'];
    $sqlDelete="DELETE FROM pariwisata WHERE idpariwisata='$idpariwisata'";

    mysqli_query($conn, $sqlDelete);

    header("location: index.php")
?>