<?php require_once ('header.php');?>
<div class="toggle-content contenu " id="example">
                        

    <table class="table  table-dark ">

        <thead>

            <?php for ($i=0;$i<36;$i=$i+8){ ?>
                <tr>
                <th scope="col " class="dateF"> <?php print $tabdateF[$i]?> </th>
                <th scope="col " class="icon"><?php print '<img src="http://openweathermap.org/img/wn/'.$tabiconF[$i].'@2x.png">'?> </th>
                <th scope="col " class="desc"> <?php print $tabdescription_weatherF[$i] ?></th>
                <th scope="col " class="tempm"><?php print  $tabtempF[$i] .'°' ?> </th>
                <!-- <th scope="col " class="tempm"><?php //print $tabhumidityF[$i] .'%'?> </th> -->
                </tr>
            <?php }?>
            
        
        </thead>
    </table>
    

    </div>
