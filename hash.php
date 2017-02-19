<?php
$password = $_GET['password'];
$hash = md5($password);

echo $hash;
?>