<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'connect';

// Create a database connection
$con = mysqli_connect($host, $user, $pass, $db);

if ($con) {
    echo 'Connected successfully to the database.<br>';
    
    // Insert data into the 'cars' table
    $sql = "INSERT INTO cars (car_id, car_mode, color, price, car_type_id) VALUES
            (1, 'Toyota Camry', 'Silver', 25000.00, 11),
            (2, 'Ford Explorer', 'Blue', 30000.00, 22),
            (3, 'Honda Civic', 'Red', 22000.00, 33)";
    $query = mysqli_query($con, $sql);

    if ($query) {
        echo 'Data inserted successfully.';
    } else {
        echo 'Error inserting data: ' . mysqli_error($con);
    }
} else {
    echo 'Connection failed: ' . mysqli_connect_error();
}

?>