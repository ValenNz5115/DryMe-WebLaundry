<?php
    if($_POST){
    require "connection.php";

    $nama_user = strtolower(stripslashes($_POST["nama_user"]));
    $alamat = strtolower(stripslashes($_POST["alamat"]));
    $telp = strtolower(stripslashes($_POST["telp"]));
    $username = strtolower(stripslashes($_POST["username"]));
    $role = strtolower(stripslashes($_POST["role"]));
    $id_outlet = strtolower(stripslashes($_POST["id_outlet"]));


    $file_tmp = $_FILES['foto_profile']['tmp_name'];
    $file_name=rand(0,9999).$_FILES['foto_profile']['name'];
    $file_size= $_FILES['foto_profile']['size'];
    $file_type= $_FILES['foto_profile']['type'];

    if($file_size < 2048000 and ($file_type == "image/jpeg" or $file_type== "image/png" or $file_type == "image/jpg")){
        move_uploaded_file($file_tmp, 'img/'.$file_name);

         /* 
       stripslashes : menghapus slas
       strtolower   : merubah huruf besar ke kecil
    */
    $password = mysqli_real_escape_string($conn, $_POST["password"]);
    /* 
        mysqli_real_escape_string() : Memungkinakan user bisa memasukan tanda kutip 
    */

    /* Cek username sudah adda atau belum */
    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");

    if( mysqli_fetch_assoc($result)){
        echo "<script>
            alert('username sudah terdaftar!');
            location.href='add_employee.php';
            </script>";
            return false;
    }   

    /* enkripsi password */
    $password = password_hash($password, PASSWORD_DEFAULT);
        $insert=mysqli_query($conn,"INSERT INTO user(nama_user, telp, username, password,id_outlet, role, foto_profile) value ('".$nama_user."','".$telp."','".$username."','".$password."','".$id_outlet."','".$role."','".$file_name."')") or die(mysqli_error($conn));
        if($insert){
                echo "<script>alert('Sukses menambahkan petugas');location.href='view_employee.php';</script>";
            } else {
                echo "<script>alert('Gagal menambahkan petugas');location.href='view_employee.php';</script>";
            } 

    }else{
        echo "<script>alert('file tidak sesuai : file foto format jpeg, jpg and png');location.href='add_employee.php';</script>";
    }
}
    
?>