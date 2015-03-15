<header>

	<div id='hgroup'>

		<div id="pos_logo">
		
			<?php echo $img_logo; ?>
			
		</div>
		
		<div id="pos_notice">
		<p>
			<?=$indexVariablesArray['top_link']?>
		
			<!-- maybe a link to our suggestion box? http://www.suggestionox.com/response/hAxVgg -->
		
		</p>
		</div>
	
		<div id="pos_tagline">
		<h1>
			<?=$indexVariablesArray['title']?>
		</h1>
		</div>
	
		<div id="pos_web_address">
		<h1 class='h1_thin'>
			<?=$indexVariablesArray['web_address']?>
		</h1>
		</div>
	
		<div id="pos_delivery_only">
		<p>
			<?=$indexVariablesArray['tag_line']?>
		</p>
		</div>

		<div id="pos_snail">
			<?php echo $img_slow_food; ?>		
		</div>

	</div>	

	<aside>
	<div id="aside_group">
	
		<?php foreach ($buttons as $row): ?>

		<?php echo $row['name'] ?>

		<?php endforeach ?>
		
	</div>
	</aside>

	<div id='pos_dailyEmail'>
	<h3>
		<img src="img/buttons/arrow_subscribe.jpg" alt="Subscribe to our Daily Menu" width="10" height="13" />
		<?//=$indexVariablesArray['subscribe']?>

	</h3>
	</div>
			
</header>