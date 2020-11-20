<?php
include ('pages/conn.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music</title>
    <link rel = "stylesheet" type = "text/css" href = "style.css" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.0/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>
    <script src="js/main.js"></script>

</head>
<body>

<nav class="navbar  fixed-top  navbar-expand-lg bg-light " style="background-color: transparent;">
    <a class="navbar-brand ml-lg-5 text-black js-scroll" href="#" style="font-weight: bolder; font-size: 30px;">Brand Name</a>
    <button class="navbar-toggler navbar-light" type="button" data-toggle="collapse" data-target="#collapselinks"  aria-controls="collapselinks" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-end" id="collapselinks" >
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link text-black js-scroll" href="#intro">HOME<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-black js-scroll" href="#about">ABOUT</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-black js-scroll" href="#music">MUSIC</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-black js-scroll" href="#album">ALBUMS</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-black js-scroll" href="#contact">CONTACT</a>
            </li>
            <li class="nav-item">
                <a href="#adminlogin" data-toggle="modal" class="nav-link text-black js-scroll" href="#">ADMIN</a>
            </li>
        </ul>
    </div>
</nav>

<div class="modal fade" id="adminlogin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Sign in</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3">
        <form method="post" action="pages/login.php">
        <div class="md-form mb-1">
        <label data-error="wrong" data-success="right">Username</label>
          <input type="text" name="name" class="form-control validate" required>
        </div>

        <div class="md-form mb-1">
        <label data-error="wrong" data-success="right" for="defaultForm-pass">Password</label>
          <input type="password" name="password" class="form-control validate" required>
        </div>

      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button class="btn btn-default" name="login">Login</button>
</form>
      </div>
    </div>
  </div>
</div>

<div class="text-center">
  <a href="" class="btn btn-default btn-rounded mb-4" data-toggle="modal" data-target="#modalLoginForm">Launch
    Modal Login Form</a>
</div>
    
<div id="intro" class="intro intro-image">
    <div class="container shadow p-3 mb-5 rounded" style="position: absolute; top: 30%; margin-left: 20px; width: auto; backdrop-filter: blur(5px);">
        <h4>Hi, <br> I'm Innocent</h4>
        <h3>A musician </h3><br>
        <a href="#" class="btn btn-outline-primary my-2 my-sm-0 text-white"><i>Check out my latest works.</i> </a>
    </div>
</div>


<section id="about">
    <div class="container shadow p-3 mt-5" style="padding-top: 50px;">
        <h3 class="text-center" style="font-size: 2rem;" >About Me</h3><hr style="width: 100px;"><br>
        <div class="row">
            <div class="col-7 p-3">
            <div class="card about-card"> <img class="card-img-top" src="img/bg4.jpg" alt="Card image cap"> </div> 
        </div>
            <div class="col-5 p-3">
                <h2 style="font-size: 2rem;">I am <br> Firstname <br> Secondname</h2>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </div>
        </div>
    </div>
</section>

<section id="music">
<div class="container gallery-block cards-gallery mt-5" style="overflow: auto; text-align: center; height: 600px;">
<h3 class="text-center" style="font-size: 2rem; margin-top: 40px;"> Music</h3><hr style="width: 100px;"><br>

<div class="row" >
    <?php
$selectmusic = mysqli_query($conn,("SELECT * FROM `music` ORDER BY `date` DESC"));
if ($selectmusic) {
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
}

if (!$selectmusic){
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

<section id="album">
<div class="container gallery-block cards-gallery mt-5" style="overflow: auto; text-align: center; height: 600px;">
<h3 class="text-center" style="font-size: 2rem; margin-top: 40px;"> ALBUMS </h3><hr style="width: 100px;"><br>

<div class="row" >
    <?php
$select = mysqli_query($conn,("SELECT * FROM `album` ORDER BY `date` DESC"));

if ($select) {
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
</div>
                    </div>
                  </div>
                </div>
              </div>
            </a>
          </div>

<?php
}
}


if (!$select){
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


<section id="contact" style="background-color: black;">

  <div class="container justify-content-center p-5 mt-5 text-center">


      
        <div class="container pt-3">
        <h1 class="text-white">ARTIST NAME</h1> <br>
        <img style="height: 40vh; width: 40vh;" src="img/bg2.jpg">

        <div class="container pt-3">
    <a href="#home"><span class="text-white" style="font-weight: bolder;">Home  |</span></a>
    <a href="#about"><span class="text-white" style="font-weight: bolder;">About  |</span></a>
    <a href="#music"><span class="text-white" style="font-weight: bolder;">Music  |</span></a>
    <a href="#album"><span class="text-white" style="font-weight: bolder;">Album </span></a>
</div>

</div>

<div class="container socials pt-4 pb-3">
<a class="btn-floating btn-lg btn-tw" href="#" ><i class="fab fa-twitter"></i></a>
<a class="btn-floating btn-lg btn-fb" href="#"><i class="fab fa-facebook-f"></i></a>
<a class="btn-floating btn-lg btn-ins" href="#"><i class="fab fa-instagram"></i></a>
<a class="btn-floating btn-lg btn-gplus" href="#"><i class="fab fa-google-plus-g"></i></a>
<a class="btn-floating btn-lg btn-yt" href="#"><i class="fab fa-youtube"></i></a>
</div>

  <span class="text-white"><i class="fas fa-phone"></i> 000-111-222-333</span>

</div>

</section>


</body>
</html>