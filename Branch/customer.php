<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'connect';

// Create a database connection
$con = mysqli_connect($host, $user, $pass, $db);

if ($con) {
    echo 'Connected successfully to the database.<br>';

    // Insert data into the 'customer' table
    $sql = "INSERT INTO customer (customer_id, name, contact_info, address, purchase_date, car_type_id) VALUES
            ('001', 'John Doe', '0909096789', 'San Jose', '2023-10-21', 'Sedan'),
            ('002', 'Jane Smith', '093628173892', 'Real St. Tacloban', '2023-10-22', 'SUV'),
            ('003', 'Bob Johnson', '09283737939', 'Palo', '2023-10-23', 'Truck')";

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
