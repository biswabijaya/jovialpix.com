<?php

include 'account/components/includes/db.php';
//default initialisations
$page="website";
$active=$page;

$title="JovialPix";
include 'website/components/scripts/app.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$database = 'u333976797_jovia';
$user = 'u333976797_lpix';
$pass = 'H4PFxLkHfnqT2ygHrH';
$host = 'localhost';
$dir = dirname(__FILE__) . '/jovialpix.sql';
echo "<h3>Backing up database to `<code>{$dir}</code>`</h3>";
exec("mysqldump --user={$user} --password={$pass} --host={$host} {$database} --result-file={$dir} 2>&1", $output);
var_dump($output);