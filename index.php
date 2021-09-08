<?php
$url = 'https://mhw-db.com/monsters';
$response = file_get_contents('https://mhw-db.com/monsters');
$json = json_decode($response);
$id = $json[0]->id;

// utiliser les routes existantes
// $response2 = file_get_contents('https://mhw-db.com/monsters' . '/' . $id);
// $json2 = json_decode($response2);
// var_dump($json2->name);

?>
    <form action="getMonster.php?id=<?= $id; ?>" method="get">
        <input type="submit">

    </form>
<?php

// foreach($json as $tab) {
//     foreach($tab as $key => $value) {
//         var_dump($key, ' : ', $value, '<br>');
//     }
//     echo '</br>';
// }


// writeln



