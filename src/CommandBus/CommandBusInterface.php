<?php

/*
 * This file is part of Clivern/Event - Event Sourcing SDK for PHP Applications.
 * (c) Clivern <hello@clivern.com>
 */

namespace Clivern\Event\CommandBus;

/**
 * Dispatches command objects to the subscribed command handlers.
 */
interface CommandBusInterface
{
    /**
     * Dispatches the command to the proper CommandHandler.
     *
     * @param object $command A command that will be dispatched
     */
    public function execute(object $command);
}
