<?php

namespace Oander\Core;

final class App
{
	use Engine;
	use Singleton;
	use Vendors;

	private $sequence = [
		'vendors',
		'engine',
	];

	protected function init(): void
	{
		foreach ($this->sequence as $method) {
			$this->$method();
		}
	}
}
