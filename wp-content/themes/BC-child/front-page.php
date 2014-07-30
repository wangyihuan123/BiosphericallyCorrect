<?php get_header(); ?>
	<div id="content">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="post" id="post-<?php the_ID(); ?>">
		
				<?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>
			
		</div>
		<?php endwhile; endif; ?>

	</div>
	<p>
	<?php
	echo get_stylesheet_uri()."<br>";
	echo "get_stylesheet_directory_uri:".get_stylesheet_directory_uri()."<br>";
	echo "get_stylesheet_directory:".get_stylesheet_directory()."<br>";
	//echo get_template_uri()."<br>";
	echo "get_template_directory_uri:".get_template_directory_uri()."<br>";
	echo "get_template_directory:".get_template_directory()."<br>";
	?>
	</p>
	<script type="text/javascript">
		var attributes = {};
		var flashvars = {};
		var params = {};
		params.quality = "best";
		params.wmode = "transparent";
		swfobject.embedSWF("<?php bloginfo('template_directory'); ?>/flash/earth.swf", "flash", "960", "200", "9.0.0", "expressInstall.swf", flashvars, params, attributes);
	</script>

<?php get_footer(); ?>
