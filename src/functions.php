<?php
add_theme_support( 'post-thumbnails' ); 

function getPageContent($title) {
    $page = get_page_by_title($title);
    $content = '';
    
    if( is_page($page) ) {
        $content = apply_filters('the_content', $page->post_content);
    }

    return $content;
}

function custom_excerpt_length_10( $length ) {
	return 10;
}

function custom_excerpt_length_25( $length ) {
	return 25;
}

function new_excerpt_more( $more ) {
    return '...';
}
add_filter( 'excerpt_more', 'new_excerpt_more' );
?>