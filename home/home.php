<?php
session_start();
?>

<?php include 'navbar.php'; ?>     
<!-- slider start -->
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicato 54 tgrs" data-slide-to="2"></li>
    </ol>
    <div id="carouselExampleDark" class="carousel carousel-dark slide">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="10000">
                <img src="slide01.jpg" class=" w-100 h-50" alt="...">
                <div class="carousel-caption d-none d-md-block">
                <h2 class = "text-capitalize text-white">best collection</h2>
                <h1 class = "text-uppercase py-2 fw-bold text-white">new arrivals</h1>
                <a href = "..\login\register.php" class = "btn fw-bold mt-3 text-uppercase  text-white ">Register now</a>

                </div>
            </div>
            <div class="carousel-item" data-bs-interval="2000">
                <img src="slide02.jpg" class=" w-100 h-50" alt="..." >
                <div class="carousel-caption d-none d-md-block">
                <h2 class = "text-capitalize text-white">best collection</h2>
                <h1 class = "text-uppercase py-2 fw-bold text-white">new arrivals</h1>
                <a href = "..\login\register.php" class = "btn fw-bold mt-3 text-uppercase  text-white ">Register now</a>
                </div>
            </div>
            <div class="carousel-item">
                <img src="slide03.jpg" class=" w-100 h-5" alt="...">
                <div class="carousel-caption d-none d-md-block">
                <h2 class = "text-capitalize text-white">best collection</h2>
                <h1 class = "text-uppercase py-2 fw-bold text-white">new arrivals</h1>
                <a href = "..\login\register.php" class = "btn fw-bold mt-3 text-uppercase  text-white ">Register now</a>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>


    
      <section id = "popular" class = "py-5">
        <div class = "container">
            <div class = "title text-center pt-3 pb-5">
                <h2 class = "position-relative d-inline-block ms-4 fw-bold text-gray">Popular Of This Year</h2>
            </div>

            <div class = "row">
                <div class = "col-md-6 col-lg-4 row g-3">
                    <h3 class = "fs-5">Top Rated</h3>
                    <div class = "d-flex align-items-start justify-content-start">
                        <img src = "images/top_rated_1.jpg" alt = "" class = "img-fluid pe-3 w-25">
                        <div>
                            <p class = "mb-0">Blue Shirt</p>
                            <span>$ 20.00</span>
                        </div>
                    </div>
                    <div class = "d-flex align-items-start justify-content-start">
                        <img src = "images/top_rated_2.jpg" alt = "" class = "img-fluid pe-3 w-25">
                        <div>
                            <p class = "mb-0">Blue Shirt</p>
                            <span>$ 20.00</span>
                        </div>
                    </div>
                    <div class = "d-flex align-items-start justify-content-start">
                        <img src = "images/top_rated_3.jpg" alt = "" class = "img-fluid pe-3 w-25">
                        <div>
                            <p class = "mb-0">Blue Shirt</p>
                            <span>$ 20.00</span>
                        </div>
                    </div>
                </div>

                <div class = "col-md-6 col-lg-4 row g-3">
                    <h3 class = "fs-5">Best Selling</h3>
                    <div class = "d-flex align-items-start justify-content-start">
                        <img src = "images/best_selling_1.jpg" alt = "" class = "img-fluid pe-3 w-25">
                        <div>
                            <p class = "mb-0">Blue Shirt</p>
                            <span>$ 20.00</span>
                        </div>
                    </div>
                    <div class = "d-flex align-items-start justify-content-start">
                        <img src = "images/best_selling_2.jpg" alt = "" class = "img-fluid pe-3 w-25">
                        <div>
                            <p class = "mb-0">Blue Shirt</p>
                            <span>$ 20.00</span>
                        </div>
                    </div>
                    <div class = "d-flex align-items-start justify-content-start">
                        <img src = "images/best_selling_3.jpg" alt = "" class = "img-fluid pe-3 w-25">
                        <div>
                            <p class = "mb-0">Blue Shirt</p>
                            <span>$ 20.00</span>
                        </div>
                    </div>
                </div>

                <div class = "col-md-6 col-lg-4 row g-3">
                    <h3 class = "fs-5">On Sale</h3>
                    <div class = "d-flex align-items-start justify-content-start">
                        <img src = "images/on_sale_1.jpg" alt = "" class = "img-fluid pe-3 w-25">
                        <div>
                            <p class = "mb-0">Blue Shirt</p>
                            <span>$ 20.00</span>
                        </div>
                    </div>
                    <div class = "d-flex align-items-start justify-content-start">
                        <img src = "images/on_sale_2.jpg" alt = "" class = "img-fluid pe-3 w-25">
                        <div>
                            <p class = "mb-0">Blue Shirt</p>
                            <span>$ 20.00</span>
                        </div>
                    </div>
                    <div class = "d-flex align-items-start justify-content-start">
                        <img src = "images/on_sale_3.jpg" alt = "" class = "img-fluid pe-3 w-25">
                        <div>
                            <p class = "mb-0">Blue Shirt</p>
                            <span>$ 20.00</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    



    <?php include 'footer.php';
    