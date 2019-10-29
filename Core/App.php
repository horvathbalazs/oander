<?php

namespace Oander\Core;

final class App
{
	use Singleton;

	private $sequence = [];

	protected function init(): void
	{
		foreach ($this->sequence as $method) {
			$this->$method();
		}
	}
}
