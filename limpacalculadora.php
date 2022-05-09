<?php
session_start();

unset($_SESSION['resultados']);
$_SESSION['sucesso'] = 'Histórico deletado!';
header('location:index.php');