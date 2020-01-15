<?php

namespace App\Http\Controllers\Guzzle;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use GuzzleHttp\Client;

class GuzzleRequestController extends Controller
{
    public function executeCall($httpMethod, $apiRoute, $requestParameters)
    {
    	$getRequestParameters	=	($httpMethod == 'GET' ? ($requestParameters != NULL ? '?'. http_build_query($requestParameters) : '') : '');
		$requestParameters	=	($httpMethod == 'GET') ? NULL : $requestParameters;

    	$URL 			=	env('QUADX_API_URL') . $apiRoute . $getRequestParameters;
    	$parameters 	=	[
								'headers' 		=>	['Authorization'	=>	env('AUTHORIZATION_CODE')],
								'exceptions' => false,
								'form_params'	=>	$requestParameters
							];

    	$client 	=	new \GuzzleHttp\Client();
	    $response 	=	$client->request($httpMethod, $URL, $parameters);
	    $response 	=	$response->getBody()->getContents();
	    
	    return $response;
    }

}
