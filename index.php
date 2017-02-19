<?php

include 'hexaaconf/koneksi.php';

$posts = mysqli_query($conn, "SELECT * FROM post");
$gallery = mysqli_query($conn, "SELECT * FROM gallery");

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
<h1 id="gallery" class="header"># gallery</h1>

<div class="container">
<?php
$per_page=6;

if (isset($_GET["page"])) {
   $page = intval($_GET["page"]);
} else {
   $page=1;
}

// Page will start from 0 and Multiple by Per Page
$start_from = ($page-1) * $per_page;

//Selecting the data from table but with limit
$query = "SELECT * FROM gallery LIMIT $start_from, $per_page";
$result = mysqli_query($conn, $query);

?>

<?php
while ($fetch_gallery = mysqli_fetch_assoc($result)) {
   echo "<div class='responsive'>
    <div class='img'>
      <a href='{$fetch_gallery['gambar']}'>
       <img src='{$fetch_gallery['gambar']}' title='{$fetch_gallery['judul']} uploaded at {$fetch_gallery['tanggal']}' width='300' height='200'>
      </a>
    <div class='desc'>{$fetch_gallery['judul']}</div>
   </div>
  </div>";
}
?>
</div>
<!-- News Hexaa Inside Blog -->
<h1 class="header"># news</h1>

<div id="news" class="container">
<?php
$per_page=6;

if (isset($_GET["page"])) {
   $page = $_GET["page"];
} else {
   $page=1;
}

// Page will start from 0 and Multiple by Per Page
$start_from = ($page-1) * $per_page;

//Selecting the data from table but with limit
$query = "SELECT * FROM post LIMIT $start_from, $per_page";
$result = mysqli_query($conn, $query);

?>

<?php
while ($row = mysqli_fetch_assoc($result)) {
   echo "<div class='responsive'>
    <div class='img'>
      <a href='news.php?id={$row['id']}'>
       <img src='{$row['gambar']}' width='300' height='200'>
      </a>
    <div class='desc'>{$row['judul']}</div>
   </div>
  </div>";
}
?>
</div>
<?php

//Now select all from table
$query = "select * from post";
$queryg = "select * from gallery";

if ($result = mysqli_query($conn, $queryg) OR $result = mysqli_query($conn, $query)) {
  // Count the total records
  $total_records = mysqli_num_rows($result);
}

//Using ceil function to divide the total records on per page
$total_pages = ceil($total_records / $per_page);

echo "<div class='center'>
  <div class='pagination'>
    <a href='?page=1'>&laquo;</a>";

for ($i=1; $i<=$total_pages; $i++) {
   echo "<a href='?page=".$i."'>".$i."</a>";
};

echo "<a href='?page=$total_pages'>&raquo;</a>
  </div>
</div>";

?>
<!-- Footer -->
<div class="footer navbar-fixed-bottom">
Copyright &#169; <?php echo date("Y");?> <a href="mailto:admin@hexarand.gq">Denny Septian a.k.a H3xagon</a> &#9829;
<span id="keatasbang" class="right"><a onclick="scrolltotop()"><i class="fa fa-hand-o-up" aria-hidden="true"></i></a></span>
</div>
<!-- Footer -->
</body>
</html>