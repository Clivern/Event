<?php

/*
 * This file is part of Clivern/Event - Event Sourcing SDK for PHP Applications.
 * (c) Clivern <hello@clivern.com>
 */

namespace Clivern\Event\CommandBus;

use Clivern\Event\CommandBus\Exception\MissingHandlerException;

/**
 * CommandBus.
 */
class CommandBus implements CommandBusInterface
{
    /**
     * @var SplQueue
     */
    private $queue;

    /**
     * @var bool
     */
    private $isDispatching = false;

    /**
     * @var HandlerLocatorInterface
     */
    private $handlerLocator;

    /**
     * CommandBus constructor.
     */
    public function __construct(HandlerLocatorInterface $handlerLocator)
    {
        $this->queue = new \SplQueue();
        $this->handlerLocator = $handlerLocator;
    }

    /**
     * {@inheritdoc}
     */
    public function execute(object $command)
    {
        $this->queue->enqueue($command);

        if (!$this->isDispatching) {
            $this->isDispatching = true;
            try {
                while (!$this->queue->isEmpty()) {
                    $this->processCommand($this->queue->pop());
                }
            } finally {
                $this->isDispatching = false;
            }
        }
    }

    private function processCommand(object $command)
    {
        list($handler, $methodName) = $this->handlerLocator->getHandlerForCommand(\get_class($command));

        if (!\is_callable([$handler, $methodName])) {
            throw MissingHandlerException::forCommand(\get_class($command), "Method '{$methodName}' does not exist on handler");
        }

        $object = new $handler();
        $object->$methodName($command);
    }
}
