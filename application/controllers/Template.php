<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Template extends CI_Controller
{
    public function index()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar_coba');
        $this->load->view('templates/navbar');
        $this->load->view('coba/index');
        $this->load->view('templates/footer');
    }
}
