<?php

namespace Chapterjason\DoctrineReadonlyReproducer\ValueObject;

use Stringable;
use Doctrine\ORM\Mapping as ORM;

abstract class AggregatedRootId implements Stringable
{
    #[ORM\Id]
    #[ORM\Column(name: 'id', type: 'string')]
    public readonly string $value;

    public function __construct(?string $value = null)
    {
        $this->value = $value ?? self::generateId();
    }

    /**
     * @internal Actually you would use something like ulid, but it is not part of the issue.
     */
    public static function generateId(): string
    {
        return uniqid('agri-', true);
    }

    public function __toString()
    {
        return $this->value;
    }
}
