<?php include 'template.php';
    $id = $_GET['id'];
?>
    <div class="container">

        <h3 class="mt-4 pt-2">Detail Transaksi</h3>
        <table class="mt-3 table table-responsive">
            <thead class="thead-inverse">
                <tr>
                    <th>Uid Transaksi</th>
                    <th>Nama Pembeli</th>
                    <th>Tanggal Pembelian</th>
                    <th>Total sebelum diskon</th>
                    <th>diskon</th>
                    <th>Total Harga</th>
                </tr>
                </thead>
                <tbody>
                        <?php
                        $i=1;
                        $data = mysqli_query($koneksi,"SELECT * FROM `transaksi` WHERE `uidtransaksi` = '$id'");
                        $d = mysqli_fetch_array($data)
                    ?>
                      
                        <tr>
                            <td><?php echo $d['uidtransaksi'] ?></td>
                            <td><?php echo $d['namapembeli'] ?></td>
                            <td><?php echo $d['tanggalpembelian'] ?></td>
                            <td><?php echo $d['totalsebelumdiskon'] ?></td>
                            <td><?php echo $d['diskon'] ?></td>
                            <td><?php echo $d['totalharga'] ?></td>
                        </tr>              
                </tbody>
        </table>

        <h3 class="mt-4 pt-2">Detail item</h3>
        <table class="mt-3 table table-responsive">
            <thead class="thead-inverse">
                <tr>
                   
                        
                    
                    <th>Uid Barang</th>
                    <th>Nama Barang</th>
                    <th>Harga Barang</th>
                    <th>Jumlah Beli</th>
                    <th>SubTotal</th>
                </tr>
                </thead>
                <tbody>
                     <?php
                        $data = mysqli_query($koneksi,"SELECT * FROM `detail` WHERE `uidtransaksi` = '$id'");
                        while ($d = mysqli_fetch_array($data)) {
                    ?>
                     
                        <tr>
                            <td><?php echo $d['uidbarang'] ?></td>
                            <td><?php echo $d['namabarang'] ?></td>
                            <td><?php echo $d['hargabarang'] ?></td>
                            <td><?php echo $d['jumlahbeli'] ?></td>
                            <?php
                            $subtotal = 0;
                                $harga=$d['hargabarang'];
                                $jumlah=$d['jumlahbeli'];
                                $subtotal=$harga*$jumlah;
                            ?>
                            <td><?php echo $subtotal ?></td>
                        </tr>  
                    <?php } ?>            
                </tbody>
        </table>
    </div>