<?php
namespace ReverseText;

class ReverseText
{
	public static function reverseWords(string $input): string
	{
		$words = explode(' ', $input);
		$reversedWords = array_map(function ($word) {
			preg_match_all('/[a-zA-Z]+/', $word, $letters);
			$letters = str_split(implode('', $letters[0]));
			$letters = array_reverse($letters);
			foreach ($letters as $i => $letter) {
				if (!ctype_alpha($word[$i])) {
					array_splice($letters, $i, 0, $word[$i]);
				}
			}
			return implode('', $letters);
		}, $words);
		return implode(' ', $reversedWords);
	}
}