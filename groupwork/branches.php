<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Branches</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="container-fluid">
        <div class="row vh-100">
            <!-- Profile  -->
            <div class="col-2" style="border-right: 2px solid gray">
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
            <div class="col-7 bg-light text-center p-4" style="border-right: 2px solid gray">
                <div style="display: flex; justify-content: space-between;">
                    <h3 style="text-align: left;">Branches</h3>
                    <p class="btnAdd"><a href="#" class="aBtn">Add</a></p>
                </div>
                <div class="row align-self-start text-center">
                    <table id="itemTable" class="col table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="width: 50px">Code</th>
                                <th style="width: 50px">Name</th>
                                <th style="width: 50px">Price</th>
                                <th style="width: 50px">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>001</td>
                                <td>Toyota Camry</td>
                                <td>$25,000</td>
                                <td><button class="btn btn-warning">Edit</button>
                                    <button class="btn btn-danger ms-2">Delete</button></td><!--dren ma dedelte na row kay na ka code ig delete nala pag pakita la inen initial na pustura pag nabubutngan hn item-->
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Description Part for the cars -->
            <div class="col-3 text-center bg-light p-4">
                <h3>Description</h3>
                <div>
                    <img src="styles/toyota-camry.jpg" alt="" class="description-picture img-fluid bg-primary">
                    <p class="card-text">The Toyota Camry is a well-known midsize sedan that has been a popular choice among consumers for many years. It's recognized for its reliability, comfort, and a reputation for delivering a smooth and efficient driving experience.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Add this modal at the end of your HTML body -->
<div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="padding-top: 200px;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmationModalLabel">Confirmation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this item?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                <button type="button" class="btn btn-primary" id="confirmDeleteButton">Yes</button>
            </div>
        </div>
    </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="script.js"></script>
</body>
</html>
