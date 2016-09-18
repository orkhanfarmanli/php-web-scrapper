<?php

error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', 1);
ini_set('html_errors', 1);


require 'vendor/autoload.php';
require 'app.php';
if (isset($_POST['submit'])) {
  require 'search.php';
}
