<?php

/*
 * This file is part of Clivern/Event - Event Sourcing SDK for PHP Applications.
 * (c) Clivern <hello@clivern.com>
 */

namespace Clivern\Tests\EventBus;

use Clivern\Event\EventBus\EventInterface;
use Clivern\Event\EventBus\EventListenerInterface;

class OrderCreatedListener implements EventListenerInterface
{
    private $counter = 0;

    /**
     * {@inheritdoc}
     */
    public function handle(EventInterface $event)
    {
        ++$this->counter;
    }

    /**
     * {@inheritdoc}
     */
    public function isSubscribedTo(EventInterface $event)
    {
        return OrderCreatedEvent::class === \get_class($event);
    }

    /**
     * Get events count.
     */
    public function getCounter(): int
    {
        return $this->counter;
    }
}
