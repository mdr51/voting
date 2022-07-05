<?php

session_start();

unset($_SESSION['username']);
unset($_SESSION['useremail']);
unset ($_SESSION['generatedid']);
session_destroy();

header("location:index.php");


?>
