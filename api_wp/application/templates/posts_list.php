<?php
require '../session.php';
ob_start();
?>

<header>
    <h1>Posts List</h1>
</header>

<?php
    $route = $_GET['route'];
    echo '<div>' . 'ROUTE: ' . $route . '</div><hr>';

    // $result = file_get_contents($route);
    // var_dump($result);//affiche le contenu sous forme de string
    echo '<hr>';

    $result = json_decode(file_get_contents($route));
    // var_dump($result);//affiche le contenu de tout les posts
    echo '<hr>';

    foreach($result as $key => $value) {
        var_dump($key, '<br>');
        // echo 'SLUG ' . $value->slug . '<br>'; 
        echo 'TITLE ' . $value->title->rendered . '<br>';
        echo 'AUTHOR ' . $value->author . '<br>';
        

        foreach($value as $k => $v) {
            var_dump($k, '<br>');
        }
        echo '<hr>';
        // echo '<div>' . $key . ' - ' . $value . '</div>';
    }

;?>

<ul>
    <?php

    ?>
</ul>



<?php
$content = ob_get_clean();
require '../home.php';