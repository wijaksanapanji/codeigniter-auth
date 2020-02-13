<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    /**
     * Dashboard class constructor.
     */
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('loggedIn')) {
            redirect('/');
        }
    }

    /**
     * Show user dashboard.
     *
     * @return void
     */
    public function index()
    {
        $this->load->view('dashboard/index');
    }
}

/* End of file Dashboard.php */
