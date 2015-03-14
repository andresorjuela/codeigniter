<?php

/*	
	file:

	folder:
	
	used in:		
	
	version:	1.0
	
	date: 2014-
	
	classes:		
*/

Class Site extends CI_controller{
	
	function index()
	{
		$user_menu = $this->input->cookie('user_default_menu', TRUE); // checks for cookie and retrieves it with XSS filter
		
		
		if($user_menu === FALSE)
		{
			// $this->load->helper('html');
			// $this->load->helper('url');
			
			/*
			$link = array(
	          'href' => 'public/css/ts_style.css',
	          'rel' => 'stylesheet',
	          'type' => 'text/css'
			);
			$style_link = link_tag($link);
			$data['style_link'] = $style_link;
			
			$link = array(
	          'href' => 'http://fonts.googleapis.com/css?family=Roboto:100,300,400,700',
	          'rel' => 'stylesheet',
	          'type' => 'text/css'
			);
			$fonts_link = link_tag($link);
			$data['fonts_link'] = $fonts_link;
			*/
			
			$data['style_link'] = $this->header_link('public/css/ts_style.css');
			$data['fonts_link'] = $this->header_link('http://fonts.googleapis.com/css?family=Roboto:100,300,400,700');
			

			$menu = array('vegetarian', 'vegan', 'gluten_free', 'pescatarian');
			
			foreach($menu as $row)
			{
				$image_properties = array(
		          'src' => 'public/img/' . $row. '_ts.gif',
		          'alt' => 'Tomorrow\'s ' . $row . ' Dessert',
		          'class' => 'bottom',
		          'width' => '',
		          'height' => ''
				  );
				$img_bottom = img($image_properties);
				
				$image_properties = array(
		          'src' => 'public/img/' . $row. '.gif',
		          'alt' => 'Tomorrow\'s ' . $row . ' Main Course',
		          'class' => 'top',
		          'width' => '',
		          'height' => ''
				  );
				$img_top = img($image_properties);
				
				$img_link = anchor('site/menu_choice/' . $row, $img_bottom . $img_top);
				
				$data['img_' . $row . '_link'] = $img_link;
			}
			
			$image_properties = array(
	          'src' => 'public/img/LogoTheSpecial_mobile.gif',
	          'alt' => 'The Special Logo',
	          'id' => 'landscape',
	          'width' => '',
	          'height' => '',
	          'title' => '',
			  );
			$img_thespecial_mobile_link = img($image_properties);
			$data['img_thespecial_mobile_link'] = $img_thespecial_mobile_link;
			
			$this->load->vars($data);
			$this->load->view('menu_choice');
		}
		else
		{
			$this->load->helper('url');
			
			$base_url = base_url();
			redirect($base_url . 'site/' . $user_menu);
		}	
	}
	
	function header_link($link) // used in function index twice to load css file and google fonts
	{
		// $this->load->helper('html');
		// $this->load->helper('url');
	
		$link = array(
          'href' => $link,
          'rel' => 'stylesheet',
          'type' => 'text/css'
		);
		$header_link = link_tag($link); // link_tag is from html helper
		return $header_link;
		
	}

	
	
	
	function vegetarian()
	{
		echo 'vegetarian';
	}
	
	function vegan()
	{
		echo 'vegan';
	}
	
	function gluten_free()
	{
		echo 'gluten_free';
	}
	
	function pescatarian()
	{
		echo 'pescatarian';
	}
	
	
	function menu_choice($menu_choice)
	{
		setcookie('user_default_menu', $menu_choice, time()+(20), "/");

		$this->load->helper('url');
		$base_url = base_url();
		redirect($base_url . 'site/' . $menu_choice);	
		
		/* this is not working on localhost and codeigniter with MAMP
			$menu_cookie = array(
		    'name'   => 'user_default_menu',
		    'value'  => 'vegan',
		    'expire' => '86500',
		    'domain' => '.localhost',
		    'path'   => '/',
		    'prefix' => '',
		    'secure' => FALSE
		); // set expires to 15552000 (60*60*24*180)
		
		$this->input->set_cookie($menu_cookie);
		*/	
	}
	
	function test() // ($argument) to pass argument
	{
		//$string = $this->input->get('string');
		// $string = $this->input->post('string');
		// echo $string;
		// echo $argument;
		
		$this->load->helper('html');
		$image_properties = array(
          'src' => 'public/img/Vegan.gif',
          'alt' => 'Me, demonstrating how to eat 4 slices of pizza at one time',
          'class' => 'post_images',
          'width' => '',
          'height' => '',
          'title' => 'That was quite a night',
          'rel' => 'lightbox',
		  );

		echo img($image_properties);
		// echo img('public/img/Vegan.gif');
	}
}
?>