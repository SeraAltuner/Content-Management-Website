<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Create Content - CTIS Forum</title>
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

    .content-form-container {
        max-width: 800px;
        margin: 0 auto;
        padding: 30px;
        background-color: white;
        border-radius: 8px;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    }

    .content-form-container h2 {
        color: #4caf50;
        font-size: 24px;
        margin-bottom: 20px;
    }

    .form-input,
    .form-textarea {
        width: 100%;
        padding: 12px;
        margin: 8px 0;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        font-size: 16px;
    }

    .form-input:focus,
    .form-textarea:focus {
        outline: none;
        border-color: #4caf50;
    }

    .form-textarea {
        height: 200px;
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
            <h1><b>CTIS FORUM</b></h1>
           
        </header>

        <!-- Create Content Form -->
        <div class="content-form-container">
            <h2>Create New Content</h2>
            <form>
                <label for="title">Title</label>
                <input type="text" id="title" name="title" class="form-input" placeholder="Enter your content title"
                    required />

                <label for="description">Description</label>
                <input type="text" id="description" name="description" class="form-input"
                    placeholder="Enter a brief description" required />

                <label for="content">Content</label>
                <textarea id="content" name="content" class="form-textarea" placeholder="Enter your content here"
                    required></textarea>

                <button type="submit" class="form-button">Create Content</button>
            </form>

            <!-- Back Button -->
            <a href="/" class="back-button">Back to Home</a>
        </div>

        <!-- Footer -->
        <footer class="w3-container w3-dark-grey w3-padding-32 w3-margin-top">
            <button class="w3-button w3-black w3-disabled w3-padding-large w3-margin-bottom">
                Previous
            </button>
            <button class="w3-button w3-black w3-padding-large w3-margin-bottom">
                Next »
            </button>
            <p>
                Powered by
                <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a>
            </p>
        </footer>
    </div>
</body>

</html>