<?php

if(session_id() == '') {
    session_start();
}

ob_start();
?>
<link rel="stylesheet" href="../../public/style/armor_home.css" />

<h1>Select a rank</h1>

<div id="master">
	<a href="../../index.php?action=armors-rank&rank=LR">
		<figure>
			<figcaption>
				See low rank armor
			</figcaption>
			<img src="../../public/images/ui/quest_star_lr.svg" alt="LR star" width="50px"/>
		</figure>
	</a>
	<a href="../../index.php?action=armors-rank&rank=HR">
		<figure>
			<figcaption>
				See hight rank armor
			</figcaption>
			<img src="../../public/images/ui/quest_star_hr.svg" alt="HR star" width="50px"/>
		</figure>
	</a>
	<a href="../../index.php?action=armors-rank&rank=MR">
		<figure>
			<figcaption>
				See master rank armor
			</figcaption>
			<img src="../../public/images/ui/quest_star_mr.svg" alt="MR star" width="50px"/>
		</figure>
	</a>
	</div>
<?php
$content = ob_get_clean();
require_once('../template.php');