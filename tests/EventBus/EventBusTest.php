<?php

/*
 * This file is part of Clivern/Event - Event Sourcing SDK for PHP Applications.
 * (c) Clivern <hello@clivern.com>
 */

namespace Clivern\Tests\EventBus;

use Clivern\Event\EventBus\EventBus;
use PHPUnit\Framework\TestCase;

/**
 * EventBus Test Cases.
 */
class EventBusTest extends TestCase
{
    /**
     * @var EventBusInterface
     */
    private $eventBus;

    protected function setUp()
    {
        $this->eventBus = new EventBus();
    }

    public function testSingleEvent()
    {
        $listener = new OrderCreatedListener();
        $this->eventBus->subscribe($listener);

        $this->eventBus->publish(new OrderCreatedEvent());
        $this->eventBus->publish(new OrderCreatedEvent());
        $this->eventBus->publish(new OrderCreatedEvent());
        $this->eventBus->publish(new OrderCancelledEvent());

        $this->assertSame(3, $listener->getCounter());
    }
}
