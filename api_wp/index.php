<?php
require_once("./api.php");
//test
$_GET['demande'] = 'posts';
try {
    if(!empty($_GET['demande'])) {
        $url = explode("/", filter_var($_GET['demande'], FILTER_SANITIZE_URL));
        var_dump($url);

        switch($url[0]) {
            case "posts":
                if(empty($url[1])) {
                    getPosts();
                }
                else {
                    // getMonstersByField($url[1], $url[2]);
                }
            break;
        }
    }
    else {
        throw new Exception ("Aucune demande passée dans l'url");
    }
}
catch(Exception $e) {
    $erreur =[
        "message" => 'ERROR: ' . $e->getMessage(),
        "code" => $e->getCode()
    ];
    print_r($erreur);
}