<?php

/*
 * This file is part of Clivern/Event - Event Sourcing SDK for PHP Applications.
 * (c) Clivern <hello@clivern.com>
 */

namespace Clivern\Event\EventDispatcher;

/**
 * Event Listener.
 */
interface EventListenerInterface
{
    /**
     * Adds a listener to an event.
     *
     * @param string   $eventName The event name
     * @param callable $callable  The callable that will be called when the event happens
     */
    public function addListener($eventName, callable $callable);
}
