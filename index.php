<?php
require __DIR__ . '/vendor/autoload.php';

Use ITsandbox\Html;

$Html = new ITsandbox\Html;

$div = array(
    'content'   => 'Content',
    'class'     => 'container',
    'custom'    => 'disabled',
    'tag'       => 'div',
    'id'        => '34',
    'name'      => 'main_paragraph'
);

// echo $Html->tag($div);
echo $Html->tag('Content', 'div', 'class="container"');