<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Bitly\BitlyClient;
class Short extends CI_Controller {

	function ShortenUrl()
	{
		$long_url = $this->input->post('url_text');

		$long_url = preg_replace('/^(?!https?:\/\/)/', 'http://', $long_url);

		$bitlyClient = new BitlyClient('3dfd1620524910a60d5a438b094b78928cd6ff94');

		$options = [
			'longUrl' => $long_url,
			'format' => 'json' // pass json, xml or txt
		];

		$response = $bitlyClient->shorten($options);

		if ($response->status_txt=="INVALID_URI") {
			$error_response = array('status_code' => $response->status_code,
									'message' => "Error. Please check your input.");
			echo json_encode($error_response);
		} else {
			if (!empty($response->data->url)) {
				$message = $response->data->url;
			} else {
				$message = "Your URL already shorten";
			}
			$success_response = array('status_code' => $response->status_code,
									'message' => $message);
			echo json_encode($success_response, JSON_UNESCAPED_SLASHES);
		}		
	}

}
