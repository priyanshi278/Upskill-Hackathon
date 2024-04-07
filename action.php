<?php
    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get the selected mentor from the form
        $selected_mentor = $_POST['mentor'];

        // Database connection
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "table";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $database);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepare SQL query based on selected mentor
        $sql_query = "SELECT * FROM mentors WHERE industry = '$selected_mentor'";

        // Execute SQL query
        $result = $conn->query($sql_query);

        // Display result
        if ($result && $result->num_rows > 0) {
            echo "<h3>Results for $selected_mentor:</h3>";
            echo "<table border='1'>";
            echo "<tr><th>S.NO</th><th>Name</th><th>Contact</th><th>Email</th><th>Industry</th><th>Skills</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["name"] . "</td>";
                echo "<td>" . $row["contact"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "<td>" . $row["industry"] . "</td>";
                echo "<td>" . $row["skills"] . "</td>";
                // Add more columns if needed
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "No mentors found for $selected_mentor.";
        }


        // Close connection
        $conn->close();
    }
    ?>