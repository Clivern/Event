<?php

/*
 * This file is part of Clivern/Event - Event Sourcing SDK for PHP Applications.
 * (c) Clivern <hello@clivern.com>
 */

namespace Clivern\Event\EventBus;

/**
 * Handles dispatched events.
 */
interface EventListenerInterface
{
    public function handle(EventInterface $event);

    /**
     * @return bool
     */
    public function isSubscribedTo(EventInterface $event);
}
