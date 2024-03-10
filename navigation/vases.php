<?php

include "../connection.php";


$s = 'SELECT * FROM `add_product` WHERE pcategory = "vases"';

$res = mysqli_query($con,$s);

  

?>
<!doctype html>
<html lang="en" data-bs-theme="auto">
  <head><script src="../assets/js/color-modes.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.112.5">
    <title>Album example · Bootstrap v5.3</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/album/">
    <link rel="stylesheet" href="../bootstrap-5.3.0-JS and CSS//css/bootstrap.min.css">
    <script src="../bootstrap-5.3.0-JS and CSS/js/bootstrap.bundle.min.js"></script>

    

    

<link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        width: 100%;
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }

      .btn-bd-primary {
        --bd-violet-bg: #712cf9;
        --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

        --bs-btn-font-weight: 600;
        --bs-btn-color: var(--bs-white);
        --bs-btn-bg: var(--bd-violet-bg);
        --bs-btn-border-color: var(--bd-violet-bg);
        --bs-btn-hover-color: var(--bs-white);
        --bs-btn-hover-bg: #6528e0;
        --bs-btn-hover-border-color: #6528e0;
        --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
        --bs-btn-active-color: var(--bs-btn-hover-color);
        --bs-btn-active-bg: #5a23c8;
        --bs-btn-active-border-color: #5a23c8;
      }
      .bd-mode-toggle {
        z-index: 1500;
      }
    </style>

    
  </head>
  <body >
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
      <symbol id="check2" viewBox="0 0 16 16">
        <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
      </symbol>
      <symbol id="circle-half" viewBox="0 0 16 16">
        <path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z"/>
      </symbol>
      <symbol id="moon-stars-fill" viewBox="0 0 16 16">
        <path d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z"/>
        <path d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z"/>
      </symbol>
      <symbol id="sun-fill" viewBox="0 0 16 16">
        <path d="M8 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z"/>
      </symbol>
    </svg>

    <header data-bs-theme="dark">
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">UNIQUE HOME</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="../home/home.php" style="margin-left: 60px;">HOME</a>
          </li>

          <li class="nav-item dropdown " style="margin-left: 60px;">
          <a class="nav-link dropdown-toggle active " href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Wall Decore
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="../navigation/posters.php">Posters</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="../navigation/pinting.php">painting</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="../navigation/arts.php">Arts</a></li>
            <li><hr class="dropdown-divider"></li>
          </ul>
        </li>
        <li class="nav-item dropdown " style="margin-left: 60px;">
          <a class="nav-link dropdown-toggle active " href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Room Decore
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="../navigation/vases.php">Vases</a></li>
            <li><hr class="dropdown-divider"></li> 
            <li><a class="dropdown-item" href="../navigation/clocks.php">Clocks</a></li>
             <li><hr class="dropdown-divider"></li> 
            <li><a class="dropdown-item" href="../navigation/lamps.php">Lamps</a></li>
            <li><hr class="dropdown-divider"></li> 
            <li><a class="dropdown-item" href="../navigation/mirror.php">Mirror</a></li>
            <li><hr class="dropdown-divider"></li> 
          </ul>
        </li>

          <li class="nav-item">
            <a class="nav-link active" href="../jumbotron/about.php" style="margin-left: 60px;">ABOUT</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active "  href="../jumbotron/contact.php" style="margin-left: 60px;">CONTACT</a>
          </li>
        </ul>
        <form class="d-flex" role="search" style="display: flex;">
          <a href="../user_registration.php"><button class="btn btn-outline-success" style="margin-right: 40px;" type="button">registration</button></a>
          <a href="../user_login.php"><button class="btn btn-outline-success"  type="button" style="margin-right: 30px;">login</button></a>
        </form>
      </div>
    </div>
  </nav>
</header>

<section class="py-5 text-center container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light">Decorated Vases</h1></h1>
        
      </div>
    </div>
  </section> 

<main >
<?php
  while($row=mysqli_fetch_assoc($res))
  {
    ?>

<form method="post" action="cart.php?action=add&pid=<?php echo $row["id"]; ?>">
          <div class="card shadow-md">
          <div class="album py-5 bg-body-tertiary" >
    <div class="container"style="background-color:black ;">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
      <div class="col-md-4 mb-4">
            <img src="../img/<?php echo $row['pro_img'] ?>" width="300px" height="400px"  alt="<?php echo $row['pro_img'] ?> >
            <div class="card-body">
            <p class="card-text">vases Name :- <?php echo $row['product_name'] ?></p>
              <p class="card-text">Details :- <?php echo $row['product_desc'] ?></p>
              <p class="card-text">Rs :- <?php echo $row['product_price'] ?></p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                <div class="cart-action"><input type="number" class="product-quantity" name="quantity" value="1" size="2" /><input type="submit" value="Add to Cart" class="btnAddAction" /></div>
                
                </div>
              </div>
            </div>
          </div>
          </div>
</div>
    </div>
  </div>

        </form>
       
        
 



    <?php
  }
?>


</main>

<footer class="text-body-secondary py-5">
  <div class="container">
    <p class="float-end mb-1">
      <a href="#">Back to top</a>
    </p>
    <p class="mb-1">Album example is &copy; Bootstrap, but please download and customize it for yourself!</p>
    <p class="mb-0">New to Bootstrap? <a href="/">Visit the homepage</a> or read our <a href="../getting-started/introduction/">getting started guide</a>.</p>
  </div>
</footer>
<script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

    </body>
</html>
