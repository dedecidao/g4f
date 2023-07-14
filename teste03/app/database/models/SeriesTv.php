<?php

namespace app\database\models;

class SeriesTv
{
        // Propriedades da model
        // public $id;
        // public $titulo;
        // public $canal;
        // public $genero;
    
        // Métodos da model
    
        // Construtor da model
        // public function __construct($id, $titulo, $canal, $genero)
        // {
        //     $this->id = $id;
        //     $this->titulo = $titulo;
        //     $this->canal = $canal;
        //     $this->genero = $genero;
        // }
    
        // Métodos de acesso (getters e setters)
        public function getAll()
        {
            global $pdo;
            $stmt = $pdo->prepare('select * from g4f.series_tv_intervalos it
            join series_tv se on it.id_serie_tv = se.id');
            $stmt->execute();
            $series = $stmt->fetchAll();
            return $series;
        }
        
        public function get($id)
        {
            global $pdo;
            $stmt = $pdo->prepare('SELECT se.*, it.horario FROM series_tv se
            join series_tv_intervalos it on se.id = it.id_serie_tv
            where se.id = :id');
            $stmt->bindValue(':id', $id);
            $stmt->execute();
            $serie = $stmt->fetchAll();
            return $serie;
        }
    

}
