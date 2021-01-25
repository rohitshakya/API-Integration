

<?php

$name=$_GET['firstname'];
$pname=$_GET['partnername'];
$curl = curl_init();

  curl_setopt_array($curl, [
  CURLOPT_URL => "https://love-calculator.p.rapidapi.com/getPercentage?fname=$name&sname=$pname",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => [
    "x-rapidapi-host: love-calculator.p.rapidapi.com",
    "x-rapidapi-key: eab69d64cdmsha74cd5998ec77f5p1f8883jsn98c77d1a6736"
  ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}