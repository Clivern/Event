<?php

/*
 * This file is part of Clivern/Event - Event Sourcing SDK for PHP Applications.
 * (c) Clivern <hello@clivern.com>
 */

namespace Clivern\Event\CommandBus;

/**
 * Service locator for handler objects.
 */
interface HandlerLocatorInterface
{
    /**
     * Retrieves the handler for a specified command.
     */
    public function getHandlerForCommand(string $commandName): array;
}
