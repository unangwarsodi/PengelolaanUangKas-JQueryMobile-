<?php
	include '../koneksi/koneksi.php';
	session_start();
	$aksi = $_GET['aksi'];
	if($aksi == "simpan-insert"){
		include '../_assets/tgl_indo.php';
        $id_organisasi = $_SESSION['id_organisasi'];
        $tanggal = tgl_indo(date('Y-m-d'));
        $query2 = mysql_query("SELECT * FROM tbl_uangkasmasuk WHERE id_organisasi = '$id_organisasi' ORDER BY id_kas_masuk DESC LIMIT 1");
        $data = mysql_fetch_array($query2);
        $jumlah = $_POST['jumlah'];
        $total = $data['total'] + $jumlah;
        $keterangan = $_POST['keterangan'];
        $query = mysql_query("INSERT INTO tbl_uangkasmasuk VALUES(null, '$tanggal', '$jumlah', '$keterangan', '$id_organisasi','$total')");
        if($query){
            ?><meta http-equiv="refresh" content="1;url=../pages/dasboard.php?pages=daftar_uangkas"><?php
        }else{
            echo mysql_error();
            echo "<script>alert('Tambah Data Uang Kas GAGAL')</script>";
            ?><meta http-equiv="refresh" content="1;url=../pages/dasboard.php?pages=daftar_uangkas&aksi=insert"><?php
        }
	}else if($aksi == "simpan-update"){
		include '../_assets/tgl_indo.php';
        $tanggal = tgl_indo(date('Y-m-d'));
		$id_organisasi = $_SESSION['id_organisasi'];
        $jumlah = $_POST['jumlah'];
        $keterangan = $_POST['keterangan'];
        $id_kas_masuk = $_POST['id_kas_masuk'];
        $query2 = mysql_query("SELECT * FROM tbl_uangkasmasuk WHERE id_kas_masuk = '$id_kas_masuk'");
        $data = mysql_fetch_array($query2);
        $query3 = mysql_query(("SELECT * FROM tbl_uangkasmasuk WHERE id_organisasi = '$id_organisasi' ORDER BY id_kas_masuk DESC LIMIT 1"));
        $data2 = mysql_fetch_array($query3);
        $selisih = $jumlah - $data['jumlah'];
        $total = $data2['total'] + $selisih;
        $query = mysql_query("UPDATE tbl_uangkasmasuk SET jumlah = '$jumlah', tanggal='$tanggal', keterangan = '$keterangan', total = '$jumlah' WHERE id_kas_masuk = '$id_kas_masuk'");
        $query4 = mysql_query("UPDATE tbl_uangkasmasuk SET total = '$total' WHERE id_kas_masuk = '$data2[id_kas_masuk]'");
        if($query AND $query4){
            ?><meta http-equiv="refresh" content="1;url=../pages/dasboard.php?pages=daftar_uangkas"><?php
        }else{
            echo mysql_error();
            echo "<script>alert('Update Gagal')</script>";
            ?><meta http-equiv="refresh" content="1;url=../pages/dasboard.php?pages=daftar_uangkas"><?php
        }
	}else if($aksi == "delete"){
		$id_kas_masuk = $_GET['id_kas_masuk'];
        $id_organisasi = $_SESSION['id_organisasi'];
        $query2 = mysql_query("SELECT * FROM tbl_uangkasmasuk WHERE id_kas_masuk = '$id_kas_masuk'");
        $data = mysql_fetch_array($query2);
        $query3 = mysql_query(("SELECT * FROM tbl_uangkasmasuk WHERE id_organisasi = '$id_organisasi' ORDER BY id_kas_masuk DESC LIMIT 1"));
        $data2 = mysql_fetch_array($query3);
        $total = $data2['total'] - $data['jumlah'];
        $query4 = mysql_query("UPDATE tbl_uangkasmasuk SET total = '$total' WHERE id_kas_masuk = '$data2[id_kas_masuk]'");
        $query = mysql_query("DELETE FROM tbl_uangkasmasuk WHERE id_kas_masuk = '$id_kas_masuk'");
        if($query AND $query4){
            ?><meta http-equiv="refresh" content="1;url=../pages/dasboard.php?pages=daftar_uangkas"><?php
        }else{
            echo mysql_error();
            echo "<script>alert('Delete Gagal')</script>";
            ?><meta http-equiv="refresh" content="1;url=../pages/dasboard.php?pages=daftar_uangkas"><?php
        }
	}
?>