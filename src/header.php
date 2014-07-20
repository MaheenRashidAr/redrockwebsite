<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>" />
        <title>Red Rock Robotics<?php wp_title(' | '); ?></title>
        <link rel="profile" href="http://gmpg.org/xfn/11" />
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
        <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400'  type='text/css'>
        <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" type="text/css" media="screen" />
        <link rel="icon" type="image/ico" href="images/icon/favicon.ico">
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
        <?php wp_head(); ?>
    </head>

    <div id="body-wrapper">

    <nav class="navbar-fixed-top">
        <nav class="navbar navbar-redrock" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="<?php get_home_url(); ?>">
                        <img style="float: left;" class="desktop-logo" src="<?php bloginfo('template_directory');?>/images/header/logo-large.png">
                        <img class="mobile-logo" src="<?php bloginfo('template_directory');?>/images/header/logo-small.png">
                        <p class="mobile-logo">Red Rock Robotics</p>
                    </a>
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-mobile">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>

                <div class="collapse navbar-collapse" id="navbar-mobile">
                    <ul class="nav navbar-nav">
<!--
                        <li class="active"><a href="#">Home</a></li>
                        <li><a href="#">Our Team</a></li>
                        <li><a href="#">Resources</a></li>
                        <li><a href="#">Calendar</a></li>
                        <li><a href="#">Sponsors</a></li>
                        <li><a href="#">Contact Us</a></li>
-->
                        <?php
                            $pages = get_pages(array('sort_column' => 'ID'));
                            foreach($pages as $page) {
                        ?>
                                <li class="<?php if(is_page($page->ID)) {
                                    echo "active";
                                }?>">
                                    <a href="<?php echo get_page_link( $page->ID ); ?>"><?php echo $page->post_title; ?></a>
                                </li>
                        <?php
                            }
                        ?>

                    </ul>
                </div>
            </div>
        </nav>
    </nav>
