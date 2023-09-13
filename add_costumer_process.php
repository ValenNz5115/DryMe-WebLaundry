<?php
    if($_POST){
    require "connection.php";

    $nama_costumer = strtolower(stripslashes($_POST["nama_costumer"]));
    $alamat = strtolower(stripslashes($_POST["alamat"]));
    $telp = strtolower(stripslashes($_POST["telp"]));
    $gender = strtolower(stripslashes($_POST["gender"]));
    $id_outlet = strtolower(stripslashes($_POST["id_outlet"]));


    $result = mysqli_query($conn, "SELECT nama_costumer FROM costumer WHERE nama_costumer = '$nama_costumer'");

    if( mysqli_fetch_assoc($result)){
        echo "<script>
            alert('nama_costumer sudah terdaftar!');
            location.href='add_costumer.php';
            </script>";
            return false;
    }   

    /* enkripsi password */
        $insert=mysqli_query($conn,"INSERT INTO costumer(id_outlet, nama_costumer, alamat, telp, gender) value ('".$id_outlet."','".$nama_costumer."','".$alamat."','".$telp."','".$gender."')") or die(mysqli_error($conn));
        if($insert){
                echo "<script>alert('Sukses menambahkan costumer');location.href='view_costumer.php';</script>";
            } else {
                echo "<script>alert('Gagal menambahkan costumer');location.href='add_costumer.php';</script>";
            } 

        }

    
?>