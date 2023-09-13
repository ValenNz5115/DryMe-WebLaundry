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
    <link rel="stylesheet" href="./css/histori.css">



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
                        <h5 class="mb-0">Order Data</h5>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover table-nowrap">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Telephone</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Paket Laundry - Qty - Harga</th>
                                    <th scope="col">Total Harga</th>
                                    <th scope="col">Tanggal Transaksi</th>
                                    <th scope="col">Batas Waktu</th>
                                    <th scope="col">Tanggal Bayar</th>
                                    <th scope="col">Status Bayar</th>
                                    <th scope="col">Status Paket</th>
                                    <th scope="col">Aksi</th>
                                    <th scope="col">Nota</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                        include "connection.php";
                        $qry_histori = mysqli_query($conn, "SELECT transaksi.*, costumer.*, user.* from transaksi join user ON user.id_user = transaksi.id_user join costumer ON costumer.id_costumer = transaksi.id_costumer order by id_transaksi desc");
                        $no = 0;

                        while ($dt_histori = mysqli_fetch_array($qry_histori)) {
                            $total = 0;

                            $no++;
                            $paket_dibeli = "<ol>";
                            $qry_paket = mysqli_query($conn,"SELECT * from  detail_transaksi join paket on paket.id_paket=detail_transaksi.id_paket where id_transaksi = ".$dt_histori['id_transaksi']);
                            while($dt_paket=mysqli_fetch_array($qry_paket)){ //perulangan untuk menampilkan detail transaksi dan subtotalnmya
                                $subtotal = 0;
                                $subtotal += $dt_paket['harga'] * $dt_paket['qty'];
                                $paket_dibeli .= "<li>".$dt_paket['nama_paket']."&nbsp;&nbsp;-&nbsp;&nbsp;".$dt_paket['qty']."&nbsp;&nbsp;-&nbsp;&nbsp;"."Rp. ".number_format($subtotal, 2, ',', '.').""."</li>";
                                $total += $dt_paket['harga'] * $dt_paket['qty'];
                            }
                            $paket_dibeli.="</ol>";
                    ?>
                                    
                                    <tr>
                                        <th><?= $no ?></th>
                                        <td><?= $dt_histori["nama_costumer"]?></td>
                                        <td><?= $dt_histori["telp"]?></td>
                                        <td><?= $dt_histori["alamat"]?></td>
                                        <td><?= $paket_dibeli?></td>
                                        <td><?= $total?></td>
                                        <td><?= $dt_histori["tgl_transaksi"]?></td>
                                        <td><?= $dt_histori["batas_waktu"]?></td>
                                        <td><?= $dt_histori["tgl_bayar"]?></td>
                                        <td><?= $dt_histori['status_bayar']?></td>
                                            <td><?= $dt_histori['status_order']?></td>
                                        <td>
                            <?php
                            if ($dt_histori['status_bayar'] == "belum lunas") {
                            ?>
                            <a href="ubah_status.php?id_transaksi=<?=$dt_histori['id_transaksi']?>"><button>Lunas</button></a> | 
                            <?php
                            } else {
                            ?>
                            <a href="#"><button class = "done">✔</button></a> | 
                            <?php
                            }
                            ?>
                            <?php
                            if ($dt_histori['status_order'] == "baru") {
                            ?>
                            <a href="ubah_status_paket.php?id_transaksi=<?=$dt_histori['id_transaksi']?>&status_order=diproses" class = "proses"><button>Diproses</button></a>
                            <?php
                            } elseif ($dt_histori['status_order'] == "diproses") {
                            ?>
                            <a href="ubah_status_paket.php?id_transaksi=<?=$dt_histori['id_transaksi']?>&status_order=selesai" class = "selesai"><button>Selesai</button></a>
                            <?php
                            } elseif ($dt_histori['status_order'] == "selesai") {
                            ?>
                            <a href="ubah_status_paket.php?id_transaksi=<?=$dt_histori['id_transaksi']?>&status_order=diambil" class = "ambil" ><button>Diambil</button></a>
                            <?php
                            } elseif ($dt_histori['status_order'] == "diambil") {
                            ?>
                            <a href="#"><button class = "done">✔</button></a>
                            <?php
                            }
                            ?>
                        </td>
                        <?php
                        if ($dt_histori['status_bayar'] == "lunas" and $dt_histori['status_order'] == "diambil") {
                        ?>
                        <td><a href="nota.php?id_transaksi=<?=$dt_histori['id_transaksi']?>"><button>✔</button></a></td>
                        <?php
                        } else {
                        ?>
                        <td><button>❌</button></td>
                        <?php
                            }
                        ?>
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