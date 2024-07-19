<?php


// Database configuration
$host = 'localhost'; // or your database host
$dbname = 'flight_api'; // replace with your database name
$username = 'root'; // replace with your database username
$password = ''; // replace with your database password

try {
    // Create a new PDO instance
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    
    // Set error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // SQL insert statement
    $sql = "INSERT INTO locations (name_translations, cases, country_code, code, time_zone, name, coordinates) 
            VALUES (:name_translations, :cases, :country_code, :code, :time_zone, :name, :coordinates)";
    
    // Prepare the statement
    $stmt = $pdo->prepare($sql);
    
    // JSON data
    $jsonData = `[
                {
                    "name_translations": {
                    "en": "Fuzuli"
                    },
                    "cases": {
                    "su": "Fuzuli"
                    },
                    "country_code": "AZ",
                    "code": "FZL",
                    "time_zone": "Asia/Baku",
                    "name": "Fuzuli",
                    "coordinates": {
                    "lat": 39.600277,
                    "lon": 47.143055
                    }
                },
                  {
                    "name_translations": {
                    "en": "Fuzuli"
                    },
                    "cases": {
                    "su": "Fuzuli"
                    },
                    "country_code": "AZ",
                    "code": "FZL",
                    "time_zone": "Asia/Baku",
                    "name": "Fuzuli",
                    "coordinates": {
                    "lat": 39.600277,
                    "lon": 47.143055
                    }
                },
                ]`;
    
    // Convert JSON to PHP array
    $dataArray = json_decode($jsonData, true);
    
    // Execute the statement for each data entry
    foreach ($dataArray as $row) {
        $stmt->execute([
            'name_translations' => json_encode($row['name_translations']),
            'cases' => json_encode($row['cases']),
            'country_code' => $row['country_code'],
            'code' => $row['code'],
            'time_zone' => $row['time_zone'],
            'name' => $row['name'],
            'coordinates' => json_encode($row['coordinates'])
        ]);
    }
    
    echo "Data inserted successfully!";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}






// function getIATACode($city, $country) {
//     $url = "https://api.travelpayouts.com/data/en/cities.json";
    
//     $response = file_get_contents($url);
//     if ($response === FALSE) {
//         die('Error occurred while fetching data.');
//     }

//     $cities = json_decode($response, true);

//     foreach ($cities as $cityData) {
//         // Check the keys to ensure they match the JSON structure
//         if (
//             isset($cityData['name']) &&
//             isset($cityData['country_code']) &&
//             strcasecmp($cityData['name'], $city) == 0 &&
//             strcasecmp($cityData['country_code'], $country) == 0
//         ) {
//             return strtoupper($cityData['code']);
//         }
//     }

//     return null;
// }

// function formatOrigin($city, $country, $iata) {
//     return "{$city}, {$country} (" . strtoupper($iata) . ")";
// }

// // Example usage
// $city = "Mumbai";
// $country = "IN";
// $iata = getIATACode($city, $country);

// if ($iata) {
//     echo formatOrigin($city, $country, $iata);
// } else {
//     echo "IATA code not found.";
// }

?>


