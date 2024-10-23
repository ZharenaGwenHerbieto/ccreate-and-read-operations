<?php
// Establish database connection
$conn = new mysqli("localhost", "root", "", "user_management"); // Ensure the database name is correct

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $age = $_POST['age'];

    // Insert the new user data into the "users" table
    $sql = "INSERT INTO users (name, age) VALUES ('$name', $age)";

    if ($conn->query($sql) === TRUE) {
        // Redirect to the main page after successful insertion
        header("Location: index.php");
        exit; // Always call exit after header redirect
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the connection
$conn->close();
?>
