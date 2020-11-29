<?php

/*
 * This file is part of Clivern/Event - Event Sourcing SDK for PHP Applications.
 * (c) Clivern <hello@clivern.com>
 */

namespace Clivern\Tests\CommandBus;

class CreateUserHandler
{
    public function handle(CreateUser $command)
    {
        // Do your core application logic here!
        echo "User {$command->name} email {$command->email} was created!";
    }
}
