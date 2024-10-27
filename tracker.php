<?php
// Get the visitor's IP address
$ip_address = $_SERVER['REMOTE_ADDR'];

// Get the current timestamp
$timestamp = date("Y-m-d H:i:s");

// Prepare the data entry
$entry = "IP: $ip_address | Timestamp: $timestamp" . PHP_EOL;

// Path to the log file (make sure this file is writable by the server)
$log_file = 'ip_log.txt';

// Append the IP and timestamp to the file
file_put_contents($log_file, $entry, FILE_APPEND | LOCK_EX);

// Optionally, display a message or redirect
echo "Your visit has been logged.";
?>
