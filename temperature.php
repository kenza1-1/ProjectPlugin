
<?php
/*
Plugin Name: Temperature
Plugin URI: http://www.kenza.fr
Description: Donne la température pour une ville .
Version: 1.0
Author: kenzaid
License: GPL2
*/
 
/**
 * Adds Foo_Widget widget.
 */
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
        //print_r($instance['code']);
        if($temperature=get_transient('temperature_'.$instance['code'])){
            $city= set_transient( 'ville_'.$instance['code']);

        }else{

            $url='http://api.openweathermap.org/data/2.5/weather?q='.$instance['code'].'&appid=98f5ffd25159d8fb2d6a57dc50604248';
            $contenu = file_get_contents($url);
            $json_object=json_decode($contenu);
            $temp_k = $json_object->{'main'}->{'temp'};
            $city= $json_object->{'name'};
            $humidity= $json_object->{'main'}->{'humidity'};
            set_transient( 'temperature_'.$instance['code'], $temperature, 20*60);        // enregistrement de la températur dans la base de donnee de wordpress 
            set_transient( 'ville_'.$instance['code'], $city, 60*60**24*30*3);        // enregistrement de la températur dans la base de donnee de wordpress 
            $temp_c = $temp_k-273.15; // kelvins to degrees celsius converter
            $temp_c=round($temp_c);//round the number
        }
     extract( $args );

     wp_enqueue_style('temperature_style',plugins_url('styles/temperature.css',__FILE__));//
     $image=''; // aremplir d'images

    

        $title = apply_filters( 'widget_title', $image );
        print $before_widget;
        print $before_title . $title . $after_title; // affiche le titre (la ville)
        print '<div class="location-weather-widget">';
        print'<span class="city">'. $city . ''.'<br>'.'</span>';
        print'<span class="temperature_widget">'. $temp_c . '°C'.'<br>'.'</span>';
        print'<span class="humidity">Humidity :' .' ' .$humidity . '%'.'<br></span>';

        //print 'Humidity :' .' ' .$humidity . '%'.'<br>'.'<br>';
        echo date('d-m-Y') . '<br>';
        //echo date('H:i:s');
        print '</div>';
        print $after_widget;
    
     //print $contenu;
    
    }
 
    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance Previously saved values from database.
     */
    public function form( $instance ) {
        if ( isset( $instance[ 'code' ] ) ) {  
            $code = $instance[ 'code' ];
        }
        else {
            $code ='3489586'; //  Default code (city code)
        }
        ?>
        <p>
            <label for="<?php echo $this->get_field_name( 'code' ); ?>">Code de la ville : </label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'code' ); ?>" name="<?php echo $this->get_field_name( 'code' ); ?>" type="text" value="<?php echo esc_attr( $code ); ?>" />
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
        $instance['code'] = ( !empty( $new_instance['code'] ) ) ? strip_tags( $new_instance['code'] ) : '';
 
        return $instance;
    }
 
} // class Foo_Widget

// Register Foo_Widget widget
add_action( 'widgets_init', 'register_Temperature_widget' );
     
function register_Temperature_widget() { 
    register_widget( 'Temperature_Widget' ); 
}

 
?>