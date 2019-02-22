<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *  
 */
class m_paket extends CI_Model
{
	
	public function get_data(){
		$query = "select * from paket";
		$data = $this->db->query($query);
		return $data->result();
	}
}

?>