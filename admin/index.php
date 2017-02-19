<?php
session_start();

if (!$_SESSION['admin']) {
	header("Location: login.php");
} else {
	header("Location: admin.php");
}

?>