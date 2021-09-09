<?php
require_once("./api.php");
//http://localhost/FOLDERS/FORM_PROJETS/form_projet_api/projet_api/index.php?demande=monsters

//index.php?demande=monsters


getMonstersByField('name_en', 'Aptonoth');

try {
    if(!empty($_GET['demande'])) {
        $url = explode("/", filter_var($_GET['demande'], FILTER_SANITIZE_URL));

        switch($url[0]) {
            case "monsters":
                if(empty($url[1])) {
                    //getMonters();
                }
                else {
                    //getMonstersBy..($url[1]);

                }
            break;
            
            case "weapons":
                if(!empty($url[1])) {
                    //getWeapons()
                }
                else {
                    //getWeaponsBy..()
                }
            break;

            case "armors":
                if(!empty($url[1])) {
                    //getArmors()
                }
                else {
                    //getArmorsBy..()
                }
        }
        die(var_dump($url[0]));

        // switch($url[0]) {

        // }
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