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

	public function dispatch(
		string $controller,
		string $action = 'index'
	): void {
		$class = sprintf('Oander\App\Controllers\%sController', $controller);

		if (class_exists($class)) {
			foreach ([ 'before', $action, 'after' ] as $method) {
				$class::instance()->$method();
			}
		}
	}
}
