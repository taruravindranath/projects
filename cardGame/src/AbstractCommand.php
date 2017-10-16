<?php

/**
 * AbstractCommand - Set up a base command.
 */

namespace CardGame;

use Pimple\Container;
use Symfony\Component\Console\Command\Command;

abstract class AbstractCommand extends Command
{
    /**
     * @var null|Container
     */
    private $container = null;

    /**
     * @var InputInterface
     */
    protected $input;

    /**
     * @var OutputInterface
     */
    protected $output;

    /**
     * Get an IOC container.
     *
     * @return an IOC container
     */
    protected function getIOC()
    {
        if (is_null($this->container)) {
            $this->container = new Container();
        }

        return $this->container;
    }

    /**
     * Configure logging.
     *
     * Set up the a basic logger.
     */
    protected function initLogger()
    {
        $this->container = $this->getIOC();

        $this->container['logger'] = function ($container) {

            $logger = new \Monolog\Logger($this->getName());
            $logger->pushHandler($this->getLoggerStream());
                
            $logger->pushProcessor(new \Monolog\Processor\IntrospectionProcessor());

            return $logger;
        };
    }

    /**
     * At which log level to log.
     */
    protected function getLoggerLevel()
    {
        return   \Monolog\Logger::DEBUG;
    }

    /**
     * Which stream to use.
     */
    protected function getLoggerStream()
    {

        $filename = 'log_'.date('d-m-Y').'.log';
        return   new \Monolog\Handler\StreamHandler($this->getLoggerDir().'/'.$filename, $this->getLoggerLevel());

    }

    /**
     * Which directory to use.
     */
    protected function getLoggerDir()
    {
        return '/tmp'; 
    }

}
