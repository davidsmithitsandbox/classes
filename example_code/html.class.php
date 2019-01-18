<?php
class Html
{
    private $non_attribute_pairs = array(
        'content'   => '',
        'tag'       => '',
        'custom'    => ''
    );

    private $components = array();
    
    public function tag($content, String  $tag = 'p', String $custom = null)
    {
        $components = compact('content', 'tag', 'custom');
        $this->assignComponents($components);
        extract($this->components);

        $element[] = "<$tag $attributes $custom>";
        $element[] = $content;
        $element[] = "</$tag>";
        $element[] = '';

        return implode("\n", $element);
    }

    private function assignComponents(Array $components)
    {
        $components = $this->extractComponents($components);
        foreach($components as $key => $value)
            $this->components[$key] = $value;
    }

    private function extractComponents(Array $components)
    {
        $is_array   = is_array($components['content']);
        $components = $is_array ? $components['content'] : $components;

        $components['attributes'] = $this->assembleAttributes($components);
        $components[] = $this->getNonAttributePairs($components);

        return $components;
    }

    private function getNonAttributePairs($components)
    {
        $components = array_intersect_key($components, $this->non_attribute_pairs);

        return array_merge($components, $this->non_attribute_pairs);
    }

    private function assembleAttributes(Array $components)
    {
        $attributes_pairs = $this->extractAttributePairs($components);
        return $this->assembleAttributePairs($attributes_pairs);
    }

    private function extractAttributePairs($components)
    {
        return array_diff_key($components, $this->non_attribute_pairs);
    }

    private function assembleAttributePair(String $name, String $value)
    {
        return $name . '="' . $value . '"';
    }

    private function assembleAttributePairs(Array $attribute_pairs)
    {
        foreach($attribute_pairs as $name => $value)
            $attributes[] = $this->assembleAttributePair($name, $value);
        return implode(' ', $attributes);
    }
}

$Html = new Html;

$div = array(
    'content'   => 'Content',
    'class'     => 'container',
    'custom'    => 'disabled',
    'tag'       => 'div',
    'id'        => '34',
    'name'      => 'main_paragraph'
);

echo $Html->tag($div);
// echo $Html->tag('Content', 'div', 'class="container"');