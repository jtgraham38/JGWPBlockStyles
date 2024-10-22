<?php
namespace jtgraham38\jgwordpressstyle\styles;

use jtgraham38\jgwordpressstyle\BlockStyleValue;


trait ButtonColor{
    /**
     * Extracts the button background color from the attributes array
     * 
     * @param array $this->attributes
     * @return array 'color' => string: the value of the color attribute, 'isPreset' => boolean: whether the color is a preset value
     */
    function btnBgColor(): BlockStyleValue{
        //flag to check if the color is a preset value
        $isPreset = false;
        $color = null;
    
        //both presets and custom values are stored in the $this->attributes['style']['elements']['button']['color']['background'] location
        if (!empty($this->attributes['style']['elements']['button']['color']['background'])) {
            $color = $this->attributes['style']['elements']['button']['color']['background'];
    
            //if the value begins with var: then it is a preset value
            if (strpos($color, 'var:') === 0) {
                $isPreset = true;
            }
    
        }
    
        //if neither of the above are available, return an empty string
        return new BlockStyleValue($color, $isPreset);
    }
    
    /**
     * Extracts the button text color from the attributes array
     * 
     * @param array $this->attributes
     * @return array 'color' => string: the value of the color attribute, 'isPreset' => boolean: whether the color is a preset value
     */
    function btnTextColor(): BlockStyleValue{
        //flag to check if the color is a preset value
        $isPreset = false;
        $color = null;
    
        //both presets and custom values are stored in the $this->attributes['style']['elements']['button']['color']['text'] location
        if (!empty($this->attributes['style']['elements']['button']['color']['text'])) {
            $color = $this->attributes['style']['elements']['button']['color']['text'];
    
            //if the value begins with var: then it is a preset value
            if (strpos($color, 'var:') === 0) {
                $isPreset = true;
            }
    
        }
    
        //if neither of the above are available, return an empty string
        return new BlockStyleValue($color, $isPreset);
    }
}
