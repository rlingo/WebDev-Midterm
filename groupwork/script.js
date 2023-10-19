function addDummyData() {
    var tableBody = document.querySelector("#itemTable tbody");

    var newRow = document.createElement("tr");
    newRow.className = "table-row";
    newRow.innerHTML = `
        <td>002</td>
        <td>Ford Focus</td>
        <td>$20,000</td>
        <td>
            <button class="btn btn-warning edit-button">Edit</button>
            <button class="btn btn-danger delete-button">Delete</button>
        </td>
    `;//kumbaga dd ig bubutang an pagkuha han contents tkang database para amot ig display not 100% sure pero ini na script gn didisplay an sulod newRow variable

    tableBody.appendChild(newRow);

    var editButton = newRow.querySelector(".edit-button");
    var deleteButton = newRow.querySelector(".delete-button");

    editButton.addEventListener("click", function () {
        //edit function ma wait lak kun ma connect na sa database
        console.log("Edit button clicked");
    });

    deleteButton.addEventListener("click", function () {
        var confirmationModal = new bootstrap.Modal(document.getElementById('confirmationModal'));
        confirmationModal.show();

        var confirmDeleteButton = document.getElementById('confirmDeleteButton');
        confirmDeleteButton.addEventListener('click', function () {
            tableBody.removeChild(newRow);
            confirmationModal.hide();
        });
    });
}

var addButton = document.querySelector(".aBtn");
addButton.addEventListener("click", addDummyData);
