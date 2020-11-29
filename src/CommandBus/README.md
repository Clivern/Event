# CommandBus Component

## Usage

```php
use Clivern\Event\CommandBus\CommandBus;
use Clivern\Event\CommandBus\HandlerLocator;

class CreateUser
{
    public $name;
    public $email;
}

class CreateUserHandler
{
    public function handle(CreateUser $command)
    {
        // Do your core application logic here!
        echo "User {$command->name} email {$command->email} was created!";
    }
}

$commandBus = new CommandBus(new HandlerLocator());

$command = new CreateUser();
$command->name = 'clivern';
$command->email = 'test@clivern.com';

$commandBus->execute($command);
```
