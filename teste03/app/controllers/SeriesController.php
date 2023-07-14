<?php 
namespace app\controllers;

use app\database\models\SeriesTv;


class SeriesController {
    public function index()
    {
        global $pdo;
        $model = new SeriesTv();
        
        $series = $model->getAll();

        //return json 
        header('Content-Type: application/json');
        echo json_encode($series);
        


    }
    public function get()
    {
            $dados = $_POST;
            $idSeries = $dados['buscaSerie'];

            $model = new SeriesTv();
            $serie = $model->get($idSeries);
            $resposta = array('mensagem' => 'Requisição POST recebida com sucesso!', 'dados' => $serie);
            echo json_encode($resposta);

    }
}

