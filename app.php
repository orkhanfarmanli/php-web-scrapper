<?php

use App\Database;
use App\Scrapper;
use App\Parser;
use App\Search;


$db = new Database('localhost', 'work_project', 'root', 'admin');
$db->connect();

$scraped_data = new Scrapper('http://search.nndb.com/search/nndb.cgi?n=John&omenu=unspecified&offset=0');
$parseScrapped = new Parser($db->pdo);

if (isset($_POST['submit'])) {
    $searchParameter = $_POST['searchParameter'];
    $searchWord = $_POST['searchWord'];
    $search = new Search($db->pdo, $searchParameter, $searchWord);
}
