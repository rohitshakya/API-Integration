<!--
 * Author : Rohit Shakya
 * Date   : Jan-2021
 * Editor : Sublime text
 * Local server: Xampp
 * Title : Open Weather API
-->

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Weather API</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body style="background: white">
  <!-- nav bar-->
  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">Weather</a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
        </ul>
        
      </div>
    </div>
  </nav>

  <!--nav bar complete-->

    <?php
    $apiKey = "231a533e913c7e004f7ea56e36a67d83";
    $cityId = 1261481;
    $googleApiUrl = "http://api.openweathermap.org/data/2.5/weather?id=" . $cityId . "&lang=en&units=metric&APPID=" . $apiKey;
    
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $googleApiUrl);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_VERBOSE, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $response = curl_exec($ch);

    curl_close($ch);
    $data = json_decode($response);
    $currentTime = time();
    ?>
    <div class="report-container">
      <h3><?php echo $data->name; ?> Weather Status</h3>
      <div class="time">
        <div><?php echo ucwords($data->weather[0]->description); ?></div>

      </div>
      <div class="weather-forecast">
        <img
        src="http://openweathermap.org/img/w/<?php echo $data->weather[0]->icon; ?>.png"
        class="weather-icon" /> <?php echo $data->main->temp_max; ?>°C
        <span class="min-temperature"><?php echo $data->main->temp_min; ?>°C</span>
      </div>
      <div class="time">
        <div>Longitude: <?php echo $data->coord->lon; ?></div>
        <div>Latitude: <?php echo $data->coord->lat; ?></div>
        <div>Humidity: <?php echo $data->main->humidity; ?> %</div>
        <div>Wind: <?php echo $data->wind->speed; ?> km/h</div>
        <div>Pressure: <?php echo $data->main->pressure; ?></div>
        <div>Visibility: <?php echo $data->visibility; ?></div>
        <div>Clouds: <?php echo $data->clouds->all; ?></div>
        <div>Country: <?php echo $data->sys->country; ?></div>
        
      </div>
    </div>
    </body>
  </html>
 <!--    {
      "coord": {
        "lon": 37.6156,
        "lat": 55.7522
      },
      "weather": [{
        "id": 802,
        "main": "Clouds",
        "description": "scattered clouds",
        "icon": "03n"
      }],
      "base": "stations",
      "main": {
        "temp": 259.04,
        "feels_like": 253.47,
        "temp_min": 258.71,
        "temp_max": 259.26,
        "pressure": 1014,
        "humidity": 78
      },
      "visibility": 10000,
      "wind": {
        "speed": 3,
        "deg": 190
      },
      "clouds": {
        "all": 40
      },
      "dt": 1611207556,
      "sys": {
        "type": 1,
        "id": 9027,
        "country": "RU",
        "sunrise": 1611207698,
        "sunset": 1611236381
      },
      "timezone": 10800,
      "id": 524901,
      "name": "Moscow",
      "cod": 200
    }
  --> 