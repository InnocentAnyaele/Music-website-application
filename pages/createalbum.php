<?php
include ('conn.php');

if (isset($_POST['createalbum'])){
    $title = $_POST['title'];
    $title = mysqli_real_escape_string($conn,$title);
    $artist = $_POST['artist'];
    $coverpath = realpath($_FILES['cover']['tmp_name']);
    $covertype = mime_content_type($coverpath);

    

    $check = mysqli_query($conn,("SELECT * FROM `album` WHERE `title` = '$title'"));
    if (mysqli_num_rows($check)>0){
        echo "<script>alert('Name already exists'); location.href='../album.php';</script>";
    }
    else {
        if (strstr($covertype, "image/")){

            $unique = uniqid().time();
            $extension = pathinfo($_FILES['cover']['name'], PATHINFO_EXTENSION);
            $cover = $unique.'.'.$extension;
             $cover = mysqli_real_escape_string($conn,$cover);

             
            $insert = mysqli_query($conn,("INSERT INTO `album` (`title`,`artist`,`image`) VALUES ('$title','$artist','$cover') "));
            if ($insert){
                $covertarget = "../img/album/".$cover;
                $coverupload = move_uploaded_file($_FILES["cover"]["tmp_name"], $covertarget);
                echo "<script>alert('Album Created!'); location.href='../album.php';</script>";
            }
        }
        else{
            echo "<script>alert('Wrong file type!'); location.href='../album.php';</script>";
        }
    }
}


?>