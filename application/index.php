<?php
$GLOBALS['base-url'] = 'test';

if(session_id() == '') {
    session_start();
}

$_SESSION['base-url'] = 'http://localhost/ACS_project/projet_api/';

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
			case 'weapons-type':
				header('Location: weapons/display_by_cat.php');
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