<?php

/*	
	file:

	folder:
	
	used in:		
	
	version:	1.0
	
	date: 2014-
	
	classes:		
*/

Class Data_model extends CI_Model {
	function getAll(){
		$q = $this->db->query("SELECT * FROM gs_customer");
		if($q->num_rows() > 0) {
			foreach($q->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
	}
}

?>

