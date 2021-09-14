<?php
require 'home.php';
require 'session.php';

try {
    if(isset($_GET['action'])) {
        $action = $_GET['action'];
        $route = $_SESSION['base-url'] . '/api';
    
        switch($action) {
            case 'posts':
                $route .= '/posts';
                header('Location: templates/posts_list.php?route=' . $route);
                break;

            case 'post':
                $route .= '/post/' . $_GET['id'] ;
                header('Location: templates/post.php?route=' . $route);
                break;
        }
        // var_dump($route, '<br>');
        // var_dump(json_decode(file_get_contents($route)));
    }
    else {
        header('Location: home.php');
    }

}
catch(Exception $e) {
    $erreur =[
        "message" => 'ERROR: ' . $e->getMessage(),
        "code" => $e->getCode()
    ];
    print_r($erreur);
}