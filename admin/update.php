<?php
session_start();
include '../hexaaconf/koneksi.php';

if (!$_SESSION['admin']) {
	header("Location: login.php");
}

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <title>Update Data Admin - Hexaa Inside</title>
<!-- Meta Tag HexaRand -->
<meta charset="utf-8" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
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
<!-- Custom CSS HexaRand -->
<link rel="stylesheet" href="../css/bootstrap.min.css">
<link href="../css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="../css/bootstrap-theme.min.css">
<!-- Custom JavaScript HexaRand -->
<script src="../js/bootstrap.min.js"></script>
<script src="../js/jquery.min.js"></script>
<style type="text/css">
@import url(http://fonts.googleapis.com/css?family=Antic+Slab);
body {
  padding-top: 40px;
  padding-bottom: 40px;
  background-color: #eee;
}

.form-signin {
  max-width: 330px;
  padding: 15px;
  margin: 0 auto;
}
.form-signin .form-signin-heading {
  text-align: center;
}
.form-signin .checkbox {
  margin-bottom: 10px;
}
.form-signin .checkbox {
  font-weight: normal;
}
.form-signin .form-control {
  position: relative;
  height: auto;
  -webkit-box-sizing: border-box;
     -moz-box-sizing: border-box;
          box-sizing: border-box;
  padding: 10px;
  font-size: 16px;
}
.form-signin .form-control:focus {
  z-index: 2;
}

.hexageekh1 {
  text-align: center;
}

.description {
  font-size: 13px;
  text-align: center;
}

#panelin {
  text-align: center;
  align: center;
}

#result {
  max-width: 400px;
  padding: 15px;
  margin: 0 auto;
}

#panelnumeric {
  display: all;
}

#panelchara {
  display: all;
}
</style>
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
<h1 id="topin" class="hexageekh1">Selamat datang <b><i><?php echo $_SESSION["admin"]; ?></i></h1>
<br />
<p class="description"><a href="update.php">Update Profile</a> | <a href="logout.php">Logout ?</a></p>
<br />
</div>
<br />
<div class="container">
  <!-- Panel Artikel -->
  <div id="panelartikel" class="panel panel-primary">
    <div class="panel-heading">
      <h3 class="form-signin-heading">Update Data</h3>
    </div>
      <div class="panel-body">
      <?php
$uptodate = $_GET['for'];

if (empty($uptodate)) {
  echo "<a href='?for=Username'>Change Username</a> | <a href='?for=Password'>Change Password</a> | <a href='?for=Email'>Change Email</a>";
}

if ($uptodate == 'Username') {
  echo "<form action='' method='POST'>
      <input name='username' type='text' id='username' class='form-control' placeholder='Masukan Username Anda ...' required>
      <button name='submit' type='submit' id='myButton' class='btn btn-lg btn-primary btn-block'>Simpan</button>";
}

if ($uptodate == 'Password') {
  echo "<form action='' method='POST'>
      <input name='password' type='password' id='password' class='form-control' placeholder='Masukan Password Anda ...' required>
      <button name='submit' type='submit' id='myButton' class='btn btn-lg btn-primary btn-block'>Simpan</button>";
}

if ($uptodate == 'Email') {
  echo "<form action='' method='POST'>
      <input name='email' type='text' id='email' class='form-control' placeholder='Masukan Email Anda ...' required>
      <button name='submit' type='submit' id='myButton' class='btn btn-lg btn-primary btn-block'>Simpan</button>";
}

?>
      </div>
  </div>
  <!-- Penutup Panel Artikel -->
  <br />
  <!-- Panel Result -->
  <div id="result" class="panel panel-primary">
    <div class="panel-heading">Result</div>
      <div class="panel-body">
<?php

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  if (isset($_POST['submit'])) {
  $id = mysqli_insert_id($conn);
  $user = $_SESSION['admin'];
  $updateuser = $_POST['username'];
  $updatepass = md5($_POST['password']);
  $updatemail = $_POST['email'];
  $date = date("Y-m-d h:i:sa");

  $sql = "UPDATE user SET username = '$updateuser' WHERE username ='$user'";
  $sqlpass = "UPDATE user SET password = '$updatepass' WHERE username ='$user'";
  $sqlemail = "UPDATE user SET email = '$updatemail' WHERE username ='$user'";

if ($uptodate == 'Username') {
  if (mysqli_query($conn, $sql)) {
    echo "Update berhasil di submit pada tanggal ".$date."";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

if ($uptodate == 'Password') {
  if (mysqli_query($conn, $sqlpass)) {
    echo "Update berhasil di submit pada tanggal ".$date."";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

if ($uptodate == 'Email') {
  if (mysqli_query($conn, $sqlemail)) {
    echo "Update berhasil di submit pada tanggal ".$date."";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
  }

mysqli_close($conn);
?>
      </div>
	</div>
</div>
<center><button id="ngetop" class="btn btn-lg">&#8593; Top</button></center>
<br />
<center><small>Copyright &#169; <?php echo date("Y");?> <a href="mailto:h3xagoncontact@gmail.com">Denny Septian a.k.a H3xagon</a> &#9829;</small></center>
</body>
</html>