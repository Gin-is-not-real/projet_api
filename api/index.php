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
                if($url[1] == 'weapon_type') {
                    // url[2] -> type
                    if(empty($url[3])) {
                        getWeaponsByCategory($url[2]);
                    }
                    else if($url[3] == 'order_by') {
                        getWeaponsByCategory($url[2], $url[4]);
                    }
                    else if($url[3] == 'filter') {
                        if(empty($url[6])) {
                            getCategoryWeaponsByField($url[2], $url[4], $url[5]);
                        }
                        else {
                            getCategoryWeaponsByField($url[2], $url[4], $url[5], $url[7]);
                        }
                    }

                }

				else if ($url[1] == 'id') {
					getWeaponsDetails($url[2]);
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