<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_login extends CI_Model{
	function tampil_data(){
		return $this->db->get_where($table,$where);
	} 
}

?>