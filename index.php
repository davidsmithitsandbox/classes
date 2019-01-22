<?php
require __DIR__ . '/vendor/autoload.php';

use ITsandbox\HtmlElementMaker;

$Html = new HtmlElementMaker;
echo $Html->div('content');