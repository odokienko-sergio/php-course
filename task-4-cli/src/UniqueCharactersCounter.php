<?php
namespace ReverseText;

use Psr\SimpleCache\CacheInterface;
use Symfony\Contracts\Cache\CacheInterface as SymfonyCacheInterface;
use Symfony\Contracts\Cache\ItemInterface;

class UniqueCharactersCounter
{
	private $cache;

	public function __construct(SymfonyCacheInterface $cache)
	{
		$this->cache = $cache;
	}

	public function countUniqueCharacters(string $input): int
	{
		return $this->cache->get($input, function (ItemInterface $item) use ($input) {
			$count = 0;
			$charCount = array_count_values(str_split($input));
			foreach ($charCount as $char => $occurrences) {
				if ($occurrences === 1) {
					$count++;
				}
			}
			$item->set($count);
			return $count;
		});
	}
}