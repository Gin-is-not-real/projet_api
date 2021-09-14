<?php
require 'home.php';
require 'session.php';


try {
    if(isset($_GET['action'])) {
        $action = $_GET['action'];
    
        switch($action) {
            case 'posts':
                $route = $_SESSION['base-url'] . '/posts';
                
                break;

            case 'post':
                $route = $_SESSION['base-url'] . '/post/' . $_GET['id'] ;
                break;
        }
    }
    else {
        header('Location: home.php');
    }
    header('Location: home.php');

}
catch(Exception $e) {
    $erreur =[
        "message" => 'ERROR: ' . $e->getMessage(),
        "code" => $e->getCode()
    ];
    print_r($erreur);
}