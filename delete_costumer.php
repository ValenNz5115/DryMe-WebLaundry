<?php
    if ($_GET['id_costumer']) {
        include "connection.php";
        $qry_hapus=mysqli_query($conn, "delete from costumer where id_costumer='".$_GET['id_costumer']."'");
        if ($qry_hapus) {
            echo "<script>alert ('Sukses hapus costumer'); location.href='view_costumer.php';</script>";
        }else {
            echo "<script>alert ('Gagal hapus costumer'); location.href='view_costumer.php';</script>";
        }
    }
?> 