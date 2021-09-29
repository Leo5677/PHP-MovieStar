<?php
require_once("globals.php");
require_once("db/db.php");
require_once("models/Movie.php");
require_once("dao/MovieDAO.php");
require_once("dao/UserDAO.php");
require_once("models/Message.php");

$message = new Message($BASE_URL);
$userDao = new UserDAO($conn, $BASE_URL);
$movieDao = new MovieDAO($conn, $BASE_URL);
$type = filter_input(INPUT_POST, "type");
$userData = $userDao->verifyToken();

if($type === "create")
{
    $title = filter_input(INPUT_POST, "title");
    $description = filter_input(INPUT_POST, "description");
    $trailer = filter_input(INPUT_POST, "trailer");
    $category = filter_input(INPUT_POST, "category");
    $length = filter_input(INPUT_POST, "length");

    $movie = new Movie();

    if(!empty($title) and !empty($description) and !empty($category))
    {
        $movie->title = $title;
        $movie->description = $description;
        $movie->trailer = $trailer;
        $movie->category = $category;
        $movie->length = $length;
        $movie->id_users = $userData->id_users;

        if(isset($_FILES["image"]) and !empty($_FILES["image"]["tmp_name"]))
        {
            $image = $_FILES["image"];
            $imageType = ["image/jpeg", "image/jpg", "image/png"];
            $jpgArray = ["image/jpeg", "image/jpg"];

            if(in_array($image, $jpgArray))
            {
                $imageFile = imagecreatefromjpeg($image["tmp_name"]);
            }
            else
            {   
                $imageFile = imagecreatefrompng($image["tmp_name"]);
            }

            $imageName = $movie->imageGenerateName();
            imagejpeg($imageFile, "./img/movies/" . $imageName, 100);
            $movie->image = $imageName;
        }
        else
        {
            $message->setMessage("Invalid type of image. (PNG or JPG)", "error", "back");
        }

        $movieDao->createMovie($movie);
    }
    else
    {
        $message->setMessage("Mandatory: Title, description and category.", "error", "back");
    }

}
else
{
    $message->setMessage("Invalid Info.", "error", "index.php");
}