<?php
// Get the visitor’s IP address
$ip_address = $_SERVER['REMOTE_ADDR'];

// Use ipinfo.io API to get location details based on the IP
$api_url = "https://ipinfo.io/{$ip_address}/json?token=YOUR_API_TOKEN";
$location_data = file_get_contents($api_url);
$location = json_decode($location_data, true);

// Extract details
$country = $location['country'] ?? 'Unknown';
$region = $location['region'] ?? 'Unknown';
$city = $location['city'] ?? 'Unknown';

// Prepare data to send back to frontend as JSON
echo json_encode([
    'ip' => $ip_address,
    'country' => $country,
    'region' => $region,
    'city' => $city,
]);
?>
