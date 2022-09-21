<?php

namespace Chapterjason\DoctrineReadonlyReproducer\ValueObject;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Embeddable]
final class BookId extends AggregatedRootId
{
}
