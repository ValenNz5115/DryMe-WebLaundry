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
        $qry_get_costumer=mysqli_query($conn, "select * from costumer where id_costumer ='".$_GET['id_costumer']."'");
        $dt_costumer=mysqli_fetch_array($qry_get_costumer);
    ?>

    <div class="container">
        <div class="content my-3">
            <h3 class=" mb-2 text-center">Ubah costumer</h3>
            <form action="edit_costumer_process.php" method="POST">
                <input type="hidden" name="id_costumer" value="<?=$dt_costumer['id_costumer']?>">
                <!-- Nama costumer -->
                <div class="mb-2">
                    <label class="form-label">Nama costumer :</label>
                    <input type="text" name="nama_costumer" class="form-control"  value="<?=$dt_costumer['nama_costumer']?>" placeholder="Masukkan Nama costumer" required>
                </div>
                
                 <!-- Alamat costumer -->
                 <div class="mb-2">
                    <label class="form-label">Alamat costumer :</label>
                    <input type="text" name="alamat" class="form-control"  value="<?=$dt_costumer['alamat']?>" placeholder="Masukkan Nama costumer" required>
                </div>

                <!-- Telp costumer -->
                <div class="mb-2">
                    <label class="form-label">Telp costumer :</label>
                    <input type="text" name="telp" class="form-control"  value="<?=$dt_costumer['telp']?>" placeholder="Masukkan Nama costumer" required>
                </div>

                <!-- Gender -->
                <div class="mb-2">
                    <label for="gender" class="form-label">Gender :</label>
                    <?php
                        $arr_gender=array('L'=>'Laki-laki','P'=>'Perempuan');
                    ?>
                    <select name="gender" class="form-control form" required>
                        <option></option>
                            <?php foreach ($arr_gender as $key_gender => $val_gender):?>
                            <option value="<?=$key_gender?>"><?=$val_gender?></option>
                            <?php endforeach ?>
                    </select>
                </div>

                <input type = "submit" name ="simpan" value ="Ubah costumer" class = "btn1 mb-2">
                
                
            </form>
        </div>
    </div>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>