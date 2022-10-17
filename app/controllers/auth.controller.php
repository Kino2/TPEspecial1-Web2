<?php
require_once './app/models/user.model.php';
require_once './app/views/auth.view.php';

class AuthController {
    private $view;
    private $model;

    public function __construct() {
        session_start();
        $this->model = new UserModel();
        $this->view = new AuthView();
    }

    public function showFormLogin() {
        $this->view->showFormLogin();
    }

    public function validateUser() {
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Busco el usuario por email.
        $user = $this->model->getUserByEmail($email);

        // Verifico que el usuario existe y que las contraseñas son iguales.
        if ($user && password_verify($password, $user->password)) {

            // Inicio una sesion para el usuario
            session_start();
            $_SESSION['USER_ID'] = $user->id;
            $_SESSION['USER_EMAIL'] = $user->email;
            $_SESSION['IS_LOGGED'] = true;

            header("Location: " . BASE_URL);
        } else {
            // Si los datos son incorrectos muestro el form con un error.
           $this->view->showFormLogin("El usuario o la contraseña no existe.");
        } 
    }
    public function logout() {
        session_start();
        session_destroy();
        header("Location: " . BASE_URL);
    }
}