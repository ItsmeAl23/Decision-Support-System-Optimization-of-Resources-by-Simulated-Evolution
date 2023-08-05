<?php 
$id = $_GET['id'];
$delete = delete("alternatif","id ='$id'");
header('location:./?page=alternatif');
 ?>