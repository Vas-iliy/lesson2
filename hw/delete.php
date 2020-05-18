<?php

	include_once('functions.php');
	include_once ('logs.php');

	if ($_GET) {
	    $delete = removeArticle($_GET['id']);
	    $l = logs();
	    $log = write($l);
    }

	if ($delete) {
	    header('Location:index.php');
    }
?>
Message about result
<hr>
<a href="index.php">Move to main page</a>