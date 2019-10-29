<?php

namespace Oander\Core;

final class App
{
	use Engine;
	use Minify;
	use Singleton;
	use Vendors;

	private $sequence = [
		'vendors',
		'minify',
		'engine',
	];

	protected function init(): void
	{
		foreach ($this->sequence as $method) {
			$this->$method();
		}
	}
}
