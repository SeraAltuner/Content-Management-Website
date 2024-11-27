<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Admin - User Management</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway" />
    <style>
    body,
    h1,
    h2,
    h3,
    h4,
    h5 {
        font-family: "Raleway", sans-serif;
    }

    .form-container {
        max-width: 800px;
        margin: 0 auto;
        padding: 30px;
        background-color: white;
        border-radius: 8px;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    }

    .form-container h2 {
        color: #4caf50;
        font-size: 24px;
        margin-bottom: 20px;
    }

    .form-input,
    .form-select,
    .form-button {
        width: 100%;
        padding: 12px;
        margin: 8px 0;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        font-size: 16px;
    }

    .form-input:focus,
    .form-select:focus {
        outline: none;
        border-color: #4caf50;
    }

    .form-button {
        background-color: #4caf50;
        color: white;
        padding: 15px 20px;
        border: none;
        border-radius: 4px;
        font-size: 16px;
        cursor: pointer;
        width: 100%;
        margin-top: 10px;
    }

    .form-button:hover {
        background-color: #45a049;
    }

    .back-button {
        background-color: #f44336;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        font-size: 16px;
        cursor: pointer;
        text-decoration: none;
    }

    .back-button:hover {
        background-color: #e53935;
    }
    </style>
</head>

<body class="w3-light-grey">
    <!-- w3-content defines a container for fixed size centered content -->
    <div class="w3-content" style="max-width: 1400px">
        <!-- Header -->
        <header class="w3-container w3-center w3-padding-32">
            <h1><b>Admin - User Management</b></h1>
        </header>

        <!-- User Management Form -->
        <div class="form-container">
            <h2>Create and Assign Roles to Users</h2>
            <form id="userForm">

                <!-- Create User Type -->
                <label for="userType">Select User Type</label>
                <select id="userType" name="userType" class="form-select" required>
                    <option value="">--Select User Type--</option>
                    <option value="contentCreator">Content Creator</option>
                    <option value="editor">Editor</option>
                </select>

                <!-- Create Username -->
                <label for="username">Username</label>
                <input type="text" id="username" name="username" class="form-input" placeholder="Enter username"
                    required />

                <!-- Create Email -->
                <label for="email">Email</label>
                <input type="email" id="email" name="email" class="form-input" placeholder="Enter email" required />

                <!-- Assign Rights to Content Creator -->
                <div id="rightsContainer" style="display:none;">
                    <h3>Assign Rights to Content Creator</h3>
                    <label for="viewOwnContent">Can view own content</label>
                    <input type="checkbox" id="viewOwnContent" name="viewOwnContent" />

                    <label for="viewOtherContent">Can view other content creators' content</label>
                    <input type="checkbox" id="viewOtherContent" name="viewOtherContent" />
                </div>

                <!-- Submit Button -->
                <button type="submit" class="form-button">Create User</button>
            </form>

            <!-- Back Button -->
            <a href="/" class="back-button">Back to Dashboard</a>
        </div>

        <!-- Footer -->
        <footer class="w3-container w3-dark-grey w3-padding-32 w3-margin-top">
            <p>
                Powered by
                <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a>
            </p>
        </footer>
    </div>

    <script>
    // JavaScript to show/hide rights options based on user type selection
    const userTypeSelect = document.getElementById('userType');
    const rightsContainer = document.getElementById('rightsContainer');

    userTypeSelect.addEventListener('change', function() {
        if (this.value === 'contentCreator') {
            rightsContainer.style.display = 'block'; // Show rights for content creator
        } else {
            rightsContainer.style.display = 'none'; // Hide rights for editor
        }
    });

    // Handle form submission
    document.getElementById('userForm').addEventListener('submit', function(event) {
        event.preventDefault();
        const userType = document.getElementById('userType').value;
        const username = document.getElementById('username').value;
        const email = document.getElementById('email').value;
        const viewOwnContent = document.getElementById('viewOwnContent').checked;
        const viewOtherContent = document.getElementById('viewOtherContent').checked;

        // Logic to send this data to the backend for user creation and rights assignment
        alert(
            `User Created! Type: ${userType}, Username: ${username}, Email: ${email}\nRights: ${viewOwnContent ? 'Can view own content' : ''}, ${viewOtherContent ? 'Can view others\' content' : ''}`);
    });
    </script>
</body>

</html>