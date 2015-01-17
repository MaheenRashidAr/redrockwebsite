<?php
/*
Template Name: Updates Template
*/

    get_header();
    add_filter( 'excerpt_length', 'custom_excerpt_length_25', 999 );
?>
    <div id="content-wrapper">
		<?php
			$catquery = new WP_Query( 'cat=2&posts_per_page=10' );
			while($catquery->have_posts()) : $catquery->the_post();
		?>
				<ul>
					<li><h3><a class="updates-title" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h3>
						<ul><li><?php the_content(); ?></li></ul>
					</li>
				</ul>
		<?php endwhile; ?>
    </div>
<?php get_footer(); ?>