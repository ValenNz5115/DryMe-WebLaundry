<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DryMe</title>
    <link rel="stylesheet" href="./css/keranjang.css">
</head>
<body>

    <div class="main_content">
        <div class="header">Keranjang</div>
        <div class="info">
        <!-- Tabel Keranjang -->
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Paket</th>
                    <th>Harga</th>
                    <th>Qty</th>
                    <th>Total Harga</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <?php
            session_start();
            $total = 0;
            if (@$_SESSION['cart']){
            foreach ($_SESSION['cart'] as $key_paket => $val_paket): 
                $subtotal = $val_paket['qty'] * $val_paket['harga'];
                $total += $subtotal;
            ?>
            <tbody>
                <tr>
                    <td class = "no"><?=($key_paket+1)?></td>
                    <td class = "nama"><?=$val_paket['nama_paket']?></td>
                    <td class = "harga">
                        <?php
                            echo "Rp. ".number_format($val_paket['harga'], 2, ',', '.')."";
                        ?>
                    </td>
                    <td><?=$val_paket['qty']?></td>
                    <td>
                        <?php
                            echo "Rp. ".number_format($val_paket['total_harga'], 2, ',', '.')."";
                        ?>
                    </td>
                    <td class = "x"><a href="hapus_cart.php?id_paket=<?=$key_paket?>" onclick = "return confirm('Anda yakin menghapus ini?');"><strong>X</strong></a></td>
                </tr>
                <?php endforeach ?>
                <tr>
                    <td colspan = "3">Total</td>
                    <td colspan = "3">
                        <?php
                            echo "Rp. ".number_format($total, 2, ',', '.')."";
                        ?>
                    </td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        <!-- Pilihan Paket -->
            <?php
                include "connection.php";
                $qry_paket=mysqli_query($conn,"select * from paket");
                while($data_paket=mysqli_fetch_array($qry_paket)){?>
                <form action="add_order_process.php" method="post">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?=$data_paket['nama_paket']?></h5>
                        <p class="card-text">
                            <?php
                                echo "Rp. ".number_format($data_paket['harga'], 2, ',', '.')."";
                            ?>
                        </p>
                        <input type="hidden" name = "id_paket" value = "<?=$data_paket['id_paket']?>">
                        <input class = "jml" type="number" min = "1" value = "1" name = "jml_beli"><br>
                        <input class = "button" type="submit" value = "Tambah">
                    </div>
                </div>
                </form>
            <?php
                }
            ?>
        <!-- Pilihan costumer -->
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Pilih costumer</h5>
                <div class="card-text">
                    <form action="checkout.php" method = "post">
                    <select name="id_costumer" id="">
                    <option value=""></option>
                    <?php
                        include "connection.php";
                        $qry_costumer=mysqli_query($conn,"select * from costumer");
                        $no=0;
                        while($data_costumer=mysqli_fetch_array($qry_costumer)){
                        $no++;?>
                        <option value="<?=$data_costumer['id_costumer']?>"><?=$no?> - <?=$data_costumer['nama_costumer']?></option>
                    <?php
                        }
                    ?>
                    </select> <br>
                    <input class = "button_checkout" type="submit" value = "Checkout">
                    </form>
                </div>
            </div>
        </div>
        </div>
    </div>
</body>
</html>