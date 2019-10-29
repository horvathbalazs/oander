<?php

namespace Oander\Core;

use Oander\App\Configuration;

use Twig\Environment;
use Twig\TwigFunction;

use Twig\Loader\FilesystemLoader as Loader;

trait Engine
{
	final private function engine(): void
	{
		$this->environment = new Environment(new Loader(__DIR__ . str_replace('/', DIRECTORY_SEPARATOR, '/../App/Views')));

		$this->environment->addGlobal('cache', Configuration::CACHE ? '' : date('?YmdHis'));

		$this->environment->addFunction(new TwigFunction('dump', function ($variable): void {
			if (Configuration::DEBUG) {
				var_dump($variable);
			}
		}));
	}

	final public function render(
		string $view,
		array $context = []
	): string {
		return $this->environment->render($view . '.twig', $context);
	}
}
