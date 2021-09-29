<?php

class Movie
{
    public $id_movies;
    public $title;
    public $description;
    public $image;
    public $trailer;
    public $category;
    public $length;
    public $id_users;

    public function imageGenerateName()
    {
        return bin2hex(random_bytes(60) . "jpg");
    }
}

interface MovieDAOInterface
{
    public function buildMovie($data);
    public function findAll();
    public function getLatestMovies();
    public function getMoviesByCategory($category);
    public function getMoviesByUserId($id_movies);
    public function findById($id_movies);
    public function findByTitle($title);
    public function createMovie(Movie $movie);
    public function updateMovie(Movie $movie);
    public function destroyMovie($id_movies);
}
