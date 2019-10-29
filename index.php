<?php

spl_autoload_register(function (string $class): void {
	if (preg_match('/^Oander\\\(App|Core)\\\/', $class)) {
		require_once(preg_replace([ '/^Oander\\\/', '/\\\/' ], [ '', DIRECTORY_SEPARATOR ], $class) . '.php');
	}
});

Oander\Core\App::instance();
