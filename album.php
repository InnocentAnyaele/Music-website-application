<?php
include ('pages/conn.php');
session_start();

if (!isset($_SESSION['name'])){
    header ('location: index.php');
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Album</title>
    <link rel = "stylesheet" type = "text/css" href = "style.css" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.0/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>
    <script src="js/main.js"></script>

</head>
<body>


<?php include ('views/nav.php') ?>


<section id="album" class="mt-5>">
<div class="container gallery-block cards-gallery mt-5" style="overflow: auto; text-align: center; height: 600px;">
<h3 class="text-center" style="font-size: 2rem; margin-top: 40px;"> ALBUMS  <a href="#addalbum" class="btn btn-primary" data-toggle="modal"><i class="fas fa-plus"></i></a> </h3><hr style="width: 100px;"><br>

<div class="modal fade" id="addalbum" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Create Album</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3">
        <form method="post" action="pages/createalbum.php" class="text-left" enctype="multipart/form-data">
        <div class="md-form mb-1">
        <label data-error="wrong" data-success="right">Title of Album</label>
          <input type="text" name="title" class="form-control validate" required>
        </div>

        <div class="md-form mb-1">
        <label data-error="wrong" data-success="right">Artist</label>
          <input type="text" name="artist" class="form-control validate" required>
        </div>

        <div class="md-form mb-1">
        <label data-error="wrong" data-success="right">Cover</label>
          <input type="file" name="cover" class="form-control validate"  value="fileupload" required>
        </div>

      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button class="btn btn-primary" name="createalbum">Create</button>
        </form>
      </div>
    </div>
  </div>
</div>


<div class="row" >
    <?php
$select = mysqli_query($conn,("SELECT * FROM `album` ORDER BY `date` DESC"));
while ($row = mysqli_fetch_assoc($select)){
    ?>
<div class="work-box shadow rounded" style=" margin-bottom: 10px; margin-left: 20px; margin-right: 20px; margin-top: 20px;">
              <div class="work-img ">
                <img src="img/album/<?php echo $row['image']; ?>" alt="" class="img-fluid" >
              </div>
              <div class="work-content">
                <div class="row">
                  <div class="col-sm-12">
                    <h2 class="w-title"><?php echo $row['title']; ?> <small class="text-muted"></small></h2>
                    <div class="w-more">
                      <span class="w-ctegory"><?php echo $row['artist']; ?></span> / <span class="w-date"><?php echo $row['date']; ?></span><br>
                      <div class="container mt-2">
                          <form method="post">
                              <input value="<?php echo $row['log']; ?>" name="albumlog" id="albumlog" hidden>
                              <input value="<?php echo $row['title']; ?>" name="albumtitle" id="albumtitle" hidden>
                              <input value="<?php echo $row['image']; ?>" name="albumimage" id="albumimage" hidden>
                              <input class="btn btn-outline-success" type="submit" name="explore" id="explore" value="Explore">
                          </form>
                        <div class="container pt-2">
                            <form method="post">
                                <input type="text" value="<?php echo $row['log'] ;?>" name="log" hidden>
                                <input type="text" value="<?php echo $row['title'] ;?>" name="name" hidden>
                        <button class="btn btn-primary" name="addmusic"><i class="fas fa-plus"></i></button>
                        <a href="pages/deletealbum.php?log=<?php echo $row['log'] ?>" class="btn btn-primary"><i class="fas fa-trash"></i></a>
</form>
</div>
</div>
                    </div>
                  </div>
                </div>
              </div>
            </a>
          </div>

<?php
}
if (mysqli_num_rows($select)<1){
    ?>

<div class="container">
    <span>No Album at the moment!</span>
</div>

<?php
}
?>

</div>
</div>
</div>
</div>

<?php
if (isset($_POST['addmusic'])){
    $albumlog = $_POST['log'];
    $albumname = $_POST['name'];
?>

<div id="addmusic" class="modal fade" role="dialog" >
  <div class="modal-dialog">

    <div class="modal-content">

      <div class="modal-header justify-content-center">
       <h3>Add music to <?php echo " ".$albumname; ?></h3>
      </div>

      <div class="modal-body">
        <div class="card">
          <div class="card-body">
          <form method="post" action="pages/addmusictoalbum.php">
          <input type="text" value="<?php echo $albumlog; ?>" name="albumlog" hidden>
          <ul class="list-group list-group-flush">
          <?php
$selectmusic = mysqli_query($conn,("SELECT * FROM `music`"));
while ($selectmusicrow = mysqli_fetch_assoc($selectmusic)){
          ?>
 

 
    <li class="list-group-item">
      <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" id="<?php echo $selectmusicrow['log']; ?>" name="addmusic[]" value="<?php echo $selectmusicrow['log']; ?>">
        <label class="custom-control-label" for="<?php echo $selectmusicrow['log']; ?>">
          <span class="" style=" color: #4169E1;"> <?php echo $selectmusicrow['title']." -";  ?> </span>
        <span class="" ><i><?php echo "   ".$selectmusicrow['artist']; ?></i></span>
        </label>
      </div>
    </li>





  
<?php
}
?>
</ul>
<div class="custom-control mt-3">
  <button class="btn btn-outline-primary btn-block" name="submit">Add</button>
</div>
</form>   
        </div>
    
 
      </div>
 
      <div class="modal-footer">
       <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i></button>
      </div>
    </div>
    </form>

  </div>

</div>
</div>

<?php
echo "<script type='text/javascript'>
$(document).ready(function(){
$('#addmusic').modal('show');
});
</script>";
}
?>



<?php
if (isset($_POST['explore'])){
$albumlog = $_POST['albumlog'];
$albumtitle = $_POST['albumtitle'];
$albumimage = $_POST['albumimage'];

?>

<div id="albummodal" class="modal fade" role="dialog" >
  <div class="modal-dialog">

    <div class="modal-content">

      <div class="modal-header justify-content-center">
       <h3 ><?php  echo $albumtitle; ?></h3>
      </div>

      <div class="modal-body">
        <div class="card">
          <div class="card-body">
          <img class="card-img pb-5" src="img/album/<?php  echo $albumimage; ?>" alt="Card image cap">

          <?php
$selectmusic = mysqli_query($conn,("SELECT * FROM `music` WHERE `album` = '$albumlog'"));
while ($selectmusicrow = mysqli_fetch_assoc($selectmusic)){
          ?>
          <div class="row">
    <div class="col-5">
<p class="" style=" color: #4169E1;"><?php echo $selectmusicrow['title']; ?></p>
    </div>
    <div class="col-4">
      <p><i><?php echo $selectmusicrow['artist']; ?></i></p>
      </div>
      <div class="col-3">
        <div class="row justify-content-end pr-3">
        <form method="post">
            <input type="text" value="<?php echo $selectmusicrow['song']; ?>" name="albumsong" hidden>
            <button class="btn btn-sm btn-primary" name="playalbumsong"><i class="fas fa-play"></i></button>
     <a class="btn btn-sm btn-primary" href="pages/downloadmusic.php?log=<?php echo $selectmusicrow['log']; ?>" ><i class="fas fa-download"></i></a>
</form>
      </div>
      </div>
  </div>

  
<?php
}
?>

        </div>
    
 
      </div>
 
      <div class="modal-footer">
       <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i></button>
      </div>
    </div>
    </form>

  </div>

</div>
</div>

<?php
echo "<script type='text/javascript'>
$(document).ready(function(){
$('#albummodal').modal('show');
});
</script>";
}
?>

<?php
if (isset($_POST['playalbumsong'])){
  $song = $_POST['albumsong'];

?>
<div class="modal fade" id="playalbummusic" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Play</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3">
        <div class="container text-center">
                      <audio controls id="music">
<source src="music/<?php echo $song; ?>" type="audio/mpeg">
</audio>
</div>
      </div>
      <!-- <div class="modal-footer d-flex justify-content-center">
        <button class="btn btn-primary" name="addmusic">Add</button>
      </div> -->
    </div>
  </div>
</div>
  <?php
  echo "<script type='text/javascript'>
  $(document).ready(function(){
  $('#playalbummusic').modal('show');
  });
  </script>";
}
?>

</section>

    
</body>
</html>