
<?php require_once ('header.php');?>

<?php
//display of data for current weather

  print '<div class="location-weather-widget">';
  ?>




<!-- <span class="bigcity badge badge-pill badge-primary btn" id="findParis" value="paris">Paris</span>
<span class="bigcity badge badge-pill badge-secondary btn " id="findMarseille">Marseille</span>
<span class="bigcity badge badge-pill badge-success btn" id="findLyon">Lyon</span>
<span class="bigcity badge badge-pill badge-danger btn " id="findToulouse">Toulouse</span>
<span class="bigcity badge badge-pill badge-warning btn " id="findNice">Nice</span>
<span class="bigcity badge badge-pill badge-info btn " id="findNantes">Nantes</span>
<span class="bigcity badge badge-pill badge-light btn " id="findMontepellier">Montepellier</span>
<span class="bigcity badge badge-pill badge-dark btn " id="findStrasbourg">Strasbourg</span>
<span class="bigcity badge badge-pill badge-warning btn "id="findBordeaux">Bordeaux</span>
<span class="bigcity badge badge-pill badge-success btn  mb-3" id="findLille">Lille</span> -->
  

  <form class="form-inline" methode="GET">
    <input class="form-control mr-sm-2" type="search" placeholder="City" aria-label="city" name="city">
    <input class="form-control mr-sm-2" type="search" placeholder="Country" aria-label="country" name="country">

    <button class="btn btn-outline-info my-2 my-sm-0" type="submit">Search</button>
  </form>
  

  <?php
  print'<span class="city">'. $city .','. $country. ''.'<br>'.'</span>';
  echo '<img src="http://openweathermap.org/img/wn/'.$icon.'@2x.png"> <br>';
  // print'<span class="tempmax" >'. $temp_max. '°'. ' '. $temp_min . '°'.' <br>'.'</span>';
  ?>
  <div class='row'>
  <?php
  print'<span class="tempmax " >'. $temp_max. '°'. '  <br>'.'</span>';
  print'<span class="tempmax " >'. $temp_min . '°'.' <br>'.'</span>';
  ?>
</div>
  <?php

  print'<span class="weather1">'. $description_weather . ''.'<br>'.'</span>';

  print'<span class="temperature_widget">'. $temp_c . '°C'.'<br>'.'</span>';
  print'<span class="humidity">Humidity :' .' ' .$humidity . '%'.'<br></span>';
  echo date('d-m-Y') . '<br>';
   
  print '</div>';
  
  ?>


 <?php
//  for( $i=0; $i<4 ; $i=$i+1){

//    if( $obj[$i]->name == $instance['city']){
//     $rep= 'bien';
//    break;

//    }
//    else{
//     $rep= 'non';

//    }

//  }
//  echo $rep;
