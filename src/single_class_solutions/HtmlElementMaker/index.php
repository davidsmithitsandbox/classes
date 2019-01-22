<?php
require __DIR__ . '../../../../vendor/autoload.php';

use ITsandbox\HtmlElementMaker;

$Html = new HtmlElementMaker;

// echo $Html->div('content');

// echo $Html->a('link');

// echo $Html->a('link', 'href="google.com" class="link"');

// echo $Html->tag('p', 'content', 'custom attributes');

// $p = array(
//     'content'   => 'content',
//     'class'     => 'css_class',
//     'name'      => 'main_paragraph',
//     'id'        => '2',
//     'custom'    => 'disabled'
// );
// $main_paragraph =  $Html->p($p);
// echo $main_paragraph;

// $p = array(
//     'content'   => 'content',
//     'class'     => 'css_class',
//     'name'      => 'main_paragraph',
//     'id'        => '2',
//     'custom'    => 'disabled'
// );
// $main_paragraph =  $Html->p($p);
// echo $Html->div($main_paragraph, 'class="container"');

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
