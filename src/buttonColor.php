<?php
namespace jtgraham38\jgwordpressstyle\buttonColor;

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Extracts the button background color from the attributes array
 * 
 * @param array $attributes
 * @return array 'color' => string: the value of the color attribute, 'isPreset' => boolean: whether the color is a preset value
 */
function block_btnBkgColor($attributes){
    //flag to check if the color is a preset value
    $isPreset = false;
    $color = null;

    //both presets and custom values are stored in the $attributes['style']['elements']['button']['color']['background'] location
    if (!empty($attributes['style']['elements']['button']['color']['background'])) {
        $color = $attributes['style']['elements']['button']['color']['background'];

        //if the value begins with var: then it is a preset value
        if (strpos($color, 'var:') === 0) {
            $isPreset = true;
        }

    }

    //if neither of the above are available, return an empty string
    return array(
        'isPreset' => $isPreset,
        'color' => $color
    );
}

/**
 * Extracts the button text color from the attributes array
 * 
 * @param array $attributes
 * @return array 'color' => string: the value of the color attribute, 'isPreset' => boolean: whether the color is a preset value
 */
function block_btnTextColor($attributes){
    //flag to check if the color is a preset value
    $isPreset = false;
    $color = null;

    //both presets and custom values are stored in the $attributes['style']['elements']['button']['color']['text'] location
    if (!empty($attributes['style']['elements']['button']['color']['text'])) {
        $color = $attributes['style']['elements']['button']['color']['text'];

        //if the value begins with var: then it is a preset value
        if (strpos($color, 'var:') === 0) {
            $isPreset = true;
        }

    }

    //if neither of the above are available, return an empty string
    return array(
        'isPreset' => $isPreset,
        'color' => $color
    );
}