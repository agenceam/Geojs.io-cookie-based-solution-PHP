<?php 
function getRealIpAddr() {
  
  // Use filter_input() to get the client IP address
  $ip = filter_input(INPUT_SERVER, 'HTTP_CLIENT_IP');
  if (!$ip) {
    $ip = filter_input(INPUT_SERVER, 'HTTP_X_FORWARDED_FOR');
  }
  if (!$ip) {
    $ip = filter_input(INPUT_SERVER, 'REMOTE_ADDR');
  }
  
  // Check if the IP address is a valid format
  if (!filter_var($ip, FILTER_VALIDATE_IP)) {
    return 'Invalid IP address';
  }
  
  return $ip;
}

function conditionnal_display_ip() {
  if (isset($_COOKIE['ctry'])) {
    // Return the country code from the cookie
    $countryfromip = $_COOKIE['ctry'];
    return $countryfromip;
  } else {
    // Retrieve the IP address and country code
    try {
      $ip = getRealIpAddr();
      $freegeoipjson = file_get_contents("https://get.geojs.io/v1/ip/geo/". $ip .".json");
      $jsondata = json_decode($freegeoipjson);
      $countryfromip = $jsondata->country_code;
    } catch (Exception $e) {
      // Handle any errors that might occur
      return 'Error retrieving country code';
    }
    
    // Set the cookie and return the country code
    $expire = time() + 60 * 60 * 72; // expires in three days
    setcookie('ctry', $countryfromip, $expire, '/');
    return $countryfromip;
  }
}
getRealIpAddr();
conditionnal_display_ip();
?>