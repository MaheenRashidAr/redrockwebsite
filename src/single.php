<?php get_header(); ?>
    <div id="content-wrapper">  
        <?php while( have_posts() ):
            the_post();
            ?>

            <div class="post-img">

            <?php
        	if ( has_post_thumbnail() ) {
		         the_post_thumbnail('large', array('class' => 'post-featured-img')) ;
        	}
        	?>
        	</div>

        	<?php
            the_content();
        endwhile;?>
	</div>
<?php get_footer(); ?>
