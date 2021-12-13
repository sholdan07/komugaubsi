<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

	public function index()
	{
		$data['title'] = 'My Profile'; // db artinya database
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(); // ini user didapatkan dari database

		$this->load->view('templates/header', $data); // filenya ada di views sesuai foldernya masing2
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('user/index', $data); // nah ini file views utama dari controllers User
		$this->load->view('templates/footer');
	}


	// function untuk edit user
	public function edit()
	{
		$data['title'] = 'Edit Profile';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('name', 'Full Name', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('user/edit', $data); // ini file editnya 
			$this->load->view('templates/footer');
		} else {
			$name = $this->input->post('name');
			$email = $this->input->post('email');


			// cek jika sudah ada gambar yang akan diupload
			$upload_image = $_FILES['image']['name'];

			if ($upload_image) {
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['max_size']     = '2048';
				$config['upload_path'] = './assets/img/profile/';
				$this->load->library('upload', $config);

				if ($this->upload->do_upload('image')) {
					$old_image = $data['user']['image'];
					if ($old_image != 'default.jpg') {
						unlink(FCPATH . 'assets/img/profile/' . $old_image);
					}

					$new_image = $this->upload->data('file_name');
					$this->db->set('image', $new_image);
				} else {
					echo $this->upload->display_errors();
				}
			}
			$this->db->set('name', $name);
			$this->db->where('email', $email);
			$this->db->update('user'); // ini artinya dia akan update database user
			$this->session->set_flashdata('message', '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Success!</strong> Profile Berhasil Di ubah!</div>'); //ini kek pesan apabila udah klik button "Edit"
			redirect('user/index'); //kalo dah di klik buttonnya auto halaman user/index
		}
	}

	//fungsi untuk change password apabila sudah masuk ke menu dasboard member/admin
	public function changePassword()
	{
		$data['title'] = 'Change Password';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('current_password', 'Current Password', 'required|trim'); // ini untuk password yang sebelumnya
		$this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[3]|matches[new_password2]'); // ini New Password terus minimal 3 huruf harus sama dengan confirm password dibawah ini dan wajib diisi
		$this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[3]|matches[new_password1]'); // sama penjelasan kek diatas, semuanya kalo ga diisi akan error makanya dimasukkan required

		if ($this->form_validation->run() == false) {

			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('user/changepassword', $data); // ini adalah halaman apabila ingin Change password 
			$this->load->view('templates/footer');
		} else {
			$current_password = $this->input->post('current_password'); // penjelasannya simpel aja kalau ini gunanya form_validation logikanya
			$new_password = $this->input->post('new_password1');
			if (!password_verify($current_password, $data['user']['password'])) {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong current password!</div>'); // ini kalau password sebelumnya tidak sama 
				redirect('user/changepassword'); // maka akan dibalikkan ke halaman ini
				if ($current_password == $new_password) {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">New password cannot be the same as current password!</div>'); // ini kalau passwordnya sama dengan password sebelumnya
					redirect('user/changepassword');
				} else {
					// password sudah ok
					$password_hash = password_hash($new_password, PASSWORD_DEFAULT);

					$this->db->set('password', $password_hash);
					$this->db->where('email', $this->session->userdata('email'));
					$this->db->update('user');

					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password changed!</div>');
					redirect('user/changepassword');
				}
			}
		}
	}
}
