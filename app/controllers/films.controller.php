<?php
require_once './app/models/films.model.php';
require_once './app/models/genres.model.php';
require_once './app/views/films.view.php';
require_once './helpers/authHelper.php';

class FilmsController{
    private $model;
    private $genreModel;
    private $view;
    private $helper;

    public function __construct(){
        $this->model = new FilmsModel();
        $this->genreModel = new GenresModel();
        $this->view = new FilmsView();
        $this->helper = new AuthHelper();
    }
    public function filmsbyGenre($id){
        $films = $this->model->getFilmsByGenre($id);
        $this->view->showFilms($films);
    }
    public function showFilms(){
        $films = $this->model->getFilms();
        $this->view->showFilms($films);
    }
    public function showDetails($id){
        $films = $this->model->getFilm($id);
        $this->view->showDetails($films);
    }
    public function showFormAdd(){
        $this->helper->checkLoggedIn();
        $genres = $this->genreModel->getGenres();
        $this->view->showFormAdd($genres);
    }
    public function showFormEdit($id){
        $this->helper->checkLoggedIn();
        $film = $this->model->getFilm($id);
        $genres = $this->genreModel->getGenres();
        $this->view->showFormEdit($genres, $film);
    }
    public function addFilm() {
        $this->helper->checkLoggedIn();
        $genres = $this->genreModel->getGenres();
        $name = $_POST['name'];
        $description = $_POST['description'];
        $date = $_POST['date'];
        $duration = $_POST['duration'];
        $director = $_POST['director'];
        $genre = $_POST['genres'];
        if ($_FILES['image']['type'] == "image/jpg" || $_FILES['image']['type'] == "image/jpeg" || $_FILES['image']['type'] == "image/png") {
            $this->model->insertFilm($name, $description, $date, $duration, $director, $genre, $_FILES['image']['tmp_name']);
            header("Location: " . BASE_URL . "home");
        } else if (empty($_FILES['image']['type'])) {
            $error = "La imagen es obligatoria";
            $this->view->showFormAdd($genres, $error);
        } else {
            $error = "El formato no es compatible";
            $this->view->showFormAdd($genres, $error);
        }
    }
    public function editFilm($id){
        $this->helper->checkLoggedIn();
        $genres = $this->genreModel->getGenres();
        $film = $this->model->getFilm($id);
        $name = $_POST['name'];
        $description = $_POST['description'];
        $date = $_POST['date'];
        $duration = $_POST['duration'];
        $director = $_POST['director'];
        $genre = $_POST['genres'];
        if ($_FILES['image']['type'] == "image/jpg" || $_FILES['image']['type'] == "image/jpeg" || $_FILES['image']['type'] == "image/png") {
            $this->model->editFilm($name, $description, $date, $duration, $director, $genre, $id, $_FILES['image']['tmp_name']);
            header("Location: " . BASE_URL . "home");
        } else if(empty($_FILES['image']['type'])){
            $this->model->editFilm($name, $description, $date, $duration, $director, $genre, $id);
            header("Location: " . BASE_URL . "home");
        } else {
            $error = "El formato no es compatible";
            $this->view->showFormEdit($genres, $film, $error);
        }
    }
    public function deleteFilm($id){
        $this->helper->checkLoggedIn();
        $this->model->deleteFilm($id);
        header("Location: " . BASE_URL);
    }
}
