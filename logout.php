<?php
session_start();
unset($_SESSION['userr']);
header("location: index.php");
die;