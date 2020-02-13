<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    /**
     * Auth class constructor.
     */
    public function __construct()
    {
        parent::__construct();

        $this->load->model([
            'user_model'
        ]);
    }

    /**
     * Show user login form.
     *
     * @return void
     */
    public function login()
    {
        // Redirect user if already logged in
        if ($this->session->userdata('loggedIn')) {
            redirect('dashboard');
        }

        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == TRUE) {
            $request = $this->security->xss_clean($this->input->post());
            $this->loginUser($request);
        }

        $this->load->view('auth/login');
    }

    /**
     * Logged out user.
     *
     * @return void
     */
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('/');
    }

    /**
     * Loggged in user.
     *
     * @param array $request Post request data.
     * @return void
     */
    private function loginUser(array $request)
    {
        $user = [
            'username' => $request['username'],
            'password' => md5($request['password']),
        ];

        $checkUser = $this->checkUser($user);

        if ($checkUser->num_rows() > 0) {
            $this->session->set_userdata('loggedIn', TRUE);
            $this->session->set_userdata('user', $checkUser->row());
            redirect('dashboard');
        }
    }

    /**
     * Check if user exist in database.
     *
     * @param array $user Array contains username and password.
     * @return object
     */
    private function checkUser(array $user)
    {
        return $this->user_model->login($user);
    }
}

/* End of file Auth.php */
