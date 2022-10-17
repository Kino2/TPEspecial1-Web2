<?php
class GenresModel{
    private $db;

    public function __construct(){
        $this->db = new PDO ('mysql:host=localhost;' . 'dbname=películas;charset=utf8', 'root', '');
    }
    function getGenres(){
        $query = $this->db->prepare("SELECT * FROM generos");
        $query->execute();
        $generos = $query->fetchAll(PDO::FETCH_OBJ);
        return $generos;
    }
    function insertGenre($genre){
        $query = $this->db->prepare ("INSERT INTO generos (genero)VALUES(?)");
        $query->execute([$genre]);
    }
    function editGenre($genre,$id){
        $query = $this->db->prepare("UPDATE generos SET genero = '$genre' WHERE id_genero ='$id'");
        $query->execute();
    }
    function deleteGenre($id){
        $query = $this->db->prepare('DELETE FROM generos WHERE id_genero = ?');
        $query->execute([$id]);
    }
    function getGenre($id){
        $query = $this->db->prepare("SELECT* FROM generos WHERE id_genero = ?");
        $query->execute([$id]);
        $genre = $query->fetch(PDO::FETCH_OBJ);
        return $genre;
    }
}