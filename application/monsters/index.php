<?php
$monsters = json_decode(file_get_contents("http://localhost/FOLDERS/FORM_PROJETS/form_projet_api/projet_api/api/monsters"));
ob_start();
?>

<article>
    <div>
        <form action="" name="form-filter-monsters" >
        <div style="display: flex">
            <div>
                <label for="select-field">field: </label>
                <select name="select-field" id="select-field">
                    <option value="name_en" selected>nom</option>
                    <option value="ecology_en">ecologie</option>
                    <option value="size">taille</option>
                    <option value="pitfall_trap">pitfall trap</option>
                    <option value="shock_trap">shock trap</option>
                    <option value="vine_trap">vine trap</option>
                </select>
            </div>
            <div class="adaptativ-input-container">
                <label for="inp-search">valeur: </label>
                <input type="text">
            </div>
        </div>

        <div>
            <input type="submit">
        </div>
        </form>
    </div>
<?php
foreach($monsters as $elt) {
?>
    <figure style="border: 1px solid black; width: 150px; display: flex; flex-direction: column; align-items: center" >
        <figcaption style="background-color: #80808091; text-align: center; width: 100%">
            <?= $elt->name_en ?>
        </figcaption>
        <img src="../public/images/monsters/<?= $elt->id ?>.png" width="100px">
    </figure>

    <?php

    foreach($elt as $key => $value) {
        // echo $key . ': ' .intval($key) . '<br>';
        echo $key . ': ' . $value . '<br>';
    }
};

?>
</article>


<?php
$content = ob_get_clean();
require_once('../template.php');