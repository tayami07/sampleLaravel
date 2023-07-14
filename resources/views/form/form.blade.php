<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Child Form</title>
</head>

<body>
    <div class="container">
        <button id="add-row-btn">
            Add New
        </button>
        <table id="child-table">
            <thead>
                <tr>
                    <th>Action</th>
                    <th>Child First Name</th>
                    <th>Child Middle Name</th>
                    <th>Child Last Name</th>
                    <th>Child Age</th>
                    <th>Gender</th>
                    <th>Different Address?</th>
                    <th>Child Address</th>
                    <th>Child City</th>
                    <th>Child State</th>
                    <th>Country</th>
                    <th>Child Zip Code</th>
                </tr>
            </thead>
            <tbody id="table-body">
                <tr id="row-template">
                    <td>
                        <button class="delete-btn">Delete</button>
                    </td>
                    <td><input type="text" name="child_first_name" placeholder="Child First Name" pattern="[A-Za-z0-9\s]+" required></td>
                    <td><input type="text" name="child_middle_name" placeholder="Child Middle Name" pattern="[A-Za-z0-9\s]+" required></td>
                    <td><input type="text" name="child_last_name" placeholder="Child Last Name" pattern="[A-Za-z0-9\s]+" required></td>
                    <td><input type="text" name="child_age" placeholder="Child Age" pattern="[0-9]+" required></td>
                    <td>
                        <select name="gender" required>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select>
                    </td>
                    <td>
                        <input type="checkbox" name="different_address[]" class="different-address-checkbox">
                    </td>
                    <td><input type="text" name="child_address[]" placeholder="Child Address" pattern="[A-Za-z0-9\s]+" disabled></td>
                    <td><input type="text" name="child_city[]" placeholder="Child City" pattern="[A-Za-z0-9\s]+" disabled></td>
                    <td><input type="text" name="child_state[]" placeholder="Child State" pattern="[A-Za-z0-9\s]+" disabled></td>
                    <td>
                        <select name="country[]" disabled>
                            <option value="Country 1">Country 1</option>
                            <option value="Country 2">Country 2</option>
                            <option value="Country 3">Country 3</option>
                        </select>
                    </td>
                    <td><input type="text" name="child_zip_code[]" placeholder="Child Zip Code" pattern="[0-9]+" disabled></td>
                </tr>
            </tbody>
        </table>
    </div>


    <script>
        var addRowBtn = document.getElementById('add-row-btn');
        var tableBody = document.getElementById('table-body');
        var rowTemplate = document.getElementById('row-template');

        var table = document.getElementById('child-table');

        function deleteRow(event) {
            var row = event.target.closest('tr');
            row.parentNode.removeChild(row);
        }

        table.addEventListener('click', function(event) {
            if (event.target.classList.contains('delete-btn')) {
                deleteRow(event);
            }
        });


        function addRow() {
            var newRow = rowTemplate.cloneNode(true);
            newRow.removeAttribute('id');
            newRow.style.display = 'table-row';
            tableBody.appendChild(newRow);

        }
        addRowBtn.addEventListener('click', addRow);


        var differentAddressCheckboxes = document.querySelectorAll('.different-address-checkbox');

        differentAddressCheckboxes.forEach(function(checkbox) {
            checkbox.addEventListener('change', function() {
                var fields = checkbox.parentNode.parentNode.querySelectorAll('input[type="text"]');
                fields.forEach(function(field) {
                    field.disabled = !checkbox.checked;
                });
            });
        });
    </script>
</body>

</html>