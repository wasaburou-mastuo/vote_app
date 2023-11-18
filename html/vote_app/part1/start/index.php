<?php
require_once 'config.php';

// echo $_SERVER['REQUEST_URI'];

// ヘッダー部分を共通の部品化したheader.phpを最初に読み込む
require_once 'partials/header.php';

if($_SERVER['REQUEST_URI'] === '/poll/part1/start/login'){
    require_once 'views/login.php';
}elseif($_SERVER['REQUEST_URI'] === '/poll/part1/start/register'){
require_once 'views/register.php';
}elseif($_SERVER['REQUEST_URI'] === '/poll/part1/start/'){
require_once 'views/home.php';
}

// ヘッダー部分を共通の部品化したfooter.phpを最初に読み込む
require_once 'partials/footer.php';

?>