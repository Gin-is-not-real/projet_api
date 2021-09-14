<?php
require '../session.php';
ob_start();
?>

<header>
    <h1>Post</h1>
</header>

<?php
$route = $_GET['route'];
    echo '<div>' . 'ROUTE: ' . $route . '</div><hr>';

    // $result = file_get_contents($route);
    // var_dump($result);//affiche le contenu sous forme de string
    // echo '<hr>';

    $result = json_decode(file_get_contents($route));
    // var_dump($result, '<br>');//affiche le contenu
    // var_dump($result->author);
    // echo '<hr>';

    echo var_dump($result->link) . '<br>';

    foreach($result as $key => $value) {
        if(gettype($value) != 'object' AND gettype($value)!= 'array') {
            echo strtoupper($key) . ': ' . $value . '<br>';
        }
        else {
            // echo '***TYPE: ' . gettype($value);
            foreach($value as $k => $val) {
                if(gettype($val) != 'object' AND gettype($val)!= 'array') {
                    echo '*' . strtoupper($k) . ' (' . gettype($val) . ') : ' . $val . '<br>';
                }
                else {
                    foreach($val as $kk => $v) {
                        if(gettype($v) != 'object' AND gettype($v)!= 'array') {
                            echo '**' . strtoupper($kk) . ': ' . $v . '<br>';
                        }
                        else {
                            foreach($v as $kkk => $vvv) {
                                if(gettype($vvv) != 'object' AND gettype($vvv)!= 'array') {
                                    echo '***' . strtoupper($kkk) . ': ' . $vvv . '<br>';
                                }
                            }
                        }
                    }
                }
            }
        }
    }
$content = ob_get_clean();
require '../home.php';