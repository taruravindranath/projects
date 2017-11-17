<?php
/**
 * Configure Autoloading, commands
 * Create Card Game App
 *
 */
require_once __DIR__.'/../vendor/autoload.php';
function main()
{
    $console = new Symfony\Component\Console\Application('APP', '0.3.0');
    $commands = [
        new CardGame\Game\DealerCommand(),
     ];
    $console->addCommands($commands);
    $console->run();
}
main();
