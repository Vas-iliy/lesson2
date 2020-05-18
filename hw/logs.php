<?php

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

function addLogs ($article, $content) {
    $logs = logs();

    foreach ($logs as $key => $log) {
            unset($logs[$key]);
    }

    $logs += ['newState' => 'Новая статья: ' . $article , 'newText' => ' $$ Текст статьи:' . $content, 'n' => "\n"];
    return $logs;
}


function write ($l) {
    $log = $l;
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
        foreach ( $log as $l ) {
            file_put_contents("$dir/$dt", $l, FILE_APPEND);
        }
    }
    return true;
}




