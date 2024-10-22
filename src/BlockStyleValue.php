<?php
namespace jtgraham38\jgwordpressstyle\BlockStyleValue;

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Represents a block style value.
 */
class BlockStyleValue{
    //fields
    public string $value = "";
    public bool $isPreset = false;

    //constructor
    function __construct($value, $isPreset){
        $this->value = $value;
        $this->isPreset = $isPreset;
    }
}