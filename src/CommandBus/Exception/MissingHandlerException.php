<?php

/*
 * This file is part of Clivern/Event - Event Sourcing SDK for PHP Applications.
 * (c) Clivern <hello@clivern.com>
 */

namespace Clivern\Event\CommandBus\Exception;

/**
 * No handler could be found for the given command.
 */
class MissingHandlerException extends \Exception
{
    /**
     * @var string
     */
    private $commandName;

    /**
     * @return static
     */
    public static function forCommand(string $commandName)
    {
        $exception = new static('Missing handler for command '.$commandName);
        $exception->commandName = $commandName;

        return $exception;
    }

    public function getCommandName(): string
    {
        return $this->commandName;
    }
}
