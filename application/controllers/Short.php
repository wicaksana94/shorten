<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Bitly\BitlyClient;
class Short extends CI_Controller {

	function ShortenUrl()
	{
		$long_url = $this->input->post('url_text');
		$bitlyClient = new BitlyClient('3dfd1620524910a60d5a438b094b78928cd6ff94');

		$options = [
			'longUrl' => $long_url,
			'format' => 'json' // pass json, xml or txt
		];

		$response = $bitlyClient->shorten($options);

		// echo "<pre>";
		// print_r ($response);
		// echo "</pre>";
		// die();
		echo $response->data->url;
	}

}
