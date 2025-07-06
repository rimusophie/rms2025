<?php

require_once(__DIR__ . '/../config.php');

/**
 * データベース接続を取得する関数
 *
 * @return PDO データベース接続オブジェクト
 */
function get_db() {
    $connect_string = sprintf('mysql:host=%s;dbname=%s', Config::DB_HOST, Config::DB_NAME);
    return new PDO($connect_string, Config::DB_USER, Config::DB_PASS);
}

?>