<?php

namespace Test;

use CardGame\Game\Card;

class CardTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException TypeError
     */
    public function testConstructorForTypeError()
    {
        $card = new Card('sdf', []);
    }

    /**
     * @expectedException Exception
     */
    public function testConstructorForInvalidEntrys()
    {
        $card = new Card(25, 1);
    }
    
    public function testGetSuit()
    {
        $suit = 1;
        $value = 10;
        $card = new Card($suit, $value);
        $expected = 1;
        $this->assertEquals($expected, $card->getSuit());
    }

    public function testGetValue()
    {
        $suit = 1;
        $value = 10;
        $card = new Card($suit, $value);
        $expected = 10;
        $this->assertEquals($expected, $card->getValue());
    }

    public function testDisplay()
    {
        $suit = 1;
        $value = 10;
        $card = new Card($suit, $value);
        $expected = 10;
        $this->assertNull($card->display());
    }
}
