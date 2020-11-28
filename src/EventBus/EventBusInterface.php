<?php

/*
 * This file is part of Clivern/Event - Event Sourcing SDK for PHP Applications.
 * (c) Clivern <hello@clivern.com>
 */

namespace Clivern\Event\EventBus;

/**
 * Publishes events to the subscribed event listeners.
 */
interface EventBusInterface
{
    /**
     * Subscribes the event listener to the event bus.
     */
    public function subscribe(EventListenerInterface $eventListener);

    /**
     * Publishes the events from the domain event stream to the listeners.
     */
    public function publish(EventInterface $event);
}
