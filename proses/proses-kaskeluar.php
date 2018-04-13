<?php
	include '../koneksi/koneksi.php';
	session_start();
	$aksi = $_GET['aksi'];
	if($aksi == "simpan-insert"){
		include '../_assets/tgl_indo.php';
        $id_organisasi = $_SESSION['id_organisasi'];
        $query2 = mysql_query("SELECT * FROM tbl_uangkasmasuk WHERE id_organisasi = '$id_organisasi' ORDER BY id_kas_masuk DESC LIMIT 1");
        $data = mysql_fetch_array($query2);
        $jumlah = $_POST['jumlah'];
        $total = $data['total'] - $jumlah;
        $keterangan = $_POST['keterangan'];
        $tanggal = tgl_indo(date('Y-m-d'));
        $query3 = mysql_query("UPDATE tbl_uangkasmasuk SET total = '$total' WHERE id_organisasi='$id_organisasi' ORDER BY id_kas_masuk DESC LIMIT 1");
        $query = mysql_query("INSERT INTO tbl_uangkaskeluar VALUES(null, '$tanggal', '$jumlah', '$keterangan', '$id_organisasi')");
        if($query){
            ?><meta http-equiv="refresh" content="1;url=../pages/dasboard.php?pages=daftar_uangkaskeluar"><?php
        }else{
            echo mysql_error();
            echo "<script>alert('Tambah Data Uang Kas GAGAL')</script>";
            ?><meta http-equiv="refresh" content="1;url=../pages/dasboard.php?pages=daftar_uangkaskeluar&aksi=insert"><?php
        }
	}else if($aksi == "simpan-update"){
        include '../_assets/tgl_indo.php';
        $tanggal = tgl_indo(date('Y-m-d'));
		$id_organisasi = $_SESSION['id_organisasi'];
        $jumlah = $_POST['jumlah'];
        $keterangan = $_POST['keterangan'];
        $id_kas_keluar = $_POST['id_kas_keluar'];
        $query2 = mysql_query("SELECT * FROM tbl_uangkaskeluar WHERE id_kas_keluar = '$id_kas_keluar'");
        $data = mysql_fetch_array($query2);
        $query3 = mysql_query("SELECT * FROM tbl_uangkasmasuk WHERE id_organisasi = '$id_organisasi' ORDER BY id_kas_masuk DESC LIMIT 1");
        $data2 = mysql_fetch_array($query3);
        $selisih = -$jumlah + $data['jumlah'];
        $total = $data2['total'] + $selisih;
        $query = mysql_query("UPDATE tbl_uangkaskeluar SET jumlah = '$jumlah', keterangan = '$keterangan', tanggal='$tanggal' WHERE id_kas_keluar = '$id_kas_keluar'");
        $query4 = mysql_query("UPDATE tbl_uangkasmasuk SET total = '$total' WHERE id_organisasi='$id_organisasi' ORDER BY id_kas_masuk DESC LIMIT 1");
        if($query AND $query3){
            ?><meta http-equiv="refresh" content="1;url=../pages/dasboard.php?pages=daftar_uangkaskeluar"><?php
        }else{
            echo mysql_error();
            echo "<script>alert('Update Gagal')</script>";
            ?><meta http-equiv="refresh" content="1;url=../pages/dasboard.php?pages=daftar_uangkaskeluar"><?php
        }
	}else if($aksi == "delete"){
		$id_kas_keluar = $_GET['id_kas_keluar'];
        $id_organisasi = $_SESSION['id_organisasi'];
        $query2 = mysql_query("SELECT * FROM tbl_uangkaskeluar WHERE id_kas_keluar = '$id_kas_keluar'");
        $data = mysql_fetch_array($query2);
        $query3 = mysql_query("SELECT * FROM tbl_uangkasmasuk WHERE id_organisasi = '$id_organisasi' ORDER BY id_kas_masuk DESC LIMIT 1");
        $data2 = mysql_fetch_array($query3);
        $total = $data2['total'] + $data['jumlah'];
        $query = mysql_query("DELETE FROM tbl_uangkaskeluar WHERE id_kas_keluar = '$id_kas_keluar'");
        $query4 = mysql_query("UPDATE tbl_uangkasmasuk SET total = '$total' WHERE id_organisasi='$id_organisasi' ORDER BY id_kas_masuk DESC LIMIT 1");
        if($query AND $query4){
            ?><meta http-equiv="refresh" content="1;url=../pages/dasboard.php?pages=daftar_uangkaskeluar"><?php
        }else{
            echo mysql_error();
            echo "<script>alert('Delete Gagal')</script>";
            ?><meta http-equiv="refresh" content="1;url=../pages/dasboard.php?pages=daftar_uangkaskeluar"><?php
        }
	}
?>