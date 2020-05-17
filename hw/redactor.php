<?php
include_once ('functions.php');
$articles = getArticles();

$id = (int)($_GET['id'] ?? '');
$post = $articles[$id] ?? null;

if ($_POST['go']) {
    $article = $_POST['title'];
    $content = $_POST['content'];
    $redaction = refactorArticle($id, $article, $content);
    header('Location:index.php');
}


?>

<form method="post">
    <input type="text" name="title" value="<?=$post['title']?>" > <br/>
    <textarea type="text" name="content" id="" cols="30" rows="10"><?=$post['content']?></textarea><br>
    <input type="submit" name="go" value="Исправить">
</form>

