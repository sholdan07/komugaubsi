<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
	public function index()
	{
		$data['title'] = 'Menu Management';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data['menu'] = $this->db->get('user_menu')->result_array(); // mengambil data dari database dengan nama table user_menu


		$this->form_validation->set_rules('menu', 'Menu', 'required');


		if ($this->form_validation->run() == false) {

			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('menu/index', $data); // ini halaman utama dari Controllers menu
			$this->load->view('templates/footer');
		} else {
			$this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
			$this->session->set_flashdata('message', '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a>Menu Berhasil Di Tambah</div></div');
			redirect('menu');
		}
	}

	//function edit Menu
	public function editMenu($id)
	{
		$where = ['id' => $id];
		$data['title'] = 'Menu Management';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->model('Menu_model', 'menu');

		$data['menu'] = $this->menu->getEditMenu($where, 'user_menu')->result_array();

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('Menu/editMenu', $data);
			$this->load->view('templates/footer');
		}
	}

	//fungsi update menu
	public function updateMenu()
	{
		$this->load->model('Menu_model', 'update');

		$id = $this->input->post('id');
		$menu = $this->input->post('menu');

		$data = [
			'menu' => $menu
		];

		$where = [
			'id' => $id
		];

		$this->update->getUpdateMenu($where, $data, 'user_menu');
		$this->session->set_flashdata('message', '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a> Menu Berhasil Di Update</div>');
		redirect('menu/index');
	}

	// function untuk hapus Menu
	public function hapusMenu($id)
	{
		$where = ['id' => $id];
		$this->load->model('Menu_model', $where);

		$this->db->delete('user_menu', $where);
		$this->session->set_flashdata('message', '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a> Menu Berhasil Di Hapus</div>');
		redirect('Menu');
	}

	//fungsi untuk sub menu
	public function submenu()
	{
		$data['title'] = 'Submenu Management';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->model('Menu_model', 'menu');

		$data['subMenu'] = $this->menu->getSubMenu();
		$data['menu'] = $this->db->get('user_menu')->result_array();

		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('menu_id', 'Menu', 'required');
		$this->form_validation->set_rules('url', 'URL', 'required');
		$this->form_validation->set_rules('icon', 'icon', 'required');


		if ($this->form_validation->run() ==  false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('menu/submenu', $data);
			$this->load->view('templates/footer');
		} else {
			$data = [
				'title' => $this->input->post('title'),
				'menu_id' => $this->input->post('menu_id'),
				'url' => $this->input->post('url'),
				'icon' => $this->input->post('icon'),
				'is_active' => $this->input->post('is_active')
			];
			$this->db->insert('user_sub_menu', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a> Sub Menu Berhasil Di Tambah</div></div');
			redirect('menu/submenu');
		}
	}


	// fungsi edit sub menu
	public function editSubMenu($id)
	{
		$where = ['id' => $id];
		$data['title'] = 'Sub Menu Management';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->model('Menu_model', 'subMenu');

		$data['subMenu'] = $this->subMenu->getEditSubMenu($where, 'user_sub_menu')->result_array();

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('Menu/editSubMenu', $data);
			$this->load->view('templates/footer');
		}
	}

	//fungsi update sub menu
	public function updateSubMenu()
	{
		$this->load->model('Menu_model', 'update');

		$id = $this->input->post('id');
		$title = $this->input->post('title');
		$link = $this->input->post('url');
		$icon = $this->input->post('icon');

		$data = [
			'title' => $title,
			'url' => $link,
			'icon' => $icon
		];

		$where = [
			'id' => $id
		];

		$this->update->getUpdateSubMenu($where, $data, 'user_sub_menu');
		$this->session->set_flashdata('message', '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a> Sub Menu Berhasil Di Update</div></div');
		redirect('Menu/submenu');
	}

	// function untuk hapus Sub Menu
	public function hapusSubMenu($id)
	{
		$where = ['id' => $id];
		$this->load->model('Menu_model', $where);

		$this->db->delete('user_sub_menu', $where);
		$this->session->set_flashdata('message', '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a> Sub Menu Berhasil Di Hapus</div>');
		redirect('Menu/submenu');
	}

	// Function untuk ngambil data user 
	public function data()
	{

		$data['title'] = 'User Management';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data['Menu'] = $this->db->get_where('user')->result_array();

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('Menu/data', $data);
			$this->load->view('templates/footer');
		}
	}


	//function edit User Management
	public function editUser($id)
	{
		$where = ['id' => $id];
		$data['title'] = 'User Management';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->model('Menu_model', 'user');

		$data['edit'] = $this->user->getEditUser($where, 'user')->result_array();

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('Menu/editUser', $data);
			$this->load->view('templates/footer');
		}
	}

	//fungsi update user
	public function updateUser()
	{
		$this->load->model('Menu_model', 'update');

		$id = $this->input->post('id');
		$name = $this->input->post('name');
		$role = $this->input->post('role_id');
		$email = $this->input->post('email');

		$data = [
			'name' => $name,
			'role_id' => $role,
			'email' => $email
		];

		$where = [
			'id' => $id
		];

		$this->update->getUpdateUser($where, $data, 'user');
		$this->session->set_flashdata('message', '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a> Data User Berhasil Di Update</div>');
		redirect('menu/data');
	}

	// function untuk hapus User
	public function hapusUser($id)
	{
		$where = ['id' => $id];

		$this->db->delete('user', $where);
		$this->session->set_flashdata('message', '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a> User Berhasil Di Hapus</div>');
		redirect('Menu/data');
	}

	// fungsi untuk event
	public function event()
	{
		$data['title'] = 'Event Management';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data['event'] = $this->db->get('event')->result_array();
		$this->load->model('Menu_model', 'event');

		$this->form_validation->set_rules('nama_event', 'nama_event', 'required');
		$this->form_validation->set_rules('judul', 'judul', 'required');
		$this->form_validation->set_rules('deskripsi', 'deskripsi', 'required');
		$this->form_validation->set_rules('link', 'link', 'required');
		$this->form_validation->set_rules('tanggal', 'tanggal', 'required');


		if ($this->form_validation->run() ==  false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('menu/event', $data);
			$this->load->view('templates/footer');
		} else {
			$data = [
				'nama_event' => $this->input->post('nama_event'),
				'judul' => $this->input->post('judul'),
				'deskripsi' => $this->input->post('deskripsi'),
				'link' => $this->input->post('link'),
				'tanggal' => $this->input->post('tanggal')
			];
			$this->db->insert('event', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a> Menu Event Berhasil Di Tambah</div></div');
			redirect('Menu/event');
		}
	}

	//fungsi untuk edit event
	public function editEvent($id_event)
	{
		$where = ['id_event' => $id_event];
		$data['title'] = 'Event Management';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->model('Menu_model', 'event');

		$data['event'] = $this->event->getEditEvent($where, 'event')->result_array();

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('Menu/editEvent', $data);
			$this->load->view('templates/footer');
		}
	}

	//fungsi update event
	public function updateEvent()
	{
		$this->load->model('Menu_model', 'update');

		$id_event = $this->input->post('id_event');
		$nama_event = $this->input->post('nama_event');
		$judul = $this->input->post('judul');
		$deskripsi = $this->input->post('deskripsi');
		$link = $this->input->post('link');
		$tanggal = $this->input->post('tanggal');

		$data = [
			'nama_event' => $nama_event,
			'judul' => $judul,
			'deskripsi' => $deskripsi,
			'link' => $link,
			'tanggal' => $tanggal
		];

		$where = [
			'id_event' => $id_event
		];

		$this->update->getUpdateEvent($where, $data, 'event');
		$this->session->set_flashdata('message', '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a> Menu Event Berhasil Di Update</div></div');
		redirect('Menu/event');
	}

	//fungsi untuk hapus event
	public function hapusEvent($id_event)
	{
		$where = ['id_event' => $id_event];

		$this->db->delete('event', $where);
		$this->session->set_flashdata('message', '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a> Event Berhasil Di Hapus</div>');
		redirect('Menu/event');
	}
}
