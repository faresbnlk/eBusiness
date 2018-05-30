<!DOCTYPE html>
<html lang="en">
<head>
  <title>Site de vente en Ligne</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
  <?php include("style_final.css"); ?>
  </style>
</head>
<body>

  <div class="jumbotron">
  <div class="container text-center">
    <h1>Shopping En Ligne</h1>      
      <h2 class="center">BIENVENUE SUR LE SITE N°1 DE VENTE EN LIGNE </h2>
  </div>
</div>
  <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <ul class="nav navbar-nav">
      <li class="active"><a href="test.php">HOME</a></li>
      <li><a href="acceuil.php">CONNEXION</a></li>
      <li><a href="new_user.php">INSCRIPTION</a></li>
    </ul>
  </div>
</nav>

  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
        <img src="1.jpg" style="width:100%;">
      </div>

      <div class="item">
        <img src="2.jpeg" style="width:100%;">
      </div>
    
      <div class="item">
        <img src="3.png" style="width:100%;">
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</body>
</html>
