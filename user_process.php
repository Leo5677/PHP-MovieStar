<?php
require_once("globals.php");
require_once("db/db.php");
require_once("models/User.php");
require_once("models/Message.php");
require_once("dao/UserDAO.php");

$message = new Message($BASE_URL);
$userDao = new UserDAO($conn, $BASE_URL);
$type = filter_input(INPUT_POST, "type");

// Update user
if($type === "update")
{
    // Capture data user
    $userData = $userDao->verifyToken();

    $name = filter_input(INPUT_POST, "name");
    $lastname = filter_input(INPUT_POST, "lastname");
    $email = filter_input(INPUT_POST, "email");
    $bio = filter_input(INPUT_POST, "bio");

    // Create new object user
    $user = new User();

    //Fill data user
    $userData->name = $name;
    $userData->lastname = $lastname;
    $userData->email = $email;
    $userData->bio = $bio;

    //Upload IMG
    if(isset($_FILES["image"]) and !empty($_FILES["image"]["tmp_name"]))
    {
        $image = $_FILES["image"];
        $imageType = ["image/jpeg", "image/jpg", "image/png"];
        $jpgArray = ["image/jpeg", "image/jpg"];

        //Check type img
        if(in_array($image, $jpgArray))
        {
            $imageFile = imagecreatefromjpeg($image["tmp_name"]);
        }
        else
        {   
            $imageFile = imagecreatefrompng($image["tmp_name"]);
        }

        $imageName = $user->imageGenerateName();
        imagejpeg($imageFile, "./img/users/" . $imageName, 100);
        $userData->image = $imageName;
    }
    else
    {
        $message->setMessage("Invalid type of image. (PNG or JPG)", "error", "back");
    }

    $userDao->updateUser($userData);

}
else if($type === "changepassword")
{
    $userData = $userDao->verifyToken();
    $id_users = $userData->id_users;
    $password = filter_input(INPUT_POST, "password");
    $confirmpassword = filter_input(INPUT_POST, "confirmpassword");

    if($password == $confirmpassword)
    {
        $user = new User();

        $finalPassword = $user->generatePassword($password);
        $user->password = $finalPassword;
        $user->id_users = $id_users;

        $userDao->changePassword($user);
    }
    else
    {
        $message->setMessage("The passwords arent equals.", "error", "back");
    }
}
else
{
    $message->setMessage("Invalid info.", "error", "index.php");
}

