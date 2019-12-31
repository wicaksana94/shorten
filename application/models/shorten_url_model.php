<?php

class Shorten_url_model extends CI_Model {

    function save_long_url($data)
    {
    	$this->db->insert('url', $data);
    }

    function get_long_url($short_url='')
    {
    	$this->db->select('long_url');
        $this->db->like('short_url', $short_url, 'BOTH');
        $long_url = $this->db->get('url', 1)->row('long_url');

    	return $long_url;

    	// return '/error_404';
    }

}