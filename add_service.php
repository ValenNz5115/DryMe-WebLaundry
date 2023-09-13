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
    <div class="container">
        <div class="content my-3">
            <h3 class=" mb-2 text-center">Add type</h3>
            <form action="add_service_process.php" method="POST" >
                <!-- nama Paket -->
                <div class="mb-2">
                    <label class="form-label">Nama Paket :</label>
                    <input type="text" name="nama_paket" class="form-control" placeholder="Masukkan nama_paket" required>
                </div>
                
                <!-- jenis -->
                <div class="mb-2">
                    <label for="jenis" class="form-label">jenis :</label>
                    <?php
                        $arr_jenis=array('kg'=>'kg','pcs'=>'pcs');
                    ?>
                    <select name="jenis" class="form-control form" required>
                        <option></option>
                            <?php foreach ($arr_jenis as $key_jenis => $val_jenis):?>
                            <option value="<?=$key_jenis?>"><?=$val_jenis?></option>
                            <?php endforeach ?>
                    </select>
                </div>
                <!-- Harga -->
                <div class="mb-2">
                    <label class="form-label">Harga :</label>
                    <input type="number" name="harga" class="form-control" placeholder="Masukkan Harga" required>
                </div>

                <input type = "submit" name ="simpan" value ="Tambah Profile" class = "btn1 mb-2">
                <a class="btn btn-outline-dark" href="view_service.php" role="button">Cancel</a>
            </form>
        </div>
    </div>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>