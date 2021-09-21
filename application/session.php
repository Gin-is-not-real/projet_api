<?php
if(session_id() == '') {
    session_start();
}
$_SESSION['base-url'] = 'http://localhost/ACS_project/projet_api/';
$_SESSION['base-url'] = 'http://localhost/FOLDERS/FORM_PROJETS/form_projet_api/';
