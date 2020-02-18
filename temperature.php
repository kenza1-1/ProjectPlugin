
<?php

/*
Plugin Name: Temperaturev1
Plugin URI: http://www.kenza.fr
Description: Donne la température pour une ville .
Version: 1.0
Author: kenzaid
License: GPL2
*/
 ?>

 <?php
       //require_once ('function.php');

     
 
/**
 * Adds Foo_Widget widget.
 */
?>

<?php


class Temperature_Widget extends WP_Widget {
 
    /**
     * Register widget with WordPress.
     */

     
    public function __construct() {
        parent::__construct(
            'Temperature_widget', // Base ID
            'Temperature', // Name
            'Donne la température de la ville' // Args
        );
    }
    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */


     
    public function widget( $args, $instance ) {
        
 

        if($temperature=get_transient('temperature_'.$instance['city'])){
            $city= set_transient( 'ville_'.$instance['city']);
        }else{
        
        
            if (!(!$sock = @fsockopen('www.google.fr', 80, $num, $error, 5)))
            {
    
    
                if(!empty($instance['city'])){
  
                    $url='http://api.openweathermap.org/data/2.5/weather?q='.$instance['city'].','.$instance['country'].'&appid=98f5ffd25159d8fb2d6a57dc50604248';
                    $urlForecast='http://api.openweathermap.org/data/2.5/forecast?q='.$instance['city'].','.$instance['country'].'&appid=98f5ffd25159d8fb2d6a57dc50604248';
                  
                    
                   
                }
                    // if(empty($instance['city'])){
                else{
                        if(!empty($_GET['city'])){

                            $url='http://api.openweathermap.org/data/2.5/weather?q='.$_GET['city'].','.$_GET['country'].'&appid=98f5ffd25159d8fb2d6a57dc50604248';
                            $urlForecast='http://api.openweathermap.org/data/2.5/forecast?q='.$_GET['city'].','.$_GET['country'].'&appid=98f5ffd25159d8fb2d6a57dc50604248';
                            
                            
                        } 
                        else{
                
                            $url='http://api.openweathermap.org/data/2.5/weather?q='.'Paris'. ','.'FR'.'&appid=98f5ffd25159d8fb2d6a57dc50604248';
                            $urlForecast='http://api.openweathermap.org/data/2.5/forecast?q='.'Paris'. ','.'FR'.'&appid=98f5ffd25159d8fb2d6a57dc50604248';
                        }
                            
                            
                    }
                        require_once ('recovery.php');
                        extract( $args );
                    require_once ('header.php');

                
                $image=''; // aremplir d'images
                $title = apply_filters( 'widget_title', $image );
                print $before_widget;
                print $before_title . $title . $after_title; // affiche le titre (la ville)
                require_once ('currentWeather.php');
                

        
            ?>

                <hr><p onclick="tog" class="text-primary ">See all the weather forecast</p>
                <a class="toggle fas fa-angle-down fa-2x toggle text-primary" href="#example"></a>
                    <?php
                    require_once ('forecastWeather.php');
                
                print $after_widget; 



                    

            }
            else{ 
            print'<div > Aucun accès à Internet</div>';
                }
            
        } 
     
 ?>

 <script>

var show = function (elem) {
	elem.style.display = 'block';
};

var hide = function (elem) {
	elem.style.display = 'none';
};

var toggle = function (elem) {

	// If the element is visible, hide it
	if (window.getComputedStyle(elem).display === 'block') {
		hide(elem);
		return;
	}

	// Otherwise, show it
	show(elem);

};

// Listen for click events
document.addEventListener('click', function (event) {

	// Make sure clicked element is our toggle
	if (!event.target.classList.contains('toggle')) return;

	// Prevent default link behavior
	event.preventDefault();

	// Get the content
	var content = document.querySelector(event.target.hash);
	if (!content) return;

	// Toggle the content
	toggle(content);

}, false);
       </script>



    <?php
    }
 
    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance Previously saved values from database.
     */
    public function form( $instance ) {
        if (isset( $instance[ 'city' ] ) AND isset( $instance[ 'country' ] ) ) {  
            $city = $instance[ 'city' ];
            $country = $instance[ 'country' ];

        }
        else {

           $city ='paris'; //  Defaul city 
           $country ='fr';// Defaukt country

        }
        ?>
        <p>
            <label for="<?php echo $this->get_field_name( 'city' ); ?>"> City : </label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'city' ); ?>" name="<?php echo $this->get_field_name( 'city' ); ?>" type="text" value="<?php echo esc_attr( $city ); ?>" />

            <label for="<?php echo $this->get_field_name( 'country' ); ?>"> Country : </label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'country' ); ?>" name="<?php echo $this->get_field_name( 'country' ); ?>" type="text" value="<?php echo esc_attr( $county ); ?>" />
         </p>
    <?php
    }
 
    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param array $new_instance Values just sent to be saved.
     * @param array $old_instance Previously saved values from database.
     *
     * @return array Updated safe values to be saved.
     */
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['city'] = ( !empty( $new_instance['city'] ) ) ? strip_tags( $new_instance['city'] ) : '';
        $instance['country'] = ( !empty( $new_instance['country'] ) ) ? strip_tags( $new_instance['country'] ) : '';

 
        return $instance;
    }
 
} // class Foo_Widget

// Register Foo_Widget widget
add_action( 'widgets_init', 'register_Temperature_widget' );
     
function register_Temperature_widget() { 
    register_widget( 'Temperature_Widget' ); 
}



?>
