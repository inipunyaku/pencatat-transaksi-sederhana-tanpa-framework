<?php include 'template.php';
?>
<div class="container">
        <h1 class="mt-4 pt-2">Pilih Barang</h1>
        <table class="mt-3 table table-striped table-inverse table-responsive">
            <thead class="thead-inverse ">
                <tr>
                    <th>No</th>
                    <th>id barang</th>
                    <th>nama barang</th>
                    <th>harga</th>
                    <th>jumlah</th>
                    <th>action</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                        $i=1;
                        $data = mysqli_query($koneksi,"SELECT * FROM barang");
                        while ($d = mysqli_fetch_array($data)) {
                    ?>
                    <tr>
                        <td scope="row"><?php echo $i;?></td>
                        <td><?php echo $d['uidbarang']; ?></td>
                        <td><?php echo $d['namabarang']; ?></td>
                        <td><?php echo $d['hargabarang']; ?></td>
                        <form action="/insertcart.php" method="post" enctype="multipart/form-data">
                        <td>
                            <input type="hidden" name="id" value="<?php echo $d['uidbarang']; ?>">
                            <input type="number" class="form-control" name="jumlah" id="jumlah" >
                        </td>
                        <td> <button type="submit" class="btn btn-success">Tambah</button></td>
                            </form>
                        </tr>
                        
                    <?php $i++; }?>
                </tbody>
        </table>
    </div>