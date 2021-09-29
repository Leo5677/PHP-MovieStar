<?php
require_once("db/db.php");
require_once("globals.php");
require_once("models/Message.php");
require_once("dao/UserDAO.php");

$message = new Message($BASE_URL);
$flashMessage = $message->getMessage();

if (!empty($flashMessage["msg"])) {
    // Clear Message
    $message->clearMessage();
}

$userDAO = new UserDAO($conn, $BASE_URL);
$userData = $userDAO->verifyToken(false);


?>
<div id="loader"></div>
<div id="body-moviestar" class="up-page">
    <header>
        <nav id="main-navbar" class="navbar navbar-expand-lg">
            <a href="<?= $BASE_URL ?>" class="navbar-brand">
                <img src="<?= $BASE_URL ?>img/logo.svg" alt="MovieStar" id="logo">
                <span id="moviestar-title">
                    <p class="p-title">MovieStar</p>
                </span>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fas-bars"></i>
            </button>
            <form action="" method="GET" id="search-form" class="d-flex my-2 my-lg-0">
                <input type="text" name="query" id="search" class="form-control mr-sm-2" type="search" placeholder="Search movies..." aria-label="Search">
                <button class="btn my-2" type="submit">
                    <i class="fas fa-search"></i>
                </button>
            </form>
            <div class="collapse navbar-collapse" id="navbar">
                <ul class="navbar-nav">
                    <?php if ($userData) : ?>
                        <li class="nav-item">
                            <a href="<?= $BASE_URL ?>new_movie.php" class="nav-link">
                                <strong>
                                    <p class="p-login-register"><i class="far fa-plus-square"></i> Insert Movie</p>
                                </strong>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= $BASE_URL ?>dashboard.php" class="nav-link">
                                <strong>
                                    <p class="p-login-register">My Movies</p>
                                </strong>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= $BASE_URL ?>edit_profile.php" class="nav-link bold">
                                <strong>
                                    <p class="p-login-register"><?= $userData->name; ?></p>
                                </strong>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= $BASE_URL ?>logout.php" class="nav-link bold">
                                <strong>
                                    <p class="p-login-register">Logout</p>
                                </strong>
                            </a>
                        </li>
                    <?php else :  ?>
                        <li class="nav-item">
                            <a href="<?= $BASE_URL ?>auth.php" class="nav-link">
                                <strong>
                                    <p class="p-login-register">Login / Sign Up</p>
                                </strong>
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </nav>
    </header>
    <?php if (!empty($flashMessage["msg"])) : ?>
        <div class="msg-container">
            <p class="msg <?= $flashMessage["type"] ?>"><?= $flashMessage["msg"] ?></p>
        </div>
    <?php endif; ?>