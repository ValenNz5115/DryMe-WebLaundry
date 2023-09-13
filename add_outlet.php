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
            <h3 class=" mb-2 text-center">Add Outlet</h3>
            <form action="add_outlet_process.php" method="POST" enctype="multipart/form-data">
                <!-- Nama outlet -->
                <div class="mb-2">
                    <label class="form-label">Nama outlet :</label>
                    <input type="text" name="nama_outlet" class="form-control" placeholder="Masukkan Nama outlet" required>
                </div>
                <!-- Alamat -->
                <div class="mb-2">
                    <label class="form-label">Alamat :</label>
                    <textarea name="alamat" class="form-control textarea" rows="4" placeholder="Masukkan Alaat outlet" required></textarea>
                </div>
                <!-- Telp -->
                <div class="mb-2">
                    <label class="form-label">No Telp outlet :</label>
                    <input type="telp" name="telp" class="form-control" placeholder="Masukkan Nomer Telp outlet" required>
                </div>
                <input type = "submit" name ="simpan" value ="Tambah Outlet" class = "btn1 mb-2">
                <a class="btn btn-outline-dark" href="employee_data.php" role="button">Cancel</a>
            </form>
        </div>
    </div>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>