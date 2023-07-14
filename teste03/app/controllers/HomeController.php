<?php 
namespace app\controllers;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class HomeController {
    public function index()
    {
        global $pdo;
        $stmt = $pdo->prepare('SELECT * FROM series_tv');
        $stmt->execute();
        $series = $stmt->fetchAll();

        //dd($series);
        // $viewPath = __DIR__ . '/../views/home.php';
        // include($viewPath);

        //twig
        $loader = new FilesystemLoader(__DIR__ . '/../views');
        $twig = new Environment($loader);
        echo $twig->render('home.twig', ['series' => $series]);


    }
}

