# EventBus Component

## Usage

```php
use Clivern\Event\EventBus\EventInterface;
use Clivern\Event\EventBus\EventListenerInterface;
use Clivern\Event\EventBus\EventBus;

class OrderCreatedEvent implements EventInterface
{
    /**
     * @var \DateTime
     */
    private $occurredOn;

    /**
     * SomethingHappened constructor.
     */
    public function __construct(\DateTimeInterface $dateTime = null)
    {
        $this->occurredOn = ($dateTime !== null) ? $dateTime : new \DateTime();
    }

    /**
     * @return \DateTime
     */
    public function occurredOn(): \DateTimeInterface
    {
        return $this->occurredOn;
    }
}

class OrderCreatedListener implements EventListenerInterface
{
    private $counter = 0;

    /**
     * @inheritdoc
     */
    public function handle(EventInterface $event)
    {
        $this->counter++;
    }

    /**
     * @inheritdoc
     */
    public function isSubscribedTo(EventInterface $event)
    {
        return get_class($event) === OrederCreatedEvent::class;
    }

    /**
     * Get events count
     *
     * @return int
     */
    public function getCounter(): int
    {
        return $this->counter;
    }
}

$eventBus = new EventBus();

$listener = new OrderCreatedListener();
$eventBus->subscribe($listener);

$eventBus->publish(new OrderCreatedEvent());
$eventBus->publish(new OrderCreatedEvent());
$eventBus->publish(new OrderCreatedEvent());

$listener->getCounter(); // 3
```
