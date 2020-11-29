<?php

/*
 * This file is part of Clivern/Event - Event Sourcing SDK for PHP Applications.
 * (c) Clivern <hello@clivern.com>
 */

namespace Clivern\Tests\EventDispatcher;

use Clivern\Event\EventBus\EventInterface;

class UserCreatedEvent implements EventInterface
{
    /**
     * @var \DateTime
     */
    private $occurredOn;

    /**
     * UserCreatedEvent constructor.
     */
    public function __construct(\DateTimeInterface $dateTime = null)
    {
        $this->occurredOn = (null !== $dateTime) ? $dateTime : new \DateTime();
    }

    /**
     * @return \DateTime
     */
    public function occurredOn(): \DateTimeInterface
    {
        return $this->occurredOn;
    }
}
