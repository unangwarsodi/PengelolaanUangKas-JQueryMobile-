<h2>Profil Organisasi</h2>
<form action="proses/proses-profil.php?aksi=simpan-insert" method="POST" data-ajax="false">
    <div class="ui-field-contain">
        <label>Nama Organisasi</label>
        <input name="nama_organisasi" id="textinput-fc" type="text">
    </div>
    <div class="ui-field-contain">
        <label >Alamat</label>
        <input name="alamat_organisasi" id="textinput-fc" type="text">
    </div>
    <div class="ui-field-contain">
        <label >No Telepon</label>
        <input name="no_telepon" id="textinput-fc" type="text">
    </div>
    <div class="ui-field-contain">
        <label >Username</label>
        <input name="username" id="textinput-fc" type="text">
    </div>
    <div class="ui-field-contain">
        <label >Password</label>
        <input name="password" id="textinput-fc" type="password">
    </div>
    <div class="ui-field-contain">
        <label >Confirm Password</label>
        <input name="confirm_password" id="textinput-fc" type="password">
    </div>
    <button class="ui-shadow ui-btn ui-corner-all ui-btn-b" type="submit">Simpan</button>
</form>