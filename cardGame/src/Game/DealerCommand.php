<?php

namespace CardGame\Game;

use CardGame\Game\Hand;
use CardGame\Game\Deck;
use CardGame\AbstractCommand;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class DealerCommand extends AbstractCommand
{
    private $config;
    
    /**
     * Configures DealerCommand to be called from Symphony Console.
     * Usage- dealer:playGame [players] [rounds]
     */
    protected function configure()
    {
        $this->setName('dealer:playGame');
        $this->setDescription('Plays the Card Game, Enter players(int) and rounds(int)');
        $this->addArguments();
    }
    
    /**
    * Executes all required functions.
    */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->setConfig($input);
        if ($this->isValid($this->config)) {
            $rounds = (int)$this->config['rounds'];
            
            while ($rounds > 0) {
                $i = 0;
                $deck = new Deck();
                $deck->display();
                $deck->shuffle();
                $totalSizeOfDeck = $deck->getTotalCards();
                $players = (int)$this->config['players'];

                while ($players > 0 && $i < $totalSizeOfDeck) {
                    $hands[$i] = new Hand();
                    $hands[$i]->addCard($deck->getCardFromDeck($i));
                    $card = $deck->dealOne();
                    $i++;
                    $players--;
                }
                
                $deck->display();
                $rounds--;
            }
        } else {
            throw new \Exception("Invalid Arguments passed. "
                    . "Please pass integers for [players] and [rounds]");
        }
    }
   
    private function setConfig(InputInterface $input)
    {
        $config['players'] = $input->getArgument('players');
        $config['rounds'] = $input->getArgument('rounds');
        
        $this->config = $config;
    }
   
    private function isValid() :bool
    {
        if ($this->isValidInteger($this->config['players'])
               && $this->isValidInteger($this->config['rounds'])) {
            return true;
        }
        return false;
    }

    /**
     * Returns bool
     */
    private function isValidInteger($value) :bool
    {
        $validator = new \Zend\I18n\Validator\IsInt();
        return $validator->isValid($value);
    }
    
    /**
     * Add Arguments.
     */
    protected function addArguments()
    {
        $this->addArgument(
            'players',
            InputArgument::REQUIRED,
            'Enter the number of players to play card game'
        );
        
        $this->addArgument(
            'rounds',
            InputArgument::REQUIRED,
            'Enter the number of rounds'
        );
    }
}
