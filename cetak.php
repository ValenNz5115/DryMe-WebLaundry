<?php 
    include "header.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <table class="table table-striped">
            <thead style="text-align:center;">
                <tr>
                    <th>Nama Member</th>
                    <th>Tanggal Transaksi</th>
                    <th>Batas Waktu</th>
                    <th>Tanggal Bayar</th>
                    <th>Status</th>
                    <th>Dibayar</th>
                </tr>
            </thead>
            <tbody style="text-align:center;">
                <?php 
                    include "koneksi.php";
                    $qry_transaksi=mysqli_query($conn,"select * from transaksi join member on transaksi.id_member = member.id_member where transaksi.id_transaksi = '".$_GET['id_transaksi']."'");
                    $no=0;
                    while($dt_histori=mysqli_fetch_array($qry_transaksi)){
                        $no++;
                        ?>
                <tr>
                    <td><?=$dt_histori['nama']?></td>
                    <td><?=$dt_histori['tgl_transaksi']?></td>
                    <td><?=$dt_histori['batas_waktu']?></td>
                    <td><?=$dt_histori['tgl_bayar']?></td>
                    <td><?=$dt_histori['status']?></td>
                    <td><?=$dt_histori['dibayar']?></td>
                </tr>
                <?php 
                    }
                    ?>
            </tbody>
        </table>
        <script>
            window.print();
        </script>
    </body>
</html>