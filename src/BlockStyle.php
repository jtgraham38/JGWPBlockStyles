<?php
namespace jtgraham38\jgwordpressstyle;

use jtgraham38\jgwordpressstyle\BlockStyleValue;

use jtgraham38\jgwordpressstyle\styles\Typography;
use jtgraham38\jgwordpressstyle\styles\ButtonColor;
use jtgraham38\jgwordpressstyle\styles\Color;
use jtgraham38\jgwordpressstyle\styles\Spacing;
use jtgraham38\jgwordpressstyle\styles\Border;
use jtgraham38\jgwordpressstyle\styles\LinkColor;


/**
 * Holds all extracted block styles as surface-level properties.  Used to easily read values off of the $attributes array.
 * Current properties:
 * - buttonBgColor
 * - buttonTextColor
 * - textColor
 * - fontSize
 * - margin
 * - padding
 * - borderWidth
 * - borderRadius
 * - borderColor
 * - linkColor
 */
class BlockStyle{
    use Typography;
    use Color;
    use ButtonColor;
    use Spacing;
    use Border;
    use LinkColor;

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



    public function presetVarToClass(string $var, string $prefix="", string $suffix=""){
        //check if the string matches this format: var:preset|<some string>|<var>
        $matches = [];
        preg_match('/^var:preset\|([a-zA-Z0-9_-]+)\|([a-zA-Z0-9_-]+)$/', $var, $matches);

        //if there was a match for the last group, extract it
        if(count($matches) > 2){
            $preset = $matches[1];
            $var = $matches[2];

            //return the class name
            return $prefix . $var . $suffix;
        }

        //if there was no match, return the original string
        return null;
    }
}