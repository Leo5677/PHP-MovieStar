<?php
require_once("templates/head.php");
require_once("templates/header.php");
require_once("dao/MovieDAO.php");

$movieDao = new MovieDAO($conn, $BASE_URL);

$latestMovies = $movieDao->getLatestMovies();

$actionMovies = $movieDao->getMoviesByCategory("Action");

$dramaMovies = $movieDao->getMoviesByCategory("Drama");

$comedyMovies = $movieDao->getMoviesByCategory("Comedy");

$fantasyFictionMovies = $movieDao->getMoviesByCategory("Fantasy / Fiction");

$romanceMovies = $movieDao->getMoviesByCategory("Romance");
?>

<body onload="loadPage()">
    <div id="main-container" class="container-fluid">
        <h2 class="section-title">New Movies</h2>
        <p class="section-description">See reviews of the latest movies added on MovieStar!</p>

        <div class="movies-container">
            <?php foreach ($latestMovies as $movie) : ?>
                <?php require("templates/movie_card.php"); ?>
            <?php endforeach ?>
            <?php if (count($latestMovies) === 0) : ?>
                <p class="empty-list">There are still no movies to show!</p>
            <?php endif; ?>
        </div>

        <h2 class="section-title">Action</h2>
        <p class="section-description">See the best action movies</p>
        <div class="movies-container">
            <?php foreach ($actionMovies as $movie) : ?>
                <?php require("templates/movie_card.php"); ?>
            <?php endforeach ?>
            <?php if (count($actionMovies) === 0) : ?>
                <p class="empty-list">There are still no movies to show!</p>
            <?php endif; ?>
        </div>

        <h2 class="section-title">Drama</h2>
        <p class="section-description">See the best action movies</p>
        <div class="movies-container">
            <?php foreach ($dramaMovies as $movie) : ?>
                <?php require("templates/movie_card.php"); ?>
            <?php endforeach ?>
            <?php if (count($dramaMovies) === 0) : ?>
                <p class="empty-list">There are still no movies to show!</p>
            <?php endif; ?>
        </div>

        <h2 class="section-title">Comedy</h2>
        <p class="section-description">See the best action movies</p>
        <div class="movies-container">
            <?php foreach ($comedyMovies as $movie) : ?>
                <?php require("templates/movie_card.php"); ?>
            <?php endforeach ?>
            <?php if (count($comedyMovies) === 0) : ?>
                <p class="empty-list">There are still no movies to show!</p>
            <?php endif; ?>
        </div>

        <h2 class="section-title">Fantasy / Fiction</h2>
        <p class="section-description">See the best action movies</p>
        <div class="movies-container">
            <?php foreach ($fantasyFictionMovies as $movie) : ?>
                <?php require("templates/movie_card.php"); ?>
            <?php endforeach ?>
            <?php if (count($fantasyFictionMovies) === 0) : ?>
                <p class="empty-list">There are still no movies to show!</p>
            <?php endif; ?>
        </div>

        <h2 class="section-title">Romance</h2>
        <p class="section-description">See the best action movies</p>
        <div class="movies-container">
            <?php foreach ($romanceMovies as $movie) : ?>
                <?php require("templates/movie_card.php"); ?>
            <?php endforeach ?>
            <?php if (count($romanceMovies) === 0) : ?>
                <p class="empty-list">There are still no movies to show!</p>
            <?php endif; ?>
        </div>
    </div>
    <?php require_once("templates/footer.php"); ?>
</body>