<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Profile</title>
</head>
</html>

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
	
	public function index()
	{
        // header
        $this->load->view('header');
        

        // dashboard
        $this->load->view('profile');

        // footer
        $this->load->view('footer');
	}

}