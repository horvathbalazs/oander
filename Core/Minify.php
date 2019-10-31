<?php

namespace Oander\Core;

use Oander\App\Configuration;

trait Minify
{
	final private function minify(): void
	{
		if (Configuration::MINIFY) {
			ob_start($minify = function (string $buffer) use (& $minify): string {
				if (mb_stristr($buffer = str_replace([ '  ', "\t", PHP_EOL ], [ ' ', '' ], $buffer), '  ') !== false) {
					return $minify($buffer);
				}

				return $buffer;
			});
		}
	}
}
