<?php
if(session_id() == '') {
	session_start();
}
$_SESSION['base-url'] = 'http://localhost/FOLDERS/FORM_PROJETS/form_projet_api/projet_api/api_wp';