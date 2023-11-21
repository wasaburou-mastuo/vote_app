<?php
$uri = $_SERVER['REQUEST_URI'];

// preg_matchの引数は、下記のようになっています
// 第1引数：正規表現のパターンを指定する。
// 第2引数：正規表現で検索したい文字列を指定する。
// 第3引数：省略可。マッチした文字列を格納するための配列を指定する。
if(preg_match("/(.+(start|end))/i",$uri,$match)){
    // define(定数名, 値 [, 大文字と小文字の区別]);
    define('BASE_CONTEXT_PATH',$match[0] . '/');
}
define('BASE_IMAGE_PATH',BASE_CONTEXT_PATH . 'images/');
define('BASE_JS_PATH',BASE_IMAGE_PATH . 'js/');
define('BASE_CSS_PATH',BASE_IMAGE_PATH . 'css/');
define('SOURCE_BASE', __DIR__ . '/php/');
//phpディレクトリまでの絶対パスを定義。(__DIR__はマジック定数、このファイルのルート（C）からの絶対パスを表す)



// index.phpを経由することで、処理を共通化することができる。
// register.phpやlogin.phpを直接呼ぶと、それぞれのphpファイルに同じ処理を書く必要があります。
// そうなると、プログラムの規模が大きくなるにつれて、重複する記述が多くなり、メンテナンスが大変になります。
// また、何か共通の処理を追加しようとした際にもそれぞれのファイルに処理を追記する必要が出てくるため、
// 記述ミスや記述漏れによるバグの原因になります。
// そのため、index.phpを起点にそれぞれの画面を表示するようにしていますね。