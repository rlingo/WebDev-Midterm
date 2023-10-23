<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Branches</title>
    <link rel="stylesheet" href="styles/branches.css">
    
    <link rel="stylesheet" href="styles/dashboard.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container-fluid">
        <div class="row vh-100">

            <!-- Profile  -->
            <div class="col-2" style="border-right: 2px solid black">
                <div class="row container vh-100 align-items-center m-1">
                    <div>
                        <img src="assets/car-icon.png" alt="" class="profile-picture rounded-circle">
                    </div>

                    <div class="row gap-2">
                        <button onclick="toModels()" class="btn btn-light" type="button">Models</button>
                        <button onclick="toBranches()" class="btn btn-light" type="button">Branches</button>
                        <button onclick="toCustomers()" class="btn btn-light" type="button">Customers</button>
                    </div>
                    <button onclick="logout()" class="btn btn-warning">Logout</button>
                </div>
            </div>

            <!-- Item tables or selection of the items -->
            <div class="col-7 bg-light text-left p-4" style="border-right: 2px solid gray">
                <h3>Branches
                <button onclick="Add()" class="btn-Add">Add</button>
                </h3>              
           <?php

$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'connect';

// Create a single database connection
$con = mysqli_connect($host, $user, $pass, $db);

if ($con) {
    // Fetch data from the 'branches' table
    $sql = "SELECT * FROM branches";
    $result = mysqli_query($con, $sql);

    if ($result) {
        $branches = mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
        echo 'Error fetching branches data: ' . mysqli_error($con);
        $branches = [];
    }

    // Fetch data from the 'car_types' table
    $sql = "SELECT * FROM car_types";
    $result = mysqli_query($con, $sql);

    if ($result) {
        $carTypes = mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
        echo 'Error fetching car types data: ' . mysqli_error($con);
        $carTypes = [];
    }

    // Fetch data from the 'cars' table
    $sql = "SELECT * FROM cars";
    $result = mysqli_query($con, $sql);

    if ($result) {
        $cars = mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
        echo 'Error fetching car data: ' . mysqli_error($con);
        $cars = [];
    }

    // Fetch data from the 'customers' table
    $sql = "SELECT * FROM customer";
    $result = mysqli_query($con, $sql);

    if ($result) {
        $customers = mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
        echo 'Error fetching customer data: ' . mysqli_error($con);
        $customers = [];
    }
} else {
    echo 'Connection failed: ' . mysqli_connect_error();
    $branches = $carTypes = $cars = $customers = [];
}

// Close the database connection when you're done with it
mysqli_close($con);
?>

<html>
<head>
    <title>Branches</title>
    <style>
        /* Styling for the modal */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
        }

        .modal-content {
            background-color: #fff;
            width: 80%;
            max-width: 600px;
            margin: 100px auto;
            padding: 20px;
        }

        .close-button {
            display: inline-block;
            float: right;
          }
          .action-button {
        background-color: #008CBA;
        color: white;
        border: none;
        padding: 8px 16px;
        margin: 4px;
        cursor: pointer;
    }

    .action-button:hover {
        background-color: #005F80;
    }
    .btn-Add {
    top: 5px;
    right:320px;
    margin: 10px;
    background-color: #008CBA;
    color: black;
    cursor: pointer;
    padding: 5px 10px; /* Adjust padding for better button size */
    border-radius: 10px;
    font-size:18px;
    border:
    
}
.btn-Add:hover {
    background: #005F80;
    <style>
    .cartype-button {
        background-color: #008CBA;
        color: white;
        border: none;
        padding: 8px 16px;
        margin: 0 10px; /* Adjust the margin to control the spacing between buttons */
        cursor: pointer;
        white-space: nowrap; /* Prevent wrapping to a new line */
        display: inline-block;
    }

    .cartype-button:hover {
        background-color: #005F80;
    }

    #carTypesTable {
        width: 100%; /* Set the table width to 100% or adjust as needed */
        border-collapse: collapse;
    }

    #carTypesTable th, #carTypesTable td {
        border: 1px solid #ddd;
        padding: 10px;
        text-align: left;
    }

    #carTypesTable th {
        background-color: #f2f2f2;
    }

    #carTypesTable tr:nth-child(even) {
        background-color: #f2f2f2;
    }

   </style>
