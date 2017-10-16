#!/bin/bash
php vendor/bin/phpunit 
php vendor/bin/phpcs --colors --standard=PSR2 ./src ./tests

