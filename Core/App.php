<?php

namespace Oander\Core;

final class App
{
	use Vendors;
	use Singleton;

	private $sequence = [ 'vendors' ];

	protected function init(): void
	{
		foreach ($this->sequence as $method) {
			$this->$method();
		}
	}
}
