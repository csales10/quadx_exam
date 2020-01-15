<?php
namespace App\Repositories;

use App\Interfaces\OrderInterface;
use App\Http\Controllers\Guzzle\GuzzleRequestController;

class OrderRepository implements OrderInterface {
	public function execute_api_call($http_method, $api_route, $parameters){
		$requestGuzzle		=	new GuzzleRequestController();
		$api_call_executed 	=   $requestGuzzle->executeCall($http_method, $api_route, $parameters);
		
		return $api_call_executed;
	}
}