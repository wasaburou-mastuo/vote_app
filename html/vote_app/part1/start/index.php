<?php
require_once 'config.php';

// echo $_SERVER['REQUEST_URI'];

// ヘッダー部分を共通の部品化したheader.phpを最初に読み込む
require_once SOURCE_BASE . '/partials/header.php';

//以下のif文だと、画面が多くなるとプログラムが複雑に見える。
//渡ってきたパスを分解（login、register、""(home)して、それに対応するコントローラーを呼び出すようにする

// if($_SERVER['REQUEST_URI'] === '/poll/part1/start/login'){
//     // require_once 'views/login.php';
//     //MVCのVIEWで表示していたものを、MVCのcontrollerで管理するように変更
//     require_once SOURCE_BASE . 'controllers/login.php';
// }elseif($_SERVER['REQUEST_URI'] === '/poll/part1/start/register'){
//     //require_once 'views/register.php';
//      //MVCのVIEWで表示していたものを、MVCのcontrollerで管理するように変更
//     require_once SOURCE_BASE . 'controllers/register.php';
// }elseif($_SERVER['REQUEST_URI'] === '/poll/part1/start/'){
//     //require_once 'views/home.php';
//      //MVCのVIEWで表示していたものを、MVCのcontrollerで管理するように変更
//     require_once SOURCE_BASE . 'controllers/home.php';
// }

//送られてきたURI（$_SERVER['REQUEST_URI']）のBASE_CONTEXT_PATH部分を空文字に置換して、
//（login、register、""(home)の部分のみ変数$pathに格納する
$rpath = str_replace(BASE_CONTEXT_PATH, '' , $_SERVER['REQUEST_URI']);

//関数を呼び出し
route($rpath);

//関数化する
function route($rpath){

    if($rpath === ''){
        $rpath = 'home';
    }
    
    $targetFiles = SOURCE_BASE. "controllers/{$rpath}.php";
    
    //ファイルがない場合は、４０４エラーをかえす
    if(!file_exists($targetFiles)){
        require_once SOURCE_BASE. "views/404.php";
        //404エラーの時はreturnを行い、関数から抜ける.
        return;
    }
    
    require_once $targetFiles;

}


// ヘッダー部分を共通の部品化したfooter.phpを最初に読み込む
require_once SOURCE_BASE . '/partials/footer.php';

?>