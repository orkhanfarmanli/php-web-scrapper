<?php


use App\Database;
use App\Search;

$db = new Database('localhost', 'work_project', 'root', 'admin');
$db->connect();


if (isset($_POST['submit'])) {
    $searchParameter = $_POST['searchParameter'];
    $searchWord = $_POST['searchWord'];
    $search = new Search($db->pdo, $searchParameter, $searchWord);
}
