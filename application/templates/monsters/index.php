<?php

if(session_id() == '') {
    session_start();
}

ob_start();
// $route = "http://localhost/FOLDERS/FORM_PROJETS/form_projet_api/projet_api/api/monsters";
$route = $_SESSION['base-url'] . 'api/monsters';

if(isset($_POST["select-field"]) AND isset($_POST['inp-search'])) {
    $route .= '/' . $_POST['select-field'] . '/' . $_POST['inp-search'];
}

$monsters = json_decode(file_get_contents($route));

?>
<link rel="stylesheet" href="../../public/style/monsters.css" />
<article>
	<h1>Monsters</h1>
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
    <figure>
        <figcaption>
            <a href="details.php?id=<?= $elt->id ?>"><?= $elt->name_en ?></a>
        </figcaption>
        <img src="../../public/images/monsters/<?= $elt->id ?>.png" width="180px" height="180px" alt="<?= $elt->name_en ?>">
    </figure>
<?php
};
?>
</div>
</article>


<?php
$content = ob_get_clean();
require_once('../template.php');