<?php
use PHPUnit\Framework\TestCase;
use ReverseText\ReverseText;

class ReverseTextTest extends TestCase
{
	/**
	 * @dataProvider reverseWordsDataProvider
	 */
	public function testReverseWords($input, $expected)
	{
		$result = ReverseText::reverseWords($input);
		$this->assertEquals($expected, $result);
	}

	public function reverseWordsDataProvider()
	{
		return [
			["abcd efgh", "dcba hgfe"],
			["a1bcd efg!h", "d1cba hgf!e"],
			["1234 5678", "1234 5678"],
			["", ""]
		];
	}
}