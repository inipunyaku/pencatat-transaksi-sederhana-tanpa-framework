<?php 
$koneksi = mysqli_connect("localhost", "root", "", "uasppaw");

if (mysqli_connect_errno()) {
	echo "Gagal Konek : ".mysqli_connect_errno();
}

 ?>