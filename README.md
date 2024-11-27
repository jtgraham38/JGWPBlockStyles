# JGWPBlockStyles
A utility library meant to ease the extraction of style attributes from the $attributes object in block development.

Usage:
```php
//import the class
use jtgraham38\jgwordpressstyle\BlockStyle;

//use a style parser to get the button styles
$style = new BlockStyle($attributes);

//get the font size block supports style value
$fontSize = $style->fontSize();
$fontSizeValue = $fontSize->value;
$fontSizeIsPreset = $fontSize->isPreset;
```
