<?php
namespace jtgraham38\jgwordpressstyle;

use jtgraham38\jgwordpressstyle\BlockStyleValue;

use jtgraham38\jgwordpressstyle\styles\Typography;
use jtgraham38\jgwordpressstyle\styles\ButtonColor;
use jtgraham38\jgwordpressstyle\styles\Color;


/**
 * Holds all extracted block styles as surface-level properties.  Used to easily read values off of the $attributes array.
 * Current properties:
 * - buttonBgColor
 * - buttonTextColor
 * - textColor
 * - fontSize
 */
class BlockStyle{
    use Typography;
    use Color;
    use ButtonColor;

    private $attributes;

    //parse the attributes array to extract the block style
    function __construct($attributes){
        $this->attributes = $attributes;
    }

    /*
    * Get the classes for the block style
    * @param array $keys - the keys to extract from the block style
    * @param array $additionalClasses - additional classes to add to the block style
    * @return string - the classes for the block style
    *
    * NOTE: not done yet, does not convert wp variables yet!
    */
    public function getClasses(array $keys, array $additionalClasses = []){
        $classes = [];
        foreach($keys as $key){
            $value = $this->$key()->value;
            if($value){
                $classes[] = $value;
            }
        }
        return implode(" ", array_merge($classes, $additionalClasses));
    }
}