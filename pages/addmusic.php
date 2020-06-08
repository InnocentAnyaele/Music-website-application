<?php
include ('conn.php');

if(isset($_POST['addmusic'])){
    $title = $_POST['title'];
    $title = mysqli_real_escape_string($conn,$title);
    $artist = $_POST['artist'];
$music = $_FILES['music']['name'];
$music = mysqli_real_escape_string($conn,$music);
$coverpath = realpath($_FILES['cover']['tmp_name']);
$musicpath = realpath($_FILES['music']['tmp_name']);

$covertype = mime_content_type($coverpath);
$musictype = mime_content_type($musicpath);

$last_id = mysqli_insert_id($conn);

$check = mysqli_query($conn,("SELECT * FROM `music` WHERE `song` = '$music' "));
if (mysqli_num_rows($check) > 0){
    echo "<script>alert('Name already exists'); location.href='../admin.php';</script>";
}

else {
    if (strstr($covertype, "image/") and strstr($musictype, "audio/")){

        $unique = uniqid().time();
        $extension = pathinfo($_FILES['cover']['name'], PATHINFO_EXTENSION);
        $cover = $unique.'.'.$extension;
         $cover = mysqli_real_escape_string($conn,$cover);

        $insert = mysqli_query($conn,("INSERT INTO `music` (`title`,`artist`,`song`,`image`) VALUES ('$title','$artist','$music','$cover')"));

   
        if ($insert){
             $covertarget = "../img/music/".$cover;
             $coverupload = move_uploaded_file($_FILES["cover"]["tmp_name"], $covertarget);
    
             $musictarget = "../music/".basename($_FILES['music']['name']);
             $musicupload = move_uploaded_file($_FILES['music']['tmp_name'], $musictarget);
             echo "<script>alert('Uploaded!'); location.href='../admin.php';</script>";
         }
             else {
                 echo "<script>alert('Couldn't upload!'); location.href='../admin.php';</script>";
                 }
    }
    
    else {
        echo "<script>alert('Wrong file type!'); location.href='../admin.php';</script>";
    }
    
}

}

?>