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
    <title>Admin - Music</title>
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



<section id="music" class="mt-5">
<div class="container gallery-block cards-gallery mt-5" style="overflow: auto; text-align: center; height: 600px;">
<h3 class="text-center" style="font-size: 2rem; margin-top: 40px;"> Music <a href="#addmusic" class="btn btn-primary"  data-toggle="modal"><i class="fas fa-plus"></i></a> </h3><hr style="width: 100px;"><br>

<div class="modal fade" id="addmusic" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Add music</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3">
        <form method="post" action="pages/addmusic.php" class="text-left" enctype="multipart/form-data">
        <div class="md-form mb-1">
        <label data-error="wrong" data-success="right">Title of song</label>
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

        <div class="md-form mb-1">
        <label data-error="wrong" data-success="right">Music</label>
          <input type="file" name="music" class="form-control validate" value="fileupload" required>
        </div>

      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button class="btn btn-primary" name="addmusic">Add</button>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="row" >
    <?php
$selectmusic = mysqli_query($conn,("SELECT * FROM `music` ORDER BY `date` DESC"));
while ($row = mysqli_fetch_assoc($selectmusic)){
    ?>

<div class="work-box shadow rounded" style=" margin-bottom: 10px; margin-left: 20px; margin-right: 20px; margin-top: 20px;">
              <div class="work-img ">
                <img src="img/music/<?php echo $row['image']; ?>" alt="" class="img-fluid" >
              </div>
              <div class="work-content">
                <div class="row">
                  <div class="col-sm-12">
                    <h2 class="w-title"><?php echo $row['title'];  ?></h2>
                    <div class="w-more">
                      <span class="w-ctegory"><?php echo $row['artist'];  ?></span> / <span class="w-date"><?php echo $row['date']; ?></span><br>
                      <div class="container mt-2">
                      <form method="post">
                      <input type="text" value="<?php echo $row['song']; ?>" name="song" hidden>
                      <button class="btn btn-primary" name="playmusic"><i class="fas fa-play"></i></button>
                      <!-- <button class="btn btn-primary"><i class="fas fa-download"></i></button> -->
                      <a href="pages/downloadmusic.php?log=<?php echo $row['log']; ?>" class="btn btn-primary"><i class="fas fa-download"></i></a>
                      <a href="pages/deletemusic.php?log=<?php echo $row['log']; ?>" class="btn btn-primary"><i class="fas fa-trash"></i></a>
</form>
                    </div>
                    </div>
                  </div>
                </div>
              </div>
            </a>
          </div>


          <?php
}
if (mysqli_num_rows($selectmusic)<1){
    ?>

<div class="container">
    <span>No Music at the moment!</span>
</div>

<?php
}
?>

<?php
if (isset($_POST['playmusic'])){
  $song = $_POST['song'];

?>
<div class="modal fade" id="playmusic" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
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
                      <audio controls id="music">
<source src="music/<?php echo $song; ?>" type="audio/mpeg">
</audio>
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
  $('#playmusic').modal('show');
  });
  </script>";
}
?>

</div>
</div>
</div>
</div>
</section>

    
</body>
</html>