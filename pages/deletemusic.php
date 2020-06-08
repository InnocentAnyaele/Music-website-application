<?php
include ('conn.php');

$log = $_GET['log'];
$coverpath = mysqli_query($conn,("SELECT `image` FROM `music` WHERE `log`='$log' "));

$musicpath = mysqli_query($conn,("SELECT `song` FROM `music` WHERE `log` = '$log' "));

if (!empty($coverrow = mysqli_fetch_assoc($coverpath))){
    unlink ("../img/music/$coverrow[image]");
};


if (!empty($musicrow = mysqli_fetch_assoc($musicpath))){
    unlink ("../music/$musicrow[song]");
};


 $delete = mysqli_query($conn,("DELETE FROM `music` WHERE `log` = '$log'"));
 echo "<script>alert('Deleted!'); location.href='../admin.php';</script>";

?>