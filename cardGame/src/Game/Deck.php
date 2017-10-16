<?php

namespace CardGame\Game;

use CardGame\Game\Card;

class Deck
{
    
    CONST SUITS = ["Clubs", "Diamonds", "Hearts", "Spades"];
    CONST RANKS = ["2", "3", "4", "5", "6", "7", "8", "9", "10",
     "J", "Q", "K", "A"];
    CONST RANK_OF_A = 1;
    CONST IS_DEALT = 1;
    CONST IS_NOT_DEALT = 0;

    private $deck;
    private $dealt;
    private $totalCards;
    private $counterForDealt = 0;

    public function __construct()
    {
        $this->totalCards = $this->getTotalCards();

        $current = 0;
        for($suit = 0; $suit < count(self::SUITS); $suit++) {
            for ($value = self::RANK_OF_A; $value <= count(self::RANKS); $value++) {
                $this->deck[$current] = new Card($suit, $value);
                $this->dealt[$current] = self::IS_NOT_DEALT;
                $current++;
            }
        }
    }

    public function dealOne()
    {
        if ($this->counterForDealt == count($this->deck)) {
            throw new \Exception("Deck is Empty, no more cards available");
        }
        $this->counterForDealt++;
        
        $this->dealt[$this->counterForDealt -1] = self::IS_DEALT;
        return $this->deck[$this->counterForDealt - 1];
    }

    public function display()
    {
        $dealtList = [];
        $nonDealtList = [];
        for ($current = 0; $current < count($this->deck); $current++) {
            if ($this->dealt[$current]) {
                $dealtList[] = $this->deck[$current]->getPrintableString();
            } else {
                $nonDealtList[] = $this->deck[$current]->getPrintableString();
            }
        }
        echo "\n";
        echo "Non Dealt Cards: [".implode(',', $nonDealtList)."] \n";
        echo "\n";
        echo "Dealt Cards: [".implode(',', $dealtList)."] \n";
    }

    public function shuffle()
    {
        for ($i = 0; $i < $this->totalCards; $i++) {
            $random = mt_rand(0,$this->totalCards -1);
            //swap with random card
            $temp = $this->deck[$random];
            $this->deck[$random] = $this->deck[$i];
            $this->deck[$i] = $temp;
        }
    }

    public function getFullDeck()
    {
        return $this->deck;
    }
    
    public function getCardFromDeck(int $index)
    {
        return $this->deck[$index];
    }
    
    public function getTotalCards() :int
    {
        return count(self::SUITS) * count(self::RANKS);
    }
    
}
