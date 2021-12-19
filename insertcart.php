<?php
    require 'koneksi.php';

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $id = $_POST['id'];
    $jumlah = $_POST['jumlah'];

    $data = mysqli_query($koneksi,"SELECT * FROM BARANG WHERE uidbarang = $id" );
    $row = mysqli_fetch_array($data);
    $hargabarang=$row['hargabarang'];
    $namabarang=$row['namabarang'];
    session_start();
    $_SESSION['cart'][$id]  = [
            'id' =>$id,
            'jumlah'=>$jumlah,
            'namabarang'=>$namabarang,
            'hargabarang' =>$hargabarang
    ];

   
   
    header("location:index.php");
    // $message = 'item berhasil dimasukan ke keranjan, klik tab keranjang untuk checkout';

    // echo "<SCRIPT> //not showing me this
    // alert('$message');
    // </SCRIPT>";
    }


?>