<?php

	// your functions may be here

	/* start --- black box */
function getArticles() : array{
    return json_decode(file_get_contents('db/articles.json'), true);
}


	function addArticle(string $title, string $content) : bool{
		$articles = getArticles();

		$lastId = end($articles)['id'];
		$id = $lastId + 1;

		$articles[$id] = [
			'id' => $id,
			'title' => $title,
			'content' => $content
		];

		saveArticles($articles);
		return true;
	}

	function removeArticle(int $id) : bool{
		$articles = getArticles();

		if(isset($articles[$id])){
			unset($articles[$id]);
			saveArticles($articles);
			return true;
		}
		
		return false;
	}

	function refactorArticle (int $id, $title, $content): bool {

        $articles = getArticles();

        $articles[$id] = [
            'id' => $id,
            'title' => $title,
            'content' => $content

        ];

        saveArticles($articles);
        return true;

    }

    function logs () {
        $dt = date('Y:m:d H:i:s');
        $ide = $_SERVER['REMOTE_ADDR'];
        $uri = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
        $referer = $_SERVER['HTTP_REFERER'];
        $logi = [
            'dt' => $dt . ' && ',
            'ide' => $ide. ' && ',
            'uri' => $uri. ' && ',
            'referer' => $referer,
            'n' => "\n"
        ];
        if ($logi['referer'] == null) {
            $logi['uri'] = $uri;
        }
        return $logi;
    }

	    function saveArticles(array $articles) : bool
        {
            file_put_contents('db/articles.json', json_encode($articles));
            return true;
        }


	/* end --- black box */