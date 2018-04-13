<?php
	include '../koneksi/koneksi.php';
	$aksi = $_GET['aksi'];
	if(isset($aksi)){
		if($aksi == "login"){
			$username = $_POST['username'];
			$password = $_POST['password'];
			$query = mysql_query("SELECT * FROM tbl_organisasi WHERE username = '$username' AND password = '$password'");
            $result = mysql_num_rows($query);
            if($result >= 1){
            	$data = mysql_fetch_array($query);
            	session_start();
            	$_SESSION['id_organisasi'] = $data['id_organisasi'];
            	$_SESSION['nama'] = $data['nama'];
				?><meta http-equiv="refresh" content="1;url=../pages/dasboard.php?pages=daftar_uangkas"><?php
			}else{
				?><meta http-equiv="refresh" content="1;url=../index.php"><?php
			}
		}else if($aksi == "logout"){
			session_start();
			session_destroy();
			?><meta http-equiv="refresh" content="1;url=../index.php"><?php
		}
	}
?>