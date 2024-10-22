<?php
namespace jtgraham38\jgwordpressstyle\BlockStyle;

if (!defined('ABSPATH')) {
    exit;
}

use jtgraham38\jgwordpressstyle\BlockStyleValue;
use jtgraham38\jgwordpressstyle\buttonColor;
use jtgraham38\jgwordpressstyle\fontSize;
use jtgraham38\jgwordpressstyle\textColor;

/**
 * Holds all extracted block styles as surface-level properties.  Used to easily read values off of the $attributes array.
 * Current properties:
 * - buttonBgColor
 * - buttonTextColor
 * - textColor
 * - fontSize
 */
class BlockStyle{

    private $attributes;
    //fields to pull values from
    public BlockStyleValue $buttonBgColor;
    public BlockStyleValue $buttonTextColor;
    public BlockStyleValue $textColor;
    public BlockStyleValue $fontSize;

    //parse the attributes array to extract the block style
    function __construct($attributes){
        //color
        $this->buttonBgColor = buttonColor\block_btnBkgColor($attributes);
        $this->buttonTextColor = buttonColor\block_btnTextColor($attributes);
        $this->textColor = textColor\block_textColor($attributes);

        //typography
        $this->fontSize = fontSize\jg_blocks_extract_fontSize($attributes);
    }

    //a function that generates a class string based on the desired keys, and other passed in classes
    public function getClasses(array $keys, array $additionalClasses = []){
        $classes = [];
        foreach($keys as $key){
            if($this->$key->value){
                $classes[] = $this->$key->value;
            }
        }
        return implode(' ', array_merge($classes, $additionalClasses));
    }
}