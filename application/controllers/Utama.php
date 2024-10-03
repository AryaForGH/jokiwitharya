<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Halaman Utama</title>
</head>
</html>

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Utama extends CI_Controller {
	
	public function index()
	{
        // header
        $this->load->view('header_utama');

        // dashboard
        $this->load->view('dash_utama');

        // footer
        // $this->load->view('footer');
	}

}