<?php

/* ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL); */

require __DIR__ . '/vendor/autoload.php';
use iio\libmergepdf\Merger;
use iio\libmergepdf\Pages;

$filename = require('data/filename.php');
$intervals = require('data/intervals.php');
natsort($intervals);

$merger = new Merger;

foreach ($intervals as $key => $interval) {

	$merger->addFile($filename, new Pages($interval));

}

$createdPdf = $merger->merge();
header('Content-Type: application/pdf');
header('Content-Disposition: attachment; filename=result.pdf');
header('Pragma: no-cache');
echo $createdPdf;