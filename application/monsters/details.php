<?php
function display_stars($nb_stars, $elem)
{
	$i = 0;
	echo "<p><img src='../public/images/ui/element_" . $elem . ".svg' width='25px'> => ";
	if ($nb_stars == 0)
	{
		echo "None";
	}
	else
	{
		while ($i < (int)$nb_stars)
		{
			echo "<img src='../public/images/ui/weakness_star.svg' width='25px'>";
			$i++;
		}
	}
	echo "</p>";
}

if(session_id() == '') {
    session_start();
}
$route = $_SESSION['base-url'] . 'api/monsters/id/' . $_GET['id'];
$m_details = json_decode(file_get_contents($route));

ob_start();
?>

<h1><?= $m_details[0]->name_en ?></h1>

<div id="m_info_box">
	<div id="pctr">
		<img src="../public/images/monsters/<?= $m_details[0]->main_id ?>.png" width="300px">
	</div>
	<div id="infos">
		<h2>Global info</h2>
		<p>Species:<?= ' ' . $m_details[0]->ecology_en ?></p>
		<p>Trap:<?= ' ' . ($m_details[0]->pitfall_trap != '' ? "Yes" : "No")?></p>
		<p>
			Blight capacity:
			<?= ' ' . ($m_details[0]->fireblight != '' ? "<img src='../public/images/ui/element_fire.svg' width='25px'>" : '') ?>
			<?= ' ' . ($m_details[0]->waterblight != '' ? "<img src='../public/images/ui/element_water.svg' width='25px'>" : '') ?>
			<?= ' ' . ($m_details[0]->thunderblight != '' ? "<img src='../public/images/ui/element_thunder.svg' width='25px'>" : '') ?>
			<?= ' ' . ($m_details[0]->iceblight != '' ? "<img src='../public/images/ui/element_ice.svg' width='25px'>" : '') ?>
			<?= ' ' . ($m_details[0]->dragonblight != '' ? "<img src='../public/images/ui/element_dragon.svg' width='25px'>" : '') ?>
			<?= ' ' . ($m_details[0]->blastblight != '' ? "<img src='../public/images/ui/element_blast.svg' width='25px'>" : '') ?>
			<?= ' ' . ($m_details[0]->poisonblight != '' ? "<img src='../public/images/ui/element_poison.svg' width='25px'>" : '') ?>
			<?= ' ' . ($m_details[0]->sleepblight != '' ? "<img src='../public/images/ui/element_sleep.svg' width='25px'>" : '') ?>
			<?= ' ' . ($m_details[0]->paralysisblight != '' ? "<img src='../public/images/ui/element_paralysis.svg' width='25px'>" : '') ?>
			<?= ' ' . ($m_details[0]->stunblight != '' ? "<img src='../public/images/ui/element_stun.svg' width='25px'>" : '') ?>
		</p>
	</div>
	<div id="weakness">
		<h2>Weakness</h2>
		<?php
			foreach ($m_details as $fight_form)
			{
				echo "<div class='form'>";
				echo ($fight_form->form == 'normal' ? "<h3>" . ucfirst($fight_form->form) . " form</h3>" : "<h3>" . ucfirst($fight_form->form) . " form (" . $fight_form->alt_description . ")</h3>");
				display_stars($fight_form->fire_weak, "fire");
				display_stars($fight_form->water_weak, "water");
				display_stars($fight_form->thunder_weak, "thunder");
				display_stars($fight_form->ice_weak, "ice");
				display_stars($fight_form->dragon_weak, "dragon");
				display_stars($fight_form->poison_weak, "poison");
				display_stars($fight_form->sleep_weak, "sleep");
				display_stars($fight_form->paralysis_weak, "paralysis");
				display_stars($fight_form->blast_weak, "blast");
				display_stars($fight_form->stun_weak, "stun");
				echo "</div>";
			}
		?>
	</div>
</div>

<?php
$content = ob_get_clean();
require_once('../template.php');
?>