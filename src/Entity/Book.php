<?php

namespace Chapterjason\DoctrineReadonlyReproducer\Entity;

use Chapterjason\DoctrineReadonlyReproducer\ValueObject\BookId;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class Book
{
    #[ORM\Embedded(columnPrefix: false)]
    public BookId $id;

    public function __construct(?BookId $id = null)
    {
        $this->id = $id ?? new BookId();
    }
}
