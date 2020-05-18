<?php

	include_once('functions.php');
	include_once ('logs.php');
	$articles = getArticles();

	$id = (int)($_GET['id']);
	$post = $articles[$id];
	$l = logs();
	$log = write($l);

?>
<div class="content">
	<? if($post): ?>
		<div class="article">
			<h1><?=$post['title']?></h1>
			<div><?=$post['content']?></div>
            <hr>
            <a href="redactor.php?id=<?=$id?>">fix</a>
			<hr>
			<a href="delete.php?id=<?=$id?>">Remove</a>
		</div>
	<? else: ?>
		<div class="e404">
			<h1>Страница не найдена!</h1>
		</div>
	<? endif; ?>
</div>
<hr>
<a href="index.php">Move to main page</a>