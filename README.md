# Documentation for Html.php

## The Html Class
(PHP 5, PHP 7)

## Introduction
Returns valid HTML element/s.

## Class synopsis
```
Html {

  //Methods
  
  tag(string $tag, mixed $content = null, string custom = null) : string
  div(mixed $content, string custom = '') : string
  a(mixed $content, string custom = '')   : string
  p(mixed $content, string custom = '')   : string
}
```
## Examples

### Instatiate our class.
```
$Html = new Html;
```

### Let's start with the simplest example;
```
echo $Html->div('content');
```
```
<div >
content
</div>
```
That was easy! Let's keep going.

### Switch to an achor tag.
```
echo $Html->a('link');
```
```
<a >
link
</a>
```

### How to insert attributes.
```
echo $Html->a('link', 'href="google.com" class="link"');
```
```
<a href="google.com" class="link">
link
</a>
```
Great!

### How to do a generic tag.
```
echo $Html->tag('p', 'content', 'custom attributes');
```
```
<p custom attributes>
content
</p>
```

Enough of this simple stuff.
Let's get more sophisitcated.

### Define the attributes in an associative array.
```
$p = array(
    'content'   => 'content',
    'class'     => 'css_class',
    'name'      => 'main_paragraph',
    'id'        => '2',
    'custom'    => 'disabled'
);
$main_paragraph =  $Html->p($p);
echo $main_paragraph;
```
```
<p class="css_class" name="main_paragraph" id="2" disabled>
content
</p>
```

### Now let's throw it in a div!
```
$main_paragraph =  $Html->p($p);
echo $Html->div($main_paragraph, 'class="container"');
```
```
<div class="container">
<p class="css_class" name="main_paragraph" id="2" disabled>
content
</p>
</div>
```
### You can assign variables to key values.
```
$div = array(
    'content'   => $main_paragraph,
    'class'     => 'container'
);

echo $Html->div($div);
```
```
<div class="container" >
<p class="css_class" name="main_paragraph" id="2" disabled>
content
</p>
</div>
```

## Behavior for Special Cases
### Uncaught ArgumentCountError
```
$Html->tag();
$Html->a();
```
### Uncaught TypeError
```
$Html->tag(array());
```
