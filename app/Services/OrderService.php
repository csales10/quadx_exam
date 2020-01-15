<?php

namespace App\Services;

use App\Interfaces\OrderInterface;
use App\Services\GuzzleRequestService;

class OrderService implements OrderInterface
{
    public function execute_api_call($http_method, $api_route, $parameters){
		$requestGuzzle		=	new GuzzleRequestService();
		$api_call_executed 	=   $requestGuzzle->executeCall($http_method, $api_route, $parameters);
		
		return $api_call_executed;
	}

}
