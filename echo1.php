<?php
if ($_GET['s'] == "init"){
	echo "ok";
} elseif($_GET['s'] == "ping")  {
	echo "pong";
} else {
	print_r($_POST);
}
?>
