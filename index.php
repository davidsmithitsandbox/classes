<?php
require __DIR__ . '/vendor/autoload.php';

Use ITsandbox\Html;

$Html = new ITsandbox\Html;

$Html->tag('a');

// $p = array(
//     'content'   => 'content',
//     'class'     => 'css_class',
//     'name'      => 'main_paragraph',
//     'id'        => '2',
//     'custom'    => 'disabled'
// );
// $main_paragraph =  $Html->p($p);
// $div = array(
//     'content'   => $main_paragraph,
//     'class'     => 'container'
// );

// echo $Html->div($div);