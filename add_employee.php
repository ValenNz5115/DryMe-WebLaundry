<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DryMe</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;600;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/add.css">

     <!-- Kit Font Awesome -->  
     <script src="https://kit.fontawesome.com/1a01d4b743.js" crossorigin="anonymous"></script>

</head>
<body>
    <?php  ?>
    <div class="container">
        <div class="content my-3">
            <h3 class=" mb-2 text-center">Add Employee
</h3>
            <form action="add_employee_process.php" method="POST" enctype="multipart/form-data">
                <!-- Nama Petugas -->
                <div class="mb-2">
                    <label class="form-label">Nama Petugas :</label>
                    <input type="text" name="nama_user" class="form-control" placeholder="Masukkan Nama Petugas" required>
                </div>
                <!-- Telp -->   
                <div class="mb-2">
                    <label class="form-label">No Telp Petugas :</label>
                    <input type="telp" name="telp" class="form-control" placeholder="Masukkan Nomer Telp Petugas" required>
                </div>
                <!-- Username Petugas -->
                <div class="mb-2">
                    <label class="form-label">Username :</label>
                    <input type="text" name="username" class="form-control" placeholder="Masukkan Username Petugas" required>
                </div>
                <!-- Password -->
                <div class="col-lg-7">
                    <label class="form-label">Password :</label>
                    <input type="password" class="form-control my-2 p-2" name="password" placeholder="********" required>
                </div>
                <!-- Role -->
                <?php 
                    if($_SESSION["role"]=='admin' ){
                ?>
                <div class="mb-2">
                    <label for="role" class="form-label">role :</label>
                    <?php
                        $arr_role=array('admin'=>'admin','owner'=>'owner','kasir' =>'kasir');
                    ?>
                    <select name="role" class="form-control form" required>
                        <option></option>
                            <?php foreach ($arr_role as $key_role => $val_role):?>
                            <option value="<?=$key_role?>"><?=$val_role?></option>
                            <?php endforeach ?>
                    </select>
                </div>
                <?php 
                    } elseif($_SESSION["role"]=='owner'){
                ?>
                    <div class="mb-2">
                    <label for="role" class="form-label">role :</label>
                    <?php
                        $arr_role=array('kasir' =>'kasir');
                    ?>
                    <select name="role" class="form-control form" required>
                        <option></option>
                            <?php foreach ($arr_role as $key_role => $val_role):?>
                            <option value="<?=$key_role?>"><?=$val_role?></option>
                            <?php endforeach ?>
                    </select>
                </div>
                <?php
                    } 
                ?>

                <!-- Id_outlet -->   
                <div class="mb-2">
                
                <label for="Outlet" class="form-label">Outlet :</label>
                <select name="id_outlet" id="">
                    <option value=""></option>
                    <?php
                        include "connection.php";
                        $qry_outlet=mysqli_query($conn,"select * from outlet");
                        $no=0;
                        while($data_outlet=mysqli_fetch_array($qry_outlet)){
                        $no++;?>
                        <option value="<?=$data_outlet['id_outlet']?>"><?=$no?> - <?=$data_outlet['nama_outlet']?></option>
                    <?php
                        }
                    ?>
                    </select>
                </div>

                <!-- Foto Profile -->
                <div class="mb-4">
                    <label for="formFile" class="form-label">Foto Profile :</label>
                    <input class="form-control" type="file" name="foto_profile">
                </div>
                <input type = "submit" name ="simpan" value ="Tambah Profile" class = "btn1 mb-2">
                <a class="btn btn-outline-dark" href="view_employee.php" role="button">Cancel</a>
            </form>
        </div>
    </div>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>