<?php

include 'hexaaconf/koneksi.php';

$posts = mysqli_query($conn, "SELECT * FROM post");
$gallery = mysqli_query($conn, "SELECT * FROM gallery");

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
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
<link rel="stylesheet" href="css/font-awesome.min.css">
<link rel="stylesheet" href="css/bootstrap-theme.min.css">
<!-- Custom JavaScript Hexaa Inside Blog -->
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function (){
    $("#buttonartikel").click(function (){
        $('html, body').animate({
            scrollTop: $("#panelartikel").offset().top
        }, 1800);
    });
    $("#buttontestimoni").click(function (){
        $('html, body').animate({
            scrollTop: $("#paneltestimoni").offset().top
        }, 2600);
    });
    $("#ngetop").click(function (){
        $('html, body').animate({
            scrollTop: $("#topin").offset().top
        }, 2700);
    });
});
</script>
</head>
<body>
<!-- Header Hexaa Inside Blog -->
<ul class="topnav">
  <li><a class="active" href="/">Home</a></li>
  <li><a href="#news">News</a></li>
  <li><a href="#contact">Contact</a></li>
  <li class="right"><a href="/">Hexaa Inside Blog</a></li>
</ul>
<!-- Header Hexaa Inside Blog -->

<!-- Content Hexaa Inside Blog -->
<!-- News Hexaa Inside Blog -->
<h1 class="header"># news</h1>

<div class="container">
  <?php
  
  while($fetch_posts = mysqli_fetch_array($posts)) {
  
    echo "<div class='responsive'>
    <div class='img'>
      <a target='_blank' href='news.php?id={$fetch_posts['id']}'>
       <img src='{$fetch_posts['gambar']}' width='300' height='200'>
      </a>
    <div class='desc'>{$fetch_posts['judul']}</div>
   </div>
  </div>";
    
  }
  
  ?>
</div>
<!-- News Hexaa Inside Blog -->
<!-- Gallery Hexaa Inside Blog -->
<h1 class="header"># gallery</h1>

<div class="container">
  <?php
  
  while($fetch_posts = mysqli_fetch_array($gallery)) {
  
    echo "<div class='responsive'>
    <div class='img'>
      <a target='_blank' href='{$fetch_posts['gambar']}'>
       <img src='{$fetch_posts['gambar']}' title='{$fetch_posts['judul']} uploaded at {$fetch_posts['tanggal']}' width='300' height='200'>
      </a>
    <div class='desc'>{$fetch_posts['judul']}</div>
   </div>
  </div>";
    
  }
  
  ?>
</div>
<!-- Gallery Hexaa Inside Blog -->
<!-- Content Hexaa Inside Blog -->
<div class="center">
  <div class="pagination">
    <a href="#">&laquo;</a>
    <a href="#" class="active">1</a>
    <a href="#">2</a>
    <a href="#">3</a>
    <a href="#">4</a>
    <a href="#">5</a>
    <a href="#">6</a>
    <a href="#">&raquo;</a>
  </div>
</div>
<!-- Footer -->
<div class="footer navbar-fixed-bottom">
Copyright &#169; <?php echo date("Y");?> <a href="mailto:admin@hexarand.gq">Denny Septian a.k.a H3xagon</a> &#9829;
</div>
<!-- Footer -->
</body>
</html>