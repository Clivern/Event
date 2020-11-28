<?php

/*
 * This file is part of Clivern/Event - Event Sourcing SDK for PHP Applications.
 * (c) Clivern <hello@clivern.com>
 */

namespace Clivern\Event\EventBus;

/**
 * Event Interface.
 */
interface EventInterface
{
    /**
     * @return \DateTimeImmutable
     */
    public function occurredOn(): \DateTimeInterface;
}
