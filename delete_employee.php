<?php
    if ($_GET['id_user']) {
        include "connection.php";
        $qry_hapus=mysqli_query($conn, "delete from user where id_user='".$_GET['id_user']."'");
        if ($qry_hapus) {
            echo "<script>alert ('Sukses hapus user'); location.href='view_employee.php';</script>";
        }else {
            echo "<script>alert ('Gagal hapus user'); location.href='view_employee.php';</script>";
        }
    }
?> 