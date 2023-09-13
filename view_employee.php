<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DryMe</title>

    <!-- Link Style -->
    <link rel="stylesheet" href="./css/home.css">
    <script src="./js/home.js"></script>

    <!-- Kit Font Awesome -->
    <script src="https://kit.fontawesome.com/1a01d4b743.js" crossorigin="anonymous"></script>

    <link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://use.fontawesome.com/releases/v5.7.2/css/all.css' rel='stylesheet'>

    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js'></script>
    <script type='text/javascript' src='https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js'></script>
</head>
<body>
  
<!-- Dashboard -->
<div class="d-flex flex-column flex-lg-row h-lg-full bg-surface-secondary">
    <!-- Main content -->
    <?php 
    include 'navbar.php';
    ?>
    <div class="h-screen flex-grow-1 overflow-y-lg-auto">
        <!-- Header -->
        <header class="bg-surface-primary border-bottom pt-6">
            <div class="container-fluid">
                <div class="mb-npx">
                    <div class="row align-items-center">
                        <div class="col-sm-6 col-12 mb-4 mb-sm-0">
                            <!-- Title -->
                            <h1 class="h2 mb-0 ls-tight">DryMe</h1>
                            <div class="card-header">
                    <form action="view_employee.php" method="post">
                        <input type="text" name="cari" class="form-control mb-3" placeholder="Masukkan keyword pencarian">
                    </form>
        </div>
                            
                        </div>
                        <!-- Actions -->
                        <div class="col-sm-6 col-12 text-sm-end">
                            <div class="mx-n1">
                                <a href="add_employee.php" class="btn d-inline-flex btn-sm btn-primary mx-1">
                                    <span class=" pe-2">
                                        <i class="bi bi-plus"></i>
                                    </span>
                                    <span>Create</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Main -->
        <main class="py-6 bg-surface-secondary">
            <div class="container-fluid">
               
                <div class="card shadow border-0 mb-7">
                    <div class="card-header">
                        <h5 class="mb-0">Employee Data</h5>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover table-nowrap">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Telephone</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">outlet</th>
                                    <th scope="col">Action</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    require 'connection.php';
                                    if (isset($_POST["cari"])) {
                                        // jika ada keyword pencarian 
                                        $cari=$_POST['cari'];
                                        $query_user= mysqli_query($conn,"SELECT * FROM user WHERE id_user LIKE '%$cari%' OR nama_user LIKE '%$cari%'");
    
                                    }else{
                                        if ($_SESSION["role"]=='admin'){
                                            $query_user= mysqli_query($conn,"SELECT * FROM user");
                                        } else {
                                        //jika tidak ada keyword pencarian
                                        $query_user= mysqli_query($conn,"SELECT * FROM user where id_outlet='".$_SESSION['id_outlet']."'");
                                        }
                                    }
                                    $no=0;
                                    while($data_user = mysqli_fetch_array($query_user)){ 
                                        $no++;
                                    ?>
                                    
                                    <tr>
                                        <th><?= $no ?></th>
                                        <td><?= $data_user["nama_user"]; ?></td>
                                        <td><?= $data_user["telp"]; ?></td>
                                        <td><?= $data_user["username"]; ?></td>
                                        <td><?= $data_user["role"]; ?></td>
                                        <td>
                                            <?php 
                                            // foreign key joi ke primary key di id yag sama dari foerign ke disamakan dengan id di promary key ketika foreinkey sama dengan data yang dimasukan.
                                            $query_outlet = mysqli_query($conn, "SELECT * FROM outlet WHERE id_outlet =".$data_user['id_outlet']);
                                            $tampil_nama_outlet = "<ol>";
                                            while($data_outlet = mysqli_fetch_array($query_outlet)){
                                                $tampil_nama_outlet .= "<li>".$data_outlet['nama_outlet']."</li>";
                                            }
                                            $tampil_nama_outlet .= "</ol>";
                                            ?>
                                            <?=$tampil_nama_outlet?>
                                        </td>
                                        <td> 
                                            <a href="edit_employee.php?id_user=<?=$data_user['id_user']?>" class="btn btn-success">Ubah</a> | <a href="delete_employee.php?id_user=<?=$data_user['id_user']?>" onclick="return confirm ('Apakah anda yakin menghapus data ini?')" class="btn btn-danger">Hapus</a>
                                    </td>
                                    </tr>
                            <?php
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer border-0 py-5">
                        <span class="text-muted text-sm">Showing 10 items out of 250 results found</span>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
</body>
</html>