<?php

/*
 * This file is part of Clivern/Event - Event Sourcing SDK for PHP Applications.
 * (c) Clivern <hello@clivern.com>
 */

namespace Clivern\Event\EventBus;

/**
 * Event Bus.
 */
class EventBus implements EventBusInterface
{
    /**
     * @var array
     */
    private $eventListeners;

    /**
     * @var SplQueue
     */
    private $queue;

    /**
     * @var bool
     */
    private $isPublishing = false;

    /**
     * SimpleEventBus constructor.
     */
    public function __construct()
    {
        $this->queue = new \SplQueue();
        $this->eventListeners = [];
    }

    /**
     * {@inheritdoc}
     */
    public function subscribe(EventListenerInterface $eventListener)
    {
        $this->eventListeners[] = $eventListener;
    }

    /**
     * {@inheritdoc}
     */
    public function publish(EventInterface $event)
    {
        $this->queue->enqueue($event);
        if (!$this->isPublishing && !$this->queue->isEmpty()) {
            $this->isPublishing = true;
            try {
                while (!$this->queue->isEmpty()) {
                    $this->processEvent($this->queue->pop());
                }
            } finally {
                $this->isPublishing = false;
            }
        }
    }

    /**
     * Process Event.
     */
    private function processEvent(EventInterface $event)
    {
        foreach ($this->eventListeners as $key => $eventListener) {
            if ($eventListener->isSubscribedTo($event)) {
                $eventListener->handle($event);
            }
        }
    }
}
