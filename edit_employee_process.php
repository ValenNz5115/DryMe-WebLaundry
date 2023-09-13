<?php
    if ($_POST) {
        include "connection.php";
        $id_user=$_POST["id_user"];
        $nama_user = $_POST["nama_user"];
        $telp = $_POST ["telp"];
        $username = $_POST ["username"];
        $password = $_POST ["password"];
        $role = $_POST ["role"];
        $id_outlet=$_POST["id_outlet"];

        if ($_FILES['foto_profile']['tmp_name']) {
            $file_tmp = $_FILES['foto_profile']['tmp_name'];
            $file_name=rand(0,9999).$_FILES['foto_profile']['name'];
            $file_size= $_FILES['foto_profile']['size'];
            $file_type= $_FILES['foto_profile']['type'];
            $folder="img/";
            $sql=mysqli_query($conn, "select * from user where id_user='$id_user'");
            $user=mysqli_fetch_array($sql);
            $path=$folder.$user["foto_profile"];
            if(file_exists($path)){
                unlink($path); 
            }
            if($file_size < 2048000 and ($file_type == "image/jpeg" or $file_type== "image/png" or $file_type == "image/jpg")){
                move_uploaded_file($file_tmp, $folder.$file_name);
                $update= mysqli_query ($conn, "UPDATE user SET nama_user='".$nama_user."', telp='".$telp."',username='".$username."',password='".$password."',id_outlet='".$id_outlet."',role='".$role."'where id_user='".$id_user."'") or die (mysqli_error($conn));
                if ($update) {
                    echo "<script> alert ('Sukses update user'); location.href='view_employee.php   ' ; </script>";  
                }else{
                    echo "<script> alert ('Gagal update user'); location.href='view_employee.php    ' ; </script>";
                } 
            }
            else{
                echo "<script>alert('file tidak sesuai');location.href='view_employee.php   ';</script>";
            }
        }
        else{
            $update= mysqli_query ($conn, "UPDATE user SET nama_user='".$nama_user."',telp='".$telp."',username='".$username."',password='".$password."',id_outlet='".$id_outlet."', role='".$role."' where id_user='".$id_user."'") or die (mysqli_error($conn));
                if ($update) {
                    echo "<script> alert ('Sukses update user'); location.href='view_employee.php   ' ; </script>";  
                }else{
                    echo "<script> alert ('Gagal update user'); location.href='view_employee.php    ' ; </script>";
                } 
        }
    }
?>