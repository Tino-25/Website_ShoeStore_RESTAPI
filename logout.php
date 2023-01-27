<?php
session_start();
// $_SESSION['idUser'] = null;
// $_SESSION['userName'] = null;
unset($_SESSION['idUser']);
unset($_SESSION['userName']);
unset($_SESSION['idDivision']);
header("location: ./");
?>