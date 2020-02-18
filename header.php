<?php
wp_enqueue_style('temperature_style',plugins_url('styles/temperature.css',__FILE__));//
        wp_enqueue_script( 'bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js', array('jquery'), null, true);
       wp_enqueue_style( 'bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css' );
      //* Enqueue Font Awesome
// add_action( 'wp_enqueue_scripts', 'yourtheme_enqueue_scripts' );

        wp_enqueue_style( 'font-awesome', '//cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.min.css' );
