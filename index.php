<?php

use Chapterjason\DoctrineReadonlyReproducer\Entity\Book;
use Chapterjason\DoctrineReadonlyReproducer\ValueObject\AggregatedRootId;
use Chapterjason\DoctrineReadonlyReproducer\ValueObject\BookId;

require_once __DIR__ . '/bootstrap.php';

$id = AggregatedRootId::generateId();

// delete previous created books
$queryBuilder = $entityManager->createQueryBuilder()
             ->delete(Book::class, 'b')
         ->where('b.id.value = :book_id')
         ->setParameter('book_id', $id);

$queryBuilder->getQuery()->execute();

// create book
$book = new Book(new BookId($id));

$entityManager->persist($book);
$entityManager->flush();

var_dump($book);

// clear
$book = null;
$entityManager->clear();

// read book
$repository = $entityManager->getRepository(Book::class);

$book = $repository->find($id);

var_dump($book);
