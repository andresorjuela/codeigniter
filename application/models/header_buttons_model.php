<?php

Class Header_buttons_model extends CI_Model{
	
	// function to get menu_page links from db
	function get_buttons()
	{
		$q = $this->db->query("SELECT * FROM ts_headerButtons");
		if($q->num_rows() > 0)
		{
			foreach($q->result() as $row) 
			{
			
				$data[$row->name] = $this->display_button($row->name, $row->link);
							
			}
		}
		
		return $data;
	}
	
	/* method to create necessary html for display: position, link, bottom img, top img, close brackets */
	function display_button($name, $link)
	{
	
	$uc_name = ucfirst($name);
	echo <<<HTML_BLOCK
	
<div id="pos_{$name}">
	<a href="{$link}" target="_blank" >
		<img class="bottom" src="../public/img/{$name}TheSpecial.jpg" alt="The Special Miami {$uc_name}" width="40" height="41" />
		<img class="top" src="../public/img/{$name}TheSpecial.gif" alt="The Special Miami {$uc_name}" width="40" height="41" />
	</a>
	<br>
</div>
HTML_BLOCK;

	}
}

?>