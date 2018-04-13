<!DOCTYPE html>
<html>
<head>
	<title>Pengelolaan Uang Kas Online</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="plugin/jquery.mobile-1.4.5.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="plugin/jquery.js"></script>
    <script src="plugin/jquery.mobile-1.4.5.min.js"></script>
</head>
<body>
<div data-url="panel-responsive-page1" data-role="page" class="jqm-demos ui-responsive-panel" id="panel-responsive-page1" data-title="Panel responsive page">
    <div data-role="header">
        <h1>Pengelolaan Uang Kas Online</h1>
        <a href="#nav-panel" data-icon="bars" data-iconpos="notext">Menu</a>
        <a href="#add-form" data-icon="gear" data-iconpos="notext">Add</a>
    </div><!-- /header -->
    <div role="main" class="ui-content jqm-content jqm-fullwidth" id="page">
        <?php
            $pages = $_GET['pages'];
            if($pages == ""){      
                ?>
                    <h1>Pengelolaan Uang Kas Online</h1>
                    <p>
                        Pengelolaan Uang Kas Online adalah aplikasi yang mempermudah pengelolaan uang kas suatu organisasi.
                    </p>
                <?php
            }else if($pages == "register"){
                include 'pages/insert-profil.php';
            }
        ?>
    </div><!-- /content -->
    <div data-role="panel" data-position="right" data-display="reveal" data-theme="a" id="add-form">
        <form action="proses/login.php?aksi=login" method="POST" data-ajax="false">
            <h2>Login</h2>
            <label>Username:</label>
            <input name="username" id="name" data-clear-btn="true" data-mini="true" type="text">
            <label>Password:</label>
            <input name="password" id="password" data-clear-btn="true" autocomplete="off" data-mini="true" type="password">
            <div class="ui-grid-a">
                <div class="ui-block-b"><button id="simpan" type="submit" class="ui-btn ui-btn-b ui-mini">Login</button></div>
            </div>
        </form><br>
        <ul data-role="listview" data-inset="false">
            <li><a href="index.php?pages=register" data-transition="none" class="ui-btn ui-corner-all ui-shadow ui-btn-inline" data-ajax="false">Register</a></li>
        </ul>
    </div><!-- /panel -->
</div>
<script>
$("#simpan").click(function() {
    var user = $("#name").val();
    var pass = $("#password").val();
    $.ajax({
        url: "proses/login.php?aksi=login",
        data : "user="+user+"&pass="+pass,
        type: "POST",
        dataType: "html",
        success: function(pesan){
            if(pesan == "Sukses"){
                s
            } else {
                alert(pesan);
            }
        }
    });
});
</script>
</body>
</html>