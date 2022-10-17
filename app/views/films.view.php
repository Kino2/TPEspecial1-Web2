<?php
require_once './libs/smarty-4.2.1/libs/Smarty.class.php';

class FilmsView{
    private $smarty;
    public function __construct(){
        $this->smarty = new Smarty();
    }

    function showFilms($films){
        $this->smarty->assign("count", count($films));
        $this->smarty->assign("films", $films);
        $this->smarty->display('showFilms.tpl');
    }
    function showDetails($films){
        $this->smarty->assign("films", $films);
        $this->smarty->display('showDetails.tpl'); 
    }
    function showFormAdd($genres, $error = null){
        $this->smarty->assign("genres", $genres);
        $this->smarty->assign("error", $error);
        $this->smarty->display('addFilm.tpl');
    }
    function showFormEdit($genres, $film, $error = null){
        $this->smarty->assign("genres", $genres);
        $this->smarty->assign("film", $film);
        $this->smarty->assign("error", $error);
        $this->smarty->display('editFilm.tpl');
    }
}