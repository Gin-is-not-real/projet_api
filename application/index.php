<?php
// if(session_id() == '') {
//     session_start();
// }
// $_SESSION['base-url'] = 'http://localhost/FOLDERS/FORM_PROJETS/form_projet_api/projet_api/';
require 'session.php';

try {
    if(!isset($_GET['action'])) {
        header('Location: templates/home/home.php');
    }
    else {
        $action = $_GET['action'];

        switch($action) {
            case 'monsters':
                header('Location: templates/monsters/index.php');
                break;

            case 'weapons':
                header('Location: templates/weapons/index.php');
                break;
            case 'weapons-type':
                header('Location: templates/weapons/display_by_cat.php?weapon_type=' . $_GET['weapon_type']);
                break;
            case 'weapons-filtered':
                header('Location: templates/weapons/display_by_cat.php?weapon_type=' . $_GET['weapon_type'] . '&field=' . $_POST['select-field'] . '&value=' . $_POST['inp-search']);
                break;
            case 'weapons-ordered':
                if(isset($_GET['field']) AND isset($_GET['value'])) {
                    header('Location: templates/weapons/display_by_cat.php?weapon_type=' . $_GET['weapon_type'] . '&order_by=' . $_POST['order_by'] . '&field=' . $_GET['field'] . '&value=' . $_GET['value']);
                }
                else {
                    header('Location: templates/weapons/display_by_cat.php?weapon_type=' . $_GET['weapon_type'] . '&order_by=' . $_POST['order_by']);
                }
                break;
            case 'weapon':
                header('Location: templates/weapons/details.php?id=' . $_GET['id']);
                break;

            case 'armors':
                header('Location: templates/armors/index.php');
                break;
            case 'armors-rank':
                header('Location: templates/armors/display_by_rank.php?rank=' . $_GET['rank']);
                break;
            case 'armor':
                header('Location: templates/armors/details.php?id=' . $_GET['id']);
        }
    }
}
catch (Exception $e) {
    $erreur =[
        "message" => 'ERROR: ' . $e->getMessage(),
        "code" => $e->getCode()
    ];
    print_r($erreur);
}