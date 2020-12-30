<?php
session_start();
unset($_SESSION['aname']);
unset($_SESSION['uname']);
unset($_SESSION['uid']);
header('location:../index.php');


?>