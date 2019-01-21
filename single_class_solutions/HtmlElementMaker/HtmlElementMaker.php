<?php
namespace ITsandbox;

class HtmlElementMaker
{

    /**
     * ------------------------- CLASS DESCRIPTION -----------------------------
     * 
     * This class is intended to help in the creation of valid HTML tags.
     * Arguments or an associative array can be passed into the public methods.
     * It outputs a valid HTML tag.
     */

    /**
     * This associative array is used in the extraction of attribute pairs.
     *      See getNonAttributePairs(), extractAttributePairs().
     *
     * An 'attribute pair' is a valid HTML attribute that has has the pattern:
     *      ` attribute="value" `
     *      where 'attribute' is the attribute name and 'value' is the value 
     *      of the attribute.
     * 
     * The user passes in an associative array to the public methods.
     * The $this->non_attribute_pairs property is filtered against the
     *      passed in array to extract the 'attribute pairs'.
     * 
     * The keys NOT in this property are assumed to be an 'attribute pair'.
     *      Example: 'name' => 'description' would be an 'attribute pair' 
     *      given the array('id' => '1').
     *
     * @var array
     */
    private $non_attribute_pairs = array(
        'content'   => '',  // The information between the HTML tags
        'tag'       => '',  // Used in the opening and closing tag.
        'custom'    => ''   // A value assumed to be an attribute.
    );

    /**
     * This property is intended to store rendered valid HTML.
     *      The key names correspond to variable names after
     *      an extract() is called.
     * See $this->tag()
     * 
     * @var array
     */
    private $components = array();


    //-------------------------- PUBLIC METHODS --------------------------------
    
    /**
     * This class is intended to create valid HTML tags.
     * Arguments or an associative array can be passed into the public methods.
     * It outputs a valid HTML tag.
     *
     * @param String $tag       Associated with a HTML tag
     * @param Mixed  $content   Associated with content between HTML tags
     * @param String $custom    Associated with HTML attributes
     * @return void
     */
    public function tag(String $tag, $content = null,  String $custom = null)
    {
        // Assigns an associative array made from the method arguments.
        // 'components' is the name given to the values that create an HTML element
        $components = compact('content', 'tag', 'custom');

        // Parses the arguments and assigns them to a property.
        $this->assignComponents($components);

        // Turns the property into variables with values.
        extract($this->components);

        // Assigns the property to an empty array.
        $this->components = array();

        // Assembles a valid HTML element to an array.
        $element[] = "<$tag $attributes $custom>";
        $element[] = $content;
        $element[] = "</$tag>";

        // Inserts a new line for each of the items in the array.
        // Returns a valid HTML string.
        return implode("\n", $element);
    }

    /**
     * Returns a valid HTML anchor element.
     *
     * @param Mixed  $content   An associative array defining the parts
     *      of an HTML element or a string that will be assumed to be
     *      the content of the tag.
     * @param String $custom    Any values intended to be HTML attributes.
     * @return String A valid HTML element.
     */
    public function a($content, String $custom = null)
    {
        $this->content['tag'] = 'a';
        return $this->tag(__FUNCTION__, $content, $custom);
    }

    /**
     * Returns a valid HTML paragraph element.
     *
     * @param Mixed  $content   An associative array defining the parts
     *      of an HTML element or a string that will be assumed to be
     *      the content of the tag.
     * @param String $custom    Any values intended to be HTML attributes.
     * @return String A valid HTML element.
     */
    public function p($content, String $custom = null)
    {
        $this->content['tag'] = 'p';
        return $this->tag(__FUNCTION__, $content, $custom);
    }

    /**
     * Returns a valid HTML content division element.
     *
     * @param Mixed  $content   An associative array defining the parts
     *      of an HTML element or a string that will be assumed to be
     *      the content of the tag.
     * @param String $custom    Any values intended to be HTML attributes.
     * @return String A valid HTML element.
     */
    public function div($content, String $custom = null)
    {
        $this->content['tag'] = 'div';
        return $this->tag(__FUNCTION__, $content, $custom);
    }

    //------------------------ PRIVATE METHODS ---------------------------------

    /**
     * Binds keys and values to a parameter as an associative array.
     *
     * @param Array $components
     * @return void
     */
    private function assignComponents(Array $components)
    {
        // An associative array is returned.
        // Example: array(
        //             'content' => 'content',
        //             'attributes' => array(
        //                 'name' => 'name'
        //             )
        //         );
        $components = $this->extractComponents($components);
        // Binds the values
        foreach($components as $key => $value)
            $this->components[$key] =  $value;
    }

    /**
     * Determines if the an argument list or an array contains the 
     *      components of a HTML element.
     * This is the property that enables the class to use an array or an
     *      argument list for its input.
     * 
     * If $components['content'] is an array, the values of 
     *      $components['content'] will be used.
     * If $components['content'] is not an array, the values of
     *      $components will be used.
     *
     * @param Array $components
     * @return Array
     */
    private function extractComponents(Array $components)
    {
        $is_array   = is_array   ($components['content']);
        $components = $is_array ? $components['content'] : $components;

        // Filters out the non attributes.
        $components['attributes'] = $this->assembleAttributes($components);
        // Filters out the attributes.
        $components[]             = $this->getNonAttributePairs($components);

        return $components;
    }

    /**
     * Filters out non attributes and returns attribute pairs as a string.
     * Non attribute pairs are defined by $this->non_attribute_pairs.
     *
     * @param Array $components
     * @return String
     */
    private function assembleAttributes(Array $components)
    {
        $attributes_pairs = $this->extractAttributePairs($components);

        // Handles an empty array and returns assembled attributes
        return empty($attributes_pairs) ? false :
            $this->assembleAttributePairs($attributes_pairs);
    }

    /**
     * Returns key/value pairs that match.
     *
     * @param  Array $components
     * @return Array
     */
    private function getNonAttributePairs(Array $components)
    {
        $components = array_intersect_key($components, $this->non_attribute_pairs);

        return array_merge($components, $this->non_attribute_pairs);
    }

    /**
     * Returns key/value pairs that DO NOT match.
     *
     * @param Array $components
     * @return void
     */
    private function extractAttributePairs(Array $components)
    {
        return array_diff_key($components, $this->non_attribute_pairs);
    }

    /**
     * Takes 2 strings and returns a string in this format:
     *      name = "value"
     *
     * @param  String $name
     * @param  String $value
     * @return String
     */
    private function assembleAttributePair(String $name, String $value)
    {
        return $name . '="' . $value . '"';
    }

    /**
     * Takes an associative array and returns a string in this format
     *      key = "value"
     *
     * @param  Array $attribute_pairs
     * @return String
     */
    private function assembleAttributePairs(Array $attribute_pairs)
    {
        foreach($attribute_pairs as $name => $value)
            $attributes[] = $this->assembleAttributePair($name, $value);
        return implode(' ', $attributes);
    }
}
