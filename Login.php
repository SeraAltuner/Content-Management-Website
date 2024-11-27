<?php
session_start();
require "db.php"; // Include your database connection file

// Check if the user is already logged in via session token
if (isset($_SESSION['token'])) {
    // Verify and fetch user data based on session token
    $user = getUserByToken($_SESSION['token']); // Replace with your actual function
    if ($user) {
        // Redirect based on user role
        switch ($user['role']) {
            case 'admin':
                header("Location: admin_dashboard.php");
                break;
            case 'content_creator':
                header("Location: content_creator_dashboard.php");
                break;
            case 'editor':
                header("Location: editor_dashboard.php");
                break;
            default:
                header("Location: index.php");
        }
        exit;
    }
}

$errorMessage = "";

// Handle login form submission
// if (isset($_POST['login'])) {
//     $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
//     $password = $_POST['password'];
//     $userType = $_POST['userType'];

//     // Get user by email and user type
//     $user = getUserByEmailAndType($email, $userType); // Adjust according to your logic

//     // Verify user credentials
//     if ($user && password_verify($password, $user['password'])) {
//         $_SESSION['token'] = $user['remember']; // Set session token
//         switch ($user['role']) {
//             case 'admin':
//                 header("Location: admin_dashboard.php");
//                 break;
//             case 'content_creator':
//                 header("Location: content_creator_dashboard.php");
//                 break;
//             case 'editor':
//                 header("Location: editor_dashboard.php");
//                 break;
//             default:
//                 $errorMessage = "Invalid user role.";
//                 break;
//         }
//         exit;
//     } else {
//         $errorMessage = "Invalid email, password, or user type.";
//     }
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Portal</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <style>
    body,
    h1,
    h2,
    h3,
    h4,
    h5 {
        font-family: "Raleway", sans-serif;
    }
    </style>
</head>

<body class="w3-light-grey">

    <div class="w3-content" style="max-width: 500px;">
        <header class="w3-container w3-center w3-padding-32 w3-white">
            <h1><b>Login</b></h1>
            <?php if (!empty($errorMessage)): ?>
            <p class="w3-text-red"><?php echo $errorMessage; ?></p>
            <?php endif; ?>
        </header>

        <div class="w3-card-4 w3-margin w3-white">
            <form action="" method="post" class="w3-container w3-padding-32">
                <div class="w3-section">
                    <label for="email"><b>Email</b></label>
                    <input type="email" id="email" name="email" required placeholder="Enter your email"
                        class="w3-input w3-border w3-round-large">
                </div>
                <div class="w3-section">
                    <label for="password"><b>Password</b></label>
                    <input type="password" id="password" name="password" required placeholder="Enter your password"
                        class="w3-input w3-border w3-round-large">
                </div>
                <div class="w3-section">
                    <label for="userType"><b>User Type</b></label>
                    <select name="userType" id="userType" required class="w3-select w3-border w3-round-large">
                        <option value="">Select User Type</option>
                        <option value="admin">Admin</option>
                        <option value="content_creator">Content Creator</option>
                        <option value="editor">Editor</option>
                    </select>
                </div>

                <button type="submit" name="login" class="w3-button w3-block w3-blue w3-padding-large w3-round-large">
                    Log In
                </button>
            </form>
        </div>

        <footer class="w3-container w3-center w3-padding-32 w3-white">
            <p>Don't have an account? <a href="register.php" class="w3-text-blue">Create one here</a>.</p>
        </footer>
    </div>

</body>

</html>