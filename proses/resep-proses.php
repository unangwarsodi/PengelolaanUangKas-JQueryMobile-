<?php
	include '../koneksi/koneksi.php';
	$aksi = $_GET['aksi'];
	if(isset($aksi)){
		if($aksi == "simpan"){
			$nama = $_POST['nama'];
			$langkah = $_POST['langkah'];
			$url = $_FILES['file']['name'];
			$file_tmp = $_FILES['file']['tmp_name'];
			move_uploaded_file($file_tmp, '../gambar/'.$url);
			$query = mysql_query("INSERT INTO tbl_resep VALUES(null, '$nama', '$langkah', '$url')");
			if($query){
				echo "Sukses";
			}else{
				echo "Gagal";
			}
		}
	}
?>