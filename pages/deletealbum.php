<?php
include ('conn.php');

$log = $_GET['log'];
$coverpath = mysqli_query($conn,("SELECT `image` FROM `album` WHERE `log` = '$log'"));

if (!empty($coverrow = mysqli_fetch_assoc($coverpath))){
    unlink ("../img/album/$coverrow[image]");
};

$delete = mysqli_query($conn,("DELETE FROM `album` WHERE `log` = '$log'"));
 echo "<script>alert('Deleted!'); location.href='../album.php';</script>";

?>