<?php
require_once './app/models/genres.model.php';
require_once './app/views/genres.view.php';
require_once './helpers/authHelper.php';

class GenresController{
    private $model;
    private $view;
    private $helper;
    
    public function __construct(){
        $this->model = new GenresModel();
        $this->view = new GenresView();
        $this->helper = new AuthHelper();
    }
    public function showNavBar(){
        $genres = $this->model->getGenres();
        $this->view->showNavBar($genres);
    }
    public function adminGenres(){
        $this->helper->checkLoggedIn();
        $genres = $this->model->getGenres();
        $this->view->showAdmin($genres);
    }
    public function addGenre(){
        $this->helper->checkLoggedIn();
        $genre = $_POST['genre'];
        $this->model->insertGenre($genre);
        header("Location: " . BASE_URL . "admin");
    }
    public function genreEditForm($id){
        $this->helper->checkLoggedIn();
        $genres = $this->model->getGenre($id);
        $this->view->showEditForm($genres);
    }
    public function editGenre($id){
        $this->helper->checkLoggedIn();
        $genre = $_POST['genre'];
        $this->model->editGenre($genre, $id);
        header("Location: " . BASE_URL . "admin");
    }
    public function deleteGenre($id){
        $this->helper->checkLoggedIn();
        $this->model->deleteGenre($id);
        header("Location: " . BASE_URL . "admin");
    }
}
