<?php


//data recovery for current weather
$contenu = file_get_contents($url);
            $json_object=json_decode($contenu);
            $temp_k = $json_object->{'main'}->{'temp'};
            $city= $json_object->{'name'};
            $country= $json_object->{'sys'}->{'country'};
            $humidity= $json_object->{'main'}->{'humidity'};
            $description_weather= $json_object->{'weather'}['0']->{'description'};
            $icon= $json_object->{'weather'}['0']->{'icon'};
            $temp_max = $json_object->{'main'}->{'temp_max'};
            $temp_min = $json_object->{'main'}->{'temp_min'};
            set_transient( 'temperature_'.$instance['code'], $temperature, 20*60);        // enregistrement de la températur dans la base de donnee de wordpress 
            set_transient( 'ville_'.$instance['code'], $city, 60*60**24*30*3);        // enregistrement de la températur dans la base de donnee de wordpress 
            // recovery of 3 days of weather

               $contenuForecaste = file_get_contents($urlForecast);
               $json_object=json_decode( $contenuForecaste);

               $temp_c = $temp_k-273.15; // kelvins to degrees celsius converter
               $temp_max = $temp_max-273.15; // kelvins to degrees celsius converter
               $temp_min = $temp_min-273.15; // kelvins to degrees celsius converter
               $temp_max=round($temp_max);//round the numb
               $temp_min=round($temp_min);//round the numb
               $temp_c=round($temp_c);//round the numb






//data recovery for forecast weather
               
       for ($i=0;$i<36;$i=$i+1){

        $temp_kF= $json_object->{'list'}[$i]->{'main'}->{'temp'};
        $humidityF= $json_object->{'list'}[$i]->{'main'}->{'humidity'};
        $description_weatherF= $json_object->{'list'}[$i]->{'weather'}[0]->{'description'};
        $iconF= $json_object->{'list'}[$i]->{'weather'}[0]->{'icon'};
        $dateF= $json_object->{'list'}[$i]->{'dt_txt'};
        
        $tempF = $json_object->{'list'}[$i]->{'main'}->{'temp'};
        $humidityF=$json_object->{'list'}[$i]->{'main'}->{'humidity'};
       // $temp_minF = $json_object->{'list'}[$i]->{'main'}->{'feels_like'};
        $tempF = $tempF-273.15; // kelvins to degrees celsius converter
       // $temp_minF = $temp_minF-273.15; // kelvins to degrees celsius converter
       $tempF=round($tempF);//round the numb
       // $temp_minF=round($temp_minF);//round the numb
        
        $tabdateF[]=$dateF;
        $tabdescription_weatherF[] = $description_weatherF;
        $tabiconF[]=$iconF;
        $tabtempF[]= $tempF;
        $tabhumidityF[]= $humidityF;
        
       }
       $json = file_get_contents("http://127.0.0.1/wordpress1\wp-content\plugins\plugin_weathetvs1/city.list.json");
       $obj = json_decode($json); 
       


          
           