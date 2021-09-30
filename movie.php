<?php
require_once("templates/head.php");
require_once("templates/header.php");
require_once("models/Movie.php");
require_once("dao/MovieDAO.php");

$id_movies = filter_input(INPUT_GET, "id_movies");
$movie;
$movieDAO = new MovieDAO($conn, $BASE_URL);


if(empty($id_movies))
{
    $message->setMessage("Movie not found.", "error", "index.php");
}
else
{
    $movie = $movieDAO->findById($id_movies);

    if(!$movie)
    {
        $message->setMessage("Movie not found.", "error", "index.php");
    }
}

$userOwnsMovie = false;
if(!empty($userData))
{
    if($userData->id_users === $movie->id_users)
    {
        $userOwnsMovie = true;
    }
}
?>