</head>
<body>
    <h1>List of Branches</h1>
    <!-- Display a table of branches with buttons for add, edit, delete -->
    <table class="custom-table" style="background-color: white;">

        <tr>
            <th>Name of Branch</th>
            <th>No of Total Sold Cars</th>
            <th>Actions</th>
        </tr>
        <!-- Display data from the 'branches' table -->
        <?php
        foreach ($branches as $key => $branch) {
            echo "<tr>";
            echo "<td id='name_$key'>{$branch['name']}</td>";
            echo "<td>{$branch['total_sold_cars']}</td>";
            echo "<td>
            <button class='action-button' onclick='editBranch($key)'>Edit</button>
            <button class='action-button' onclick='deleteBranch($key)'>Delete</button>
            <button class='action-button' onclick='viewProducts($key)'>View Products</button>
            </td>";
            echo "</tr>";
        }
        ?>
    </table>

    <!-- Edit Branch Form (hidden by default) -->
    <div id="editForm" style="display: none;">
        <input type="text" id="editName" placeholder="New Name">
        <button onclick="saveEdit()">Save</button>
        <button onclick="cancelEdit()">Cancel</button>
    </div>

    <!-- Modal for viewing products -->
    <div id="productsModal" class="modal">
        <div class="modal-content" style="padding: 100px;">
            <span class="close-button" onclick="closeProductsModal()">&times;</span>
            <h2 style="margin: 5px 0; text-align: center;">Products at <span id="branchName"></span></h2>
            <div class="product-list" style="max-height: 200px; overflow-y: scroll;">
                <!-- Table for car types -->
                <table id="carTypesTable">
                    <tr>
                        <th>Code</th>
                        <th>Description</th>
                        <th>No of Sold Cars</th>
                        <th>Actions</th>
                    </tr>
                    <!-- Sample car type data (replace with actual data from your database) -->
                    <?php
    foreach ($carTypes as $carType) {
        echo "<tr>";
        echo "<td>{$carType['code']}</td>";
        echo "<td>{$carType['description']}</td>";
        echo "<td>{$carType['sold_cars']}</td>";
        echo "<td>
 <div class='cartype-button' onclick='viewCars(\"{$carType['code']}\")'>View Cars</div>
<div class='cartype-button' onclick='viewCustomers(\"{$carType['code']}\")'>View Customers</div>
<div class='cartype-button' onclick='deleteCarType(\"{$carType['code']}\")'>Delete</div>

        
            </td>";
        echo "</tr>";
    }
    ?>
    </table>
                <!-- Button to add a new car type (inside the "Cars of" modal) -->
                <button onclick="addCarType()">Add Car Type</button>
            </div>
        </div>
    </div>

    <!-- Form for adding a new car type (hidden by default, inside the "Cars of" modal) -->
    <div id="addCarTypeForm" class="modal" style="display: none;">
        <div class="modal-content" style="padding: 20px;">
            <span class="close-button" onclick="closeAddCarTypeForm()">&times;</span>
            <h2 style="margin: 5px 0; text-align: center;">Add New Car Type</h2>
            <form id="carTypeForm" onsubmit="saveCarType(event);"> <!-- Set onsubmit to trigger saveCarType -->
                <label for="newCarTypeCode">Code:</label>
                <input type="text" id="newCarTypeCode" required>
                <br>

                <input type="text" id="newCarTypeDescription" required>
                <br>
                <button type="submit">Save</button>
            </form>
        </div>
    </div>

    <!-- Display the input information for the added car type (inside the "Cars of" modal) -->
    <div id="displayCarTypeInfo" style="display: none;">
        <h2>Car Type Information:</h2>
        <p><strong>Code:</strong> <span id="displayCarTypeCode"></span></p>
        <p><strong>Description:</strong> <span id="displayCarTypeDescription"></span></p>
    </div>

   <!-- Modal for viewing cars per car type -->
