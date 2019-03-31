<?php
if($_POST['s'] == "init") {
	echo "ok";
} elseif ($_POST['s'] == "ping") {
	echo "pong";
} else {
	print_r($_POST);
}
?>