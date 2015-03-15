<div id="core"> 
	<article>
			
		<section id="left">
			<center>
			
<!--		
			Happy Labor Day to all!
			<h2>
			<br>
			We will be closed <br>Monday September 1st.<br> <br><br>Open again Tuesday September 2nd!
			<br>
			</h2>
			


	-->	
<?php

$lunch_type = 'Vegetarian';
$today = date("l, F j, Y", strtotime('+1 Weekday'));

$closed = $rotation->closed();

if($closed == True)
{
	echo $rotation->closedMessage . '<br><br><br><br>';
}
else
{
	// The end EOT needs to not be indented so it will work, and no comments on that line!
echo <<< EOT
	<h2>
		$tomorrows $lunch_type Lunch
	</h2>
	<h3>
		<time>
			$today
		</time>
	</h3>
	<h3 class="header_spacing">
		Main Course
	</h3>
				
	<p>
		$rotation->mainMenuText
	</p>
	
	<h3 class="header_spacing">
		Side
	</h3>
	
	<p>
		$rotation->sideMenuText
	</p>
	<br>
	
	<p>
		<a href="?page=order" id="index_order_button">
			ORDER NOW
		</a>
	</p>
	
	<img src="img/divider_menu.gif" class="header_spacing" alt="decoration" width="259" height="15" border="0" />
	<br>
	
	<div id="info_buttons" class="header_spacing">
				
				
		<a href="" class="info_link" id="info_popup1">
		<span>
			List of ingredients:
			<br>Main: <?=$main_ing?>
			<br><br>Side: <?=$side_ing?>
			<br><br>*Note: Ingredients may vary depending on seasonality and availability. 
		</span>
		Ingredients
		</a>
		
		<a href="#" class="info_link" id="info_popup2">
		<span>
			Did you know?<br><?=$did_you_know?></span>Did you know?
			</a>
			
			
			<a href="#" class="info_link" id="info_popup3">
		<span>
		Menu options:<br>
		You can always change tomorrow's side to Mixed Fresh Fruit. <br>
		We know some people don't want to eat sweets or baked goods.<br> Just let us know! =)<br>
		Most Menus can be made Vegan as well,<br>but do contact us before ordering.</span>
		Menu options
		</a>
	
	</div>
	
	
	
EOT;
}


?>		
			<br>
			
			
			<p class="p_bold">
			No membership or obligation. Order one healthy meal at a time!
			</p>
			

	
			</center>

		</section>
		
		<section id="right">
		
			<div id="pos_main_price">
			<img src="img/Price_TheSpecialMiami.gif" alt="price $14 The Special Miami" width="150" height="113" border="0" />
			</div>
			
			<div id="pos_main_pic">
			<?=$img_bottom . $img_top?>
				
			</div>
			
			
			
			<h5>
			* Note: Picture is of a previous lunch prepared by The Special and may not exactly depict tomorrow's menu. 
			&emsp;&emsp;(Scroll over the picture to see tomorrow's side)
			</h5>

		</section>
	</article>
</div>