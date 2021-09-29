<?php require_once("templates/head.php") ?>
<?php require_once("templates/header.php"); ?>

<body onload="loadPage()">
    <div id="main-container" class="container-fluid">

        <h2 class="section-title">New Movies</h2>
        <p class="section-description">See reviews of the latest movies added on MovieStar!</p>
        <div class="movies-container">
            <div class="card movie-card">
                <div class="card-img-top" style="background-image: url('<?= $BASE_URL?>img/movies/movie_cover.jpg');"></div>
                <div class="card-body">
                    <p class="card-rating">
                        <i class="fas fa-star"></i>
                        <span class="rating">9</span>
                    </p>
                    <h5 class="card-title">
                    <a href="#">Movie Title</a>    
                    </h5>
                    <a href="#" class="btn btn-primary rate-btn">Access</a>
                    <a href="#" class="btn btn-primary card-btn">To know a movie</a>
                </div>
            </div>
        </div>

        <h2 class="section-title">Action</h2>
        <p class="section-description">See the best action movies</p>
        <div class="movies-container">
            <div class="card movie-card">
                <div class="card-img-top" style="background-image: url('<?= $BASE_URL?>img/movies/movie_cover.jpg');"></div>
                <div class="card-body">
                    <p class="card-rating">
                        <i class="fas fa-star"></i>
                        <span class="rating">9</span>
                    </p>
                    <h5 class="card-title">
                    <a href="#">Movie Title</a>    
                    </h5>
                    <a href="#" class="btn btn-primary rate-btn">Access</a>
                    <a href="#" class="btn btn-primary card-btn">To know a movie</a>
                </div>
            </div>
        </div>

        <h2 class="section-title">Drama</h2>
        <p class="section-description">See the best drama movies</p>
        <div class="movies-container">
            <div class="card movie-card">
                <div class="card-img-top" style="background-image: url('<?= $BASE_URL?>img/movies/movie_cover.jpg');"></div>
                <div class="card-body">
                    <p class="card-rating">
                        <i class="fas fa-star"></i>
                        <span class="rating">9</span>
                    </p>
                    <h5 class="card-title">
                    <a href="#">Movie Title</a>    
                    </h5>
                    <a href="#" class="btn btn-primary rate-btn">Access</a>
                    <a href="#" class="btn btn-primary card-btn">To know a movie</a>
                </div>
            </div>
        </div>

        <h2 class="section-title">Comedy</h2>
        <p class="section-description">See the best comedy movies</p>
        <div class="movies-container">
            <div class="card movie-card">
                <div class="card-img-top" style="background-image: url('<?= $BASE_URL?>img/movies/movie_cover.jpg');"></div>
                <div class="card-body">
                    <p class="card-rating">
                        <i class="fas fa-star"></i>
                        <span class="rating">9</span>
                    </p>
                    <h5 class="card-title">
                    <a href="#">Movie Title</a>    
                    </h5>
                    <a href="#" class="btn btn-primary rate-btn">Access</a>
                    <a href="#" class="btn btn-primary card-btn">To know a movie</a>
                </div>
            </div>
        </div>

        <h2 class="section-title">Fantasy / Fiction</h2>
        <p class="section-description">See the best fantasy / fiction movies</p>
        <div class="movies-container">
            <div class="card movie-card">
                <div class="card-img-top" style="background-image: url('<?= $BASE_URL?>img/movies/movie_cover.jpg');"></div>
                <div class="card-body">
                    <p class="card-rating">
                        <i class="fas fa-star"></i>
                        <span class="rating">9</span>
                    </p>
                    <h5 class="card-title">
                    <a href="#">Movie Title</a>    
                    </h5>
                    <a href="#" class="btn btn-primary rate-btn">Access</a>
                    <a href="#" class="btn btn-primary card-btn">To know a movie</a>
                </div>
            </div>
        </div>

        <h2 class="section-title">Romance</h2>
        <p class="section-description">See the best romance movies</p>
        <div class="movies-container">
            <div class="card movie-card">
                <div class="card-img-top" style="background-image: url('<?= $BASE_URL?>img/movies/movie_cover.jpg');"></div>
                <div class="card-body">
                    <p class="card-rating">
                        <i class="fas fa-star"></i>
                        <span class="rating">9</span>
                    </p>
                    <h5 class="card-title">
                    <a href="#">Movie Title</a>    
                    </h5>
                    <a href="#" class="btn btn-primary rate-btn">Access</a>
                    <a href="#" class="btn btn-primary card-btn">To know a movie</a>
                </div>
            </div>
        </div>

    </div>
    <?php require_once("templates/footer.php"); ?>
</body>