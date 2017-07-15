<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

 
error_reporting(E_ERROR | E_PARSE);

require('../../private/weather_app/config.php');

if(isset($_GET['city'])){
    
    $key = $config['API_KEY'];
    
    $forcast_days='1';
    
    $city = str_replace(" ", "", $_GET['city']);

    $url ="http://api.apixu.com/v1/forecast.json?key=$key&q=$city&=";
    
    $ch = curl_init();  
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
	
    $json_output=curl_exec($ch);
    $weather = json_decode($json_output); 
	
    if($weather->location->name != null) {
    echo "<div class='alert alert-success'><div class='row'><div class='col-md-12'>";
    echo "<h1>Current Weather</h1>";
    echo "</div></div>";
    
    echo "<div class='row'><div class='col-lg-4 col-md-6'>";
    echo "<h2>Location</h2>";
    echo "City: ". $weather->location->name;
    echo "<br>";
    echo "Region: ".$weather->location->region;
    echo "<br>";
    echo "Country: ".$weather->location->country;
    echo "<br>";
    echo "</div>";   
    
    echo "<div class='col-lg-4 col-md-6'>";
    echo "<h2>Temprature</h2>";
    echo "Condition: <img src='" . $weather->current->condition->icon ."'>" . $weather->current->condition->text; echo "<br>";
    echo "Temperature (&deg;C): " . $weather->current->temp_c; echo "<br>";
    echo "Feels like (&deg;C)". $weather->current->feelslike_c;
            echo "<br>";

    echo "</div>";
    
    echo "<div class='col-lg-4 hidden-md hidden-sm'>";
    echo "<h2>Wind</h2>";
    echo $weather->current->wind_mph." mph <br>";
    echo $weather->current->wind_kph." kph <br>"; 
    echo $weather->current->wind_degree."&deg;  " . $weather->current->wind_dir."<br>";   
    echo "Humidity: ".$weather->current->humidity;
    echo "</div></div>";
    
    echo "<div class='row'><div class='col-md-12'>";
    echo "<br>";
    echo "Last Updated On: ".$weather->current->last_updated;   
    echo "</div></div></div>";
    
    } else {
        
        echo "<div class='alert alert-danger'><div class='row'><div class='col-md-12'>";
        echo "<h3>Unable to find the weather for ".$_GET['city']."</h3>";
        echo "</div></div></div>";
         
    }
}
