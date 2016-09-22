<?php

use App\Database;
use App\Scrapper;
use App\Insert;
use App\Search;

$db = new Database('localhost', 'work_project', 'root', 'admin');
$db->connect();

require 'resource/views/head.php';

// second parameter is the page count
if (isset($_POST['scrape'])) {
    $scraped_data = new Scrapper('http://search.nndb.com/search/nndb.cgi?n=John&omenu=unspecified&offset=0', 5);
}
if (isset($_POST['data'])) {
    $parseScrapped = new Insert($db->pdo);
}

if (isset($_POST['submit'])) {
    $searchParameter = $_POST['searchParameter'];
    $searchWord = $_POST['searchWord'];
    $search = new Search($db->pdo, $searchParameter, $searchWord);
}

// charts
require 'resource/views/charts.php';
