<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengumuman extends CI_Controller
{

    public function index()
    {
        $data['title'] = 'Event';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['event'] = $this->db->get('event')->result_array();
        $data['event'] = $this->Event_menu->tampilEvent()->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pengumuman/index', $data);
        $this->load->view('templates/footer');
    }
}
