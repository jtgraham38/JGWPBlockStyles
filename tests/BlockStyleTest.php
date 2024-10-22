<?php

use jtgraham38\jgwordpressstyle\BlockStyle;
use PHPUnit\Framework\TestCase;

class BlockStyleTest extends TestCase
{
    public function testBlockStyleInitialization()
    {
        $attributes = array(
            'textColor' => 'var(--wp--preset--color--text--primary)',
            'style' => array(
                'color' => array(
                    'text' => 'var(--wp--preset--color--text--primary)',
                ),
                'elements' => array(
                    'button' => array(
                        'color' => array(
                            'background' => 'var(--wp--preset--color--background--primary)',
                        ),
                    ),
                ),
            ),
        );

        $blockStyle = new BlockStyle($attributes);

        //test the initialization of the block style
        $this->assertInstanceOf(BlockStyle::class, $blockStyle);

        //test the initialization of the block style properties
        $this->assertEquals('var(--wp--preset--color--text--primary)', $blockStyle->textColor()->value);
        $this->assertEquals('var(--wp--preset--color--background--primary)', $blockStyle->btnBgColor()->value);
        $this->assertEquals('', $blockStyle->btnTextColor()->value);
        $this->assertEquals('', $blockStyle->fontSize()->value);

        //test the getClasses method
        $this->assertEquals(true, $blockStyle->getClasses(['textColor', 'btnBgColor'], ['jg_block']) === 'var(--wp--preset--color--text--primary) var(--wp--preset--color--background--primary) jg_block');

        //test the presetVarToClass method
        $this->assertEquals(true, $blockStyle->presetVarToClass('var:preset|color|text', 'has-', '-color') === 'has-text-color');
    }
}