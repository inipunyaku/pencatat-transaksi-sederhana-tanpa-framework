 <?php include 'template.php'?>
 <div class="container">

        <h3 class="mt-4 pt-2">Seluruh Transaksi</h3>
        <table class="mt-3 table table-striped table-inverse table-responsive">
            <thead class="thead-inverse">
                <tr>
                    <th>No</th>
                    <th>Uid Transaksi</th>
                    <th>Nama Pembeli</th>
                    <th>Tanggal Pembelian</th>
                    <th>Total sebelum diskon</th>
                    <th>diskon</th>
                    <th>Total Harga</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                        
                 <?php
                        $i=1;
                        $data = mysqli_query($koneksi,"SELECT * FROM transaksi");
                        while ($d = mysqli_fetch_array($data)) {
                    ?>
                        <tr>
                            <td scope="row"><?php echo $i;?></td>
                            <td><?php echo $d['uidtransaksi']?></td>
                            <td><?php echo $d['namapembeli']?></td>
                            <td><?php echo $d['tanggalpembelian']?></td>
                            <td><?php echo $d['totalsebelumdiskon']?></td>
                            <td><?php echo $d['diskon']?></td>
                            <td><?php echo $d['totalharga']?></td>
                            <td><a href="/detail.php?id=<?php echo $d['uidtransaksi']?>" class="btn btn-success">Detail</a></td>
                        </tr>
                    <?php } ?>
                </tbody>
        </table>
    </div>