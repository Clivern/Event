<?php

/*
 * This file is part of Clivern/Event - Event Sourcing SDK for PHP Applications.
 * (c) Clivern <hello@clivern.com>
 */

namespace Clivern\Event\EventDispatcher;

/**
 * Event Dispatcher Implementation.
 */
class EventDispatcher implements EventDispatcherInterface, EventListenerInterface
{
    /**
     * @var array
     */
    private $listeners;

    /**
     * EventDispatcher constructor.
     */
    public function __construct()
    {
        $this->listeners = [];
    }

    /**
     * {@inheritdoc}
     */
    public function dispatch($eventName, ...$arguments)
    {
        if (!isset($this->listeners[$eventName])) {
            return;
        }

        foreach ($this->listeners[$eventName] as $listener) {
            $listener(...$arguments);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function addListener($eventName, callable $callable)
    {
        $this->listeners[$eventName][] = $callable;
    }
}
