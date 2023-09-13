<?php
    if ($_POST) {
        include "connection.php";
        $id_outlet=$_POST["id_outlet"];
        $nama_outlet = $_POST["nama_outlet"];
        $alamat = $_POST["alamat"];
        $telp = $_POST["telp"];

        
            $sql=mysqli_query($conn, "select * from outlet where id_outlet='$id_outlet'");    
            $update= mysqli_query ($conn, "update outlet set nama_outlet='".$nama_outlet."', alamat='".$alamat."', telp='".$telp."' where id_outlet='".$id_outlet."' ") or die (mysqli_error($conn));
                if ($update) {
                    echo "<script> alert ('Sukses update outlet'); location.href='view_outlet.php' ; </script>";  
                }else{
                    echo "<script> alert ('Gagal update outlet'); location.href='add_outlet.php' ; </script>";
                } 
    }
    
?>