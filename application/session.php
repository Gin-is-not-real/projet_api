<?php
if(session_id() == '') {
    session_start();
}
$_SESSION['base-url'] = 'http://localhost/ACS_project/projet_api/';