<?php

namespace Oander\Core;

trait Singleton
{
	private static $instance = null;

	final public static function instance(): object
	{
		if (static::$instance === null) {
			static::$instance = new static();
		}

		return static::$instance;
	}

	protected function init(): void
	{
	}

	final private function __construct()
	{
		$this->init();
	}

	final private function __clone()
	{
	}

	final private function __wakeup()
	{
	}
}
