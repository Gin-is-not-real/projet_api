<?php
require_once("./api.php");

//tests

try {
    if(!empty($_GET['demande'])) {
        $url = explode("/", filter_var($_GET['demande'], FILTER_SANITIZE_URL));
        var_dump($url);
        //test pour recup une variable encodée en json vers js
        // $toJs = ['test1' => 'yeah!'];
        // echo '<script type="text/javascript">console.log(' . json_encode($toJs) . ');</script>';

        if(!empty($url[0])) {
            switch($url[0]) {
                case "posts":
                    if(empty($url[1])) {
                        getPosts();
                    }
                    else if(!empty($url[1])) {
                        getPost($url[1]);
                    }
                break;
    
                case "post":
                    if(!empty($url[1])) {
                        getPost($url[1]);
                    }
                break;
            }
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