<?php

if(session_id() == '') {
    session_start();
}

ob_start();
?>
<link rel="stylesheet" href="../../public/style/armor_home.css" />

<h1>Select a rank</h1>

<div id="master">
	<figure>
		<figcaption>
			<a href="../../index.php?action=armors-rank&rank=LR">See low rank armor</a>
		</figcaption>
		<img src="../../public/images/ui/quest_star_lr.svg" width="50px"/>
	</figure>
	<figure>
		<figcaption>
			<a href="../../index.php?action=armors-rank&rank=HR">See hight rank armor</a>
		</figcaption>
		<img src="../../public/images/ui/quest_star_hr.svg" width="50px"/>
	</figure>
	<figure>
		<figcaption>
			<a href="../../index.php?action=armors-rank&rank=MR">See master rank armor</a>
		</figcaption>
		<img src="../../public/images/ui/quest_star_mr.svg" width="50px"/>
	</figure>
</div>
<?php
$content = ob_get_clean();
require_once('../template.php');