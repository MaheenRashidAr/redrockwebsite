<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>" />
        <title>Red Rock Robotics<?php wp_title(' | '); ?></title>
        <link rel="profile" href="http://gmpg.org/xfn/11" />
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
        <link rel="stylesheet" href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400'  type='text/css'>
        <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" type="text/css" media="screen" />
        <?php if( is_page() ): ?>
            <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/page.css" type="text/css">
        <?php endif; ?>
        <link rel="icon" type="image/ico" href="images/icon/favicon.ico">
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
        <?php wp_head(); ?>
    </head>

    <div id="body-wrapper">

    <nav class="navbar-fixed-top">
        <nav class="navbar navbar-redrock" role="navigation">
            <nav id="nav-users">
                <?php if( is_user_logged_in() ): ?>
                    <a class="btn-login" href="<?php echo admin_url(); ?>">
                        Tools&nbsp;&nbsp;<span class="glyphicon glyphicon-tasks" aria-hidden="true"></span>
                    </a>
                    <a class="btn-login" href="<?php echo wp_logout_url( get_permalink() ); ?>">
                        Logout&nbsp;&nbsp;<span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>
                    </a>
                <?php else: ?>
                    <a class="btn-login" href="<?php echo wp_login_url( get_permalink() ); ?>">
                        Login&nbsp;&nbsp;<span class="glyphicon glyphicon-log-in" aria-hidden="true"></span>
                    </a>
                <?php endif; ?>
            </nav>

            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="<?php echo home_url(); ?>">
                        <img style="float: left;" class="desktop-logo" src="<?php echo esc_url( get_template_directory_uri() );?>/images/header/logo-large.png">
                        <img class="mobile-logo" src="<?php echo esc_url( get_template_directory_uri() );?>/images/header/logo-small.png">
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
                        <?php
                            $pages = get_pages(array('sort_column' => 'menu_order'));
                            foreach($pages as $page):
                                // Only display top-level pages
                                if( $page->post_parent == 0):
                                    $children = get_children(array('post_parent' => $page->ID, 'post_type' => 'page'));
                                    $is_parent = !empty($children);
                        ?>
                                    <li class="<?php if(is_page($page->ID))
                                                        echo "active ";
                                                     if($is_parent)
                                                         echo "dropdown";
                                                     ?>">
                                        <a class="header-lnk <?php if(is_page($page->ID))
                                                                        echo "active ";
                                                                   if($is_parent)
                                                                        echo "dropdown-toggle";
                                                             ?>"
                                           <?php if($is_parent): ?>
                                                
                                           <?php endif; ?>
                                           href="<?php echo get_page_link( $page->ID ); ?>">
                                            <div class="lnk-wrapper">
                                                <ul class="links">
                                                    <li><span class="regular"><?php echo $page->post_title; ?></span></li>
                                                    <li><span class="highlight"><?php echo $page->post_title; ?></span></li>            </ul>
                                            </div>
                                        </a>
                                        
                                        <?php if($is_parent): ?>
                                            <ul class="dropdown-menu">
                                                <?php foreach($children as $subpage): ?>
                                                    <li><a class="dropdown-link" href="<?php echo get_page_link( $subpage->ID ); ?>"><?php echo $subpage->post_title; ?></a></li> 
                                                <?php endforeach; ?>
                                            </ul>
                                        <?php endif; ?>
                                    </li>
                        <?php
                                endif;
                            endforeach;
                        ?>

                    </ul>
                </div>
            </div>
        </nav>
    </nav>
