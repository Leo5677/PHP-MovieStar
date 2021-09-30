<?php
require_once("templates/head.php");
require_once("templates/header.php");
require_once("models/User.php");
require_once("dao/UserDAO.php");
require_once("dao/MovieDAO.php");

$user = new User();
$userDAO = new UserDAO($conn, $BASE_URL);
$movieDAO = new MovieDAO($conn, $BASE_URL);
$userData = $userDAO->verifyToken(true);
$userMovies = $movieDAO->getMoviesByUserId($userData->id_users);
?>

<body onload="loadPage()">
    <div id="main-container" class="container-fluid">
        <h2 class="section-title">Dashboard</h2>
        <p class="section-description">Insert or change information for movies you've added.</p>
        <div class="col-md-12" id="insert-movie-container">
            <a href="<?= $BASE_URL ?>new_movie.php" class="btn card-btn">
                <i class="fas fa-plus"></i> Insert Movie
            </a>
        </div>
        <div class="col-md-12" id="movies-dashboard">
            <table class="table">
                <thead>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Note</th>
                    <th scope="col" class="actions-column">Actions</th>
                </thead>
                <tbody>
                    <?php foreach ($userMovies as $movie) : ?>
                        <tr>
                            <td scope="row"><?= $movie->id_movies ?></td>
                            <td><a href="<?= $BASE_URL ?>movie.php?id=" <?= $movie->id_movies ?> class="table-movie-title"><?= $movie->title ?></a></td>
                            <td><a href="#" class="fas fa-star" style="text-decoration: none;"> 9</a></td>
                            <td class="actions-column">
                                <a href="<?= $BASE_URL ?>edit_movie.php?id=" <?= $movie->id_movies ?>" class="edit-btn" style="text-decoration: none;">
                                    <i class="far fa-edit"></i> Edit
                                </a>
                                <form action="<?= $BASE_URL ?>movie_process.php">
                                    <input type="hidden" name="type" value="delete">
                                    <input type="hidden" name="id" value="<?= $movie->id_movies?>">
                                    <button type="submit" class="delete-btn">
                                        <i class="fas fa-times"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php require_once("templates/footer.php"); ?>
</body>