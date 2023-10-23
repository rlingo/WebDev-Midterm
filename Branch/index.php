<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'connect';

// Create a database connection
$con = mysqli_connect($host, $user, $pass, $db);

if ($con) {
    echo 'Connected successfully to the database.<br>';
    
    // Insert data into the 'branches' table
    $sql = "INSERT INTO branches (branch_id, name, total_sold_cars) VALUES
            ('001', 'Tacloban', 100),
            ('002', 'Palo', 200),
            ('003', 'Ormoc', 150)";
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
