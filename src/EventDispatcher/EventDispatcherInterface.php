<?php

/*
 * This file is part of Clivern/Event - Event Sourcing SDK for PHP Applications.
 * (c) Clivern <hello@clivern.com>
 */

namespace Clivern\Event\EventDispatcher;

/**
 * Event Dispatcher.
 */
interface EventDispatcherInterface
{
    /**
     * Dispatches an event.
     *
     * @param string $eventName    The name of the event
     * @param array  ...$arguments
     */
    public function dispatch($eventName, ...$arguments);
}
