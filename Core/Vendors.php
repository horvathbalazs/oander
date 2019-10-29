<?php

namespace Oander\Core;

trait Vendors
{
	final private function vendors(): void
	{
		require_once(__DIR__ . str_replace('/', DIRECTORY_SEPARATOR, '/../Vendors/autoload.php'));
	}
}
