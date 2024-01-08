<!DOCTYPE html>
<html lang="en">
  
<!-- Mirrored from themewagon.github.io/plataforma/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 27 Dec 2023 15:45:25 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
    <title>Project Management Consultancy</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,600,700,800,900&amp;display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo esc_url(get_template_directory_uri());?>/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo esc_url(get_template_directory_uri());?>/css/animate.css">
   
    <link rel="stylesheet" href="<?php echo esc_url(get_template_directory_uri());?>/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo esc_url(get_template_directory_uri());?>/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?php echo esc_url(get_template_directory_uri());?>/css/magnific-popup.css">

    <link rel="stylesheet" href="<?php echo esc_url(get_template_directory_uri());?>/css/aos.css">

    <link rel="stylesheet" href="<?php echo esc_url(get_template_directory_uri());?>/css/ionicons.min.css">

    <link rel="stylesheet" href="<?php echo esc_url(get_template_directory_uri());?>/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="<?php echo esc_url(get_template_directory_uri());?>/css/jquery.timepicker.css">

    <link rel="stylesheet" href="<?php echo esc_url(get_template_directory_uri());?>/css/flaticon.css">
    <link rel="stylesheet" href="<?php echo esc_url(get_template_directory_uri());?>/css/icomoon.css">
    <link rel="stylesheet" href="<?php echo esc_url(get_template_directory_uri());?>/css/style.css">
  </head>
  <body>


<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div>
  
    </div>
    <div class="container">
       
        <a href="<?php echo esc_url(home_url('/')); ?>" class="navbar-brand">Kenya Institute Of I.T-Project Management Consultancy</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active"><a href="<?php echo esc_url(home_url('/')); ?>" class="nav-link">Home</a></li>
                <li class="nav-item"><a href="<?php echo esc_url(home_url('/about')); ?>" class="nav-link">About</a></li>
                <!-- <li class="nav-item"><a href="<?php //echo esc_url(home_url('/speakers')); ?>" class="nav-link">Speakers</a></li> -->
                <li class="nav-item"><a href="<?php echo esc_url(home_url('/events')); ?>" class="nav-link">Events</a></li>
                <!-- <li class="nav-item"><a href="<?php// echo esc_url(home_url('/blog')); ?>" class="nav-link">Blog</a></li> -->
                <!-- <li class="nav-item"><a href="<?php //echo esc_url(home_url('/contact')); ?>" class="nav-link">Contact</a></li> -->

                <?php
                if (is_user_logged_in()) {
                    $current_user = wp_get_current_user();
                    if (current_user_can('manage_options')) {
                        // Admin is logged in
                        echo '<li class="nav-item cta mr-md-2"><a href="' . esc_url(wp_logout_url(get_permalink())) . '" class="nav-link">Logout</a></li>';
                    } else {
                        // Regular user is logged in
                        echo '<li class="nav-item cta mr-md-2"><a href="' . esc_url(home_url('/login')) . '" class="nav-link">Login</a></li>';
                    }
                } else {
                    // User is not logged in
                    echo '<li class="nav-item cta mr-md-2"><a href="' . esc_url(home_url('/login')) . '" class="nav-link">Login</a></li>';
                }
                ?>
            </ul>
        </div>
    </div>
</nav>

    <!-- END nav -->
    