<?php
namespace jtgraham38\jgwordpressstyle\textColor;

if (!defined('ABSPATH')) {
    exit;
}

function block_textColor($attributes) {
    //flag to check if the color is a preset value
    $isPreset = false;
    $color = null;

    //first, try to extract from the $attributes['textColor'] location
    //this is for preset values
    if (!empty($attributes['textColor'])) {
        $isPreset = true;
        $color = $attributes['textColor'];
    }
    //otherwise, try to extract from the $attributes['style']['color']['text'] location
    //this is for custom values
    else if (!empty($attributes['style']['color']['text'])) {
        $color = $attributes['style']['color']['text'];
    }

    //if neither of the above are available, return an empty string
    return array(
        'isPreset' => $isPreset,
        'color' => $color
    );
}