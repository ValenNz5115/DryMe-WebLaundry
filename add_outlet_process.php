<?php
    if($_POST){
        $nama_outlet=$_POST['nama_outlet'];
        $alamat=$_POST['alamat'];
        $telp=$_POST['telp'];
       
        include "connection.php";
        $insert=mysqli_query($conn,"insert into outlet (nama_outlet, alamat, telp) value ('".$nama_outlet."', '".$alamat."', '".$telp."')") or die(mysqli_error($conn));
            if($insert){
                echo "<script>alert('Sukses menambahkan outlet');location.href='view_outlet.php';</script>";
            } else {
                echo "<script>alert('Gagal menambahkan outlet');location.href='add_outlet.php';</script>";
            } 
    }
    
?>