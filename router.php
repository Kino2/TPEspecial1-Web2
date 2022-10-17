<?php
require_once './app/controllers/auth.controller.php';
require_once './app/controllers/films.controller.php';
require_once './app/controllers/genres.controller.php';
define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');
$action = 'home';
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

$params = explode('/', $action);

$filmsController = new FilmsController();
$authController = new AuthController();
$genresController = new GenresController();
$genresController->showNavBar();

switch ($params[0]) {
    case 'home':
        $filmsController->showFilms();
        break;
    case 'details':
        $filmsController->showDetails($params[1]);
        break;
    case 'genres':
        $filmsController->filmsbyGenre($params[1]);
        break;
    case 'login':
        $authController->showFormLogin();
        break;
    case 'logout':
        $authController->logout();
        break;
    case 'validate':
        $authController->validateUser();
        break;
    case 'admin':
        $genresController->adminGenres();
        break;
    case 'addFilmForm':
        $filmsController->showFormAdd();
        break;
    case 'addFilm':
        $filmsController->addFilm();
        break;
    case 'editFilmForm':
        $filmsController->showFormEdit($params[1]);
        break;
    case 'editFilm':
        $filmsController->editFilm($params[1]);
        break;
    case 'deleteFilm':
        $filmsController->deleteFilm($params[1]);
        break;
    case 'addGenre':
        $genresController->addGenre();
        break;
    case 'deleteGenre':
        $genresController->deleteGenre($params[1]);
        break;
    case 'editGenreForm':
        $genresController->genreEditForm($params[1]);
        break;
    case 'editGenre':
        $genresController->editGenre($params[1]);
        break;
    default:
        echo ('404 Page not found');
        break;
}
