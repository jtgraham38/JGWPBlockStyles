<?php
namespace jtgraham38\jgwordpressstyle\styles;

use jtgraham38\jgwordpressstyle\BlockStyleValue;


trait Spacing{
    /**
     * Extracts the margin from the attributes array.
     * 
     * @param array $this->attributes
     * @return array 'color' => string: the value of the color attribute, 'isPreset' => boolean: whether the color is a preset value
     */
    function margin(): array{
        $margin = [];
    
        //both presets and custom values are stored in the $this->attributes['style']['elements']['button']['color']['background'] location
        if (!empty($this->attributes['style']['spacing']['margin'])) {
            foreach ($this->attributes['style']['spacing']['margin'] as $side => $marginValue) {
                //check if the value is a preset by checking if it starts with 'var:'
                $isPreset = false;
                if (strpos($marginValue, 'var:') === 0) {
                    $isPreset = true;
                }

                //add the margin value for that side
                $margin[$side] = new BlockStyleValue($marginValue, $isPreset);
            }
        }
    
        //return the width value
        return $margin;
    }

    /**
     * Extracts the padding from the attributes array.
     * 
     * @param array $this->attributes
     * @return array 'color' => string: the value of the color attribute, 'isPreset' => boolean: whether the color is a preset value
     */
    function padding(): array{
        $padding = [];
    
        //both presets and custom values are stored in the $this->attributes['style']['elements']['button']['color']['background'] location
        if (!empty($this->attributes['style']['spacing']['padding'])) {
            foreach ($this->attributes['style']['spacing']['padding'] as $side => $paddingValue) {
                //check if the value is a preset by checking if it starts with 'var:'
                $isPreset = false;
                if (strpos($paddingValue, 'var:') === 0) {
                    $isPreset = true;
                }

                //add the padding value for that side
                $padding[$side] = new BlockStyleValue($paddingValue, $isPreset);
            }
        }
    
        //return the width value
        return $padding;
    }

    
}
