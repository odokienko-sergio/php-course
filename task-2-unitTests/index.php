<?php
namespace ReverseText;

require_once 'vendor/autoload.php';

$input = "abcd efgh";
$reversed = ReverseText::reverseWords($input);
echo $reversed . "\n";

$input = "a1bcd efg!h";
$reversed = ReverseText::reverseWords($input);
echo $reversed . "\n";