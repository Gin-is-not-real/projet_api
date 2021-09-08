<?php
if(isset($_GET['id'])) {
    echo $_GET['id'];
}
// function getMonster($url, $id) {
//     $response = file_get_contents($url . '/' . $id);
//     var_dump(json_decode($response));
// }