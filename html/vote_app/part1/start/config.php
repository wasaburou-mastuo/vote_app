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
