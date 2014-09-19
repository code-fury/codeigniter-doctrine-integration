<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class MY_BaseController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

    }

    public function index($data=null)
    {
        $this->load->view("header");
        $this->load->view("index",$data);
        $this->load->view("footer");
    }

    public function load_header()
    {
        $this->load->view("header");
    }

    public function load_footer()
    {
        $this->load->view("footer");
    }

}