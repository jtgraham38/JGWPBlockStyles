<?php
namespace jtgraham38\jgwordpressstyle\styles;

use jtgraham38\jgwordpressstyle\BlockStyleValue;

trait Color{
    /**
     * Extracts the text color from the attributes array
     * 
     * @param array $this->attributes
     * @return array 'color' => string: the value of the color attribute, 'isPreset' => boolean: whether the color is a preset value
     */
    function textColor(): BlockStyleValue {
        //flag to check if the color is a preset value
        $isPreset = false;
        $color = null;
    
        //first, try to extract from the $this->attributes['style']['color']['text'] location
        //this is for custom values
        if (!empty($this->attributes['style']['color']['text'])) {
            $color = $this->attributes['style']['color']['text'];
        }
        //otherwise, try to extract from the $this->attributes['textColor'] location
        //this is for preset values
        else if (!empty($this->attributes['textColor'])) {
            $isPreset = true;
            $color = $this->attributes['textColor'];
        }
    
        //if neither of the above are available, return an empty string
        return new BlockStyleValue($color, $isPreset);
    }

    /**
     * Extracts the background color from the attributes array
     * 
     * @param array $this->attributes
     * @return array 'color' => string: the value of the color attribute, 'isPreset' => boolean: whether the color is a preset value
     */
    function bgColor(): BlockStyleValue {
        //flag to check if the color is a preset value
        $isPreset = false;
        $color = null;
    
        //first, try to extract from the $this->attributes['style']['color']['background'] location
        //this is for custom values
        if (!empty($this->attributes['style']['color']['background'])) {
            $color = $this->attributes['style']['color']['background'];
        }
        //otherwise, try to extract from the $this->attributes['backgroundColor'] location
        //this is for preset values
        else if (!empty($this->attributes['backgroundColor'])) {
            $isPreset = true;
            $color = $this->attributes['backgroundColor'];
        }
    
        //if neither of the above are available, return an empty string
        return new BlockStyleValue($color, $isPreset);
    }
}
