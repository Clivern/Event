# Event Dispatcher Component

## Usage

```php
use Clivern\Event\EventDispatcher\EventDispatcher;
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

$eventDispatcher = new EventDispatcher();

$eventDispatcher->addListener(UserCreatedEvent::class, function (UserCreatedEvent $event) {
    echo $event->occurredOn()->format('Y-m-d H:i:s');
});

$eventDispatcher->dispatch(UserCreatedEvent::class, new UserCreatedEvent());
```
