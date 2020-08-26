<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use phpDocumentor\Reflection\Types\False_;
use PhpOption\None;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function CURL_Request($url, $params, $method){

    	$USERNAME = env("AUTOTASK_USERNAME");
	    $PASSWORD = env("AUTOTASK_PASSWORD");
	    $APICODE = env("AUTOTASK_APICODE");

    	$header = array(
    		'ApiIntegrationCode : '.$APICODE,
    		'UserName : '.$USERNAME,
    		'Secret : '.$PASSWORD,
            'Content-Type: application/json'
    	);

    	// Curl Init
    	$ch = curl_init();

    	// Set Options
    	curl_setopt($ch, CURLOPT_URL, $url);
    	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    	curl_setopt($ch, CURLOPT_HTTPHEADER, $header);

    	if ($method === 'POST') {
    		curl_setopt($ch, CURLOPT_POST, true);
    		curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
    	} else if ($method === 'PUT') {
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PATCH');
//    		curl_setopt($ch, CURLOPT_PUT, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
    	} else if ($method === 'DELETE') {
    		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
    	}

    	// Curl Execute
		$result = curl_exec($ch);
		$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

//		echo $httpCode;
//		dd($result);

		if (curl_error($ch)) {
			print_r(curl_error($ch));
		}

		// Curl Close
		curl_close($ch);

		if ($httpCode == 200) {
			return $result;
		} else {
			return False;
		}
    }

    public function getEditRecord($url, $id) {
        $params = array(
            'search' => '{"MaxRecords":1, "filter":[{"op":"eq", "field": "Id", "value": '.$id.'}]}'
        );

        $editRequest = $url."/query?".http_build_query($params);
        return json_decode($this->CURL_Request($editRequest, "", "GET"))->items[0];
    }
}
