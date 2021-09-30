<?php
require_once("models/Movie.php");
require_once("models/Message.php");

class MovieDAO implements MovieDAOInterface
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

    public function buildMovie($data)
    {
        $movie = new Movie();

        $movie->id_movies = $data["id_movies"];
        $movie->title = $data["title"];
        $movie->description = $data["description"];
        $movie->image = $data["image"];
        $movie->trailer = $data["trailer"];
        $movie->category = $data["category"];
        $movie->length = $data["length"];
        $movie->id_users = $data["id_users"];

        return $movie;
    }
    public function findAll()
    {
    }
    public function getLatestMovies()
    {
        $movies = [];
        $stmt = $this->conn->query("SELECT * FROM movies ORDER BY id_movies DESC");
        $stmt->execute();

        if($stmt->rowCount() > 0)
        {
            $moviesArray = $stmt->fetchAll();
            foreach($moviesArray as $movie)
            {
                $movies[] = $this->buildMovie($movie);
            }

        }

        return $movies;
    }
    public function getMoviesByCategory($category)
    {
        $movies = [];
        $stmt = $this->conn->prepare("SELECT * FROM movies WHERE category = :category ORDER BY id_movies DESC");
        $stmt->bindParam(":category", $category);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $moviesArray = $stmt->fetchAll();
            foreach ($moviesArray as $movie) {
                $movies[] = $this->buildMovie($movie);
            }
        }

        return $movies;
    }
    public function getMoviesByUserId($id_users)
    {
        $movies = [];
        $stmt = $this->conn->prepare("SELECT * FROM movies WHERE id_users = :id_users");
        $stmt->bindParam(":id_users", $id_users);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $moviesArray = $stmt->fetchAll();
            foreach ($moviesArray as $movie) {
                $movies[] = $this->buildMovie($movie);
            }
        }

        return $movies;
    }
    public function findById($id_movies)
    {
        $movie = [];
        
        $stmt = $this->conn->prepare("SELECT * FROM movies WHERE id_movies = :id_movies");
        $stmt->bindParam(":id_movies", $id_movies);
        $stmt->execute();

        if($stmt->rowCount() > 0)
        {
            $movieArray = $stmt->fetch();
            $movie = $this->buildMovie($movieArray);
            
            return $movie;
        }
        else
        {
            return false;
        }
    }
    public function findByTitle($title)
    {
    }
    public function createMovie(Movie $movie)
    {
        $stmt = $this->conn->prepare("INSERT INTO movies (title, description, image, trailer, category, length, id_users) VALUES (:title, :description, :image, :trailer, :category, :length, :id_users)");
        $stmt->bindParam(":title", $movie->title);
        $stmt->bindParam(":description", $movie->description);
        $stmt->bindParam(":image", $movie->image);
        $stmt->bindParam(":trailer", $movie->trailer);
        $stmt->bindParam(":category", $movie->category);
        $stmt->bindParam(":length", $movie->length);
        $stmt->bindParam(":id_users", $movie->id_users);

        $stmt->execute();

        $this->message->setMessage("Movie inserted successfully", "success", "index.php");
    }
    public function updateMovie(Movie $movie)
    {
    }
    public function destroyMovie($id_movies)
    {
    }
}
