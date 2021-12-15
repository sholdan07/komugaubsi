<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu_model extends CI_Model
{
	public function getSubMenu()
	{
		$query = "SELECT `user_sub_menu`.*, `user_menu`.`menu`
        FROM `user_sub_menu` JOIN `user_menu`
        ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
        ";
		return $this->db->query($query)->result_array();
	}


	//modal untuk edit user
	public function getEditUser($where, $user)
	{
		return $this->db->get_where($user, $where);
	}

	// modal untuk hapus User
	public function hapusUser($where, $user)
	{
		$this->db->where($where);
		$this->db->delete($user);

		return true;
	}

	public function getUpdateUser($where, $data, $user)
	{
		$this->db->where($where);
		$this->db->update($user, $data);
	}

	//modal untuk edit menu dan update menu
	public function getEditMenu($where, $user_menu)
	{
		return $this->db->get_where($user_menu, $where);
	}

	public function getUpdateMenu($where, $data, $user_menu)
	{
		$this->db->where($where);
		$this->db->update($user_menu, $data);
	}

	// modal untuk hapus Menu
	public function hapusMenu($where, $user_menu)
	{
		$this->db->where($where);
		$this->db->delete($user_menu);

		return true;
	}

	//modal untuk update sub menu
	public function getEditSubMenu($where, $user_sub_menu)
	{
		return $this->db->get_where($user_sub_menu, $where);
	}

	public function getUpdateSubMenu($where, $data, $user_sub_menu)
	{
		$this->db->where($where);
		$this->db->update($user_sub_menu, $data);
	}

	// modal untuk hapus Sub Menu
	public function hapusSubMenu($where, $user_sub_menu)
	{
		$this->db->where($where);
		$this->db->delete($user_sub_menu);

		return true;
	}

	//fungsion edit event dan update event
	public function getEdiEvent($where, $event)
	{
		return $this->db->get_where($event, $where);
	}

	public function getUpdateEvent($where, $data, $user_event)
	{
		$this->db->where($where);
		$this->db->update($user_event, $data);
	}

	// modal untuk update Event
	public function getEditEvent($where, $event)
	{
		return $this->db->get_where($event, $where);
	}


	// modal untuk hapus event
	public function hapusEvent($where, $event)
	{
		$this->db->where($where);
		$this->db->delete($event);

		return true;
	}
}
