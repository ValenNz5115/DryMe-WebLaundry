<?php
    if ($_POST) {
        include "connection.php";
        $id_costumer=$_POST["id_costumer"];
        $nama_costumer = $_POST["nama_costumer"];
        $alamat = $_POST["alamat"];
        $telp = $_POST["telp"];
        $gender = $_POST["gender"];


        
            $sql=mysqli_query($conn, "SELECT * FROM costumer WHERE   id_costumer='$id_costumer'");    
            $update= mysqli_query ($conn, "UPDATE costumer SET nama_costumer='".$nama_costumer."', alamat='".$alamat."', telp='".$telp."', gender='".$gender."' where id_costumer='".$id_costumer."' ") or die (mysqli_error($conn));
                if ($update) {
                    echo "<script> alert ('Sukses update costumer'); location.href='view_costumer.php' ; </script>";  
                }else{
                    echo "<script> alert ('Gagal update costumer'); location.href='edit_costumer.php' ; </script>";
                } 
    }
    
?>