<?php
require __DIR__ . '/vendor/autoload.php';

Use ITsandbox\HtmlElementMaker;

$Html = new ITsandbox\HtmlElementMaker;

$p = array(
    'content'   => 'content',
    'class'     => 'css_class',
    'name'      => 'main_paragraph',
    'id'        => '2',
    'custom'    => 'disabled'
);
$main_paragraph =  $Html->p($p);
$div = array(
    'content'   => $main_paragraph,
    'class'     => 'container'
);

echo $Html->div($div);