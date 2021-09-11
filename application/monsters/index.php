<?php

ob_start();
$route = "http://localhost/ACS_project/projet_api/api/monsters/";

if(isset($_POST["select-field"]) AND isset($_POST['inp-search'])) {
    $route .= '/' . $_POST['select-field'] . '/' . $_POST['inp-search'];
}

$monsters = json_decode(file_get_contents($route));

?>
<link rel="stylesheet" href="../public/style/monsters.css" />
<article>
    <div id="filter">
        <form action="index.php" name="form-filter-monsters" method="post">
        <div id="fil_inputs">
            <div>
                <label for="select-field">Criteria: </label>
                <select name="select-field" id="select-field">
                    <option value="name_en" selected>Name</option>
                    <option value="ecology_en">Species</option>
                    <option value="size">Size</option>
                    <option value="pitfall_trap">Pitfall trap</option>
                    <option value="shock_trap">Shock trap</option>
                    <option value="vine_trap">Vine trap</option>
                </select>
            </div>
            <div class="adaptativ-input-container">
                <label for="inp-search">Value: </label>
                <input type="text" name="inp-search" required>
            </div>
        </div>

        <div id="fil_sender">
            <input type="submit" value="Search">
        </div>
        </form>
    </div>
    <div id="pctrs">
<?php
foreach($monsters as $elt) {
?>
    <figure style="border: 1px solid black; width: 200px; display: flex; flex-direction: column; align-items: center" >
        <figcaption style="background-color: #80808091; text-align: center; width: 100%">
            <?= $elt->name_en ?>
        </figcaption>
        <img src="../public/images/monsters/<?= $elt->id ?>.png" width="200px">
    </figure>

    <?php

    // foreach($elt as $key => $value) {
    //     echo $key . ': ' . $value . '<br>';
    // }
};
?>
</div>
</article>


<?php
$content = ob_get_clean();
require_once('../template.php');