<?php

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;
use Symfony\Component\Cache\Adapter\NullAdapter;

require_once __DIR__ . '/vendor/autoload.php';

$isDevMode = true;
$proxyDir = null;
$cache = new NullAdapter();
$useSimpleAnnotationReader = false;
$config = ORMSetup::createAttributeMetadataConfiguration(array(__DIR__."/src"), $isDevMode, $proxyDir, $cache);

$conn = array(
    'driver' => 'pdo_sqlite',
    'path' => __DIR__ . '/db.sqlite',
);

$entityManager = EntityManager::create($conn, $config);
