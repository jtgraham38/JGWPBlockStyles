<?php
namespace jtgraham38\jgwordpressstyle\fontSize;

if (!defined('ABSPATH')) {
    exit;
}

use jtgraham38\jgwordpressstyle\BlockStyleValue;

/**
 * Extracts the font size from the attributes array
 * 
 * @param array $attributes
 * @return array 'size' => string: the value of the color attribute, 'isPreset' => boolean: whether the color is a preset value
 */
function block_fontSize($attributes){
    //flag to check if the size is a preset value
    $isPreset = false;
    $size = null;

    //first, try to extract from the $attributes['fontSize'] location
    //this is for preset values
    if (!empty($attributes['fontSize'])) {
        $isPreset = true;
        $size = $attributes['fontSize'];
    }

    //then, try to extract from the $attributes['style']['typography']['fontSize'] location
    //this is for custom values
    if (!empty($attributes['style']['typography']['fontSize'])) {
        $size = $attributes['style']['typography']['fontSize'];
    }

    //if neither of the above are available, return an empty string
    return new BlockStyleValue($size, $isPreset);
}