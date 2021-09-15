<?php
if(session_id() == '') {
    session_start();
}
$route_ex = $_SESSION['base-url'] . 'api/monsters/id/' . $_GET['id'] . "/rewards";
$m_rewards = json_decode(file_get_contents($route_ex));
?>

<div id="m_reward_box">
	<table>
		<tr id="table_label">
			<td>Rank</td>
			<td>Case</td>
			<td>Item name</td>
			<td>Stack</td>
			<td>Percentage</td>
		</tr>
		<?php foreach($m_rewards as $item) { ?>
			<tr class="table_data">
				<td><?= $item->rank ?></td>
				<td><?= $item->condition_en ?></td>
				<td><?= $item->item_en ?></td>
				<td>x<?= $item->stack ?></td>
				<td><?= $item->percentage ?> %</td>
			</tr>
		<?php } ?>
	</table>
</div>