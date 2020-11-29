<?php

/*
 * This file is part of Clivern/Event - Event Sourcing SDK for PHP Applications.
 * (c) Clivern <hello@clivern.com>
 */

namespace Clivern\Tests\CommandBus;

use Clivern\Event\CommandBus\CommandBus;
use Clivern\Event\CommandBus\HandlerLocator;
use PHPUnit\Framework\TestCase;

/**
 * CommandBus Test Cases.
 */
class CommandBusTest extends TestCase
{
    /**
     * @var CommandBusInterface
     */
    private $commandBus;

    protected function setUp()
    {
        $this->commandBus = new CommandBus(new HandlerLocator());
    }

    public function testExecuteCommand()
    {
        $command = new CreateUser();
        $command->name = 'clivern';
        $command->email = 'test@clivern.com';
        $this->expectOutputString('User clivern email test@clivern.com was created!');
        $this->commandBus->execute($command);
        $this->assertSame(3, 3);
    }
}
