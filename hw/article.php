<?php

	include_once('functions.php');		
	$articles = getArticles();

	$id = (int)($_GET['id']);
	$post = $articles[$id];
	$log = logs();
	if ($log['referer'] == null) {
	    $log['referer'] = '';
    }


    $dir = 'logs'; // Директория для создания страниц
    $dt = date('Y:m:d');
    $dt =str_replace(':', '-', $dt);

    if (!file_exists("$dir/$dt")){ // Если файл не существует, то создаем
        $fIn = fopen("$dir/$dt", 'w'); // Создаем файл
        foreach ( $log as $l ) {
            fwrite($fIn, $l);
        }
        fclose($fIn);
    } else {
        $fI= fopen("$dir/$dt", 'r');
        foreach ( $log as $l ) {
            fwrite($fI, $l);
        }
        fclose($fI);
    }


    //$fp = fopen("$dir/$dt", "w");



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