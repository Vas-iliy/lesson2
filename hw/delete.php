<?php

	include_once('functions.php');		
	if ($_GET) {
	    $delete = removeArticle($_GET['id']);
    }

	if ($delete) {
	    header('Location:index.php');
    }
?>
Message about result
<hr>
<a href="index.php">Move to main page</a>