<?php

include 'hexaaconf/koneksi.php';

$id = intval($_GET['id']);
$q  = mysqli_query($conn, "SELECT * FROM post WHERE id = {$id}") or die(mysqli_error($conn));
$post = mysqli_fetch_array($q);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <title>Hexaa Inside</title>
<!-- Meta Tag HexaRand -->
<meta charset="utf-8" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="robots" content="index, follow">
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
<link rel="stylesheet" href="css/hexaainside.css">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/fontawesome/css/font-awesome.min.css">
<link rel="stylesheet" href="css/fontawesome/css/font-awesome.css">
<link rel="stylesheet" href="css/bootstrap-theme.min.css">
<!-- Custom JavaScript Hexaa Inside Blog -->
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.min.js"></script>
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
  <li><a id="buttonnews" onclick="navbar()">News</a></li>
  <li><a id="buttongallery" onclick="navbar()">Gallery</a></li>
  <li class="right"><a href="/">Hexaa Inside Blog</a></li>
</ul>
<!-- Header Hexaa Inside Blog -->

<!-- Content Hexaa Inside Blog -->
<!-- News Hexaa Inside Blog -->
<h1 class="header"><?php echo $post['judul'] ?></h1>

<div id="news" class="container">
  <img class="center" src="<?php echo $post['gambar'] ?>" alt="<?php echo $post['judul'] ?>" title="<?php echo $post['judul'] ?>">
  <br />
  <p><?php echo $post['konten'] ?></p>
</div>
<!-- Footer -->
<div class="footer navbar-fixed-bottom">
Copyright &#169; <?php echo date("Y");?> <a href="mailto:admin@hexarand.gq">Denny Septian a.k.a H3xagon</a> &#9829;
<span id="keatasbang" class="right"><a onclick="scrolltotop()"><i class="fa fa-hand-o-up" aria-hidden="true"></i></a></span>
</div>
<!-- Footer -->
</body>
</html>