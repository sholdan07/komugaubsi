<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        if ($this->session->userdata('email')) {
            redirect('user');
        }
        $this->load->view('web/index'); //halaman awal dijadikan ke landing page di views web
    }

    public function login()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email'); //mengatur form - email : formatnya, Email : Namanya , trim : untuk menghilangkan charakter yang sesuai dengan persyaratan , Required : artinya harus diisi, valid_email artinya harus diisi sesuai dengan format email selain itu tidak bisa
        $this->form_validation->set_rules('password', 'Password', 'trim|required'); // sama dengan penjelasan diatas hanya berbeda nama dan formatnya, kalo password auto tanda **** 
        if ($this->form_validation->run() == false) { //jika form ini jalan 
            $data['title'] = 'USER LOGIN'; //titlenya USER LOGIN, coba lihat di pop up tulisannya webnya
            $this->load->view('templates/auth_header', $data); // penjelasan ini untuk menapilkan file tampilan website kita yang aslinya yang dibagi menjadi 3
            $this->load->view('auth/login'); // ini form loginnya sama seperti SB Admin 2
            $this->load->view('templates/auth_footer');
        } else {
            // validasinya success
            $this->_login();
        }
    }

    // funsi dari login
    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {
            //usernya aktif
            if ($user['is_active'] == 1) {
                //cek passwordnya
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id']
                    ];
                    $this->session->set_userdata($data);
                    if ($user['role_id'] == 1) { // kalau misalkan dia role 1 itu berarti dia akan masuk ke dashboard admin
                        redirect('admin');
                    } else {
                        //kalau tidak role 1 berarti ke dashboard user
                        redirect('user');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Wrong password </div>'); // kalau dalam login dalam password akan ada pemberitahuan ini 
                    redirect('auth');
                }
            }
        }
    }


    public function registration() // kalau ini form registrasi dan fungsi dari registrasi
    {
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'this email has already registered!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[4]|matches[password2]', [
            'matches' => 'password dont match!',
            'min_leght' => 'password too short'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'USER REGISTRATION';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/registration'); // file ini ada di views sesuai folder disamping
            $this->load->view('templates/auth_footer');
        } else {
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'image' => 'default.jpg', // kalau dia registrasi auto fotonya jadi defaul.jpg
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => 2, // rolenya auto jadi user
                'is_active' => 1, // dan auto aktif
                'date_created' => time() // waktu ini saat dia buat akun tersebut
            ];

            $this->db->insert('user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Congratulation! your account has been created. Please Login </div>'); // pemberitahuan kalau akunnya dah dibuat
            redirect('auth');
        }
    }



    public function logout() // ini fungsi logout dari auth
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            You have been logged out! </div>');
        redirect('auth');
    }
}
