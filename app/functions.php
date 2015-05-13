<?php
function render($path) {
    include "views/{$path}.view.php";
}

function display($view, $data = null, $layout = 'default') {
    if ( $data ) {
        extract($data); // вот так из массива ['var1' => 'value1', 'var2' => 'value2'] создаются переменные $var1 = $value1, $var2 = $value2, ...
    }

    include "views/layouts/{$layout}.view.php";
}

// заглушка. берёт первого попавшегося юзера из БД
// если возвратить null, то будет считаться, что пользователь не авторизован
function get_authorized_user() {
    $authUser = db()->query("SELECT * FROM users")->fetch();
    $authUser = null; // закомментируйте эту строку, чтобы страница отобразилась как для неавторизованного пользователя

    return $authUser;
}