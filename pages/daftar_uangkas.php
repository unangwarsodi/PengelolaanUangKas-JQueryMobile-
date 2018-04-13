<?php
    $aksi = $_GET['aksi'];
    if($aksi == ""){
        ?><h2>Data Uang Kas Masuk</h2>
        <ul data-role="listview" data-filter="true" data-filter-placeholder="Cari Data..." data-inset="true">
        <?php
            $id_organisasi = $_SESSION['id_organisasi'];
            $no = 1;
            $query = mysql_query("SELECT * FROM tbl_uangkasmasuk WHERE id_organisasi='$id_organisasi'");
            while($data = mysql_fetch_array($query)){
        ?>
            <li><a href="#popupNested<?php echo $no?>" data-rel="popup" data-transition="pop"><?php echo $data['tanggal'] ?>&nbsp<?php echo $data['keterangan'] ?>&nbsp<?php echo $data['jumlah'] ?><a href="#popupDialog<?php echo $no?>" data-rel="popup" data-position-to="window" data-transition="pop" class=" ui-btn-inline ui-icon-delete ui-btn-icon-left"></a></a></li>
            <div data-role="popup" id="popupDialog<?php echo $no?>" data-overlay-theme="b" data-theme="b" data-dismissible="false" style="max-width:400px;">
                <div data-role="header" data-theme="a">
                    <h1>Confimasi Delete</h1>
                </div>
                <div role="main" class="ui-content">
                    <h3 class="ui-title">Apakah Yakin Data Ini Anda Mau Delete ?</h3>
                    <p>Setelah Di Delete Data Tidak Akan Kembali</p>
                    <a href="#" class="ui-btn ui-corner-all ui-shadow ui-btn-inline ui-btn-b" data-rel="back">Cancel</a>
                    <a href="../proses/proses-kasmasuk.php?aksi=delete&id_kas_masuk=<?php echo $data['id_kas_masuk'] ?>" data-ajax="false" class="ui-btn ui-corner-all ui-shadow ui-btn-inline ui-btn-b" data-transition="flow">Delete</a>
                </div>
            </div>
            <div data-role="popup" id="popupNested<?php echo $no?>" data-theme="none">
                <div data-role="collapsibleset" data-theme="b" data-content-theme="a" data-collapsed-icon="arrow-r" data-expanded-icon="arrow-d" style="margin:0; width:250px;">
                    <div data-role="collapsible">
                        <h2>Action</h2>
                        <ul data-role="listview"  data-inset="false">
                            <li><a href="dasboard.php?aksi=update&pages=daftar_uangkas&aksi=update&id_kas_masuk=<?php echo $data['id_kas_masuk'] ?>" data-ajax="false">Edit</a></li>
                        </ul>
                    </div><!-- /collapsible -->
                </div><!-- /collapsible set -->
            </div><!-- /popup -->
        <?php $no++; } ?>
        </ul><?php
    }else if($aksi == "update"){
        $id_kas_masuk = $_GET['id_kas_masuk'];
        $query = mysql_query("SELECT * FROM tbl_uangkasmasuk WHERE id_kas_masuk='$id_kas_masuk'");
        $data = mysql_fetch_array($query);
        ?>
            <h2>Edit Data Kas Masuk</h2>
            <form action="../proses/proses-kasmasuk.php?aksi=simpan-update" method="POST" data-ajax="false">
                <input name="id_kas_masuk" id="textinput-fc" value="<?php echo $data['id_kas_masuk'] ?>" type="hidden">
                <div class="ui-field-contain">
                    <label>Keterangan</label>
                    <input name="keterangan" id="textinput-fc" placeholder="Keterangan" value="<?php echo $data['keterangan'] ?>" type="text">
                </div>
                <div class="ui-field-contain">
                    <label >Jumlah</label>
                    <input name="jumlah" id="textinput-fc" placeholder="Jumlah" value="<?php echo $data['jumlah'] ?>" type="text">
                </div>
                <button class="ui-shadow ui-btn ui-corner-all ui-btn-b" type="submit">Simpan</button>
            </form>
        <?php
    }else if($aksi == "insert"){
        ?>
            <h2>Tambah Data Kas Masuk</h2>
            <form action="../proses/proses-kasmasuk.php?aksi=simpan-insert" method="POST" data-ajax="false">
                <div class="ui-field-contain">
                    <label>Keterangan</label>
                    <input name="keterangan" id="textinput-fc" placeholder="Keterangan" type="text">
                </div>
                <div class="ui-field-contain">
                    <label >Jumlah</label>
                    <input name="jumlah" id="textinput-fc" placeholder="Jumlah" type="text">
                </div>
                <button class="ui-shadow ui-btn ui-corner-all ui-btn-b" type="submit">Simpan</button>
            </form>
        <?php
    }
?>
