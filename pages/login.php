<?php
include ('conn.php');
session_start();

if(isset($_POST['login'])){
    $name = $_POST['name'];
    $password = $_POST['password'];

    $select = mysqli_query($conn,("SELECT * FROM `admin` WHERE `name` = '$name' AND `password` = '$password'"));

    if (mysqli_num_rows($select)>0){
         $_SESSION['name'] = $name;
        header ('location: ../admin.php');
    }
    else {
    echo "<script>alert('Invalid Credentials'); location.href='../index.php';</script>";
 }


}


?>