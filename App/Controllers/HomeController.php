<?php

namespace Oander\App\Controllers;

use Oander\App\Models\HomeModel;

use Oander\Core\App;
use Oander\Core\Controller;

final class HomeController
{
	use Controller;
	use HomeModel;

	public function index(): void
	{
		echo(App::instance()->render('Home/Index', [
			'articles' => $this->getArticles(),
			'features' => $this->getFeatures(),
		]));
	}
}
