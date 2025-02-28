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
            'borderColor' => '#NOTME!',
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
                        ],
                    'link' => [
                        'color' => [
                            'text' => 'var:color|text'
                        ]
                    ]
                ],
                'spacing' => [
                    'margin' => [
                        'top' => '10px',
                        'right' => '20px',
                        'bottom' => '30px',
                        'left' => '40px'
                    ],
                    'padding' => [
                        'top' => '10px',
                        'right' => '20px',
                        'bottom' => '30px',
                        'left' => '40px'
                    ]
                    ],
                'border' => [
                    'width' => '1px',
                    'radius' => '2px',
                    'color' => '#123456'
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

        //test the margin method
        $this->assertEquals('10px', $blockStyle->margin()['top']->value);
        $this->assertEquals('20px', $blockStyle->margin()['right']->value);
        $this->assertEquals('30px', $blockStyle->margin()['bottom']->value);
        $this->assertEquals('40px', $blockStyle->margin()['left']->value);

        //test the padding method
        $this->assertEquals('10px', $blockStyle->padding()['top']->value);
        $this->assertEquals('20px', $blockStyle->padding()['right']->value);
        $this->assertEquals('30px', $blockStyle->padding()['bottom']->value);
        $this->assertEquals('40px', $blockStyle->padding()['left']->value);

        //test the border methods
        $this->assertEquals('1px', $blockStyle->borderWidth()->value);
        $this->assertEquals('2px', $blockStyle->borderRadius()->value);
        $this->assertEquals('#123456', $blockStyle->borderColor()->value);

        //test link methods
        $this->assertEquals('var:color|text', $blockStyle->linkTextColor()->value);
        $this->assertEquals(true, $blockStyle->linkTextColor()->isPreset);

        //test the getClasses method
        $this->assertEquals('var(--wp--preset--color--text--primary) #123456 jg_block', $blockStyle->getClasses(['textColor', 'btnBgColor'], ['jg_block']) );

        //test the presetVarToClass method
        $this->assertEquals(true, $blockStyle->presetVarToClass('var:preset|color|text', 'has-', '-color') === 'has-text-color');
    }
}