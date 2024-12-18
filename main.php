<?php
include_once "db.php";
?>

<!DOCTYPE html>
<html>

<head>
    <title>W3.CSS Template</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
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
    </style>
</head>

<body class="w3-light-grey">
    <!-- w3-content defines a container for fixed-size centered content -->
    <div class="w3-content" style="max-width: 1400px">

        <!-- Header -->
        <header class="w3-container w3-center w3-padding-32">
            <h1><b>CTIS FORUM</b></h1>
            <button onclick="alert('Log In button clicked')">Log In</button>
            <button onclick="alert('Sign In button clicked')">Sign In</button>
        </header>

        <!-- Grid -->
        <div class="w3-row">
            <!-- Blog entries -->
            <div class="w3-col l8 s12">
                <?php
                // Initialize database connection (replace with your database credentials)
                try {
                    $stmt = $db->query("SELECT title, description, image FROM blog_posts ORDER BY created_at DESC LIMIT 5");

                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo "<div class='w3-card-4 w3-margin w3-white'>";
                        echo "<img src='" . htmlspecialchars($row['image']) . "' alt='" . htmlspecialchars($row['title']) . "' style='width:100%'>";
                        echo "<div class='w3-container'>";
                        echo "<h3><b>" . htmlspecialchars($row['title']) . "</b></h3>";

                        // Extract the first sentence of the blog description dynamically
                        $firstSentence = strtok($row['description'], '.'); // Extract text up to the first period
                        echo "<p>" . htmlspecialchars($firstSentence) . ".</p>"; // Add the period back

                        echo "<div class='w3-row'>";
                        echo "<div class='w3-col m8 s12'>";
                        echo "<p>";
                        echo "<button class='w3-button w3-padding-large w3-white w3-border'>";
                        echo "<b>READ MORE »</b>";
                        echo "</button>";
                        echo "</p>";
                        echo "</div>";
                        echo "<div class='w3-col m4 w3-hide-small'>";
                        echo "<p>";
                        echo "<span class='w3-padding-large w3-right'><b>Comments </b> <span class='w3-badge'>2</span></span>";
                        echo "</p>";
                        echo "</div>";
                        echo "</div>"; // End of .w3-row
                        echo "</div>"; // End of .w3-container
                        echo "</div>"; // End of .w3-card-4
                    }
                } catch (PDOException $e) {
                    echo "<p>Error connecting to the database: " . htmlspecialchars($e->getMessage()) . "</p>";
                }
                ?>
            </div>

            <!-- Introduction menu -->
            <div class="w3-col l4">
                <!-- About Card -->
                <div class="w3-card w3-margin w3-margin-top">
                    <img src="/w3images/avatar_g.jpg" style="width: 100%" />
                    <div class="w3-container w3-white">
                        <h4><b>My Name</b></h4>
                        <p>
                            Just me, myself and I, exploring the universe of the unknown. I
                            have a heart of love and an interest in lorem ipsum and mauris
                            neque quam blogs. I want to share my world with you.
                        </p>
                    </div>
                </div>
                <hr />

                <!-- Posts -->
                <div class="w3-card w3-margin">
                    <div class="w3-container w3-padding">
                        <h4>Popular Posts</h4>
                    </div>
                    <ul class="w3-ul w3-hoverable w3-white">
                        <li class="w3-padding-16">
                            <img src="/w3images/workshop.jpg" alt="Image" class="w3-left w3-margin-right"
                                style="width: 50px" />
                            <span class="w3-large">Lorem</span><br />
                            <span>Sed mattis nunc</span>
                        </li>
                        <li class="w3-padding-16">
                            <img src="/w3images/gondol.jpg" alt="Image" class="w3-left w3-margin-right"
                                style="width: 50px" />
                            <span class="w3-large">Ipsum</span><br />
                            <span>Praes tinci sed</span>
                        </li>
                        <li class="w3-padding-16">
                            <img src="/w3images/skies.jpg" alt="Image" class="w3-left w3-margin-right"
                                style="width: 50px" />
                            <span class="w3-large">Dorum</span><br />
                            <span>Ultricies congue</span>
                        </li>
                        <li class="w3-padding-16 w3-hide-medium w3-hide-small">
                            <img src="/w3images/rock.jpg" alt="Image" class="w3-left w3-margin-right"
                                style="width: 50px" />
                            <span class="w3-large">Mingsum</span><br />
                            <span>Lorem ipsum dipsum</span>
                        </li>
                    </ul>
                </div>
                <hr />
            </div>

            <!-- END Introduction Menu -->
        </div>
        <!-- END GRID -->
    </div>
    <br />

    <!-- Footer -->
    <footer class="w3-container w3-dark-grey w3-padding-32 w3-margin-top">
        <button class="w3-button w3-black w3-disabled w3-padding-large w3-margin-bottom">Previous</button>
        <button class="w3-button w3-black w3-padding-large w3-margin-bottom">Next »</button>
        <p>
            Powered by
            <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a>
        </p>
    </footer>
</body>

</html>