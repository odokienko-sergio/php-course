<?php

use ReverseText\UniqueCharactersCounter;
use Symfony\Component\Cache\Adapter\ArrayAdapter;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;
use Symfony\Component\Cache\Adapter\AdapterInterface;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

require_once 'vendor/autoload.php';

// Create the Symfony Console Application
$application = new Application();

// Add the command to the application
$application->register('app:anagram')
			->addArgument('input', InputArgument::REQUIRED, 'The input string or file path')
			->addOption('file', 'f', InputOption::VALUE_OPTIONAL, 'Input is a file')
			->setDescription('Count the number of unique characters in a string or file')
			->setCode(function (InputInterface $input, OutputInterface $output) {
				$cache = new FilesystemAdapter();
				$counter = new UniqueCharactersCounter($cache);

				$inputValue = $input->getArgument('input');

				if ($input->hasOption('file')) {
					$filePath = $input->getOption('file');
					if (is_string($filePath) && !empty($filePath)) {
						$inputValue = file_get_contents($filePath);
					}
				}

				$uniqueCount = $counter->countUniqueCharacters($inputValue);
				$output->writeln("Unique character count: " . $uniqueCount);
			});

// Run the application
$application->run();
