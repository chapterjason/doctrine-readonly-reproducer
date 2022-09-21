
# Doctrine readonly reproducer

This reproducer shows the issue with doctrine and php readonly properties.

## Setup

```bash
composer install
php bin/doctrine orm:schema-tool:create
```

## Reproduce

```bash
php index.php
```

## Expected

It works just fine and the book will hydrate correctly with the id.

## Actual

The book will not hydrate correctly and the following error will be thrown:

```
object(Chapterjason\DoctrineReadonlyReproducer\Entity\Book)#34 (1) {
  ["id"]=>
  object(Chapterjason\DoctrineReadonlyReproducer\ValueObject\BookId)#40 (1) {
    ["value"]=>
    string(28) "agri-632b6cb768af33.20845689"
  }
}
PHP Fatal error:  Uncaught Error: Cannot initialize readonly property Chapterjason\DoctrineReadonlyReproducer\ValueObject\AggregatedRootId::$value from scope Chapterjason\DoctrineReadonlyReproducer\ValueObject\BookId in /[...]/doctrine-readonly-reproducer/vendor/doctrine/persistence/src/Persistence/Reflection/RuntimePublicReflectionProperty.php:59
Stack trace:
#0 /[...]/doctrine-readonly-reproducer/vendor/doctrine/persistence/src/Persistence/Reflection/RuntimePublicReflectionProperty.php(59): ReflectionProperty->setValue(Object(Chapterjason\DoctrineReadonlyReproducer\ValueObject\BookId), 'agri-632b6cb768...')
#1 /[...]/doctrine-readonly-reproducer/vendor/doctrine/persistence/src/Persistence/Reflection/TypedNoDefaultReflectionPropertyBase.php(64): Doctrine\Persistence\Reflection\RuntimePublicReflectionProperty->setValue(Object(Chapterjason\DoctrineReadonlyReproducer\ValueObject\BookId), 'agri-632b6cb768...')
#2 /[...]/doctrine-readonly-reproducer/vendor/doctrine/orm/lib/Doctrine/ORM/Mapping/ReflectionReadonlyProperty.php(40): Doctrine\Persistence\Reflection\TypedNoDefaultRuntimePublicReflectionProperty->setValue(Object(Chapterjason\DoctrineReadonlyReproducer\ValueObject\BookId), 'agri-632b6cb768...')
#3 /[...]/doctrine-readonly-reproducer/vendor/doctrine/orm/lib/Doctrine/ORM/Mapping/ReflectionEmbeddedProperty.php(81): Doctrine\ORM\Mapping\ReflectionReadonlyProperty->setValue(Object(Chapterjason\DoctrineReadonlyReproducer\ValueObject\BookId), 'agri-632b6cb768...')
#4 /[...]/doctrine-readonly-reproducer/vendor/doctrine/orm/lib/Doctrine/ORM/UnitOfWork.php(2753): Doctrine\ORM\Mapping\ReflectionEmbeddedProperty->setValue(Object(Chapterjason\DoctrineReadonlyReproducer\Entity\Book), 'agri-632b6cb768...')
#5 /[...]/doctrine-readonly-reproducer/vendor/doctrine/orm/lib/Doctrine/ORM/Internal/Hydration/SimpleObjectHydrator.php(156): Doctrine\ORM\UnitOfWork->createEntity('Chapterjason\\Do...', Array, Array)
#6 /[...]/doctrine-readonly-reproducer/vendor/doctrine/orm/lib/Doctrine/ORM/Internal/Hydration/SimpleObjectHydrator.php(63): Doctrine\ORM\Internal\Hydration\SimpleObjectHydrator->hydrateRowData(Array, Array)
#7 /[...]/doctrine-readonly-reproducer/vendor/doctrine/orm/lib/Doctrine/ORM/Internal/Hydration/AbstractHydrator.php(270): Doctrine\ORM\Internal\Hydration\SimpleObjectHydrator->hydrateAllData()
#8 /[...]/doctrine-readonly-reproducer/vendor/doctrine/orm/lib/Doctrine/ORM/Persisters/Entity/BasicEntityPersister.php(758): Doctrine\ORM\Internal\Hydration\AbstractHydrator->hydrateAll(Object(Doctrine\DBAL\Result), Object(Doctrine\ORM\Query\ResultSetMapping), Array)
#9 /[...]/doctrine-readonly-reproducer/vendor/doctrine/orm/lib/Doctrine/ORM/Persisters/Entity/BasicEntityPersister.php(768): Doctrine\ORM\Persisters\Entity\BasicEntityPersister->load(Array, NULL)
#10 /[...]/doctrine-readonly-reproducer/vendor/doctrine/orm/lib/Doctrine/ORM/EntityManager.php(521): Doctrine\ORM\Persisters\Entity\BasicEntityPersister->loadById(Array)
#11 /[...]/doctrine-readonly-reproducer/vendor/doctrine/orm/lib/Doctrine/ORM/EntityRepository.php(199): Doctrine\ORM\EntityManager->find('Chapterjason\\Do...', Array, NULL, NULL)
#12 /[...]/doctrine-readonly-reproducer/index.php(34): Doctrine\ORM\EntityRepository->find('agri-632b6cb768...')
#13 {main}
  thrown in /[...]/doctrine-readonly-reproducer/vendor/doctrine/persistence/src/Persistence/Reflection/RuntimePublicReflectionProperty.php on line 59

Fatal error: Uncaught Error: Cannot initialize readonly property Chapterjason\DoctrineReadonlyReproducer\ValueObject\AggregatedRootId::$value from scope Chapterjason\DoctrineReadonlyReproducer\ValueObject\BookId in /[...]/doctrine-readonly-reproducer/vendor/doctrine/persistence/src/Persistence/Reflection/RuntimePublicReflectionProperty.php:59
Stack trace:
#0 /[...]/doctrine-readonly-reproducer/vendor/doctrine/persistence/src/Persistence/Reflection/RuntimePublicReflectionProperty.php(59): ReflectionProperty->setValue(Object(Chapterjason\DoctrineReadonlyReproducer\ValueObject\BookId), 'agri-632b6cb768...')
#1 /[...]/doctrine-readonly-reproducer/vendor/doctrine/persistence/src/Persistence/Reflection/TypedNoDefaultReflectionPropertyBase.php(64): Doctrine\Persistence\Reflection\RuntimePublicReflectionProperty->setValue(Object(Chapterjason\DoctrineReadonlyReproducer\ValueObject\BookId), 'agri-632b6cb768...')
#2 /[...]/doctrine-readonly-reproducer/vendor/doctrine/orm/lib/Doctrine/ORM/Mapping/ReflectionReadonlyProperty.php(40): Doctrine\Persistence\Reflection\TypedNoDefaultRuntimePublicReflectionProperty->setValue(Object(Chapterjason\DoctrineReadonlyReproducer\ValueObject\BookId), 'agri-632b6cb768...')
#3 /[...]/doctrine-readonly-reproducer/vendor/doctrine/orm/lib/Doctrine/ORM/Mapping/ReflectionEmbeddedProperty.php(81): Doctrine\ORM\Mapping\ReflectionReadonlyProperty->setValue(Object(Chapterjason\DoctrineReadonlyReproducer\ValueObject\BookId), 'agri-632b6cb768...')
#4 /[...]/doctrine-readonly-reproducer/vendor/doctrine/orm/lib/Doctrine/ORM/UnitOfWork.php(2753): Doctrine\ORM\Mapping\ReflectionEmbeddedProperty->setValue(Object(Chapterjason\DoctrineReadonlyReproducer\Entity\Book), 'agri-632b6cb768...')
#5 /[...]/doctrine-readonly-reproducer/vendor/doctrine/orm/lib/Doctrine/ORM/Internal/Hydration/SimpleObjectHydrator.php(156): Doctrine\ORM\UnitOfWork->createEntity('Chapterjason\\Do...', Array, Array)
#6 /[...]/doctrine-readonly-reproducer/vendor/doctrine/orm/lib/Doctrine/ORM/Internal/Hydration/SimpleObjectHydrator.php(63): Doctrine\ORM\Internal\Hydration\SimpleObjectHydrator->hydrateRowData(Array, Array)
#7 /[...]/doctrine-readonly-reproducer/vendor/doctrine/orm/lib/Doctrine/ORM/Internal/Hydration/AbstractHydrator.php(270): Doctrine\ORM\Internal\Hydration\SimpleObjectHydrator->hydrateAllData()
#8 /[...]/doctrine-readonly-reproducer/vendor/doctrine/orm/lib/Doctrine/ORM/Persisters/Entity/BasicEntityPersister.php(758): Doctrine\ORM\Internal\Hydration\AbstractHydrator->hydrateAll(Object(Doctrine\DBAL\Result), Object(Doctrine\ORM\Query\ResultSetMapping), Array)
#9 /[...]/doctrine-readonly-reproducer/vendor/doctrine/orm/lib/Doctrine/ORM/Persisters/Entity/BasicEntityPersister.php(768): Doctrine\ORM\Persisters\Entity\BasicEntityPersister->load(Array, NULL)
#10 /[...]/doctrine-readonly-reproducer/vendor/doctrine/orm/lib/Doctrine/ORM/EntityManager.php(521): Doctrine\ORM\Persisters\Entity\BasicEntityPersister->loadById(Array)
#11 /[...]/doctrine-readonly-reproducer/vendor/doctrine/orm/lib/Doctrine/ORM/EntityRepository.php(199): Doctrine\ORM\EntityManager->find('Chapterjason\\Do...', Array, NULL, NULL)
#12 /[...]/doctrine-readonly-reproducer/index.php(34): Doctrine\ORM\EntityRepository->find('agri-632b6cb768...')
#13 {main}
  thrown in /[...]/doctrine-readonly-reproducer/vendor/doctrine/persistence/src/Persistence/Reflection/RuntimePublicReflectionProperty.php on line 59
```
