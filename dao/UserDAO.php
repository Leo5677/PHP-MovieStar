<?php
require_once("models/User.php");
require_once("models/Message.php");

class UserDAO implements UserDAOInterface
{
    private $conn;
    private $url;
    private $message;

    public function __construct(PDO $conn, $url)
    {
        $this->conn = $conn;
        $this->url = $url;
        $this->message = new Message($url);
    }

    public function buildUser($data)
    {
        $user = new User();

        $user->id_users = $data["id_users"];
        $user->name = $data["name"];
        $user->lastname = $data["lastname"];
        $user->email = $data["email"];
        $user->password = $data["password"];
        $user->image = $data["image"];
        $user->bio = $data["bio"];
        $user->token = $data["token"];

        return $user;
    }
    public function createUser(User $user, $authUser = false)
    {
        $stmt = $this->conn->prepare("INSERT INTO users(name, lastname, email, password, token) VALUES(:name, :lastname, :email, :password, :token)");
        $stmt->bindParam(":name", $user->name);
        $stmt->bindParam(":lastname", $user->lastname);
        $stmt->bindParam(":email", $user->email);
        $stmt->bindParam(":password", $user->password);
        $stmt->bindParam(":token", $user->token);

        $stmt->execute();

        if($authUser)
        {
            $this->setTokenToSession($user->token);
        }
    }
    public function updateUser(User $user, $redirect = true)
    {
        $stmt = $this->conn->prepare("UPDATE users SET name = :name, lastname = :lastname, email = :email, image = :image, bio = :bio, token = :token WHERE id_users = :id_users");
        $stmt->bindParam(":id_users", $user->id_users);
        $stmt->bindParam(":name", $user->name);
        $stmt->bindParam(":lastname", $user->lastname);
        $stmt->bindParam(":email", $user->email);
        $stmt->bindParam(":image", $user->image);
        $stmt->bindParam(":bio", $user->bio);
        $stmt->bindParam(":token", $user->token);

        $stmt->execute();    

        if($redirect)
        {
            //Redirect profile user
            $this->message->setMessage("Data success update!", "success", "edit_profile.php");
        }
    }
    public function verifyToken($protected = false)
    {
        if(!empty($_SESSION["token"]))
        {   
            //Find session token
            $token = $_SESSION["token"];
            $user = $this->findByToken($token);

            if($user)
            {
                return $user;
            }
            else if($protected)
            {
                //Redirects unauthenticated user
                $this->message->setMessage("Do authentication to access this page.", "error", "index.php");
            }
        } 
        else if ($protected) 
        {
            //Redirects unauthenticated user
            $this->message->setMessage("Do authentication to access this page.", "error", "index.php");
        }
    }
    public function setTokenToSession($token, $redirect = true)
    {
        //Save token in session
        $_SESSION["token"] = $token;

        if($redirect){
            //Redirect to profile user
            $this->message->setMessage("Welcome!", "success", "edit_profile.php");
        }
    }
    public function authenticateUser($email, $password)
    {
        $user = $this->findByEmail($email);

        if($user)
        {
            //Verify passwords
            if(password_verify($password, $user->password))
            {
                //Generate Token and insert in session
                $token = $user->generateToken();
                $this->setTokenToSession($token, false);

                //Update User
                $user->token = $token;
                $this->updateUser($user, false);
                return true;
            }
            else
            {
                return false;
            }
        }
        else
        {
            return false;
        }
    }
    public function findByEmail($email)
    {
        if ($email != "") {
            $stmt = $this->conn->prepare("SELECT * FROM users WHERE email = :email");
            $stmt->bindParam(":email", $email);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $data = $stmt->fetch();
                $user = $this->buildUser($data);

                return $user;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    public function findById($id_users)
    {
    }
    public function findByToken($token)
    {
        if ($token != "") {
            $stmt = $this->conn->prepare("SELECT * FROM users WHERE token = :token");
            $stmt->bindParam(":token", $token);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $data = $stmt->fetch();
                $user = $this->buildUser($data);

                return $user;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    public function destroyToken()
    {
        //Remove Token 
        $_SESSION["token"] = "";

        //Redirect and show message
        $this->message->setMessage("Logout success.", "success", "index.php");
    }

    public function changePassword(User $user)
    {
        $stmt = $this->conn->prepare("UPDATE users SET password = :password WHERE id_users = :id_users");
        $stmt->bindParam(":password", $user->password);
        $stmt->bindParam(":id_users", $user->id_users);
        $stmt->execute();

        $this->message->setMessage("Password update performed successfully!", "success", "edit_profile.php");
    }
}