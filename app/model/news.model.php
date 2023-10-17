<?php

class NewsModel {
    private $db;

    function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=db_diario;charset=utf8', 'root', '');
    }

    function getNews() {
        $query = $this->db->prepare('SELECT * FROM noticias');
        $query->execute();
        $newss = $query->fetchAll(PDO::FETCH_OBJ);

        return $newss;
    }

    function insertNews($title, $content, $date, $hour, $id_section) {
        $query = $this->db->prepare('INSERT INTO noticias(titulo, contenido, fecha, hora, id_seccion) VALUES(?,?,?,?,?)');
        $query->execute([$title, $content, $date, $hour, $id_section]);
        return $this->db->lastInsertId();
        
    }

    function updateNews($id, $title, $content, $date, $hour, $sectionID){
        $query = $this->db->prepare('UPDATE noticias SET titulo = ?, contenido = ?, fecha = ?, hora = ?, id_seccion = ? WHERE id = ?');
        $query->execute([$title, $content, $date, $hour, $sectionID, $id]);
        return $query;
    }
        


    function deleteNews($id) {
        $query = $this->db->prepare('DELETE FROM noticias WHERE id = ?');
        $query->execute([$id]);
    }


    function getNewsById($id) {
        $query = $this->db->prepare('SELECT * FROM noticias WHERE id = ?');
        $query->execute([$id]);    
        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function getNewsBySectionId($sectionID){
        $query = $this->db->prepare('SELECT * FROM noticias WHERE id_seccion = ?');
        $query->execute([$sectionID]);

        return $query->fetchAll(PDO::FETCH_OBJ);
    }

}
