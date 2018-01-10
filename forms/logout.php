<?php
session_start();
unset($_SESSION['pic']);
unset($_SESSION['level']);
header('location:../');

?>