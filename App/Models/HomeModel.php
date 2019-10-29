<?php

namespace Oander\App\Models;

use Oander\Core\Model;

trait HomeModel
{
	use Model;

	public function getFeatures(): array
	{
		return json_decode(file_get_contents('App/Data/Features.json'));
	}
}
