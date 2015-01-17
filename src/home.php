<?php
/*
Template Name: Home Template
*/

    get_header();
    add_filter( 'excerpt_length', 'custom_excerpt_length_10', 999 );
?>
    <div id="content-wrapper">
        <div id="carousel-updates" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#carousel-updates" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-updates" data-slide-to="1"></li>
                <li data-target="#carousel-updates" data-slide-to="2"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <?php
                    $recent_posts = get_posts( array('numberposts' => 3, 'category_name' => 'Updates') );
                    $is_first = true;
                    foreach( $recent_posts as $post ):
                        setup_postdata($post);
                ?>
                        <div class="carousel-content item <?php echo ($is_first ? "active" : ""); ?>">
                            <a href="<?php echo get_page_link(); ?>">
                                <?php
                                    if ( has_post_thumbnail() )
                                        the_post_thumbnail(); 
                                ?></a>
                            <div class="carousel-caption">
                                <a class="read-more" href="<?php echo get_page_link(); ?>"><?php the_title(); ?></a>
                                <p><?php
                                    the_excerpt(); ?>
                                </p>
                            </div>
                        </div>
                <?php
                    if($is_first)
                            $is_first = false;

                    endforeach;
                ?>
            </div>

            <!-- Controls -->
            <a class="left carousel-control" href="#carousel-updates" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel-updates" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        
        <?php while( have_posts() ):
            the_post();
            the_content();
        endwhile;?>
    </div>


<?php
    get_footer();
?>