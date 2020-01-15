<?php

namespace App\Interfaces;

use App\Services\OrderService;

interface OrderInterface {

	public function execute_api_call($http_method, $api_route, $parameters);
	
}