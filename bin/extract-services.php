<?php declare(strict_types = 1);

use Wavevision\DIServiceAnnotation\Configuration;
use Wavevision\DIServiceAnnotation\Runner;

$autoload = require __DIR__ . '/../vendor/autoload.php';
$root = __DIR__ . '/..';
Runner::run(
	new Configuration($root . '/src/', $root . '/config/services.neon')
);
