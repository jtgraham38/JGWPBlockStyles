<?php

use jtgraham38\jgwordpressstyle\BlockStyle;
use PHPUnit\Framework\TestCase;

class BlockStyleTest extends TestCase
{
    public function testBlockStyleInitialization()
    {
        //initialize the attributes array
        $attributes = [
            'textColor' => '#123456',
            'backgroundColor' => '#654321',
            'fontSize' => '12px',
            'style' => [
                'color' => [
                    'text' => 'var(--wp--preset--color--text--primary)',
                ],
                'elements' => [
                    'button' => [
                        'color' => [
                            'text' => '#987654',
                            'background' => '#123456'
                        ]
                    ]
                ]
            ]
        ];

        $blockStyle = new BlockStyle($attributes);

        //test the initialization of the block style
        $this->assertInstanceOf(BlockStyle::class, $blockStyle);

        //test the initialization of the block style properties
        $this->assertEquals('var(--wp--preset--color--text--primary)', $blockStyle->textColor()->value);
        $this->assertEquals('#123456', $blockStyle->btnBgColor()->value);
        $this->assertEquals('#987654', $blockStyle->btnTextColor()->value);
        $this->assertEquals('12px', $blockStyle->fontSize()->value);
        $this->assertEquals('#654321', $blockStyle->bgColor()->value);

        //test the getClasses method
        $this->assertEquals('var(--wp--preset--color--text--primary) #123456 jg_block', $blockStyle->getClasses(['textColor', 'btnBgColor'], ['jg_block']) );

        //test the presetVarToClass method
        $this->assertEquals(true, $blockStyle->presetVarToClass('var:preset|color|text', 'has-', '-color') === 'has-text-color');
    }
}