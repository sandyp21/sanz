<?php
// This includes the session file. This file contains code that starts/resumes a session.
//by having it in the header file, it will be included on every page, allowing session capability to be used on every page across the website. 
ob_start();
session_start();

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    
    <link rel="shortcut icon" type="image/png" href="uploads/favicon.ico.png">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
     <!-- Stylesheet CSS -->
     
       
     <link rel="stylesheet" href="css/site.css"/> 

     <style>
       body{
         background-color: LemonChiffon;
       }
       .carousel-caption {
    bottom: 20rem;
    z-index: 4;
  }
     </style>
    <title>Sanz Soul Therapy - <?php echo $title ?></title>

  </head>
  <body>
  <header>
  
  <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #cbc800;">
<a class="navbar-brand" href="#"></a>
<img src="uploads/sanzlogo2.png" alt="" width="30" height="30" class="d-inline-block align-top">
<h4 style="text-center">Sanz Soul Therapy</h4>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="navbarSupportedContent">
  <ul class="navbar-nav mr-auto">
    <li class="nav-item <?php if($page == 'index'){ echo 'active'; }?>">
      <a class="nav-link" href="index.php">Home</a>
    </li>
    <li class="nav-item <?php if($page == 'aboutus'){ echo 'active'; }?>">
      <a class="nav-link" href="aboutus.php">About Us</a>
    </li>
    <li class="nav-item <?php if($page == 'team'){ echo 'active'; }?>">
      <a class="nav-link" href="team.php">Team</a>
    </li>
    

    <li class="nav-item dropdown <?php if($page == 'services'){ echo 'active'; }?>">
      <a class="nav-link dropdown-toggle" href="services.php" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Services</a>
       <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="rtt.php">RTT</a></li>
            <li><a class="dropdown-item" href="masst.php">Massage Therapy</a></li>
            <li><a class="dropdown-item" href="qigong.php">Qi Gong</a></li>
            <li><a class="dropdown-item" href="psyc.php">Psychotherapy</a></li>
        </ul>
    </li>
    
    <li class="nav-item <?php if($page == 'reg'){ echo 'active'; }?>">
      <a class="nav-link" href="reg.php">Registration</a>
    </li>
    
    <li class="nav-item <?php if($page == 'viewrecords'){ echo 'active'; }?>">
      <a class="nav-link" href="viewrecords.php">View Record</a>
    </li>
  </ul>
</div>

<div class="collapse navbar-collapse " id="navbarNavAltMarkup">
  <div class="navbar-nav ml-auto">
  <?php 
    if(!isset($_SESSION['userid'])){

    
  ?> 
    <a class="nav-link " href="login.php">Login <span class="sr-only">(current)</span></a>
  <?php }else{ ?>
    <a class="nav-item nav-link" href="#"><span>Hello <?php echo $_SESSION['username'] ?> !</span> <span class="sr-only">(current)</span></a>
    <a class="nav-link " href="logout.php">Logout <span class="sr-only">(current)</span></a>

  <?php } ?>
  </div>

</div>
</nav>
</header>


<div id="mycarousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#mycarousel" data-slide-to="0" class="active"></li>
      <li data-target="#mycarousel" data-slide-to="1"></li>
      <li data-target="#mycarousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block w-100" src="uploads/bg.jpg" alt="First Slide">
        <div class="carousel-caption">
          <h2>Relaxation</h2>
          <blockquote class="blockquote">
          <p>“Tension is who you think you should be. Relaxation is who you are.” –Chinese Proverb</p>
          </blockquote>
        </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="uploads/bg2.jpg" alt="Second Slide">
      <div class="carousel-caption">
        <h2 style="color:black;">Transform Your Life</h2>
        <p style="color:black;">“Let nothing hold you back from creating the life you’ve always wanted.” Anonymous</p>
      </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="uploads/bg1.jpg" alt="Third Slide">
      <div class="carousel-caption">
        <h2 style="color:black;">It's All About You</h2>
        <p style="color:black;">“Its hard to wait around for something you know might never happen; but its harder 
        to give up when you know its everything you want.” – Unknown</p>
      </div>
    </div>
</div>

      <a class="carousel-control-prev" href="#mycarousel" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#mycarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
</div>
<br>
<br>





<div class="container">
    