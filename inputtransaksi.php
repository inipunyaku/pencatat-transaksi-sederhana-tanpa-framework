<?php
    require 'koneksi.php';
    $uidtransaksi = base_convert(microtime(false), 10, 36);;
    $namapembeli = $_POST['nama'];
    $tanggalpembelian = $_POST['tgl'];
    $totalsebelumdiskon = $_POST['totalsebelumdiskon'];
    $totalharga=$_POST['totalharga'];
    $diskon = $_POST['diskon'];
    

    $coba=mysqli_query($koneksi, "INSERT INTO transaksi VALUES ('$uidtransaksi', '$namapembeli', '$tanggalpembelian','$totalsebelumdiskon','$totalharga','$diskon')");
    // echo "uid : ".$uidtransaksi,"<br> nama : " .$namapembeli, "<br> tgl : ".$tanggalpembelian."<br>totalsebelumdiskon : ".$totalsebelumdiskon."<bt>totalharga : ".$totalharga."diskon : ".$diskon;
    // echo "<br><br>";
    
    session_start();
    foreach ($_SESSION["cart"] as $cart =>$item){
        $uidbarang=$cart;
        $jumlahbeli=$item['jumlah'];
        $namabarang = $item['namabarang'];
        $hargabarang=$item['hargabarang'];

        // mysqli_query($koneksi, "INSERT INTO 'detail' ('uiddetail', 'uidbarang', 'uidtransaksi', 'jumlahbeli', 'namabarang', 'hargabarang') VALUES (NULL,'$uidbarang','$uidtransaksi','$jumlahbeli','$namabarang','$hargabarang');");
        mysqli_query($koneksi, "INSERT INTO `detail` (`uiddetail`, `uidtransaksi`, `uidbarang`, `namabarang`, `hargabarang`, `jumlahbeli`) VALUES (NULL, '$uidtransaksi', '$uidbarang', '$namabarang', '$hargabarang', '$jumlahbeli');");
        
        // echo  "uidbarang : ".$uidbarang. "<br> uidtrans : ".$uidtransaksi."<br>jumlahbeli : ". $jumlahbeli ."<br>namabarang : ".$namabarang."<br>hargabarang : ". $hargabarang;
        // echo "<br>";
     
        // echo"<br><br>";
        
    }
    


    // header("location:index.php");

?>
<script>
    alert ( "Transaksi Berhasil" )
</script>
<?php
    header("location: index.php");
?>