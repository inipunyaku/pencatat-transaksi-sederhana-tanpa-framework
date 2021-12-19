<?php include 'template.php';
    session_start();
?>
<div class="container">

        <h3 class="mt-4 pt-2">Keranjang</h3>
        <table class="mt-3 table table-striped table-inverse table-responsive">
            <thead class="thead-inverse">
                <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>harga</th>
                    <th>Jumlah Barang</th>
                    <th>jumlah harga</th>
                    <th>action</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                        if(empty($_SESSION["cart"])){
                             $total = 0;
                    ?>

                    <tr>
                        <td colspan="6">DATA KOSONG</td>
                    </tr>
                    <?php }
                        else{
                            $total = 0;
                            $no=1;

                            foreach ($_SESSION["cart"] as $cart =>$item){
                    ?>
                        <tr>
                            <td scope="row"><?php echo $no++ ?></td>
                            <td><?php echo $item['namabarang']?></td>
                            <td><?php echo $item['hargabarang'] ?></td>
                            <td><?php echo $item['jumlah'] ?></td>
                            <?php
                                $harga= $item['hargabarang'];
                                $jumlah= $item['jumlah'];
                                $jumlahharga = $harga*$jumlah;
                                $total+=$jumlahharga;
                            ?>
                            <td><?php echo $jumlahharga ?></td>
                            <td><a href="/hapuscart.php?id=<?php echo $cart;?>" class="btn btn-danger">hapus</a></td>
                            
                        </tr>
                        <?php } } ?>

                   
                </tbody>
        </table>

        <table class="table mt-5">
            <tr>
                <th>Total</th>
                <td><?php echo $total ?></td>
            </tr>
                <?php
                    if($total>=50000){
                        $diskon=$total*0.1;
                        $totalharga=$total-($total*0.1);
                        echo "
                        <tr>
                        <th>Diskon</th>
                        <td>$diskon</td>
                        </tr>
                        <tr>
                            <th>total setelah diskon</th>
                            <td>$totalharga</td>
                        </tr>";
                    }
                    else {
                        $diskon=0;
                        $totalharga=$total;
                    }
                ?>
                
            <tr>
                <form action="/inputtransaksi.php" method="post" enctype="multipart/form-data" >
                <input type="hidden" name="totalsebelumdiskon" value="<?php echo$total?>">
                <input type="hidden" name="diskon" value="<?php echo$diskon?>">
                <input type="hidden" name="totalharga" value="<?php echo$totalharga?>">
                <th>Nama Pemesan</th>
                <td><input type="text" name="nama" id="nama"></td>
            </tr>
            <tr>
                <th>Tanggal Pemesanan</th>
                <td><input type="date" name="tgl" id="tgl"></td>
            </tr>
            <tr>
                <td></td>
                <td align="right">
                    <a href="/forgetcart.php" class="btn btn-danger" onclick="forget()">Hapus Semua</a>
                    <button type="submit" class="btn btn-primary">pesan</button>
                </td>
            </tr>
            </form>
        </table>
    </div>