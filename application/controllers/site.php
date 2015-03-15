<?php

Class Site extends CI_controller{

	public $user_menu;

// --- begin index --- //
	
	function index()
	{
		// checks for cookie called user_defaul_menu
		$this->user_menu = $this->input->cookie('user_default_menu', TRUE); // checks for cookie and retrieves it with XSS filter
		
		// if cookie does not exist (first time user or cookie expired)
		if($this->user_menu === FALSE)
		{	
			// use function header_link() to add header links to data variable
			$data['style_link'] = $this->header_link('public/css/style_menu_choice.css');
			$data['fonts_link'] = $this->header_link('http://fonts.googleapis.com/css?family=Roboto:100,300,400,700');
			
			// this should be a master array loaded automatically as it will be used extensively
			$menu = array('vegetarian', 'vegan', 'gluten_free', 'pescatarian');
			
			// creates the links for the initial menu choice page (for first time users - no cookie user_default_menu)
			foreach($menu as $row)
			{
				// creates bottom menu choice images which fades in on mouse over
				$image_properties = array(
		          'src' => 'public/img/' . $row. '_ts.gif',
		          'alt' => 'Choose to see our ' . $row . ' menu.',
		          'class' => 'bottom',
		          'width' => '313',
		          'height' => '300'
				  );
				$img_bottom = img($image_properties);
							
				// creates top image for menu choice
				$image_properties = array(
		          'src' => 'public/img/' . $row. '.gif',
		          'alt' => 'Select our ' . $row . ' menu.',
		          'class' => 'top',
		          'width' => '313',
		          'height' => '300'
				  );
				$img_top = img($image_properties);
				
				// creates link to specified menu page using the images to click and sends the argument for function menu_choice as $row (itteration of $menu)
				$img_link = anchor('site/menu_choice/' . $row, $img_bottom . $img_top);
				
				// adds these clickable images to the data variable
				$data['img_' . $row . '_link'] = $img_link;
			}
			
			// uses function image_anchor() to create clickable small logo image for initial menu choice page and adds it to data variable
			$data['img_thespecial_mobile_link'] = $this->image_anchor('public/img/LogoTheSpecial_mobile.gif', 
			'The Special Logo for Mobile', 'landscape', '104', '100','');

			
			// loads the global data variable to be used by entire process (so it doesn't need to be passed to view as parameter) 
			// unsure of advantage of this over just putting it as the second argument in load->view???
			$this->load->vars($data);
			
			//load menu choice page
			$this->load->view('menu_choice');
		}
		// if cookie user_default_menu is found
		else
		{
			// redirect user to controller function based on their choice stored in the cookie ($menu array)
			$base_url = base_url();
			redirect($base_url . 'site/' . $this->user_menu);
		}	
	}
	
// --- end index --- //


// --- begin menu page --- //	

	// function used in functions vegetarian, vegan, gluten_free and pescatarian, to display the same menu page but changed based on user_menu choice
	function menu_page()
	{
		// retrieves cookie info to see if user has default_menu
		$this->user_menu = $this->input->cookie('user_default_menu', TRUE);
		
		// if user does not have cookie (probably dissabled) it uses session info to set user_menu info
		if($this->user_menu === FALSE)
		{
			// uses the url segment ((1.)site/(2.)vegetarian/) to set the user_menu if cookies are dissabled
			$this->user_menu = $this->uri->segment(2);
		}
		
		// use function header_link() to add header links to $data variable
		$data['style_link'] = $this->header_link('public/css/style_menu_page.css');
		$data['fonts_link'] = $this->header_link('http://fonts.googleapis.com/css?family=Roboto:100,300,400,700');
		
		// add user_menu to $data variable
		$data['user_menu'] = $this->user_menu;
		
		$this->load->model('header_variables_model');
		
		$data['indexVariablesArray'] = $this->header_variables_model->get_header_variables();
		
		// uses function image_anchor() to create clickable image of The Special Logo
		$data['img_logo'] = $this->image_anchor('public/img/LogoTheSpecial.gif', 'Logo for The Special Miami', 'landscape', '313', '300', '');
		
		// uses function image_anchor() to create clickable image of Slow food nomination
		$data['img_slow_food'] = $this->image_anchor('public/img/Slow_Food_TheSpecialMiami.gif', 
		'The Special Miami Nominated to the Snail of Approval by Slow Food Miami in 2013', 'landscape', '120', '120', 'http://www.slowfoodmiami.org/home.htm ');
		
		$this->load->model('header_buttons_model');
		
		$data['buttons'] = $this->header_buttons_model->get_buttons();
						
		//load menu page view
		$this->load->view('template', $data);	
	}
	
// --- end menu page --- //
	
	// sets a cookie based on the argument sent when clicking on menu image
	function menu_choice($menu_choice)
	{
		// sets a cookie with the user's menu_choice		
		setcookie('user_default_menu', $menu_choice, time()+(20), "/"); // set expires to 15552000 (60*60*24*180)
		
		// saves the menu choice to the sessions data as $user_menu to be used by any of the menu functions
		$this->session->set_userdata('user_menu', $menu_choice);

		$base_url = base_url();
		redirect($base_url . 'site/' . $menu_choice);	
		
		/* this is not working on localhost and codeigniter with MAMP so we are using the native PHP setcookie
			$menu_cookie = array(
		    'name'   => 'user_default_menu',
		    'value'  => 'vegan',
		    'expire' => '86500',
		    'domain' => '.localhost',
		    'path'   => '/',
		    'prefix' => '',
		    'secure' => FALSE
		); 		
		$this->input->set_cookie($menu_cookie);
		*/	
	}
	
	// creates links to be used in header (href link passed as argument)
	function header_link($link) // used in function index above twice to load css file and google fonts
	{
		// creates link_tag using helper('html') and returns the link
		$link = array
		(
          'href' => $link,
          'rel' => 'stylesheet',
          'type' => 'text/css'
		);
		$header_link = link_tag($link);
		return $header_link;		
	}
	
	// function to use if user selects vegetarian menu
	function vegetarian()
	{
		$this->menu_page();
	}
	
	// function to use if user selects vegan menu
	function vegan()
	{
		$this->menu_page();
	}
	
	// function to use if user selects gluten_fee menu
	function gluten_free()
	{
		$this->menu_page();
	}
	
	// function to use if user selects pescatarian menu
	function pescatarian()
	{
		$this->menu_page();
	}
	
	// used on both index and menu_page to create image anchor tags
	function image_anchor($src, $alt, $class, $width, $height, $link)
	{
		$image_properties = array(
          'src' => $src,
          'alt' => $alt,
          'class' => $class,
          'width' => $width,
          'height' => $height
		  );
		// use html helper to create image tag
		$img = img($image_properties);
		
		// creates link based on image
		return $img_anchor = anchor($link, $img);
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