<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset');?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="description" content="<?php bloginfo('description');?>">

  <?php wp_head(); ?>



</head>
<body <?php body_class(); ?> data-spy="scroll" data-target=".navbar">
<?php wp_body_open(); ?>

<nav class="navbar navbar-main navbar-expand-lg navbar-dark bg-primary py-3" id="navbar">
  <div class="container-fluid">
    <a class="navbar-brand" href="<?php echo esc_url_raw(home_url()); ?>">
      <?php if(get_theme_mod('cyb_logo_image')!="") { ?>
      <img class="logo" src="<?php echo esc_attr(get_theme_mod('cyb_logo_image')); ?>" alt="<?php echo esc_attr(get_theme_mod('cyb_logoalt_text')); ?>">
      <?php } else{ ?>
        <img class="logo" src="<?php echo esc_url(get_template_directory_uri()); ?>/imgs/logo-new.png" alt="<?php bloginfo('name'); ?>">
      <?php } ?>


    </a>

      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#bs4navbar" aria-controls="bs4navbar" aria-expanded="false" aria-label="Toggle navigation">
       <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse pr-md-5" id="bs4navbar">

     <?php
     wp_nav_menu([
       'menu'            => 'header',
       'theme_location'  => 'header',
       'container'       => '',
       'container_id'    => '',
       'container_class' => '',
       'menu_id'         => false,
       'menu_class'      => 'navbar-nav ml-auto mr-md-5',
       'depth'           => 2,
       'fallback_cb'     => 'bs4navwalker::fallback',
       'walker'          => new bs4navwalker()
     ]);
     ?>

      <ul class="navbar-nav push-right navbar-social">
        <li><a href="https://www.linkedin.com/in/umberto-de-palma-8846203/"><i class="fab fa-linkedin-in"></i></a></li>
        <li><a href="https://twitter.com/umbz"><i class="fab fa-twitter"></i></a></li>
        <li><a href="https://github.com/umbzit"><i class="fab fa-github"></i></a></li>
        <li><a href="https://www.behance.net/umbz"><i class="fab fa-behance"></i></a></li>
        <li><a href="https://www.instagram.com/umbz00/"><i class="fab fa-instagram"></i></a></li>
      </ul>


    </div>
   </div>
 </nav>


<nav class="navbar navbar-scroll fixed-top navbar-expand-lg navbar-light bg-primary py-3" id="navbar-scroll">
  <div class="container-fluid">
    <a class="navbar-brand" href="<?php echo esc_url_raw(home_url()); ?>">
      <?php if(get_theme_mod('cyb_logo_image_scroll')!="") { ?>
        <img class="logo" src="<?php echo esc_attr(get_theme_mod('cyb_logo_image_scroll')); ?>" alt="<?php echo esc_attr(get_theme_mod('cyb_logoalt_text')); ?>">
      <?php } else{ ?>
        <img class="logo" src="<?php echo esc_url(get_template_directory_uri()); ?>/imgs/logo-new-bn.png" alt="<?php bloginfo('name'); ?>">
      <?php } ?>
    </a>

      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#bs4navbar2" aria-controls="bs4navbar2" aria-expanded="false" aria-label="Toggle navigation">
       <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse pr-md-5" id="bs4navbar2">

     <?php
     wp_nav_menu([
       'menu'            => 'header',
       'theme_location'  => 'header',
       'container'       => '',
       'container_id'    => '',
       'container_class' => '',
       'menu_id'         => false,
       'menu_class'      => 'navbar-nav ml-auto mr-md-5',
       'depth'           => 2,
       'fallback_cb'     => 'bs4navwalker::fallback',
       'walker'          => new bs4navwalker()
     ]);
     ?>

      <ul class="navbar-nav push-right navbar-social">
        <li><a href="https://www.linkedin.com/in/umberto-de-palma-8846203/"><i class="fab fa-linkedin-in"></i></a></li>
        <li><a href="https://twitter.com/umbz"><i class="fab fa-twitter"></i></a></li>
        <li><a href="https://github.com/umbzit"><i class="fab fa-github"></i></a></li>
        <li><a href="https://www.behance.net/umbz"><i class="fab fa-behance"></i></a></li>
        <li><a href="https://www.instagram.com/umbz00/"><i class="fab fa-instagram"></i></a></li>
      </ul>

    </div>
   </div>
 </nav>