<div id="carsModal" class="modal">
    <div class="modal-content" style="padding: 20px;">
        <span class="close-button" onclick="closeCarsModal()">&times;</span>
        <h2 style="margin: 5px 0; text-align: center;">Cars for Car Type <span id="carTypeCodeCars"></span></h2>
        <table id="carTable">
            <tr>
                <th>Car Model</th>
                <th>Color</th>
                <th>Price</th>
                <th>Car Type</th>
            </tr>
            <!-- PHP code to populate car data based on car type -->
            <?php foreach ($cars as $car) : ?>
                    <tr>
                        <td><?php echo $car['car_mode']; ?></td>
                        <td><?php echo $car['color']; ?></td>
                        <td><?php echo $car['price']; ?></td>
                        <td><?php echo $car['car_type_id']; ?></td>
                    </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>


    <!-- Modal for viewing customers per car type of a branch -->
    <div id="customersModal" class="modal">
        <div class="modal-content" style="padding: 20px;">
            <span class="close-button" onclick="closeCustomersModal()">&times;</span>
            <h2 style="margin: 5px 0; text-align: center;">Customers for Car Type <span id="carTypeCodeCustomers"></span></h2>
            <table id="customerTable">
                <tr>
                    <th>Name of Customer</th>
                    <th>Contact Info</th>
                    <th>Address</th>
                    <th>Date and Time Purchased</th>
                    <th>Car Type</th>
                </tr>
                <!-- Sample customer data (replace with actual data from your database) -->
                <?php foreach ($customers as $customer) : ?>
        <tr>
            <td><?php echo $customer['name']; ?></td>
            <td><?php echo $customer['contact_info']; ?></td>
            <td><?php echo $customer['address']; ?></td>
            <td><?php echo $customer['purchase_date']; ?></td>
            <td><?php echo $customer['car_type_id']; ?></td>
        </tr>
    <?php endforeach; ?>
            </table>
        </div>
    </div>

    <script>
        var currentlyEditing = -1;

function editBranch(index) {
    currentlyEditing = index;
    var branchName = document.getElementById('name_' + index).innerText;
    document.getElementById('editName').value = branchName;
    document.getElementById('editForm').style.display = 'block';
}

function deleteBranch(index) {
    // Implement the delete functionality for a specific branch here
    console.log('Deleting branch ' + index);
}

function saveEdit() {
    if (currentlyEditing !== -1) {
        var editedName = document.getElementById('editName').value;
        document.getElementById('name_' + currentlyEditing).innerText = editedName;
        document.getElementById('editForm').style.display = 'none';
        currentlyEditing = -1;
    }
}

function cancelEdit() {
    document.getElementById('editForm').style.display = 'none';
    currentlyEditing = -1;
}

