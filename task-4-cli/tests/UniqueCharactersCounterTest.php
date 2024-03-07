<?php

use PHPUnit\Framework\TestCase;
use ReverseText\UniqueCharactersCounter;
use Symfony\Contracts\Cache\CacheInterface;
use Symfony\Contracts\Cache\ItemInterface;

class UniqueCharactersCounterTest extends TestCase
{
	private $cache;

	protected function setUp(): void
	{
		$this->cache = [];
	}

	/**
	 * @dataProvider inputProvider
	 */
	public function testCountUniqueCharacters(string $input, int $expectedCount): void
	{
		$this->cache[$input] = $expectedCount;

		$counter = new UniqueCharactersCounter($this->createMockCache());
		$uniqueCount = $counter->countUniqueCharacters($input);
		$this->assertEquals($expectedCount, $uniqueCount);
	}

	private function createMockCache(): CacheInterface
	{
		$cache = $this->getMockBuilder(CacheInterface::class)
					  ->getMock();

		$cache->method('get')
			  ->willReturnCallback(function (string $key, callable $callback) {
				  $item = $this->getMockBuilder(ItemInterface::class)
							   ->getMock();

				  return $callback($item);
			  });

		return $cache;
	}

	public function inputProvider(): array
	{
		return [
			['abbbccdf', 3],
			['a', 1],
		];
	}
}
