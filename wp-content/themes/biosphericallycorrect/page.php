<?php 
get_header();

if (have_posts()) : while (have_posts()) : the_post(); 

if ($post->post_parent == 0):
	$parent_id = get_the_ID();
	$title = get_the_title();
	$permalink = get_permalink();
else:
	$parent_id = $post->post_parent;
	$title = get_the_title($parent_id);
	$permalink = get_permalink($parent_id);
endif;
?>

<div id="main" class="clearfix">

	<div id="sidebar">
		<h1><a href="<?php echo $permalink; ?>" style="color:#fff"><?php echo $title; ?></a></h1>
		<ul>
		<?php wp_list_pages('title_li=&depth=1&child_of='.$parent_id); ?>
		</ul>
	</div>

	<div id="content" class="with_sidebar clearfix">
		
		<div class="post" id="post-<?php the_ID(); ?>">
		
			<?php if ( $post->post_parent != 0 ): ?>
			<h2><?php the_title(); ?></h2>
			<?php endif; ?> 

			<?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>
			
		</div>
		
	</div>

</div>

<?php endwhile; endif; ?>

<?php get_footer(); ?>