function viewProducts(index) {
    var branchName = document.getElementById('name_' + index).innerText;
    document.getElementById('branchName').innerText = branchName;
    document.getElementById('productsModal').style.display = 'block';

    // You have already fetched and stored car type data from the database in PHP as $carTypes
    // Loop through the actual car type data retrieved from the database
    var carTypesTable = document.getElementById('carTypesTable');
    carTypesTable.innerHTML = '<tr><th>Code</th><th>Description</th><th>No of Sold Cars</th><th>Actions</th></tr>';

    <?php foreach ($carTypes as $carType) { ?>
        var row = carTypesTable.insertRow(-1);
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        var cell3 = row.insertCell(2);
        var cell4 = row.insertCell(3);

        cell1.innerHTML = '<?php echo $carType['code']; ?>';
        cell2.innerHTML = '<?php echo $carType['description']; ?>';
        cell3.innerHTML = '<?php echo $carType['sold_cars']; ?>';

        var deleteCarTypeButton = document.createElement('button');
        deleteCarTypeButton.innerHTML = 'Delete';
        deleteCarTypeButton.onclick = function() {
            if (confirm('Are you sure you want to delete this car type?')) {
                // Implement your delete car type logic here.
                // You may want to send an AJAX request to delete the car type.
                // For now, we'll remove the row from the table without server interaction.
                row.remove(); // Remove the car type's row from the table
            }
        };
        cell4.appendChild(deleteCarTypeButton);

        var viewCarsButton = document.createElement('button');
        viewCarsButton.innerHTML = 'View Cars';
        viewCarsButton.onclick = function() {
            viewCars('<?php echo $carType['code']; ?>');
        };
        cell4.appendChild(viewCarsButton);

        var viewCustomersButton = document.createElement('button');
        viewCustomersButton.innerHTML = 'View Customers';
        viewCustomersButton.onclick = function() {
            viewCustomers('<?php echo $carType['code']; ?>');
        };
        cell4.appendChild(viewCustomersButton);
    <?php } ?>
}

        function addCarType() {
            document.getElementById('addCarTypeForm').style.display = 'block';
        }

        function closeAddCarTypeForm() {
            document.getElementById('addCarTypeForm').style.display = 'none';
        }

        function closeProductsModal() {
            document.getElementById('productsModal').style.display = 'none';
        }
        function viewCars(carTypeCode) {
            console.log('Viewing cars for car type:', carTypeCode);
    var carTypeCodeElement = document.getElementById('carTypeCodeCars');
    carTypeCodeElement.innerText = carTypeCode;

    var carTable = document.getElementById('carTable');
    carTable.innerHTML = '<tr><th>Car Model</th><th>Color</th><th>Price</th><th>Car Type</th></tr>';

    // Loop through the actual car data retrieved from the database
    <?php foreach ($cars as $car) : ?>
        if ('<?=$car['car_type_id']?>' === carTypeCode) {
            var row = carTable.insertRow(-1);
            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(1);
            var cell3 = row.insertCell(2);
            var cell4 = row.insertCell(3);

            cell1.innerHTML = '<?=$car['car_mode']?>';
            cell2.innerHTML = '<?=$car['color']?>';
            cell3.innerHTML = '<?=$car['price']?>';
            cell4.innerHTML = '<?=$car['car_type_id']?>';
        }

    <?php endforeach; ?>
    
    document.getElementById('carsModal').style.display = 'block';
}



        function viewCustomers(carModel) {
    var carTypeCodeCustomersElement = document.getElementById('carTypeCodeCustomers');
    carTypeCodeCustomersElement.innerText = carModel;
    document.getElementById('customersModal').style.display = 'block';

    sampleCustomers.forEach(function(customer) {
        var row = customerTable.insertRow(-1);
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        var cell3 = row.insertCell(2);
        var cell4 = row.insertCell(3);
        var cell5 = row.insertCell(4);

        cell1.innerHTML = customer.name;
        cell2.innerHTML = customer.contact;
        cell3.innerHTML = customer.address;
        cell4.innerHTML = customer.purchaseDate;
        cell5.innerHTML = customer.carTypeId;
    });
}

        function closeCustomersModal() {
            document.getElementById('customersModal').style.display = 'none';
        }

        function closeCarsModal() {
            document.getElementById('carsModal').style.display = 'none';
        }

        function saveCarType(event) {
    event.preventDefault();
    var newCarTypeCode = document.getElementById('newCarTypeCode').value;
    var newCarTypeDescription = document.getElementById('newCarTypeDescription').value;

    var carTypesTable = document.getElementById('carTypesTable');

    var row = carTypesTable.insertRow(-1);
    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    var cell3 = row.insertCell(2);
    var cell4 = row.insertCell(3);

    cell1.innerHTML = newCarTypeCode;
    cell2.innerHTML = newCarTypeDescription;
    cell3.innerHTML = '';  // Leave this cell empty

    var buttonContainer = document.createElement('div');

    // "Delete" button
    var deleteCarTypeButton = document.createElement('button');
    deleteCarTypeButton.innerHTML = 'Delete';
    deleteCarTypeButton.onclick = function() {
        if (confirm('Are you sure you want to delete this car type?')) {
            // Implement your delete car type logic here.
            // You may want to send an AJAX request to delete the car type.
            // For now, we'll remove the row from the table without server interaction.
            row.remove(); // Remove the car type's row from the table
        }
    };
    buttonContainer.appendChild(deleteCarTypeButton);

    // "View Cars" button
var viewCarsButton = document.createElement('button');
viewCarsButton.innerHTML = 'View Cars';
viewCarsButton.onclick = function() {
    // Pass the car type code associated with the currently iterated car type
    viewCars('<?php echo $carType['code']; ?>');
};
buttonContainer.appendChild(viewCarsButton);

    // "View Customers" button
    var viewCustomersButton = document.createElement('button');
    viewCustomersButton.innerHTML = 'View Customers';
    viewCustomersButton.onclick = function() {
        viewCustomers(newCarTypeCode);
    };
    buttonContainer.appendChild(viewCustomersButton);

    cell4.appendChild(buttonContainer);

    document.getElementById('newCarTypeCode').value = '';
    document.getElementById('newCarTypeDescription').value = '';
    document.getElementById('addCarTypeForm').style.display = 'none';
}    
    </script>
    
</body>
</html>


</html>
<script>
    function logout() {
        if (confirm("Are you sure you want to log out?")) {
            window.location.href = "login.php";
        }
    }

    function toModels() {
        var targetPage = "Models.php"; // This is to navigate to Models Page
        window.location.href = targetPage;
    }

    function toBranches() {
        var targetPage = "Branches.php"; // This is to navigate to Models Page
        window.location.href = targetPage;
    }

    function toCustomers() {
        var targetPage = "Customers.php"; // This is to navigate to Models Page
        window.location.href = targetPage;
    }
</script>