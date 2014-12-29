<?php
function getPageContent($title) {
    $page = get_page_by_title($title);
    $content = '';
    
    if( is_page($page) ) {
        $content = apply_filters('the_content', $page->post_content);
    }

    return $content;
}
?>