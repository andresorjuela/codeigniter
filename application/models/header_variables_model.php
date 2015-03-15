<?php

Class Header_variables_model extends CI_Model{
	
	// function to get menu_page links from db
	function get_header_variables()
	{
		$q = $this->db->query("SELECT name, text, link FROM ts_textVariables");
		if($q->num_rows() > 0)
		{
			foreach($q->result() as $row) 
			{
				// if the result has a corresponding link...
				if($row->link)
				{
					// build a link anchor tag with text
					$fullLink =  $row->link . $row->text . '</a><br>';
					// set value and key to be paired below
					$arrayKeys[] = $row->name;
					$arrayValues[] = $fullLink;				
				}
				// if the result has no link (just text to be displayed)
				else
				{
					// set value and key to be paired below
					$arrayKeys[] = $row->name;
					$arrayValues[] = $row->text;
				}			
			}
			// make array with key and value pair
			$indexVariablesArray = array_combine($arrayKeys, $arrayValues);

			return $indexVariablesArray;
		}
	}
}

?>

