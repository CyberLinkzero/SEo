document.addEventListener("DOMContentLoaded", () => {
    // Function to send IP and location data to Google Sheets
    function sendToGoogleSheet(data) {
        const scriptURL = 'https://script.google.com/macros/s/AKfycbwKE-2fTnrYoi2hZT2S2pIcBU29LDj2psWzGC51b2BKCWbatfq9ZtI7b-SYsWvryaaQTw/exec, {
            method: 'POST',
            body: JSON.stringify(data),
            headers: { 'Content-Type': 'application/json' }
        })
        .then(response => response.json())
        .then(result => console.log("Data logged:", result))
        .catch(error => console.error("Error sending data to Google Sheets:", error));
    }

    // Get the visitor's IP address
    fetch('https://api64.ipify.org?format=json')
        .then(response => response.json())
        .then(data => {
            const ip_address = data.ip;

            // Estimate location data manually or leave blank for now
            const locationData = {
                ip: ip_address,
                country: "Unknown", // Add logic for country if you have an IP database
                region: "Unknown",  // Add logic for region if you have an IP database
                city: "Unknown"     // Add logic for city if you have an IP database
            };

            // Send data to Google Sheets
            sendToGoogleSheet(locationData);
        })
        .catch(error => console.error("Error getting IP address:", error));
});
