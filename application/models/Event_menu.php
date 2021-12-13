<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Event_menu extends CI_Model
{
    //models untuk menampilkan card event dari table management event dashboard admin
    public function tampilEvent()
    {
        return $this->db->get('event');
    }
}
