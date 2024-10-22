<?php
namespace jtgraham38\jgwordpressstyle\styles;

use jtgraham38\jgwordpressstyle\BlockStyleValue;

trait Typography{

    /**
     * Extracts the font size from the attributes array
     * 
     * @param array $this->attributes
     * @return array 'size' => string: the value of the color attribute, 'isPreset' => boolean: whether the color is a preset value
     */
    function fontSize(): BlockStyleValue{
        //flag to check if the size is a preset value
        $isPreset = false;
        $size = null;
    
        //first, try to extract from the $this->attributes['fontSize'] location
        //this is for preset values
        if (!empty($this->attributes['fontSize'])) {
            $isPreset = true;
            $size = $this->attributes['fontSize'];
        }
    
        //then, try to extract from the $this->attributes['style']['typography']['fontSize'] location
        //this is for custom values
        if (!empty($this->attributes['style']['typography']['fontSize'])) {
            $size = $this->attributes['style']['typography']['fontSize'];
        }
    
        //if neither of the above are available, return an empty string
        return new BlockStyleValue($size, $isPreset);
    }
}
