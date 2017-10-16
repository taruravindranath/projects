<?php

namespace CardGame\Game;

class Card
{
    //suits
    const CLUBS = 0;
    const DIAMONDS = 1;
    const HEARTS = 2;
    const SPADES = 3;

    //values
    const A = 1;
    const J = 11;
    const Q = 12;
    const K = 13;

    private $suit;
    private $value;

    public function __construct(int $suit, int $value)
    {
        $this->suit = $suit;
        $this->value = $value;
        if (!$this->isValid()) {
            throw new \Exception("Invalid Card combination: suit=$suit and value=$value");
        }
    }
    
    public function getSuit()
    {
        return $this->suit;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function display()
    {
        echo "Type of card: ". $this->getPrintableString(). "\n";
    }

    public function getPrintableString()
    {
        return $this->getValueString()." of ".$this->getSuitString();
    }

    public function getSuitString()
    {
        switch ($this->suit) {
            case self::SPADES:
                return "Spades";
            case self::HEARTS:
                return "Hearts";
            case self::DIAMONDS:
                return "Diamonds";
            case self::CLUBS:
                return "Clubs";
            default:
                throw new \Exception("Invalid Suit");
        }
    }

    public function getValueString()
    {
        switch ($this->value) {
            case 1:
                return "A";
            case 2:
                return "2";
            case 3:
                return "3";
            case 4:
                return "4";
            case 5:
                return "5";
            case 6:
                return "6";
            case 7:
                return "7";
            case 8:
                return "8";
            case 9:
                return "9";
            case 10:
                return "10";
            case 11:
                return "J";
            case 12:
                return "Q";
            case 13:
                return "K";
            default:
                throw new \Exception("Invalid value");
        }
    }

    private function isValid() :bool
    {
        if (!$this->isValidSuit() || !$this->isValidValue()) {
            return false;
        }
        return true;
    }
    
    private function isValidSuit() :bool
    {
        if ($this->suit < self::CLUBS || $this->suit > self::SPADES) {
            return false;
        }
        return true;
    }
    
    private function isValidValue() :bool
    {
        if ($this->value < self::A || $this->value > self::K) {
            return false;
        }
        return true;
    }
}
