<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Service</title>
</head>
</html>

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Service extends CI_Controller {
	
	public function index()
	{
        // header
        $this->load->view('header');

        // dashboard
        $this->load->view('service');

        // footer
        $this->load->view('footer');
	}

}