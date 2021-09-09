<?php
require_once("./api.php");
//http://localhost/FOLDERS/FORM_PROJETS/form_projet_api/projet_api/index.php?demande=monsters

//index.php?demande=monsters
//index.php?demande=monsters&field=name_en&value=Aptonoth
// getMonstersByField('name_en', 'Aptonoth');

try {
    if(!empty($_GET['demande'])) {
        $url = explode("/", filter_var($_GET['demande'], FILTER_SANITIZE_URL));

        switch($url[0]) {
            case "monsters":
                if(empty($url[1])) {
                    getMonsters();
                }
                else {
                    getMonstersByField($url[1], $url[2]);
                }
            break;
            
            case "weapons":
                if(empty($url[1])) {
                    getWeapons();
                }
                else {
                    getWeaponsByField($url[1], $url[2]);
                }
            break;

            case "armors":
                if(empty($url[1])) {
                    getArmors();
                }
                else {
                    getArmorsByField($url[1], $url[2]);
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