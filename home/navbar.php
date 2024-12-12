<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
     <title>Navigation bar</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  </head>
  <body class="p-3 m-0 border-0 bd-example m-0 border-0">
      
      <style>
          .nav-item a{
              color: white!important;
          }
         
      </style>
   
 <nav class="navbar navbar-expand-lg fixed-top " style="background-color: #355A4E">
  <div class="container mt-2">
    <a class="navbar-brand text-white fw-bold" href="..\home\home.php">Young Glitz</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse ps-10 fw-bold " id="navbarScroll">
      <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="..\home\home.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="..\blog\blog.php">Blog</a>
        </li>
        
        <li class="nav-item">
            <a class="nav-link " href="..\shop\product.php">Shop</a>
        </li>
        <?php
        if(empty($_SESSION["user"]))
        {
          ?>
            <li class="nav-item">
              <a class="nav-link " href="..\login\signin.php" >Login</a>
            </li>
            <?php
        }else
        {
          ?>
          <li class="nav-item">
            <a class="nav-link " href="..\login\profile.php">Profile</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="..\shoppingcart\myorder.php">My Orders</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="..\login\logout.php">Logout</a>
          </li>

          <?php
        }
        ?> 
        <li class="nav-item p-1">
         <a class="nav-cart " href="..\shoppingcart\cart.php" >
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-fill mt-2" viewBox="0 0 16 16">
                  <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                </svg>
              </a>
        </li>
        
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
   <!-- End Example Code -->
   
  
  </body>
</html>