<?php

namespace CardGame\Game;

use CardGame\Game\Card;

class Hand
{
    //array of Cards
    private $hand = [];

    public function display()
    {
        echo "Displaying Hand: \n";
        for ($i = 0; $i < count($this->hand); $i++) {
            echo $this->hand[$i]->display();
        }
    }
    
    public function addCard(Card $card)
    {
        $this->hand[] = $card;
    }

    private function removeCardFromPos($pos)
    {
        if (isset($this->hand[$pos])) {
            unset($this->hand[$pos]);
            return true;
        }
        return false;
    }
    
    public function sortBySuit()
    {
        $totalCardsInHand = $this->getHandSize();
        $currentPos = 0;
        while ($totalCardsInHand > 0) {
            $initialCard = $this->hand[0];
            for ($i = 1; $i < $totalCardsInHand; $i++) {
                $card = $this->hand[$i];
                if ($card.getSuit() < $initialCard->getSuit()
                        || $card.getSuit() == $initialCard->getSuit()
                                && $card.getValue() < $initialCard->getValue()) {
                    $card = $initialCard;
                    $currentPos = $i;
                }
            }
            $this->removeCardFromPos($currentPos);
            $sortedHand[] = $card;
        }
        $this->hand = $sortedHand;
    }

    public function sortByValue()
    {
        $totalCardsInHand = $this->getHandSize();
        while ($totalCardsInHand > 0) {
            $initialCard = $this->hand[0];
            for ($i = 1; $i < $totalCardsInHand; $i++) {
                var_export($totalCardsInHand);
                var_export(count($this->hand));
                var_export($this->hand);
                $card = $this->hand[$i];
                if ($card->getValue() < $initialCard->getValue() ||
                        $card->getValue() == $initialCard->getValue()
                        && $card->getSuit() < $initialCard->getSuit()) {
                    $card = $initialCard;
                    $currentPos = $i;
                }
            }
            $this->removeCardFromPos($currentPos);
            $sortedHand[] = $card;
        }
        $this->hand = $sortedHand;
    }
    
    public function hasStraight(int $length, bool $sameSuit) :bool
    {
        $totalCardsInHand = $this->getHandSize();
        if ($sameSuit) {
            if ($totalCardsInHand >= $length &&
                    $this->flushExists($totalCardsInHand, $length)) {
                return true;
            }
        } else {
            if ($this->straightExists($totalCardsInHand, $length)) {
                return true;
            }
        }
        return false;
    }
    
    private function flushExists($totalCardsInHand, $length) :bool
    {
        for ($initial = 0; $initial <= $totalCardsInHand-$length+1; $initial++) {
            $suit = $this->hand[$initial]->getSuit();
            $value = $this->hand[$initial]->getValue();
            $repeatCount = 1;
            for ($next = $initial+1; $next<$length+$initial; $next++) {
                if ($this->hand[$next]->getSuit() != $suit) {
                    break;
                } elseif ($this->hand[$next]->getValue() != $value+1) {
                    break;
                }
                $repeatCount++;
                if ($repeatCount == $length) {
                    return true;
                }
            }
        }
        return false;
    }
    
    private function straightExists($totalCardsInHand, $length)
    {
        for ($initial = 0; $initial < $totalCardsInHand-$length+1; $initial++) {
            $value = $this->hand[$initial]->getValue();
            $repeatCount = 1;
            for ($next = $initial+1; $next<$length+$initial; $next++) {
                if ($this->hand[$next]->getValue() != $value+1) {
                    break;
                }
                $value++;
                $repeatCount++;    
                if ($repeatCount == $length) {
                    return true;
                }
            }
        }
        return false;
    }
    
    private function getHandSize()
    {
        return count($this->hand);
    }
}
