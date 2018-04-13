<?php
    session_start();
    include '../koneksi/koneksi.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Dasboard</title>
        <link rel="stylesheet" href="../plugin/jquery.mobile-1.4.5.min.css">
        <link rel="stylesheet" href="css/style.css">
        <script src="../plugin/jquery.js"></script>
        <script src="../plugin/jquery.mobile-1.4.5.min.js"></script>
        <script type="text/javascript" src="../js/delete.js"></script>
</head>
<body>
 	<div data-role="page" class="jqm-demos ui-responsive-panel" data-title="Panel responsive page">
    <div data-role="header">
        <h1><?php echo $_SESSION['nama'] ?></h1>
        <a href="#nav-panel" data-icon="bars" data-iconpos="notext">Menu</a>
        <a href="#add-form" data-icon="gear" data-iconpos="notext">Add</a>
    </div><!-- /header -->
    <div role="main" class="ui-content jqm-content jqm-fullwidth" id="page">
        <?php
            $pages = $_GET['pages'];
            $id_organisasi = $_SESSION['id_organisasi'];
            $query = mysql_query("SELECT * FROM tbl_uangkasmasuk WHERE id_organisasi = '$id_organisasi' ORDER BY id_kas_masuk DESC LIMIT 1");
            $query2 = mysql_query("SELECT *, SUM(jumlah) AS jml FROM tbl_uangkasmasuk WHERE id_organisasi = '$id_organisasi'");
            $query3 = mysql_query("SELECT *, SUM(jumlah) AS jml FROM tbl_uangkaskeluar WHERE id_organisasi = '$id_organisasi'");
            $data4 = mysql_fetch_array($query);
            $data2 = mysql_fetch_array($query2);
            $data3 = mysql_fetch_array($query3);
            if($pages == "daftar_uangkas"){
                include 'daftar_uangkas.php';
                ?>
                    <h3>Jumlah Pemasukan &nbsp&nbsp: <?php echo $data2['jml'] ?></h3>
                    <h3>Jumlah Pengeluaran : <?php echo $data3['jml'] ?></h3>
                    <h3>Sisa Uang Kas &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: <?php echo $data4['total'] ?></h3>
                <?php
            }else if($pages == "daftar_uangkaskeluar"){
                include 'daftar_uangkaskeluar.php';
                ?>
                    <h3>Jumlah Pemasukan &nbsp&nbsp: <?php echo $data2['jml'] ?></h3>
                    <h3>Jumlah Pengeluaran : <?php echo $data3['jml'] ?></h3>
                    <h3>Sisa Uang Kas &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: <?php echo $data4['total'] ?></h3>
                <?php
            }else if($pages == "profil"){
                include 'profil.php';
            }
        ?>
        
    </div><!-- /content -->
    <div data-role="panel" data-display="push" data-theme="b" id="nav-panel">
        <ul data-role="listview" data-inset="false">
            <li data-icon="delete"><a href="#" data-rel="close">Close menu</a></li>
            <li><a href="dasboard.php?pages=daftar_uangkas" data-transition="none" class="ui-btn ui-corner-all ui-shadow ui-btn-inline">Data Pemasukkan</a></li>
            <li><a href="dasboard.php?pages=daftar_uangkas&aksi=insert" data-transition="none" class="ui-btn ui-corner-all ui-shadow ui-btn-inline">Tambah Pemasukkan</a></li>
            <li><a href="dasboard.php?pages=daftar_uangkaskeluar" data-transition="none" class="ui-btn ui-corner-all ui-shadow ui-btn-inline">Data Pengeluaran</a></li>
            <li><a href="dasboard.php?pages=daftar_uangkaskeluar&aksi=insert" data-transition="none" class="ui-btn ui-corner-all ui-shadow ui-btn-inline">Tambah Pengeluaran</a></li>
        </ul>
    </div><!-- /panel -->
    <div data-role="panel" data-position="right" data-display="reveal" data-theme="a" id="add-form">
        <ul data-role="listview" data-inset="false">
            <li data-icon="delete"><a href="#" data-rel="close">Close menu</a></li>
            <li><a href="dasboard.php?pages=profil" data-transition="none" class="ui-btn ui-corner-all ui-shadow ui-btn-inline">Profil</a></li>
            <li><a href="../proses/login.php?aksi=logout" data-transition="none" class="ui-btn ui-corner-all ui-shadow ui-btn-inline" data-ajax="false">Logout</a></li>
        </ul>
    </div><!-- /panel -->
</div>
</body>
</html>
