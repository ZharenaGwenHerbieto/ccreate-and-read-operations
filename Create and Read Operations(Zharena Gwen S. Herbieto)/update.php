<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'crud_example');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the user info
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM users WHERE id=$id");
$user = $result->fetch_assoc();

if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $age = $_POST['age'];

    $sql = "UPDATE users SET name='$name', age='$age' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <style>
        body {
            background-color: #f4f4f4;
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #ffffff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Edit User</h1>

    <form action="" method="POST" class="form-group">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="<?= $user['name'] ?>" required>
        
        <label for="age">Age:</label>
        <input type="number" name="age" id="age" value="<?= $user['age'] ?>" required>
        
        <button type="submit" name="update">Update User</button>
    </form>
</div>

</body>
</html>

<?php $conn->close(); ?>
