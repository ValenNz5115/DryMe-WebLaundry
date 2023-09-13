
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DryMe</title>

    <!-- Link Style -->
    <link rel="stylesheet" href="./css/home.css">
    <link rel="stylesheet" href="./css/navbar.css">
    <script src="./js/home.js"></script>

    <!-- Kit Font Awesome -->
    <script src="https://kit.fontawesome.com/1a01d4b743.js" crossorigin="anonymous"></script>

    <link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://use.fontawesome.com/releases/v5.7.2/css/all.css' rel='stylesheet'>

    <script paket='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <script paket='text/javascript' src='https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js'></script>
    <script paket='text/javascript' src='https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js'></script>
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
                        <h5 class="mb-0">paket Data</h5>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover table-nowrap">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Nama Paket</th>
                                    <th scope="col">Jenis</th>
                                    <th scope="col">Harga   </th>
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
                                        $query_paket= mysqli_query($conn,"SELECT * FROM paket WHERE id_paket LIKE '%$cari%' OR id_outlet LIKE '%$cari%'");
    
                                    }else{
                                        //jika tidak ada keyword pencarian
                                        $query_paket= mysqli_query($conn,"SELECT * FROM paket");
                                    }
                                    while($data_paket = mysqli_fetch_array($query_paket)){ 
                                    ?>
                                    
                                    <tr>
                                        <td><?= $data_paket["nama_paket"]; ?></td>
                                        <td><?= $data_paket["jenis"]; ?></td>
                                        <td><?= $data_paket["harga"]; ?></td>
                                        <td> <a href="edit_service.php?id_paket=<?=$data_paket['id_paket']?>" class="btn btn-success">Ubah</a> | <a href="delete_service.php?id_paket=<?=$data_paket['id_paket']?>" onclick="return confirm ('Apakah anda yakin menghapus data ini?')" class="btn btn-danger">Hapus</a></td>

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