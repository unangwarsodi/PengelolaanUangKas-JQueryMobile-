<?php
    $id_organisasi = $_SESSION['id_organisasi'];
    $query = mysql_query("SELECT * FROM tbl_organisasi WHERE id_organisasi='$id_organisasi'");
    $data = mysql_fetch_array($query);
?>
<h2>Profil Organisasi</h2>
<form action="../proses/proses-profil.php?aksi=simpan-update" method="POST" data-ajax="false">
    <input name="id_organisasi" id="textinput-fc" value="<?php echo $data['id_organisasi'] ?>" type="hidden">
    <div class="ui-field-contain">
        <label>Nama Organisasi</label>
        <input name="nama_organisasi" id="textinput-fc" value="<?php echo $data['nama'] ?>" type="text">
    </div>
    <div class="ui-field-contain">
        <label >Alamat</label>
        <input name="alamat_organisasi" id="textinput-fc" value="<?php echo $data['alamat'] ?>" type="text">
    </div>
    <div class="ui-field-contain">
        <label >No Telepon</label>
        <input name="no_telepon" id="textinput-fc" value="<?php echo $data['no_telepon'] ?>" type="text">
    </div>
    <div class="ui-field-contain">
        <label >Username</label>
        <input name="username" id="textinput-fc" value="<?php echo $data['username'] ?>" type="text">
    </div>
    <div class="ui-field-contain">
        <label >Password</label>
        <input name="password" id="textinput-fc" value="<?php echo $data['password'] ?>" type="password">
    </div>
    <div class="ui-field-contain">
        <label >Confirm Password</label>
        <input name="confirm_password" id="textinput-fc" type="password">
    </div>
    <button class="ui-shadow ui-btn ui-corner-all ui-btn-b" type="submit">Simpan</button>
</form>