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
    <link rel="stylesheet" href="./css/navbar.css">

</head>
<body>
    <?php
        include "connection.php";
        $qry_get_outlet=mysqli_query($conn, "select * from outlet where id_outlet ='".$_GET['id_outlet']."'");
        $dt_outlet=mysqli_fetch_array($qry_get_outlet);
    ?>

    <div class="container">
        <div class="content my-3">
            <h3 class=" mb-2 text-center">Ubah outlet</h3>
            <form action="edit_outlet_process.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id_outlet" value="<?=$dt_outlet['id_outlet']?>">
                <!-- Nama outlet -->
                <div class="mb-2">
                    <label class="form-label">Nama outlet :</label>
                    <input type="text" name="nama_outlet" class="form-control"  value="<?=$dt_outlet['nama_outlet']?>" placeholder="Masukkan Nama outlet" required>
                </div>
                
                 <!-- Alamat outlet -->
                 <div class="mb-2">
                    <label class="form-label">Alamat outlet :</label>
                    <input type="text" name="alamat" class="form-control"  value="<?=$dt_outlet['alamat']?>" placeholder="Masukkan Nama outlet" required>
                </div>

                <!-- Telp outlet -->
                <div class="mb-2">
                    <label class="form-label">Telp outlet :</label>
                    <input type="text" name="telp" class="form-control"  value="<?=$dt_outlet['telp']?>" placeholder="Masukkan Nama outlet" required>
                </div>

                <input type = "submit" name ="simpan" value ="Ubah Outlet" class = "btn1 mb-2">
                
                
            </form>
        </div>
    </div>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>