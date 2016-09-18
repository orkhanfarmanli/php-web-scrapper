<?php

use App\Database;
use App\Scrapper;

$db = new Database('localhost', 'work_project', 'root', 'admin');
$db->connect();

$scraped_data = new Scrapper('http://search.nndb.com/search/nndb.cgi?n=John&omenu=unspecified&offset=0');
