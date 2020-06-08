<?php
include ('conn.php');

if (isset($_POST['submit'])){

 if(!empty($_POST['addmusic'])){
     foreach ($_POST['addmusic'] as $value){
         $albumlog = $_POST['albumlog'];
         $insert = mysqli_query($conn,("UPDATE `music` SET `album` = '$albumlog' WHERE `log` = '$value' "));
         if($insert){
            echo "<script>alert('Album has been updated!'); location.href='../album.php';</script>";
         }
         else{
            echo "<script>alert('Failed'); location.href='../album.php';</script>";
         }
     }
 }

 else {
    echo "<script>alert('You have not selected any music!'); location.href='../album.php';</script>";
 }

}



?>