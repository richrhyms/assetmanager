<?php
session_start();
require_once("../../../connections/connection.php");
echo json_encode($_SESSION['PERMISSIONS']);
?>
