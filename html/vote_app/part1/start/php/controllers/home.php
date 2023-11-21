<?php 
//phpでは、文字列の結合は「.」ドットを使う。
//phpフォルダの中（SOURCE_BASE）のviewsのhome.phpファイルという意味
//contorollerでviewsを呼ぶ処理

//GETメソッドとPOSTメソッドで呼び分ける
// require_once SOURCE_BASE . 'views/home.php';
//PHPでは、関数は名前空間を指定しないと、全てグローバル空間に定義されることになる。
//グローバル空間に関数が重複しているとエラーとなるので、同じ関数名が重複しそうな場合は、名前空間内に関数を配置してあげる。
//namespaseの名前は任意

namespace controller\home;

function get(){

    require_once SOURCE_BASE . 'views/home.php';

}

