<?php
include ('conn.php');

$log = $_GET['log'];

$get = mysqli_query($conn,("SELECT * FROM `music` WHERE `log` = '$log' "));


$row = mysqli_fetch_assoc($get);
$filePath = "../music/".$row['song'];

if(file_exists($filePath)) {
    $fileName = basename($filePath); 
    $fileSize = filesize($filePath);
    header ("Cache-Control: private");
    header ("Content-Type: application/stream");
    header ("Content-Length: ".$fileSize);
    header ("Content-Disposition: attachment; filename=".$fileName);
    readfile ($filePath);
    exit(); 
}

?>