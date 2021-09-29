<?php

require_once("db/db.php");
require_once("globals.php");
require_once("models/User.php");
require_once("dao/UserDAO.php");
require_once("models/Message.php");

$message = new Message($BASE_URL);
$userDAO = new UserDAO($conn, $BASE_URL);

// Rescue Form Type
$type = filter_input(INPUT_POST, "type");

// Verify Form Type
if($type === "register")
{
    $name = filter_input(INPUT_POST, "name");
    $lastname = filter_input(INPUT_POST, "lastname");
    $email = filter_input(INPUT_POST, "email");
    $password = filter_input(INPUT_POST, "password");
    $confirmpassword = filter_input(INPUT_POST, "confirmpassword");

    // Verify minimum data
    if($name and $lastname and $email and $password)
    {
        if($password === $confirmpassword)
        {
            //Verify cadaster e-mail
            if($userDAO->findByEmail($email) === false)
            {
                $user = new User();

                //Creation - Token and Password
                $userToken = $user->generateToken();
                $finalPassword = $user->generatePassword($password);

                $user->name = $name;
                $user->lastname = $lastname;
                $user->email = $email;
                $user->password = $finalPassword;
                $user->token = $userToken;

                $auth = true;

                $userDAO->createUser($user, $auth);
            }
            else
            {
                $message->setMessage("User already registered.", "error", "back");
            }
        }
        else
        {
            $message->setMessage("The passwords aren't equals.", "error", "back");
        }
    }
    else
    {
        // Send error message of missing data
        $message->setMessage("Please, fill all fields.", "error", "back");
    }
}
else if($type === "login")
{
    $email = filter_input(INPUT_POST, "email");
    $password = filter_input(INPUT_POST, "password");

    //Try authenticated user
    if ($userDAO->authenticateUser($email, $password)) {
        $message->setMessage("Welcome!", "success", "edit_profile.php");
    } else {
        $message->setMessage("User or password incorret.", "error", "back");
    }
}
else
{
    $message->setMessage("Invalid info.", "error", "index.php");
}