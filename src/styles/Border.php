<?php
namespace jtgraham38\jgwordpressstyle\styles;

use jtgraham38\jgwordpressstyle\BlockStyleValue;


trait Border{
    /**
     * Extracts the border width from the attributes array.
     * 
     * @param array $this->attributes
     * @return array 'color' => string: the value of the color attribute, 'isPreset' => boolean: whether the color is a preset value
     */
    function borderWidth(): BlockStyleValue{
        //flag to check if the color is a preset value
        $isPreset = false;
        $color = null;
    
        //both presets and custom values are stored in the $this->attributes['style']['border']['width'] location
        if (!empty($this->attributes['style']['border']['width'])) {
            $color = $this->attributes['style']['border']['width'];
        }
    
        //return the width value
        return new BlockStyleValue($color, $isPreset);
    }

    /**
     * Extracts the border radius from the attributes array.
     * 
     * @param array $this->attributes
     * @return array 'color' => string: the value of the radius attribute, 'isPreset' => boolean: whether the color is a preset value
     */
    function borderRadius(): BlockStyleValue{
        //flag to check if the color is a preset value
        $isPreset = false;
        $color = null;
    
        //both presets and custom values are stored in the $this->attributes['style']['border']['radius'] location
        if (!empty($this->attributes['style']['border']['radius'])) {
            $color = $this->attributes['style']['border']['radius'];
        }
    
        //return the radius value
        return new BlockStyleValue($color, $isPreset);
    }

    /**
     * Extracts the border color from the attributes array.
     * 
     * @param array $this->attributes
     * @return array 'color' => string: the value of the color attribute, 'isPreset' => boolean: whether the color is a preset value
     */
    function borderColor(): BlockStyleValue{
        //flag to check if the color is a preset value
        $isPreset = false;
        $color = null;

        //first, try to extract from the $this->attributes['style']['border']['color'] location
        //this is for custom values
        if (!empty($this->attributes['style']['border']['color'])) {
            $color = $this->attributes['style']['border']['color'];
        }
        //otherwise, try to extract from the $this->attributes['borderColor'] location
        //this is for preset values
        else if (!empty($this->attributes['borderColor'])) {
            $isPreset = true;
            $color = $this->attributes['borderColor'];
        }
    
        //if neither of the above are available, return an empty string
        return new BlockStyleValue($color, $isPreset);
    }
}
