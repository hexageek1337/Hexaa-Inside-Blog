<?php
session_start();
include '../hexaaconf/koneksi.php';

if (isset($_POST['submit'])) {

	$username = mysqli_escape_string($conn, $_POST['username']);
	$password = mysqli_escape_string($conn, md5($_POST['password']));
	
	$login = mysqli_query($conn, "SELECT * FROM user WHERE username = '{$username}' AND password = '{$password}'");

	if (mysqli_num_rows($login) == 0) {
		die("Username atau Password Salah !");
	} elseif (empty($_POST['username'])) {
		echo "Username Anda Kosong";
	} elseif (empty($_POST['password'])) {
		echo "Password Anda Kosong";
	} else {
		$_SESSION['admin'] = $username;
		header("Location: admin.php");
	}
	
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <title>Administrator Login - Hexaa Inside</title>
<!-- Meta Tag HexaRand -->
<meta charset="utf-8" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="robots" content="noindex, nofollow">
<meta name="description" content="Berbagai Informasi Teknologi Teraktual dan Terbaru">
<meta name="keywords" content="teknologi,teraktual,terbaru,berita,informasi">
<meta http-equiv="Copyright" content="Denny Septian">
<meta name="author" content="Denny Septian">
<meta http-equiv="imagetoolbar" content="no">
<meta name="language" content="Indonesia">
<meta name="revisit-after" content="7">
<meta name="webcrawlers" content="all">
<meta name="rating" content="general">
<meta name="spiders" content="all">
<meta property="og:url" content="http://sekolah.sch.id/">
<meta property="og:site_name" content="Hexaa Inside">
<!-- Custom CSS Hexaa Inside Blog -->
<link rel="stylesheet" href="../css/hexaainside.css">
<link rel="stylesheet" href="../css/bootstrap.min.css">
<link rel="stylesheet" href="../css/fontawesome/css/font-awesome.min.css">
<link rel="stylesheet" href="../css/fontawesome/css/font-awesome.css">
<link rel="stylesheet" href="../css/bootstrap-theme.min.css">
<!-- Custom JavaScript Hexaa Inside Blog -->
<script src="../js/bootstrap.min.js"></script>
<script src="../js/jquery.min.js"></script>
<script type="text/javascript">
function navbar() {
    $(document).ready(function (){
        $("#buttonnews").click(function (){
           $('html, body').animate({
            scrollTop: $("#news").offset().top
           }, 1800);
        });
        $("#buttongallery").click(function (){
           $('html, body').animate({
            scrollTop: $("#gallery").offset().top
           }, 2600);
        });
    });
}
</script>
<script type="text/javascript">
$(document).ready(function(){
    $(window).scroll(function(){
        if ($(window).scrollTop() > 100) {
            $('#keatasbang').fadeIn();
        } else {
            $('#keatasbang').fadeOut();
        }
    });
});

function scrolltotop()
{
    $('html, body').animate({scrollTop : 0},500);
}
</script>
</head>
<body>
<!-- Header Hexaa Inside Blog -->
<ul id="topgan" class="topnav">
  <li><a class="active" href="/">Home</a></li>
  <li class="right"><a href="/">Hexaa Inside Blog</a></li>
</ul>
<!-- Header Hexaa Inside Blog -->

<!-- Form Login Hexaa Inside Blog -->
<h1 id="gallery" class="header">Login Administrator</h1>

<div class="container">
  <form method="POST">
    <input type="text" name="username" placeholder="Masukan Username Anda ..." required>
    <input type="password" name="password" placeholder="Masukan Password Anda ..." required>
    <button name="submit" type="submit" id="myButton" class="btn btn-lg btn-primary btn-block">Masuk</button>
  </form>
</div>
<!-- Form Login Hexaa Inside Blog -->
<!-- Footer -->
<div class="footer navbar-fixed-bottom">
Copyright &#169; <?php echo date("Y");?> <a href="mailto:admin@hexarand.gq">Denny Septian a.k.a H3xagon</a> &#9829;
<span id="keatasbang" class="right"><a onclick="scrolltotop()"><i class="fa fa-hand-o-up" aria-hidden="true"></i></a></span>
</div>
<!-- Footer -->
</body>
</html>