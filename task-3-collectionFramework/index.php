<?php

use ReverseText\UniqueCharactersCounter;
use Symfony\Component\Cache\Adapter\ArrayAdapter;
use Symfony\Contracts\Cache\CacheInterface;
use Symfony\Contracts\Cache\ItemInterface;

require_once 'vendor/autoload.php';

$cache = new ArrayAdapter();
$counter = new UniqueCharactersCounter($cache);

$input = "abbbccdf";
$uniqueCount = $counter->countUniqueCharacters($input);
echo $uniqueCount . "\n";

$input = "a";
$uniqueCount = $counter->countUniqueCharacters($input);
echo $uniqueCount . "\n";
