<?php
    if($_POST){
    require "connection.php";

    $nama_paket = strtolower(stripslashes($_POST["nama_paket"]));
    $jenis = strtolower(stripslashes($_POST["jenis"]));
    $harga = strtolower(stripslashes($_POST["harga"]));

    $insert=mysqli_query($conn,"INSERT INTO paket(nama_paketjenis, harga) value ('".$nama_paket."','".$jenis."','".$harga."')") or die(mysqli_error($conn));
        if($insert){    
                echo "<script>alert('Sukses menambahkan type');location.href='view_service.php';</script>";
            } else {
                echo "<script>alert('Gagal menambahkan type');location.href='add_service.php';</script>";
            } 

        }

    
?>