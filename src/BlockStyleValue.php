<?php
namespace jtgraham38\jgwordpressstyle;

/**
 * Represents a block style value.
 */
class BlockStyleValue{
    //fields
    public ?string $value = "";
    public bool $isPreset = false;

    //constructor
    function __construct($value, $isPreset){
        $this->value = $value ?? "";    //empty string to ensure string compatibility
        $this->isPreset = $isPreset;
    }
}