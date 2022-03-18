<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Documentation extends CI_Controller
{
    public function index()
    {
        $data['sidebar'] = config_sidebar();
        $data['title'] = 'Data User';
        $this->load->view('theme/atlantis/header');
        $this->load->view('theme/atlantis/topbar');
        $this->load->view('theme/atlantis/sidebar', $data);
        $this->load->view('theme/atlantis/content', $data);
        $this->load->view('theme/atlantis/footer');
    }
}
