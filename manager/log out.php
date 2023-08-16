<?php
session_start();
session_unset();

header("Location:login form.php");
session_destroy();
?>