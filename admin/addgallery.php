<?php
session_start();
include '../hexaaconf/koneksi.php';

if (!$_SESSION['admin']) {
	header("Location: login.php");
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <title>Administrator - Hexaa Inside</title>
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
  <li><a href="index.php">Home</a></li>
  <li><a id="buttonnews" onclick="navbar()" href="addgallery.php" class="active">Gallery</a></li>
  <li><a id="buttongallery" onclick="navbar()">Delete</a></li>
  <li class="right"><a href="logout.php">Welcome, <b><i><?php echo $_SESSION['admin']; ?></i></b></a></li>
</ul>
<!-- Header Hexaa Inside Blog -->

<!-- Form Login Hexaa Inside Blog -->
<h2 id="gallery" class="header">Post Gallery</h2>

<div class="container">
  <form method="POST" enctype="multipart/form-data">
    <input type="text" name="inputjudul" placeholder="Masukan Judul Berita ..." required>
    <input type="file" name="user_image" accept="image/*">
    <button name="submit" type="submit" id="myButton" class="btn btn-lg btn-primary btn-block">Add</button>
  </form>
</div>
<!-- Form Login Hexaa Inside Blog -->
<br />
<?php

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if(isset($_POST['submit']))
 {
  $id = mysqli_insert_id($conn);
  $judul = $_POST['inputjudul'];
  $date = date("Y-m-d h:i:sa");

  $imgFile = $_FILES['user_image']['name'];
  $tmp_dir = $_FILES['user_image']['tmp_name'];
  $imgSize = $_FILES['user_image']['size'];
  
  
  if(empty($judul)){
   $errMSG = "Please Enter Judul.";
  }
  else if(empty($imgFile)){
   $errMSG = "Please Select Image File.";
  }
  else
  {
   $upload_dir = '../images/gallery/'; // upload directory
 
   $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
  
   // valid image extensions
   $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
  
   // rename uploading image
   $userpic = rand(1000,1000000).".".$imgExt;
    
   // allow valid image file formats
   if(in_array($imgExt, $valid_extensions)){   
    // Check file size '20MB'
    if($imgSize < 20000000)    {
     move_uploaded_file($tmp_dir,$upload_dir.$userpic);
    }
    else{
     $errMSG = "Sorry, your file is too large.";
    }
   }
   else{
    $errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";  
   }
  }
  
  
  // if no error occured, continue ....
  if(!isset($errMSG))
  {
   $sql = "INSERT INTO gallery (id, judul, gambar, tanggal) VALUES ('$id', '$judul', 'images/gallery/$userpic', '$date')";
   
   if(mysqli_query($conn, $sql))
   {
    $successMSG = "<center>Berhasil Disimpan !</center>";
    echo $successMSG;
    header("refresh:5;index.php"); // redirects image view page after 5 seconds.
   }
   else
   {
    $errMSG = "<center>Gagal Disimpan !</center>";
    echo $errMSG;
   }
  }
 }
// Batas
mysqli_close($conn);
?>
<!-- Footer -->
<div class="footer navbar-fixed-bottom">
Copyright &#169; <?php echo date("Y");?> <a href="mailto:admin@hexarand.gq">Denny Septian a.k.a H3xagon</a> &#9829;
<span id="keatasbang" class="right"><a onclick="scrolltotop()"><i class="fa fa-hand-o-up" aria-hidden="true"></i></a></span>
</div>
<!-- Footer -->
</body>
</html>