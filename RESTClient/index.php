<?php
require __DIR__.'/vendor/autoload.php';
require __DIR__.'/config.php';
require __DIR__.'/app/RequestAction.php';

$loader = new \Twig\Loader\FilesystemLoader(__DIR__.'/templates');
$twig   = new \Twig\Environment($loader);
$reqAct = new RequestAction();

$action = filter_input(INPUT_GET, 'act', FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?: 'home';

if ($action === 'home') {
    echo $twig->render('home.html.twig');
} 
elseif ($action === 'viewGames') {
    $result = $reqAct->viewGames();
    $list = isset($result['data']) ? $result['data'] : [];
    echo $twig->render('view.html.twig', ['list' => $list]);
} 
elseif ($action === 'addForm') {
    echo $twig->render('add.html.twig');
} 
elseif ($action === 'addSubmit') {
    
    $postData = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?: [];
    $res = $reqAct->addGame($postData);
    header("Location: index.php?act=viewGames");
    exit;
} 
elseif ($action === 'searchForm') {
    echo $twig->render('search.html.twig');
} 
elseif ($action === 'searchDo') {
    
    $kw = filter_input(INPUT_GET, 'kw', FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?: '';
    try {
        $result = $reqAct->searchGames($kw);
        $list = isset($result['data']) ? $result['data'] : [];
        echo $twig->render('searchResult.html.twig', ['list' => $list]);
    } catch (Throwable $e) {
        echo "<div style='color:red;padding:20px;'>请求出错：" . $e->getMessage() . "</div>";
        exit;
    }
}
else {
    header("Location: index.php?act=home");
    exit;
}