<?php
namespace ReverseText;

//require_once __DIR__ . '/vendor/autoload.php';
require_once 'vendor/autoload.php';

use ReverseText\ReverseText;
$input = "abcd efgh";
$reversed = ReverseText::reverseWords($input);
echo $reversed . "\n";

$input = "a1bcd efg!h";
$reversed = ReverseText::reverseWords($input);
echo $reversed . "\n";