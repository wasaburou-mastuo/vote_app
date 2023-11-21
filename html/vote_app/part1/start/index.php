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
//'REQUEST_METHOD'プロパティにより、ページにアクセスする際に使用されたリクエストのメソッド名を取得
//'GET', 'HEAD', 'POST', 'PUT' など。
$method = strtolower($_SERVER['REQUEST_METHOD']);

//関数を呼び出し
route($rpath,$method);

//関数化する
function route($rpath,$method){

    if($rpath === ''){
        $rpath = 'home';
    }
    
    //読み込む対象のコントローラーを格納。
    $targetFiles = SOURCE_BASE. "controllers/{$rpath}.php";
    
    //ファイルがない場合は、４０４エラーをかえす
    if(!file_exists($targetFiles)){
        require_once SOURCE_BASE. "views/404.php";
        //404エラーの時はreturnを行い、関数から抜ける.
        return;
    }

    //ファイルが存在する場合は、読み込む
    //対象のコントローラーを読み込み
    //このコントローラーの読み込み無いと、エラーとなる
    require_once $targetFiles;

    //コントローラーのlogin.phpでは名前空間を使って、関数を定義しているので、メソッドを呼び出す際は、名前空間を指定する必要がある。
    //文字列$fnにメソッドまでのパスを格納している。
    //以下のようにすることで、login($rpath)のgetまたはputメソッド（$method）を呼び出すことが出来る。
    //ダブルクォーテーション内の\(バックスラッシュ)はエスケープシーケンスとして認識されるため、「\」でエスケープしてあげる。
    //文字列内で変数を使うには、ダブルクォーテーションで囲む必要がある。
    //シングルコーテーションの場合の「\」は通常のバックスラッシュとして認識される。
    //通常、PHPではパス指定する場合は、「/」を使用する。
    $fn = "\\controller\\{$rpath}\\{$method}";
    

    //関数を呼び出し（PHPの場合には文字列の末尾に（）をつけることによって関数として実行できます）
    //controllers内で定義した名前空間\controller\{$rpath}の{$method}関数を呼び出す。
    //名前空間に定義された関数を呼び出すには、「\名前空間名\関数名」で呼び出すことが出来る。
    //関数や名前空間は、グローバル空間「\」に存在しており、グローバル空間の中に定義した名前空間が存在し、
    //さらに、定義した名前空間の中に定義した関数が存在する。
    //グローバル空間に存在する関数を呼び出すときは、「\」は必要ない。
    //※グローバル空間内のクラスを呼び出す時は、グローバル空間であっても、クラス名の前に「\」を付ける必要がある。
    $fn();

}


// ヘッダー部分を共通の部品化したfooter.phpを最初に読み込む
require_once SOURCE_BASE . '/partials/footer.php';

?>