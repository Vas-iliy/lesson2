<?php

	include_once('functions.php');

    if ($_POST['set']) {
        $article = $_POST['article'];
        $content = $_POST['content'];
        $add = addArticle($article, $content);
    }

    if ($add) {
        header('Location:index.php');
    }

?>

<form method="post">
    <input type="text" name="article" required placeholder="Название статьи">  <br/>
    <textarea type="text" name="content" required placeholder="Текст статьи" id="" cols="30" rows="10" ></textarea> <br/>
    <input type="submit" name="set" value="Добавить">
</form>
<hr>
<a href="index.php">Move to main page</a>