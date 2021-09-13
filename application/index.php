<?php
if(session_id() == '') {
    session_start();
}

$_SESSION['base-url'] = 'http://localhost/FOLDERS/FORM_PROJETS/form_projet_api/projet_api/';

try {
    if(!isset($_GET['action'])) {
        header('Location: home.php');
    }
    else {
        $action = $_GET['action'];

        switch($action) {
            case 'monsters':
                header('Location: monsters/index.php');
                break;
            case 'weapons':
                header('Location: weapons/index.php');
                break;
            case 'armors':
                header('Location: armors/index.php');
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