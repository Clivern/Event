<?php

/*
 * This file is part of Clivern/Event - Event Sourcing SDK for PHP Applications.
 * (c) Clivern <hello@clivern.com>
 */

namespace Clivern\Tests\EventDispatcher;

use Clivern\Event\EventDispatcher\EventDispatcher;
use PHPUnit\Framework\TestCase;

/**
 * EventDispatcher Test Cases.
 */
class EventDispatcherTest extends TestCase
{
    /**
     * @var EventDispatcher
     */
    private $eventDispatcher;

    protected function setUp()
    {
        $this->eventDispatcher = new EventDispatcher();
    }

    public function testEventDispatch()
    {
        $actualEvent = new UserCreatedEvent();

        $this->eventDispatcher->addListener(UserCreatedEvent::class, function (UserCreatedEvent $event) use (
            $actualEvent
        ) {
            $this->assertSame(
                $actualEvent->occurredOn()->format('Y-m-d H:i:s'),
                $event->occurredOn()->format('Y-m-d H:i:s')
            );
        });

        $this->eventDispatcher->dispatch(UserCreatedEvent::class, $actualEvent);
    }
}
