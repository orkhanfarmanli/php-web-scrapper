<?php

use App\Database;
use App\Scrapper;
use App\Parser;
use App\Search;


$db = new Database('localhost', 'work_project', 'root', 'admin');
$db->connect();

require 'resource/views/head.php';

// second parameter is the page count
if (isset($_GET['scrape'])) {
    $scraped_data = new Scrapper('http://search.nndb.com/search/nndb.cgi?n=John&omenu=unspecified&offset=0', 5);
}
if (isset($_POST['data'])) {
    $parseScrapped = new Parser($db->pdo);
}

if (isset($_POST['submit'])) {
    $searchParameter = $_POST['searchParameter'];
    $searchWord = $_POST['searchWord'];
    $search = new Search($db->pdo, $searchParameter, $searchWord);
}

// chart
require 'resource/views/chart.php';
