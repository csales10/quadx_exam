<?php
/*
|
| ORDERS ROUTES
|
*/

$router->group(['prefix' => 'order', 'namespace' => 'Orders'], function () use ($router) {
	/* Create Order */
	$router->post('/create', ['uses' => 'OrdersController@create']);
	$router->put('/update', ['uses' => 'OrdersController@update']);
});