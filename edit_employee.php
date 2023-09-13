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

</head>
<body>
    <?php
        include "connection.php";
        $qry_get_user=mysqli_query($conn, "select * from user where id_user ='".$_GET['id_user']."'");
        $dt_user=mysqli_fetch_array($qry_get_user);
    ?>

<div class="container">
        <div class="content my-3">
            <h3 class=" mb-2 text-center">Ubah user</h3>
            <form action="edit_employee_process.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id_user" value="<?=$dt_user['id_user']?>">
                <!-- Nama user -->
                <div class="mb-2">
                    <label class="form-label">Nama user :</label>
                    <input type="text" name="nama_user" class="form-control"  value="<?=$dt_user['nama_user']?>" placeholder="Masukkan Nama user" required>
                </div>
                
                <!-- Telp user -->
                <div class="mb-2">
                    <label class="form-label">Telp user :</label>
                    <input type="text" name="telp" class="form-control"  value="<?=$dt_user['telp']?>" placeholder="Masukkan Nama user" required>
                </div>

                 <!-- Username user -->
                 <div class="mb-2">
                    <label class="form-label">Username :</label>
                    <input type="text" name="username" class="form-control"  value="<?=$dt_user['username']?>" placeholder="Masukkan Nama user" required>
                </div>

                <!-- Password -->
                <div class="mb-2">
                    <label class="form-label">Password :</label>
                    <input type="password" name="password" class="form-control"  value="<?=$dt_user['password']?>" placeholder="*******" required>
                </div>

                <!-- role -->
                <div class="mb-2">
                    <label for="role" class="form-label">role :</label>
                    <?php
                        $arr_role=array('admin'=>'admin','kasir'=>'kasir','owner'=>'owner');
                    ?>
                    <select name="role" class="form-control form" required>
                        <option></option>
                            <?php foreach ($arr_role as $key_role => $val_role):?>
                            <option value="<?=$key_role?>"><?=$val_role?></option>
                            <?php endforeach ?>
                    </select>
                </div>

                 <!-- Id Outlet -->
                 <div class="mb-2">
                    <label class="form-label">Id Outlet :</label>
                    <input type="number" name="id_outlet" class="form-control"  value="<?=$dt_user['id_outlet']?>" placeholder="Masukkan Nama user" required>
                </div>

                <div class="mb-2">
                    <label for="formFile" class="form-label">Foto Produk :</label>
                    <div>
                        <img src="img/<?php echo $dt_user['foto_profile']; ?>" width="100px">
                    </div>
                </div>
                <div class="mb-4">
                    <label for="formFile" class="form-label">Ubah Foto Produk :</label>
                    <input class="form-control" type="file" name="foto_profile">
                </div>

                <input type = "submit" name ="simpan" value ="Ubah user" class = "btn1 mb-2">
                
                
            </form>
        </div>
    </div>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>