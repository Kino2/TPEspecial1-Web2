<?php
class GenresView{
    private $smarty;

    public function __construct(){
        $this->smarty = new Smarty ();
    }
    function showNavBar($genres){
    $this->smarty->assign("genres", $genres);
    $this->smarty->display('header.tpl');
    }
    function showAdmin($genres){
        $this->smarty->assign("genres", $genres);
        $this->smarty->display("adminGenres.tpl");
    }
    function showEditForm($genres){
        $this->smarty->assign("genres", $genres);
        $this->smarty->display('editGenre.tpl');
    }
}