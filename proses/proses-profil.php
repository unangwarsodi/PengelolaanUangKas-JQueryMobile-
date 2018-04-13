<?php
include '../koneksi/koneksi.php';
$aksi = $_GET['aksi'];
if($aksi == "simpan-update"){
    $id_organisasi = $_POST['id_organisasi'];
    $nama_organisasi = $_POST['nama_organisasi'];
    $alamat_organisasi = $_POST['alamat_organisasi'];
    $no_telepon = $_POST['no_telepon'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $id_anggota = $_POST['id_anggota'];
    if($password == $confirm_password){
        $query = mysql_query("UPDATE tbl_organisasi SET nama='$nama_organisasi', alamat='$alamat_organisasi', no_telepon='$no_telepon', username='$username', password='$password' WHERE id_organisasi='$id_organisasi'");
        if($query){
            echo "<script>alert('Update Organisasi Berhasil')</script>";
            ?><meta http-equiv="refresh" content="1;url=../pages/dasboard.php?pages=profil"><?php
        }else{
            echo "<script>alert('Update Organisasi Gagal')</script>";
            ?><meta http-equiv="refresh" content="1;url=../pages/dasboard.php?pages=profil"><?php
        }
    }else{
        echo "<script>alert('Isi Semua Data Dengan Lengkap')</script>";
        ?><meta http-equiv="refresh" content="1;url=../pages/dasboard.php?pages=profil"><?php
    }
}else if($aksi == "simpan-insert"){
    $nama_organisasi = $_POST['nama_organisasi'];
            $alamat_organisasi = $_POST['alamat_organisasi'];
            $no_telepon = $_POST['no_telepon'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];
            if($password == $confirm_password AND $alamat_organisasi != "" AND $nama_organisasi != "" AND $no_telepon != "" AND $username != "" AND $password != "" AND $confirm_password != ""){
                $query = mysql_query("INSERT INTO tbl_organisasi VALUES(null, '$nama_organisasi', '$alamat_organisasi', '$no_telepon', '$username', '$password')");
                if($query){
                    echo "<script>alert('Register Berhasil')</script>";
                    ?><meta http-equiv="refresh" content="1;url=../index.php"><?php
                }else{
                    echo "<script>alert('Register Gagal')</script>";
                    ?><meta http-equiv="refresh" content="1;url=../index.php?pages=register"><?php
                }
            }else{
                echo "<script>alert('Isi Semua Data Dengan Lengkap')</script>";
                ?><meta http-equiv="refresh" content="1;url=../index.php?pages=register"><?php
            }
}

?>