<?php
require_once("templates/head.php");
require_once("templates/header.php");
require_once("models/User.php");
require_once("dao/UserDAO.php");

$user = new User();
$userDAO = new UserDAO($conn, $BASE_URL);
$userData = $userDAO->verifyToken(true);
?>

<body onload="loadPage()">
    <div id="main-container" class="container-fluid">
        <div class="offset-md-4 col-md-4 newmovie-container">
            <h1 class="page-title">Insert Movie</h1>
            <p class="page-description description-bottom">Insert your review and share with world!</p>
            <form action="<?= $BASE_URL ?>movie_process.php" id="insert-movie-form" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="type" value="create">
                <div class="form-group">
                    <label class="label-add-movie" for="title">
                        <p class="p-add-movie">Title:</p>
                    </label>
                    <input type="text" class="form-control input-add-movie" id="title" name="title" placeholder="Type title movie here...">
                </div>
                <div class="form-group">
                    <label class="label-add-movie" for="image">
                        <p class="p-add-movie">Image:</p>
                    </label>
                    <input type="file" class="form-control-file input-add-movie" id="image" name="image">
                </div>
                <div class="form-group">
                    <label class="label-add-movie" for="length">
                        <p class="p-add-movie">Duration:</p>
                    </label>
                    <input type="text" class="form-control input-add-movie" id="length" name="length" placeholder="Duration...">
                </div>
                <div class="form-group">
                    <label class="label-add-movie" for="category">
                        <p class="p-add-movie">Category:</p>
                    </label>
                    <select name="category" id="category" class="form-control input-add-movie">
                        <option value="">Selection...</option>
                        <option value="Action">Action</option>
                        <option value="Drama">Drama</option>
                        <option value="Comedy">Comedy</option>
                        <option value="Fantasy / Fiction">Fantasy / Fiction</option>
                        <option value="Romance">Romance</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="label-add-movie" for="trailer">
                        <p class="p-add-movie">Trailer:</p>
                    </label>
                    <input type="text" class="form-control input-add-movie" id="trailer" name="trailer" placeholder="Trailer...">
                </div>
                <div class="form-group">
                    <label class="label-add-movie" for="description">
                        <p class="p-add-movie">Description:</p>
                    </label>
                    <textarea name="description" id="description" rows="5" class="form-control" placeholder="Describe the movie..."></textarea>
                </div>
                <input class="btn card-btn" type="submit" value="Add Movie">
            </form>
        </div>
    </div>
    <?php require_once("templates/footer.php"); ?>
</body>