<?php
include ('../config/connection.php');
$id = $_GET["id"];
$view = mysqli_query($con,"UPDATE publikasi SET download=download+1 WHERE idpublikasi='$id'")or die(mysqli_error($con));
header("Content-Type: application/octet-stream");

$file = $_GET["file"];
$path = '../uploads/publikasi/';
header("Content-Disposition: attachment; filename=" . $file);   
header("Content-Type: application/octet-stream");
header("Content-Type: application/download");
header("Content-Description: File Transfer");            
header("Content-Length: " . filesize($path.$file));
flush(); // this doesn't really matter.
$fp = fopen($path.$file, "r");
while (!feof($fp))
{
    echo fread($fp, 65536);
    flush(); // this is essential for large downloads
} 
fclose($fp);
?>