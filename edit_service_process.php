<?php
    if ($_POST) {
        include "connection.php";
        $id_paket=$_POST["id_paket"];
        $id_outlet=$_POST["id_outlet"];
        $jenis = $_POST["jenis"];
        $harga = $_POST["harga"];
       
            $sql=mysqli_query($conn, "SELECT * FROM paket WHERE   id_paket='$id_paket'");    
            $update= mysqli_query ($conn, "UPDATE paket SET id_outlet='".$id_outlet."', jenis='".$jenis."', harga='".$harga."' where id_paket='".$id_paket."' ") or die (mysqli_error($conn));
                if ($update) {
                    echo "<script> alert ('Sukses update paket'); location.href='view_service.php' ; </script>";  
                }else{
                    echo "<script> alert ('Gagal update paket'); location.href='edit_service.php' ; </script>";
                } 
    }
    
?>