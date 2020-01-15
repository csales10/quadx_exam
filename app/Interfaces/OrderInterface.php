<?php

namespace App\Interfaces;

interface OrderInterface {

	public function execute_api_call($http_method, $api_route, $parameters);
	
}