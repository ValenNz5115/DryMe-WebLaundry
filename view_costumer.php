<!DOCTYPE html>
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
                        <h5 class="mb-0">costumer Data</h5>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover table-nowrap">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Telephone</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">gender</th>
                                    <th scope="col">Outlet</th>
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
                                        $query_costumer= mysqli_query($conn,"SELECT * FROM costumer WHERE id_costumer LIKE '%$cari%' OR nama_costumer LIKE '%$cari%'");
    
                                    }else{
                                        //jika tidak ada keyword pencarian
                                        $query_costumer= mysqli_query($conn,"SELECT * FROM costumer where id_outlet='".$_SESSION['id_outlet']."'");
                                    }
                                    $no=0;
                                    while($data_costumer = mysqli_fetch_array($query_costumer)){ 
                                        $no++;
                                    ?>
                                    
                                    <tr>
                                        <th><?= $no ?></th>
                                        <td><?= $data_costumer["nama_costumer"]; ?></td>
                                        <td><?= $data_costumer["telp"]; ?></td>
                                        <td><?= $data_costumer["alamat"]; ?></td>
                                        <td><?= $data_costumer["gender"]; ?></td>
                                        <td>
                                            <?php 
                                            // foreign key joi ke primary key di id yag sama dari foerign ke disamakan dengan id di promary key ketika foreinkey sama dengan data yang dimasukan.
                                            $query_outlet = mysqli_query($conn, "SELECT * FROM outlet WHERE id_outlet =".$data_costumer['id_outlet']);
                                            $tampil_nama_outlet = "<ol>";
                                            while($data_outlet = mysqli_fetch_array($query_outlet)){
                                                $tampil_nama_outlet .= "<li>".$data_outlet['nama_outlet']."</li>";
                                            }
                                            $tampil_nama_outlet .= "</ol>";
                                            ?>
                                            <?=$tampil_nama_outlet?>
                                        </td>
                                        <td> <a href="edit_costumer.php?id_costumer=<?=$data_costumer['id_costumer']?>" class="btn btn-success">Ubah</a> | <a href="delete_costumer.php?id_costumer=<?=$data_costumer['id_costumer']?>" onclick="return confirm ('Apakah anda yakin menghapus data ini?')" class="btn btn-danger">Hapus</a></td>

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
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Bootstrap Simple Data Table</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<style>
body {
    color: #566787;
    background: #f5f5f5;
    font-family: 'Roboto', sans-serif;
}
.table-responsive {
    margin: 30px 0;
}
.table-wrapper {
    min-width: 1000px;
    background: #fff;
    padding: 20px;
    box-shadow: 0 1px 1px rgba(0,0,0,.05);
}
.table-title {
    padding-bottom: 10px;
    margin: 0 0 10px;
    min-width: 100%;
}
.table-title h2 {
    margin: 8px 0 0;
    font-size: 22px;
}
.search-box {
    position: relative;        
    float: right;
}
.search-box input {
    height: 34px;
    border-radius: 20px;
    padding-left: 35px;
    border-color: #ddd;
    box-shadow: none;
}
.search-box input:focus {
    border-color: #3FBAE4;
}
.search-box i {
    color: #a0a5b1;
    position: absolute;
    font-size: 19px;
    top: 8px;
    left: 10px;
}
table.table tr th, table.table tr td {
    border-color: #e9e9e9;
}
table.table-striped tbody tr:nth-of-type(odd) {
    background-color: #fcfcfc;
}
table.table-striped.table-hover tbody tr:hover {
    background: #f5f5f5;
}
table.table th i {
    font-size: 13px;
    margin: 0 5px;
    cursor: pointer;
}
table.table td:last-child {
    width: 130px;
}
table.table td a {
    color: #a0a5b1;
    display: inline-block;
    margin: 0 5px;
}
table.table td a.view {
    color: #03A9F4;
}
table.table td a.edit {
    color: #FFC107;
}
table.table td a.delete {
    color: #E34724;
}
table.table td i {
    font-size: 19px;
}    
.pagination {
    float: right;
    margin: 0 0 5px;
}
.pagination li a {
    border: none;
    font-size: 95%;
    width: 30px;
    height: 30px;
    color: #999;
    margin: 0 2px;
    line-height: 30px;
    border-radius: 30px !important;
    text-align: center;
    padding: 0;
}
.pagination li a:hover {
    color: #666;
}	
.pagination li.active a {
    background: #03A9F4;
}
.pagination li.active a:hover {        
    background: #0397d6;
}
.pagination li.disabled i {
    color: #ccc;
}
.pagination li i {
    font-size: 16px;
    padding-top: 6px
}
.hint-text {
    float: left;
    margin-top: 6px;
    font-size: 95%;
}    
</style>
<script>
$(document).ready(function(){
	$('[data-toggle="tooltip"]').tooltip();
});
</script>
</head>
<body>
    <?php
    include "navbar.php";
    ?>
<div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>Customer <b>Details</b></h2></div>
                    <div class="col-sm-4">
                        <div class="search-box">
                            <i class="material-icons">&#xE8B6;</i>
                            <input type="text" class="form-control" placeholder="Search&hellip;">
                        </div>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</i></th>
                        <th>Address</th>
                        <th>City</i></th>
                        <th>Pin Code</th>
                        <th>Country </i></th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                                    require 'connection.php';
                                    if (isset($_POST["cari"])) {
                                        // jika ada keyword pencarian 
                                        $cari=$_POST['cari'];
                                        $query_costumer= mysqli_query($conn,"SELECT * FROM costumer WHERE id_costumer LIKE '%$cari%' OR nama_costumer LIKE '%$cari%'");
    
                                    }else{
                                        //jika tidak ada keyword pencarian
                                        $query_costumer= mysqli_query($conn,"SELECT * FROM costumer where id_outlet='".$_SESSION['id_outlet']."'");
                                    }
                                    $no=0;
                                    while($data_costumer = mysqli_fetch_array($query_costumer)){ 
                                        $no++;
                                    ?>
                                    
                                    <tr>
                                        <th><?= $no ?></th>
                                        <td><?= $data_costumer["nama_costumer"]; ?></td>
                                        <td><?= $data_costumer["telp"]; ?></td>
                                        <td><?= $data_costumer["alamat"]; ?></td>
                                        <td><?= $data_costumer["gender"]; ?></td>
                                        <td>
                                            <?php 
                                            // foreign key joi ke primary key di id yag sama dari foerign ke disamakan dengan id di promary key ketika foreinkey sama dengan data yang dimasukan.
                                            $query_outlet = mysqli_query($conn, "SELECT * FROM outlet WHERE id_outlet =".$data_costumer['id_outlet']);
                                            $tampil_nama_outlet = "<ol>";
                                            while($data_outlet = mysqli_fetch_array($query_outlet)){
                                                $tampil_nama_outlet .= "<li>".$data_outlet['nama_outlet']."</li>";
                                            }
                                            $tampil_nama_outlet .= "</ol>";
                                            ?>
                                            <?=$tampil_nama_outlet?>
                                        </td>
                                        <td> <a href="edit_costumer.php?id_costumer=<?=$data_costumer['id_costumer']?>" class="btn btn-success">Ubah</a> | <a href="delete_costumer.php?id_costumer=<?=$data_costumer['id_costumer']?>" onclick="return confirm ('Apakah anda yakin menghapus data ini?')" class="btn btn-danger">Hapus</a></td>

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
</html